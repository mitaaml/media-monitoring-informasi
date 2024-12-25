<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->helper('url');
        $this->load->model('MediaModel');
        $data['kategori'] = $this->MediaModel->getMediaByCategory();

        $this->load->view('frontend/partials/header');
        $this->load->view('frontend/pages/home', $data); // Pastikan data diteruskan
        $this->load->view('frontend/partials/footer');
    }
}
