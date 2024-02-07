<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Model
{

    function is_logged_in()
    {
        return $this->session->userdata('id', 'role');
    }

    function is_role()
    {
        return $this->session->userdata('role');
    }

    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('data_mentor', 'data_mentor.id_mentor = pengguna.id', 'left');
        $this->db->join('data_peserta', 'data_peserta.id_peserta = pengguna.id', 'left');
        $this->db->join('jurusan', 'jurusan.id_jurusan = data_peserta.id_jurusan', 'left');
        $this->db->join('pengajuanprakerin', 'pengajuanprakerin.id_peserta = pengguna.id', 'left');
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
}
