<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

    public function get_all_kategori() {
        // Mengambil semua kategori
        $this->db->select('id, nama_kategori');
        $this->db->from('kategori');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_berita_by_kategori($kategori_id) {
        // Mengambil berita berdasarkan kategori
        $this->db->select('m.id, m.judul, m.url, m.tanggal, m.gambar');
        $this->db->from('media m');
        $this->db->join('kategori k', 'm.id_kategori = k.id');
        $this->db->where('m.id_kategori', $kategori_id);
        $this->db->where('m.status', 'disetujui'); // Pastikan berita yang tampil sudah disetujui
        $query = $this->db->get();
        return $query->result_array();
    }

    public function search_berita($search_term) {
        // Mencari berita berdasarkan kata kunci
        $this->db->select('m.id, m.judul, m.url, m.tanggal, m.gambar');
        $this->db->from('media m');
        $this->db->like('m.judul', $search_term); // Mencari berita yang judulnya mengandung kata kunci
        $this->db->or_like('m.deskripsi', $search_term); // Mencari berita yang deskripsinya mengandung kata kunci
        $this->db->where('m.status', 'disetujui');
        $query = $this->db->get();
        return $query->result_array();
    }
}
