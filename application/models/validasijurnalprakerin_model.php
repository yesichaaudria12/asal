<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class validasijurnalprakerin_model extends CI_Model
{

    private $_table = "jurnal_prakerin";

    public $id_jurnal_prakerin;
    public $catatan;
    public $status;

    public function rules()
    {
        return [
            [
                'field' => 'status',
                'label' => 'Status Validasi',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('jurnal_prakerin');
        $this->db->join('pengajuanprakerin', 'pengajuanprakerin.id_peserta = jurnal_prakerin.id_peserta');
        $this->db->join('data_peserta', 'data_peserta.id_peserta = pengajuanprakerin.id_peserta');
        $this->db->where('pengajuanprakerin.id_mentor', $this->session->userdata('id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id_jurnal_prakerin)
    {
        $this->db->join('pengajuanprakerin', 'pengajuanprakerin.id_peserta = jurnal_prakerin.id_peserta');
        $this->db->join('data_peserta', 'data_peserta.id_peserta = pengajuanprakerin.id_peserta');
        return $this->db->get_where($this->_table, ["id_jurnal_prakerin" => $id_jurnal_prakerin])->row();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_jurnal_prakerin = $post["id_jurnal_prakerin"];
        $this->catatan = $post["catatan"];
        $this->status = $post["status"];
        return $this->db->update($this->_table, $this, array("id_jurnal_prakerin" => $post["id_jurnal_prakerin"]));
    }
}
