<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
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
    public function index()
    {
        $data['title'] = 'Data User';
        $data['users'] = $this->UserModel->getAllUser();

        // Load view
        $this->load->view('backend/partials/header', $data);
        $this->load->view('backend/user/view', $data);
        $this->load->view('backend/partials/footer');
    }

    // Method untuk menambah user
    public function create()
    {
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
    public function edit($id)
    {
        $data['user'] = $this->UserModel->getUserById($id);

        if (empty($data['user'])) {
            show_404();
        }

        // Set validasi form input
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'min_length[6]'); // Password opsional

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/partials/header', $data);
            $this->load->view('backend/user/edit', $data);
            $this->load->view('backend/partials/footer');
        } else {
            // Ambil data dari input form
            $email = $this->input->post('email');
            $password = $this->input->post('password'); // Password opsional
            $role = $this->input->post('role');
            $nama = $this->input->post('nama');
            $nip = $this->input->post('nip');
            $telp = $this->input->post('telp');
            $alamat = $this->input->post('alamat');

            log_message('debug', 'Role: ' . $role);

            // Update data user
            $userData = [
                'email' => $email,
            ];

            // Hanya update password jika diubah
            if (!empty($password)) {
                $userData['password'] = password_hash($password, PASSWORD_DEFAULT);
            }

            // Update tabel user
            $this->UserModel->updateUser($id, $userData);

            // Update data tambahan berdasarkan role
            if ($role == 'admin') {
                $adminData = [
                    'nama' => $nama,
                    'nip' => $nip,
                    'telp' => $telp,
                    'alamat' => $alamat,
                ];
                $this->db->where('id_user', $id)->update('admin', $adminData);
            } elseif ($role == 'pemimpin') {
                $pemimpinData = [
                    'nama' => $nama,
                    'nip' => $nip,
                    'telp' => $telp,
                    'alamat' => $alamat,
                ];
                $this->db->where('id_user', $id)->update('pemimpin', $pemimpinData);
            } elseif ($role == 'kompetitor') {
                $kompetitorData = [
                    'nama' => $nama,
                    'telp' => $telp,
                    'alamat' => $alamat,
                ];
                $this->db->where('id_user', $id)->update('kompetitor', $kompetitorData);
            }

            // Set pesan sukses dan redirect
            $this->session->set_flashdata('success', 'User berhasil diperbarui');
            redirect('user');
        }
    }

    public function delete($id)
    {
        $this->load->model('UserModel');

        // Hapus user
        $this->UserModel->deleteUser($id);

        // Set flashdata dan redirect
        $this->session->set_flashdata('message', 'User berhasil dihapus');
        redirect('user');
    }
}
