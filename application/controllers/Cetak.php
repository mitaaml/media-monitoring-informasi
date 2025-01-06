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

    public function laporanPerPeriode($periode = null)
{
    // Get the start and end date from the form input (if provided)
    $start_date = $this->input->get('start_date');
    $end_date = $this->input->get('end_date');
    
    // Data untuk laporan
    $data['title'] = "Laporan Media";
    
    // Ambil data berdasarkan periode atau berdasarkan tanggal yang dipilih
    if ($periode == 'minggu') {
        $data['media'] = $this->MediaModel->getMediaByWeek();
    } elseif ($periode == 'bulan') {
        $data['media'] = $this->MediaModel->getMediaByMonth();
    } elseif ($periode == 'tahun') {
        $data['media'] = $this->MediaModel->getMediaByYear();
    } elseif ($start_date && $end_date) {
        $data['media'] = $this->MediaModel->getMediaByDateRange($start_date, $end_date);
    }

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
    $dompdf->stream("laporan_media_{$periode}.pdf", array("Attachment" => 0));
}
}
