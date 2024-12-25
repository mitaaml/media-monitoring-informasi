<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('message', 'Silakan login terlebih dahulu!');
            redirect('auth/login');
        }
    
        $userType = $this->session->userdata('user_type');
        if (!in_array($userType, ['admin', 'pemimpin'])) {
            $this->session->set_flashdata('message', 'Anda tidak memiliki akses ke halaman ini!');
            redirect('home');
        }
    
        // Pastikan model yang benar dipanggil
        $this->load->model('Mediamodel');
    }
    
    public function index() {
        // Mengambil data total berdasarkan status
        $data['total_disetujui'] = $this->Mediamodel->get_total_by_status('disetujui');
        $data['total_belum_disetujui'] = $this->Mediamodel->get_total_by_status('belum disetujui');
        $data['total_tolak'] = $this->Mediamodel->get_total_by_status('tolak');

        $data['category_data'] = $this->Mediamodel  ->get_total_by_category();
    
        // Muat tampilan dashboard dengan data
        $this->load->view('backend/partials/header');
        $this->load->view('backend/dashboard', $data);
        $this->load->view('backend/partials/footer');
    }    
}
