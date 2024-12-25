<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');  // Model untuk mengambil data pengguna
        $this->load->library('session');
        // Pastikan pengguna sudah login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    // Menampilkan halaman profil
    public function index() {
        $userId = $this->session->userdata('user_id');
        
        // Ambil data pengguna berdasarkan user_id
        $userData = $this->UserModel->getUserProfile($userId);
        $data['user'] = $userData; // Mengirimkan data profile ke view
        
        // Ambil data pengguna tambahan jika perlu
        $userById = $this->UserModel->getUserById($userId);
        $data['user_details'] = $userById; // Menambahkan data tambahan ke view
        
        // Menampilkan halaman profil
        $this->load->view('backend/partials/header', $data);
        $this->load->view('backend/profile/profile', $data);
        $this->load->view('backend/partials/footer');
    }   

    // Fungsi untuk memperbarui profil
    public function update() {
        $userId = $this->session->userdata('user_id');
        
        // Validasi input
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Nomor Telepon', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali halaman profil
            $this->index();
        } else {
            // Ambil data input
            $updatedData = [
                'nama' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'telp' => $this->input->post('phone'),
                'alamat' => $this->input->post('address')
            ];

            // Update data pengguna
            if ($this->UserModel->updateUser($userId, $updatedData)) {
                $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
                redirect('profile');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat memperbarui profil.');
                $this->index();
            }
        }
    }

    
}
