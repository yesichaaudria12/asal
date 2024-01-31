<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class catatankunjunganprakerin_model extends CI_Model
{

    private $_table = "catatan_kunjungan_prakerin";
    private $_table1 = "pengajuanprakerin";

    public function getAll()
    {
        $this->db->join('data_guru', 'data_guru.id_guru = catatan_kunjungan_prakerin.id_guru');
        $this->db->join('pengajuanprakerin', 'pengajuanprakerin.id_guru = data_guru.id_guru');
        $this->db->where('pengajuanprakerin.id_peserta', $this->session->userdata('id_peserta'));
        $this->db->order_by('id_catatan_kunjungan_prakerin', 'DESC');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getGuruPembimbing()
    {
        $this->db->select('data_guru.nama_guru');
        $this->db->join('data_guru', 'data_guru.id_guru = pengajuanprakerin.id_guru');
        return $this->db->get_where($this->_table1, ["pengajuanprakerin.id_peserta" => $this->session->userdata('id')])->row();
    }
}
