<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MediaModel extends CI_Model {

    public function getAllMedia() {
        $this->db->select('media.*, kategori.nama_kategori');
        $this->db->join('kategori', 'kategori.id = media.id_kategori', 'left');
        return $this->db->get('media')->result_array();
    }    

    public function insert_media($data) {
        return $this->db->insert('media', $data);
    }
    
    public function get_all_media() {
        return $this->db->get('media')->result_array();
    }

    public function delete_media($id) {
        $this->db->where('id', $id);
        return $this->db->delete('media');
    }
}