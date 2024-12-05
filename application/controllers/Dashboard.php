<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('backend/partials/header');
        $this->load->view('backend/dashboard');
        $this->load->view('backend/partials/footer');
    }
}
    