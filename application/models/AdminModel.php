<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

    // Ambil semua data admin
    public function getAllAdmin() {
        return $this->db->get('admin')->result_array(); // Mengembalikan data dalam bentuk array
    }
}
