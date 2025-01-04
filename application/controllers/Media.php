<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Media extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['session', 'form_validation']);
        $this->load->model(['MediaModel', 'KategoriModel']);
    }

    public function index()
    {
        $data['title'] = 'Data Media';
        $data['medias'] = $this->MediaModel->getAllMedia();

        $this->load->view('backend/partials/header', $data);
        $this->load->view('backend/media/view', $data);
        $this->load->view('backend/partials/footer');
    }

    public function add()
    {
        $data['title'] = 'Tambah Media';
        $data['kategoris'] = $this->KategoriModel->getAllKategori();
        $data['kategori'] = $this->db->get('kategori')->result();

        $this->load->view('backend/partials/header', $data);
        $this->load->view('backend/media/add', $data);
        $this->load->view('backend/partials/footer');
    }

    public function create()
    {
        // Set validasi form
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('url', 'URL', 'required|valid_url|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');

        // Ambil data kategori dari database
        $data['title'] = 'Tambah Media';
        $data['kategori'] = $this->db->get('kategori')->result();

        // Jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            $this->load->view('backend/partials/header', $data);
            $this->load->view('backend/media/add', $data);
            $this->load->view('backend/partials/footer');
        } else {
            // Konfigurasi upload gambar
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            // Memulai transaksi
            $this->db->trans_start();

            if (!$this->upload->do_upload('gambar')) {
                // Menampilkan error upload jika gagal
                $this->db->trans_complete();
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('media/add');
            } else {
                $upload_data = $this->upload->data();
                // Menyimpan data media ke dalam array
                $media_data = [
                    'nama' => $this->input->post('nama', TRUE),
                    'judul' => $this->input->post('judul', TRUE),
                    'url' => $this->input->post('url', TRUE),
                    'status' => $this->input->post('status', TRUE),
                    'deskripsi' => $this->input->post('deskripsi', TRUE),
                    'tanggal' => date('Y-m-d H:i:s'),
                    'gambar' => $upload_data['file_name'],
                    'id_kategori' => $this->input->post('id_kategori', TRUE)
                ];

                log_message('debug', 'Data yang dikirim ke model: ' . print_r($media_data, TRUE));

                // Insert data ke model
                $this->MediaModel->insert_media($media_data);

                // Menyelesaikan transaksi
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    // Jika transaksi gagal
                    $this->session->set_flashdata('error', 'Terjadi kesalahan saat menyimpan data.');
                    redirect('media/add');
                } else {
                    // Jika berhasil
                    $this->session->set_flashdata('success', 'Data berhasil disimpan.');
                    redirect('media');
                }
            }
        }
    }

    public function edit($id)
    {
        // Set validasi form
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required|valid_url');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');

        // Ambil data kategori dan data media berdasarkan ID
        $data['kategori'] = $this->db->get('kategori')->result();
        $data['media'] = $this->MediaModel->get_media_by_id($id);  // Ganti dengan model untuk mengambil data berdasarkan ID


        if (empty($data['media'])) {
            show_404();
        }

        // Jika validasi gagal, kirim data kategori dan media ke view
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/partials/header', $data);
            $this->load->view('backend/media/edit', $data);
            $this->load->view('backend/partials/footer');
        } else {
            // Konfigurasi upload gambar
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            // Jika ada gambar yang diupload
            if ($_FILES['gambar']['name']) {
                if (!$this->upload->do_upload('gambar')) {
                    // Menampilkan error upload jika gagal
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('backend/partials/header', $data);
                    $this->load->view('backend/media/edit', $data);
                    $this->load->view('backend/partials/footer');
                    return;
                } else {
                    $upload_data = $this->upload->data();
                    $gambar = $upload_data['file_name'];

                    // Menghapus gambar lama jika ada
                    if ($data['media']['gambar'] != '' && file_exists('./uploads/' . $data['media']['gambar'])) {
                        unlink('./uploads/' . $data['media']['gambar']);
                    }
                }
            } else {
                // Jika tidak ada gambar yang diupload, gunakan gambar lama
                $gambar = $data['media']['gambar'];
            }

            // Menyimpan data media yang diupdate
            $media_data = [
                'nama' => $this->input->post('nama'),
                'judul' => $this->input->post('judul'),
                'url' => $this->input->post('url'),
                'status' => $this->input->post('status'),
                'deskripsi' => $this->input->post('deskripsi'),
                'gambar' => $gambar,
                'id_kategori' => $this->input->post('id_kategori')
            ];

            // Update data ke model
            $this->MediaModel->update_media($id, $media_data);

            $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
            redirect('media');
        }
    }

    public function delete_media($id)
    {
        $this->MediaModel->delete_media($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('media');
    }

    public function update_status($id)
    {
        $status = $this->input->post('status');

        $this->load->model('MediaModel');
        $this->MediaModel->updateStatus($id, $status);

        $this->session->set_flashdata('success', 'Status berhasil diperbarui.');
        redirect('media');
    }
}
