<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Berita_model'); // Memuat model berita
        $this->load->model('MediaModel'); // Memuat model berita
    }

    public function index($kategori_id = null) {
        // Ambil semua kategori
        $data['kategori'] = $this->Berita_model->get_all_kategori();

        // Ambil berita berdasarkan kategori jika ada
        if ($kategori_id) {
            $data['berita'] = $this->Berita_model->get_berita_by_kategori($kategori_id);
        } else {
            $data['berita'] = [];
        }

        // Pencarian
        $search_term = $this->input->post('search_term'); // Ambil kata kunci pencarian
        if ($search_term) {
            $data['berita'] = $this->Berita_model->search_berita($search_term);
        }

        // Memuat tampilan
        $this->load->view('frontend/partials/header');
        $this->load->view('frontend/pages/berita', $data);
        $this->load->view('frontend/partials/footer');
    }

    // Fungsi untuk menampilkan detail berita
    public function detail($id) {
        // Ambil detail berita berdasarkan ID
        $data['berita'] = $this->MediaModel->get_berita_by_id($id);

        if ($data['berita']) {
            // Memperbarui jumlah view
            $this->MediaModel->increment_view($id);

            // Memuat tampilan
            $this->load->view('frontend/partials/header');
            $this->load->view('frontend/pages/detail_berita', $data);
            $this->load->view('frontend/partials/footer');
        } else {
            // Jika berita tidak ditemukan
            show_404();
        }
    }
}
