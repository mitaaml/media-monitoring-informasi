<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriModel extends CI_Model {

    public function getAllKategori() {
        return $this->db->get('kategori')->result_array();
    }

    public function insert_kategori($data) {
        $this->db->insert('kategori', $data);
    }

    public function getKategoriById($id) {
        return $this->db->get_where('kategori', ['id' => $id])->row_array();
    }

    public function update_kategori($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('kategori', $data);
    }

    public function delete_kategori($id) {
        $this->db->delete('kategori', ['id' => $id]);
    }
}