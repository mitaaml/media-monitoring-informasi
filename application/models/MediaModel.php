<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MediaModel extends CI_Model
{

    public function getAllMedia()
    {
        $this->db->select('media.*, kategori.nama_kategori');
        $this->db->join('kategori', 'kategori.id = media.id_kategori', 'left');
        return $this->db->get('media')->result_array();
    }

    // Di dalam MediaModel
    public function get_media_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('media');

        return $query->row_array();
    }

    public function getMediaLaporan()
    {
        $this->db->select('*');
        $this->db->from('media');
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get()->result_array();
    }

    public function insert_media($data)
    {
        return $this->db->insert('media', $data);
    }

    public function get_all_media()
    {
        return $this->db->get('media')->result_array();
    }

    public function delete_media($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('media');
    }

    public function get_total_by_status($status)
    {
        $this->db->where('status', $status);
        $this->db->from('media');
        return $this->db->count_all_results();
    }

    public function updateStatus($id, $status)
    {
        $valid_statuses = ['disetujui', 'belum disetujui', 'tolak'];

        if (in_array($status, $valid_statuses)) {
            $this->db->where('id', $id);
            $this->db->update('media', ['status' => $status]);

            return true;
        }

        return false;
    }

    public function get_total_by_category()
    {
        $this->db->select('k.nama_kategori, COUNT(m.id) as total');
        $this->db->from('kategori k');
        $this->db->join('media m', 'k.id = m.id_kategori', 'left');
        $this->db->group_by('k.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getMediaByCategory()
    {
        $this->db->select('k.nama_kategori, COUNT(m.id) as jumlah_media');
        $this->db->from('kategori k');
        $this->db->join('media m', 'k.id = m.id_kategori', 'left');
        $this->db->group_by('k.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_berita_by_id($id)
    {
        // Mengambil berita berdasarkan ID
        $this->db->select('id, judul, url, gambar, deskripsi, tanggal, view');
        $this->db->from('media');
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->row_array(); // Mengembalikan satu hasil
    }

    public function getMediaBerita()
    {
        $this->db->select('id, judul, url, gambar, deskripsi, view');
        $this->db->from('media');
        $this->db->where('status', 'disetujui');
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function increment_view($id)
    {
        $this->db->set('view', 'view+1', FALSE);
        $this->db->where('id', $id);
        $this->db->update('media');
    }

    public function get_article_by_id($id)
    {
        // Mengambil artikel berdasarkan ID
        $this->db->select('id, judul, url, gambar, deskripsi, view');
        $this->db->from('media');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_media($id, $media_data)
    {
        $this->db->where('id', $id);
        return $this->db->update('media', $media_data);
    }

    public function get_article($id)
    {
        return $this->db->get_where('media', ['id' => $id])->row_array();
    }

    public function getMediaByWeek()
    {
        $this->db->where('YEARWEEK(tanggal, 1) = YEARWEEK(CURDATE(), 1)');
        $query = $this->db->get('media');
        return $query->result();
    }

    public function getMediaByMonth()
    {
        $this->db->where('YEAR(tanggal) = YEAR(CURDATE())');
        $this->db->where('MONTH(tanggal) = MONTH(CURDATE())');
        $query = $this->db->get('media');
        return $query->result();
    }

    public function getMediaByYear()
    {
        $this->db->where('YEAR(tanggal) = YEAR(CURDATE())');
        $query = $this->db->get('media');
        return $query->result();
    }

    public function getMediaByDateRange($start_date, $end_date)
{
    $this->db->where('tanggal >=', $start_date);
    $this->db->where('tanggal <=', $end_date);
    $query = $this->db->get('media');
    return $query->result();
}

}
