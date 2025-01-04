<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{

    // Ambil semua data User
    public function getAllUser()
    {
        $this->db->select('
        user.id, 
        user.email, 
        admin.nama as admin_nama, 
        admin.nip as admin_nip, 
        pemimpin.nama as pemimpin_nama, 
        pemimpin.nip as pemimpin_nip, 
        kompetitor.nama as kompetitor_nama, 
        kompetitor.telp as kompetitor_telp
    ');
        $this->db->from('user');
        $this->db->join('admin', 'admin.id_user = user.id', 'left');
        $this->db->join('pemimpin', 'pemimpin.id_user = user.id', 'left');
        $this->db->join('kompetitor', 'kompetitor.id_user = user.id', 'left');
        return $this->db->get()->result_array();
    }

    // Ambil data User beserta data Admin jika ada
    public function getUserWithAdmin($id_user)
    {
        // Gabungkan data user dengan admin berdasarkan id_user
        $this->db->select('user.id, user.email, user.password, admin.nama, admin.nip, admin.telp, admin.alamat');
        $this->db->from('user');
        $this->db->join('admin', 'user.id = admin.id_user', 'left');
        $this->db->where('user.id', $id_user);
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan satu baris data
    }

    // Ambil data User beserta data Pemimpin jika ada
    public function getUserWithPemimpin($id_user)
    {
        // Gabungkan data user dengan pemimpin berdasarkan id_user
        $this->db->select('user.id, user.email, user.password, pemimpin.nama, pemimpin.nip, pemimpin.telp, pemimpin.alamat');
        $this->db->from('user');
        $this->db->join('pemimpin', 'user.id = pemimpin.id_user', 'left');
        $this->db->where('user.id', $id_user);
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan satu baris data
    }

    // Fungsi untuk mendapatkan semua admin
    public function getAllAdmin()
    {
        $this->db->select('admin.id, admin.nama, admin.nip, admin.telp, admin.alamat, user.email');
        $this->db->from('admin');
        $this->db->join('user', 'user.id = admin.id_user');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Fungsi untuk mendapatkan semua pemimpin
    public function getAllPemimpin()
    {
        $this->db->select('pemimpin.id, pemimpin.nama, pemimpin.nip, pemimpin.telp, pemimpin.alamat, user.email');
        $this->db->from('pemimpin');
        $this->db->join('user', 'user.id = pemimpin.id_user');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Fungsi untuk mengambil data user berdasarkan email (untuk login)
    public function getUserByEmail($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        return $query->row_array(); // Mengembalikan satu baris data
    }

    public function getUserById($userId)
    {
        // Ambil data dari tabel user
        $this->db->select('user.*, admin.nama AS admin_nama, admin.nip AS admin_nip, admin.telp AS admin_telp, admin.alamat AS admin_alamat');
        $this->db->select('pemimpin.nama AS pemimpin_nama, pemimpin.nip AS pemimpin_nip, pemimpin.telp AS pemimpin_telp, pemimpin.alamat AS pemimpin_alamat');
        $this->db->select('kompetitor.nama AS kompetitor_nama, kompetitor.telp AS kompetitor_telp, kompetitor.alamat AS kompetitor_alamat');
        $this->db->from('user');
        $this->db->join('admin', 'user.id = admin.id_user', 'left');
        $this->db->join('pemimpin', 'user.id = pemimpin.id_user', 'left');
        $this->db->join('kompetitor', 'user.id = kompetitor.id_user', 'left');
        $this->db->where('user.id', $userId);
        $result = $this->db->get()->row_array();

        // Tentukan data yang dikembalikan berdasarkan role
        if (!empty($result['admin_nama'])) {
            $result['nama'] = $result['admin_nama'];
            $result['nip'] = $result['admin_nip'];
            $result['telp'] = $result['admin_telp'];
            $result['alamat'] = $result['admin_alamat'];
            $result['role'] = 'admin';
        } elseif (!empty($result['pemimpin_nama'])) {
            $result['nama'] = $result['pemimpin_nama'];
            $result['nip'] = $result['pemimpin_nip'];
            $result['telp'] = $result['pemimpin_telp'];
            $result['alamat'] = $result['pemimpin_alamat'];
            $result['role'] = 'pemimpin';
        } elseif (!empty($result['kompetitor_nama'])) {
            $result['nama'] = $result['kompetitor_nama'];
            $result['nip'] = null; // Kompetitor tidak memiliki NIP
            $result['telp'] = $result['kompetitor_telp'];
            $result['alamat'] = $result['kompetitor_alamat'];
            $result['role'] = 'kompetitor';
        }

        return $result;
    }

    public function get_user_by_id($id)
    {
        $this->db->select('user.*, admin.nama as admin_nama, admin.nip as admin_nip, admin.telp as admin_telp, admin.alamat as admin_alamat, pemimpin.nama as pemimpin_nama, pemimpin.nip as pemimpin_nip, pemimpin.telp as pemimpin_telp, pemimpin.alamat as pemimpin_alamat');
        $this->db->from('user');
        $this->db->join('admin', 'admin.id_user = user.id', 'left');
        $this->db->join('pemimpin', 'pemimpin.id_user = user.id', 'left');
        $this->db->where('user.id', $id);
        return $this->db->get()->row_array();
    }

    public function getUserProfile($userId)
    {
        $this->db->select('user.id as user_id, user.email, admin.nama as admin_nama, admin.telp as admin_telp, pemimpin.nama as pemimpin_nama, pemimpin.telp as pemimpin_telp');
        $this->db->from('user');
        $this->db->join('admin', 'admin.id_user = user.id', 'left');
        $this->db->join('pemimpin', 'pemimpin.id_user = user.id', 'left');
        $this->db->where('user.id', $userId);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function updateAdmin($adminId, $data)
    {
        log_message('debug', 'Update Admin with ID: ' . $adminId . ' Data: ' . print_r($data, true));
        $this->db->where('id_user', $adminId); // Update menggunakan id_user
        $result = $this->db->update('admin', $data);
        log_message('debug', 'Admin update result: ' . ($result ? 'Success' : 'Failed'));
        return $result;
    }

    public function updatePemimpin($pemimpinId, $data)
    {
        log_message('debug', 'Update Pemimpin with ID: ' . $pemimpinId . ' Data: ' . print_r($data, true));
        $this->db->where('id_user', $pemimpinId); // Update menggunakan id_user
        $result = $this->db->update('pemimpin', $data);
        log_message('debug', 'Pemimpin update result: ' . ($result ? 'Success' : 'Failed'));
        return $result;
    }

    public function updateUser($userId, $data)
    {
        $this->db->where('id', $userId);
        return $this->db->update('user', $data);
    }

    public function deleteUser($userId)
    {
        // Hapus dari tabel user
        $this->db->where('id', $userId);
        $this->db->delete('user');

        // Hapus data terkait di tabel admin
        $this->db->where('id_user', $userId);
        $this->db->delete('admin');

        // Hapus data terkait di tabel pemimpin
        $this->db->where('id_user', $userId);
        $this->db->delete('pemimpin');

        // Hapus data terkait di tabel kompetitor
        $this->db->where('id_user', $userId);
        $this->db->delete('kompetitor');
    }
}
