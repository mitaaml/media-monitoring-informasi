<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfileModel extends CI_Model
{
    // Ambil data user dari tabel `users`
    public function get_user_by_id($id_user)
    {
        $this->db->where('id', $id_user);
        $query = $this->db->get('user');
        return $query->row_array();
    }

    // Ambil data admin berdasarkan user_id
    public function get_admin_by_user_id($id_user)
    {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('admin');
        return $query->row_array();
    }

    // Ambil data pemimpin berdasarkan user_id
    public function get_pemimpin_by_user_id($id_user)
    {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('pemimpin');
        return $query->row_array();
    }

    public function verify_password($user_id, $current_password)
    {
        // Verifikasi password lama
        $this->db->where('id', $user_id);
        $user = $this->db->get('user')->row();
        return password_verify($current_password, $user->password);
    }

    public function get_user_role($user_id)
    {
        if ($this->db->where('id_user', $user_id)->get('pemimpin')->row()) {
            return 'pemimpin';
        } elseif ($this->db->where('id_user', $user_id)->get('mediator')->row()) {
            return 'mediator';
        } elseif ($this->db->where('id_user', $user_id)->get('admin')->row()) {
            return 'admin';
        }
        return null;
    }

    public function update_user($user_id, $data)
    {
        $this->db->where('id', $user_id)->update('user', $data);
    }

    public function update_pemimpin($user_id, $data)
    {
        $this->db->where('id_user', $user_id)->update('pemimpin', $data);
    }

    public function update_mediator($user_id, $data)
    {
        $this->db->where('id_user', $user_id)->update('mediator', $data);
    }

    public function update_admin($user_id, $data)
    {
        $this->db->where('id_user', $user_id)->update('admin', $data);
    }
}
