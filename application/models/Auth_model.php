<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    // Check if email exists
    public function emailExists($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        return $query->num_rows() > 0;
    }

    public function register($email, $password) {
        $data = [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];
        return $this->db->insert('user', $data) ? $this->db->insert_id() : false;
    }    

    public function addKompetitor($data) {
        return $this->db->insert('kompetitor', $data);
    }

    public function login($email, $password) {
        // Cari user berdasarkan email
        $this->db->where('email', $email);
        $query = $this->db->get('user');
    
        // Jika email ditemukan
        if ($query->num_rows() > 0) {
            $user = $query->row();
    
            // Verifikasi password menggunakan password_verify()
            if (password_verify($password, $user->password)) {
                return $user->id;
            }
        }
    
        return false;
    }      

    public function getUserType($userId) {
        // Periksa di tabel admin
        $this->db->where('id_user', $userId);
        $query = $this->db->get('admin');
        if ($query->num_rows() > 0) {
            $user = $query->row();
            return ['type' => 'admin', 'name' => $user->nama];
        }
    
        // Periksa di tabel pemimpin
        $this->db->where('id_user', $userId);
        $query = $this->db->get('pemimpin');
        if ($query->num_rows() > 0) {
            $user = $query->row();
            return ['type' => 'pemimpin', 'name' => $user->nama];
        }
    
        // Periksa di tabel kompetitor
        $this->db->where('id_user', $userId);
        $query = $this->db->get('kompetitor');
        if ($query->num_rows() > 0) {
            $user = $query->row();
            return ['type' => 'kompetitor', 'name' => $user->nama];
        }
    
        return null; // Jika tidak ditemukan
    }      
    
    public function getUserDetails($userId) {
        // Ambil data dari tabel `user`
        $this->db->where('id', $userId);
        $user = $this->db->get('user')->row_array();

        if (!$user) {
            return null;
        }

        // Ambil data dari tabel `pemimpin`
        $this->db->where('id_user', $userId);
        $pemimpin = $this->db->get('pemimpin')->row_array();

        // Ambil data dari tabel `kompetitor`
        $this->db->where('id_user', $userId);
        $kompetitor = $this->db->get('kompetitor')->row_array();

        // Gabungkan data dari semua tabel
        return [
            'user' => $user,
            'pemimpin' => $pemimpin,
            'kompetitor' => $kompetitor
        ];
    }
}