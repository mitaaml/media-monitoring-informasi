<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('AdminModel');
    }

    // Method untuk menampilkan halaman dengan data admin
    public function index() {
        $data['title'] = 'Data Admin';
        $data['admins'] = $this->AdminModel->getAllAdmin();

        // Load view
        $this->load->view('backend/partials/header', $data);
        $this->load->view('backend/admin/view', $data);
        $this->load->view('backend/partials/footer');
    }
}
