<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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
    }

    public function index() {
        $this->load->view('backend/partials/header');
        $this->load->view('backend/laporan/view');
        $this->load->view('backend/partials/footer');
    }
}
