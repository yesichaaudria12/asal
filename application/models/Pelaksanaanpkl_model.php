<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class pelaksanaanpkl_model extends CI_Model
{
    private $_table = 'pengajuanpkl';

    public $id_pengajuanpkl;
    public $status_keanggotaan;

    public function rules()
    {
        return [
            [
                'field' => 'status_keanggotaan',
                'label' => 'Status Keanggotaan',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        $query = $this->db->query('SELECT *, count(pengajuanpkl.id_peserta) as jumlah_peserta FROM `pengajuanpkl` join data_peserta on data_peserta.id_peserta = pengajuanpkl.id_peserta join data_guru on data_guru.id_guru = pengajuanpkl.id_guru join data_mentor on data_mentor.id_mentor = pengajuanpkl.id_mentor where pengajuanpkl.status_validasi = "Diterima" group by pengajuanpkl.id_mentor order by pengajuanpkl.id_mentor');
        return $query->result();
    }

    public function getById($id_mentor)
    {
        $query = $this->db->query('SELECT * FROM `pengajuanpkl` join data_peserta on data_peserta.id_peserta = pengajuanpkl.id_peserta join jurusan on jurusan.id_jurusan = data_peserta.id_jurusan join data_guru on data_guru.id_guru = pengajuanpkl.id_guru join data_mentor on data_mentor.id_mentor = pengajuanpkl.id_mentor where pengajuanpkl.status_validasi = "Diterima" and pengajuanpkl.id_mentor = ' . $id_mentor . ' order by status_keanggotaan desc');
        return $query->result();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pengajuanpkl = $post["id_pengajuanpkl"];
        $this->status_keanggotaan = $post["status_keanggotaan"];
        return $this->db->update($this->_table, $this, array("id_pengajuanpkl" => $post["id_pengajuanpkl"]));
    }
}
