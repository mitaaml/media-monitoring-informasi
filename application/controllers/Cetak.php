<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Pastikan autoload Composer dipanggil
require_once FCPATH . 'vendor/autoload.php';

use Dompdf\Dompdf;

class Cetak extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('MediaModel');
    }

    public function laporan() {
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
        $dompdf->stream("laporan_media.pdf", array("Attachment" => 1));
    }
}
