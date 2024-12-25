<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Berita_model'); // Memuat model berita
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

        // Memuat tampilan
        $this->load->view('frontend/partials/header');
        $this->load->view('frontend/pages/berita', $data);
        $this->load->view('frontend/partials/footer');
    }
}
