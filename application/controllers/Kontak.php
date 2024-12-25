<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(['session', 'form_validation']);
        $this->load->model('MediaModel');
    }

    public function index() {
        // Load halaman kontak dengan header dan footer
        $this->load->view('frontend/partials/header');
        $this->load->view('frontend/pages/kontak');
        $this->load->view('frontend/partials/footer');
    }

    public function create() {
        // Validasi form
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required|valid_url');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali halaman kontak
            $this->load->view('frontend/partials/header');
            $this->load->view('frontend/pages/kontak');
            $this->load->view('frontend/partials/footer');
        } else {
            // Jika validasi berhasil, simpan data
            $data = [
                'nama' => $this->input->post('nama'),
                'url' => $this->input->post('url'),
                'jenis' => $this->input->post('jenis'),
                'status' => 'belum disetujui',
                'deskripsi' => $this->input->post('deskripsi')
            ];
            $this->MediaModel->insert_media($data);
    
            // Set flashdata untuk modal sukses
            $this->session->set_flashdata('success', 'Data berhasil disimpan.');
    
            // Redirect ke halaman kontak
            redirect('kontak');
        }
    }    
}