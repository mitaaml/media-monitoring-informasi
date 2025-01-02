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

    // Mengambil data pengguna berdasarkan user_id
    public function getUserById($userId) {
        $this->db->where('id', $userId);
        return $this->db->get('user')->row_array();
    }

    public function get_user_by_id($id) {
        $this->db->select('user.*, admin.nama as admin_nama, admin.nip as admin_nip, admin.telp as admin_telp, admin.alamat as admin_alamat, pemimpin.nama as pemimpin_nama, pemimpin.nip as pemimpin_nip, pemimpin.telp as pemimpin_telp, pemimpin.alamat as pemimpin_alamat');
        $this->db->from('user');
        $this->db->join('admin', 'admin.id_user = user.id', 'left');
        $this->db->join('pemimpin', 'pemimpin.id_user = user.id', 'left');
        $this->db->where('user.id', $id);
        return $this->db->get()->row_array();
    }    

    public function getUserProfile($userId) {
    $this->db->select('user.id as user_id, user.email, admin.nama as admin_nama, admin.telp as admin_telp, pemimpin.nama as pemimpin_nama, pemimpin.telp as pemimpin_telp');
    $this->db->from('user');
    $this->db->join('admin', 'admin.id_user = user.id', 'left');
    $this->db->join('pemimpin', 'pemimpin.id_user = user.id', 'left');
    $this->db->where('user.id', $userId);
    $query = $this->db->get();
    return $query->row_array();
} 

    // Memperbarui data admin
    public function updateAdmin($adminId, $data) {
        $this->db->where('id', $adminId);
        return $this->db->update('admin', $data);
    }

    // Memperbarui data pemimpin
    public function updatePemimpin($pemimpinId, $data) {
        $this->db->where('id', $pemimpinId);
        return $this->db->update('pemimpin', $data);
    }

    public function updateUser($userId, $data) {
        $this->db->where('id', $userId);
        return $this->db->update('user', $data);
    }
    
}
