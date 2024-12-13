<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('MediaModel');
    }

    // Method untuk menampilkan halaman dengan data admin
    public function index() {
        $data['title'] = 'Data Media';
        $data['medias'] = $this->MediaModel->getAllMedia();

        // Load view
        $this->load->view('backend/partials/header', $data);
        $this->load->view('backend/media/view', $data);
        $this->load->view('backend/partials/footer');
    }

    public function add() {
        $this->load->view('backend/partials/header');
        $this->load->view('backend/media/add');
        $this->load->view('backend/partials/footer');
    }

    public function create() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('media/add');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'url' => $this->input->post('url'),
                'jenis' => $this->input->post('jenis'),
                'status' => $this->input->post('status'),
                'deskripsi' => $this->input->post('deskripsi')
            ];
            $this->MediaModel->insert_media($data);
            redirect('media');
        }
    }
}