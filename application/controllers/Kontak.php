<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(['session', 'form_validation']);
        $this->load->model('MediaModel');
    }

    public function index()
    {
        $this->load->view('frontend/partials/header');
        $this->load->view('frontend/pages/kontak');
        $this->load->view('frontend/partials/footer');
    }
}
