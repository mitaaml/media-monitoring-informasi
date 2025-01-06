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

    public function update_view($id)
    {
        $this->load->model('MediaModel');
        
        // Memperbarui jumlah view
        $this->MediaModel->increment_view($id);
        
        // Ambil URL artikel berdasarkan ID
        $article = $this->MediaModel->get_article($id);
        
        // Redirect ke URL artikel jika ditemukan, atau tampilkan 404 jika tidak ditemukan
        if ($article && isset($article['url'])) {
            redirect($article['url'], 'refresh');
        } else {
            show_404();
        }
    }
}
