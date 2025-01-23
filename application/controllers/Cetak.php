<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Pastikan autoload Composer dipanggil
require_once FCPATH . 'vendor/autoload.php';

use Dompdf\Dompdf;

class Cetak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MediaModel');
    }

    public function laporan()
    {
        // Data untuk laporan
        $data['title'] = "Laporan Media";
        $data['media'] = $this->MediaModel->getMediaLaporan();

        // Load view sebagai HTML
        $html = $this->load->view('backend/pdf/laporan', $data, true);

        // Inisialisasi Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // Set ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'landscape');

        // Render PDF
        $dompdf->render();

        // Output PDF ke browser
        $dompdf->stream("laporan_media.pdf", array("Attachment" => 0));
    }

    public function laporan_per_bulan()
    {
        // Ambil bulan dari parameter GET
        $bulan = $this->input->get('bulan');

        if (!$bulan) {
            show_error("Bulan tidak dipilih!", 400);
        }

        // Data untuk laporan berdasarkan bulan
        $data['title'] = "Laporan Media Trend Bulan " . $this->get_nama_bulan($bulan);
        $data['media'] = $this->MediaModel->get_media_by_month($bulan);

        if (empty($data['media'])) {
            show_error("Tidak ada data media untuk bulan yang dipilih.", 404);
        }

        // Load view sebagai HTML
        $html = $this->load->view('backend/pdf/laporan_trend_bulan', $data, true);

        // Inisialisasi Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // Set ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'landscape');

        // Render PDF
        $dompdf->render();

        // Output PDF ke browser
        $dompdf->stream("laporan_trend_media.pdf", array("Attachment" => 0));
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
}
