<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MediaModel extends CI_Model {

    // Ambil semua data admin
    public function getAllMedia() {
        return $this->db->get('media')->result_array(); // Mengembalikan data dalam bentuk array
    }

    public function insert_media($data) {
        return $this->db->insert('media', $data);
    }
    
    public function get_all_media() {
        return $this->db->get('media')->result_array();
    }
}
