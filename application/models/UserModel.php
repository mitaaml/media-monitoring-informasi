<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    // Ambil semua data User
    public function getAllUser() {
        $this->db->select('user.id, user.email, admin.nama as admin_nama, admin.nip as admin_nip, pemimpin.nama as pemimpin_nama, pemimpin.nip as pemimpin_nip');
        $this->db->from('user');
        $this->db->join('admin', 'admin.id_user = user.id', 'left');
        $this->db->join('pemimpin', 'pemimpin.id_user = user.id', 'left');
        return $this->db->get()->result_array();
    }

    // Ambil data User beserta data Admin jika ada
    public function getUserWithAdmin($id_user) {
        // Gabungkan data user dengan admin berdasarkan id_user
        $this->db->select('user.id, user.email, user.password, admin.nama, admin.nip, admin.telp, admin.alamat');
        $this->db->from('user');
        $this->db->join('admin', 'user.id = admin.id_user', 'left');
        $this->db->where('user.id', $id_user);
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan satu baris data
    }

    // Ambil data User beserta data Pemimpin jika ada
    public function getUserWithPemimpin($id_user) {
        // Gabungkan data user dengan pemimpin berdasarkan id_user
        $this->db->select('user.id, user.email, user.password, pemimpin.nama, pemimpin.nip, pemimpin.telp, pemimpin.alamat');
        $this->db->from('user');
        $this->db->join('pemimpin', 'user.id = pemimpin.id_user', 'left');
        $this->db->where('user.id', $id_user);
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan satu baris data
    }

    // Fungsi untuk mendapatkan semua admin
    public function getAllAdmin() {
        $this->db->select('admin.id, admin.nama, admin.nip, admin.telp, admin.alamat, user.email');
        $this->db->from('admin');
        $this->db->join('user', 'user.id = admin.id_user');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Fungsi untuk mendapatkan semua pemimpin
    public function getAllPemimpin() {
        $this->db->select('pemimpin.id, pemimpin.nama, pemimpin.nip, pemimpin.telp, pemimpin.alamat, user.email');
        $this->db->from('pemimpin');
        $this->db->join('user', 'user.id = pemimpin.id_user');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Fungsi untuk mengambil data user berdasarkan email (untuk login)
    public function getUserByEmail($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        return $query->row_array(); // Mengembalikan satu baris data
    }
}
