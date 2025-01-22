<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Pastikan autoload Composer dipanggil
require_once FCPATH . 'vendor/autoload.php';

use Dompdf\Dompdf;

class Laporan extends CI_Controller
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
        // Ambil parameter dari GET
        $bulan = $this->input->get('bulan');
        $action = $this->input->get('action');

        // Inisialisasi data
        $data['medias'] = [];

        // Jika bulan dipilih, ambil data sesuai bulan
        if ($bulan) {
            $data['medias'] = $this->MediaModel->get_media_by_month($bulan);
        }

        // Tampilkan header dan footer sebelum melakukan tindakan
        $this->load->view('backend/partials/header', $data);
        $this->load->view('backend/laporan/view', $data);
        $this->load->view('backend/partials/footer');

        // Tindakan berdasarkan parameter 'action'
        if ($action === 'cetak') {
            // Data untuk laporan berdasarkan bulan
            $data['title'] = "Laporan Media Trend Bulan " . $this->get_nama_bulan($bulan);
            $data['media'] = $this->MediaModel->get_media_by_month($bulan);

            $html = $this->load->view('backend/pdf/laporan_trend_bulan', $data, true);

            // Inisialisasi Dompdf
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream("laporan_media_bulan_$bulan.pdf", ['Attachment' => 0]);
        }
    }

    // Fungsi untuk mendapatkan nama bulan
    private function get_nama_bulan($bulan)
    {
        $nama_bulan = [
            1 => "Januari",
            2 => "Februari",
            3 => "Maret",
            4 => "April",
            5 => "Mei",
            6 => "Juni",
            7 => "Juli",
            8 => "Agustus",
            9 => "September",
            10 => "Oktober",
            11 => "November",
            12 => "Desember",
        ];

        return $nama_bulan[$bulan] ?? "Tidak Diketahui";
    }

    public function add()
    {
        $data['title'] = 'Tambah Media';
        $data['kategoris'] = $this->KategoriModel->getAllKategori();
        $data['kategori'] = $this->db->get('kategori')->result();

        $this->load->view('backend/partials/header', $data);
        $this->load->view('backend/laporan/add', $data);
        $this->load->view('backend/partials/footer');
    }

    public function create()
    {
        // Set validasi form
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required|valid_url');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');

        // Ambil data kategori dari database
        $data['kategori'] = $this->db->get('kategori')->result();

        // Jika validasi gagal, kirim data kategori ke view
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('media_add', $data);
        } else {
            // Konfigurasi upload gambar
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                // Menampilkan error upload jika gagal
                $data['error'] = $this->upload->display_errors();
                $this->load->view('media_add', $data);
            } else {
                $upload_data = $this->upload->data();
                // Menyimpan data media ke dalam array
                $media_data = [
                    'nama' => $this->input->post('nama'),
                    'judul' => $this->input->post('judul'),
                    'url' => $this->input->post('url'),
                    'status' => $this->input->post('status'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['file_name'],
                    'id_kategori' => $this->input->post('id_kategori')
                ];

                // Insert data ke model
                $this->MediaModel->insert_media($media_data);
                $this->session->set_flashdata('success', 'Data berhasil disimpan.');
                redirect('media');
            }
        }
    }

    public function delete($id)
    {
        $this->MediaModel->deleteMedia($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('media');
    }

    public function update_status($id)
    {
        $status = $this->input->post('status');
        $this->MediaModel->updateStatus($id, $status);
        $this->session->set_flashdata('success', 'Status berhasil diperbarui.');
        redirect('media');
    }
}
