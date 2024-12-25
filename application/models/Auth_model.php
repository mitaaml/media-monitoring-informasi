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
        if ($this->db->get('admin')->num_rows() > 0) {
            return 'admin';
        }
    
        // Periksa di tabel pemimpin
        $this->db->where('id_user', $userId);
        if ($this->db->get('pemimpin')->num_rows() > 0) {
            return 'pemimpin';
        }
    
        // Periksa di tabel kompetitor
        $this->db->where('id_user', $userId);
        if ($this->db->get('kompetitor')->num_rows() > 0) {
            return 'kompetitor';
        }
    
        return null; // Jika tidak ditemukan
    }    
}