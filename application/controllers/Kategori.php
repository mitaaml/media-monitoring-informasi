<?php
// Controller: Kategori.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(['session', 'form_validation']);
        $this->load->model('KategoriModel');

        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('message', 'Silakan login terlebih dahulu!');
            redirect('auth/login');
        }

        $userType = $this->session->userdata('user_type');
        if (!in_array($userType, ['admin', 'pemimpin'])) {
            $this->session->set_flashdata('message', 'Anda tidak memiliki akses ke halaman ini!');
            redirect('home');
        }
    }

    public function index() {
        $data['title'] = 'Data Kategori';
        $data['kategoris'] = $this->KategoriModel->getAllKategori();

        $this->load->view('backend/partials/header', $data);
        $this->load->view('backend/kategori/view', $data);
        $this->load->view('backend/partials/footer');
    }

    public function add() {
        $data['title'] = 'Tambah Kategori';

        $this->load->view('backend/partials/header', $data);
        $this->load->view('backend/kategori/add');
        $this->load->view('backend/partials/footer');
    }

    public function create() {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Kategori';

            $this->load->view('backend/partials/header', $data);
            $this->load->view('backend/kategori/add');
            $this->load->view('backend/partials/footer');
        } else {
            $data = [
                'nama_kategori' => $this->input->post('nama_kategori')
            ];

            $this->KategoriModel->insert_kategori($data);

            $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan.');
            redirect('kategori');
        }
    }

    public function edit($id) {
        $data['title'] = 'Edit Kategori';
        $data['kategori'] = $this->KategoriModel->getKategoriById($id);

        $this->load->view('backend/partials/header', $data);
        $this->load->view('backend/kategori/edit', $data);
        $this->load->view('backend/partials/footer');
    }

    public function update($id) {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Kategori';
            $data['kategori'] = $this->KategoriModel->getKategoriById($id);

            $this->load->view('backend/partials/header', $data);
            $this->load->view('backend/kategori/edit', $data);
            $this->load->view('backend/partials/footer');
        } else {
            $data = [
                'nama_kategori' => $this->input->post('nama_kategori')
            ];

            $this->KategoriModel->update_kategori($id, $data);

            $this->session->set_flashdata('success', 'Kategori berhasil diperbarui.');
            redirect('kategori');
        }
    }

    public function delete($id) {
        $this->KategoriModel->delete_kategori($id);
        $this->session->set_flashdata('success', 'Kategori berhasil dihapus.');
        redirect('kategori');
    }
}