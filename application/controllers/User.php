<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('UserModel');

        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('message', 'Silakan login terlebih dahulu!');
            redirect('auth/login');
        }

        $userType = $this->session->userdata('user_type');
        if (!in_array($userType, ['admin', 'pemimpin'])) {
            $this->session->set_flashdata('message', 'Anda tidak memiliki akses ke halaman ini!');
            redirect('home');
        }
    }

    // Method untuk menampilkan halaman dengan data user
    public function index() {
        $data['title'] = 'Data User';
        $data['users'] = $this->UserModel->getAllUser();

        // Load view
        $this->load->view('backend/partials/header', $data);
        $this->load->view('backend/user/view', $data);
        $this->load->view('backend/partials/footer');
    }

    // Method untuk menambah user
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $role = $this->input->post('role');
            $nama = $this->input->post('nama');
            $nip = $this->input->post('nip');
            $telp = $this->input->post('telp');
            $alamat = $this->input->post('alamat');

            // Insert ke tabel user
            $user_data = [
                'email' => $email,
                'password' => $password
            ];

            // Menyimpan user terlebih dahulu
            $this->db->insert('user', $user_data);
            $user_id = $this->db->insert_id();  // Mendapatkan id_user

            // Insert ke tabel admin atau pemimpin sesuai dengan role
            if ($role == 'admin') {
                $admin_data = [
                    'id_user' => $user_id,
                    'nama' => $nama,
                    'nip' => $nip,
                    'telp' => $telp,
                    'alamat' => $alamat
                ];
                $this->db->insert('admin', $admin_data);
            } elseif ($role == 'pemimpin') {
                $pemimpin_data = [
                    'id_user' => $user_id,
                    'nama' => $nama,
                    'nip' => $nip,
                    'telp' => $telp,
                    'alamat' => $alamat
                ];
                $this->db->insert('pemimpin', $pemimpin_data);
            }

            // Redirect setelah berhasil
            $this->session->set_flashdata('message', 'User berhasil ditambahkan');
            redirect('user');
        }

        // Menampilkan halaman tambah user
        $this->load->view('backend/partials/header');
        $this->load->view('backend/user/add');
        $this->load->view('backend/partials/footer');
    }

    // Method untuk mengedit user
    public function edit($id) {
        $data['user'] = $this->UserModel->getUserById($id);
        
        // Jika user tidak ditemukan
        if (empty($data['user'])) {
            show_404();
        }

        // Validasi form input
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'min_length[6]'); // Password opsional

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit User';
            $this->load->view('backend/partials/header', $data);
            $this->load->view('backend/user/edit', $data);
            $this->load->view('backend/partials/footer');
        } else {
            // Ambil data dari input form
            $userData = [
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password') ? password_hash($this->input->post('password'), PASSWORD_DEFAULT) : $data['user']['password'] // Update password hanya jika diubah
            ];

            // Update data user di database
            $this->UserModel->updateUser($id, $userData);
            $this->session->set_flashdata('success', 'User berhasil diperbarui');
            redirect('user');
        }
    }

    // Method untuk menghapus user
    public function delete($id) {
        // Cek apakah data user ada
        if ($this->UserModel->getUserById($id)) {
            // Hapus data user
            $this->UserModel->deleteUser($id);
            $this->session->set_flashdata('success', 'User berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'User tidak ditemukan');
        }

        redirect('user');
    }
}
