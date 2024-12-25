<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function get_total_by_status($status) {
        $this->db->where('status', $status);
        $this->db->from('media');
        return $this->db->count_all_results();
    }
}
