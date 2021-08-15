<?php
defined('BASEPATH') or exit('No direct Script access allowed');

class M_PPH extends CI_Model
{
    // fungsi select digunakan untuk menampilkan data berdasarkan keynya
    public function select($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function get_data($table)
    {
        return $this->db->get($table);
    }
}
