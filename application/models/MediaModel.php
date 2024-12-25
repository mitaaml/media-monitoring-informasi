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

    public function get_total_by_status($status) {
        $this->db->where('status', $status);
        $this->db->from('media');
        return $this->db->count_all_results();
    }

    public function updateStatus($id, $status) {
        $valid_statuses = ['disetujui', 'belum disetujui', 'tolak'];

        if (in_array($status, $valid_statuses)) {
            $this->db->where('id', $id);
            $this->db->update('media', ['status' => $status]);

            return true;
        }

        return false;
    }

    public function get_total_by_category() {
        $this->db->select('k.nama_kategori, COUNT(m.id) as total');
        $this->db->from('kategori k');
        $this->db->join('media m', 'k.id = m.id_kategori', 'left');
        $this->db->group_by('k.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getMediaByCategory() {
        $this->db->select('k.nama_kategori, COUNT(m.id) as jumlah_media');
        $this->db->from('kategori k');
        $this->db->join('media m', 'k.id = m.id_kategori', 'left');
        $this->db->group_by('k.id');
        $query = $this->db->get();
        return $query->result_array();
    }
}