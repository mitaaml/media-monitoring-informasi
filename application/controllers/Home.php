<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->helper('url');
        $this->load->model('MediaModel');
        
        // Ambil artikel yang disetujui
        $data['artikel'] = $this->MediaModel->getMediaBerita();
        $data['kategori'] = $this->MediaModel->getMediaByCategory();

        // Load view dengan data
        $this->load->view('frontend/partials/header');
        $this->load->view('frontend/pages/home', $data);
        $this->load->view('frontend/partials/footer');
    }

    // Fungsi untuk memperbarui jumlah view
    public function update_view($id)
    {
        $this->load->model('MediaModel');
        
        // Memperbarui jumlah view pada artikel
        $this->MediaModel->increment_view($id);

        // Redirect ke halaman detail artikel
        redirect('berita/detail/' . $id);
    }
}
