<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url']);

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

    // Register function
    public function register() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Form validation
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|matches[password]');

            // Validate kompetitor fields
            $this->form_validation->set_rules('telp', 'Telp', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');

            if ($this->form_validation->run() == FALSE) {
                // If validation fails, reload the registration page with error messages
                $this->load->view('auth/register');
            } else {
                $nama = $this->input->post('nama');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $telp = $this->input->post('telp');
                $alamat = $this->input->post('alamat');

                // Check if email exists
                if ($this->Auth_model->emailExists($email)) {
                    $this->session->set_flashdata('message', 'Email sudah terdaftar!');
                    redirect('auth/register');
                }

                // Register user
                if ($userId = $this->Auth_model->register($email, $password)) {
                    // Lanjutkan proses menyimpan data ke tabel `kompetitor`
                    $kompetitorData = [
                        'id_user' => $userId,
                        'nama' => $nama,
                        'telp' => $telp,
                        'alamat' => $alamat
                    ];
                
                    // Simpan data kompetitor
                    if ($this->Auth_model->addKompetitor($kompetitorData)) {
                        $this->session->set_flashdata('message', 'Pendaftaran berhasil!');
                        redirect('auth/login');
                    } else {
                        $this->session->set_flashdata('message', 'Terjadi kesalahan saat menyimpan data kompetitor!');
                        redirect('auth/register');
                    }
                } else {
                    $this->session->set_flashdata('message', 'Terjadi kesalahan saat pendaftaran!');
                    redirect('auth/register');
                }
            }
        } else {
            $this->load->view('auth/register');
        }
    }

    public function login() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Validasi form
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
    
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('auth/login'); // Jika validasi gagal
            } else {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
    
                // Periksa kredensial pengguna
                $userId = $this->Auth_model->login($email, $password);
    
                if ($userId) {
                    // Cari tipe pengguna (admin, pemimpin, atau kompetitor)
                    $userType = $this->Auth_model->getUserType($userId);
    
                    // Simpan data ke sesi
                    $this->session->set_userdata('logged_in', TRUE);
                    $this->session->set_userdata('user_id', $userId);
                    $this->session->set_userdata('user_type', $userType);
    
                    // Arahkan pengguna ke halaman sesuai jenisnya
                    if ($userType === 'admin' || $userType === 'pemimpin') {
                        redirect('dashboard'); // Halaman dashboard
                    } elseif ($userType === 'kompetitor') {
                        redirect('home'); // Halaman home
                    }
                } else {
                    $this->session->set_flashdata('message', 'Email atau Password salah!');
                    redirect('auth/login');
                }
            }
        } else {
            $this->load->view('auth/login');
        }
    }      

    // Logout function
    public function logout() {
        $this->session->unset_userdata(['logged_in', 'user_id']);
        redirect('auth/login');
    }
}