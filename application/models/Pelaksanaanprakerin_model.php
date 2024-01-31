<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class pelaksanaanprakerin_model extends CI_Model
{
    private $_table = 'pengajuanprakerin';

    public $id_pengajuanprakerin;
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
        $query = $this->db->query('SELECT *, count(pengajuanprakerin.id_peserta) as jumlah_peserta FROM `pengajuanprakerin` join data_peserta on data_peserta.id_peserta = pengajuanprakerin.id_peserta join data_guru on data_guru.id_guru = pengajuanprakerin.id_guru join data_mentor on data_mentor.id_mentor = pengajuanprakerin.id_mentor where pengajuanprakerin.status_validasi = "Diterima" group by pengajuanprakerin.id_mentor order by pengajuanprakerin.id_mentor');
        return $query->result();
    }

    public function getById($id_mentor)
    {
        $query = $this->db->query('SELECT * FROM `pengajuanprakerin` join data_peserta on data_peserta.id_peserta = pengajuanprakerin.id_peserta join jurusan on jurusan.id_jurusan = data_peserta.id_jurusan join data_guru on data_guru.id_guru = pengajuanprakerin.id_guru join data_mentor on data_mentor.id_mentor = pengajuanprakerin.id_mentor where pengajuanprakerin.status_validasi = "Diterima" and pengajuanprakerin.id_mentor = ' . $id_mentor . ' order by status_keanggotaan desc');
        return $query->result();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pengajuanprakerin = $post["id_pengajuanprakerin"];
        $this->status_keanggotaan = $post["status_keanggotaan"];
        return $this->db->update($this->_table, $this, array("id_pengajuanprakerin" => $post["id_pengajuanprakerin"]));
    }
}
