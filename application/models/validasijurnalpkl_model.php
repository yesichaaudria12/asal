<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class validasijurnalpkl_model extends CI_Model
{

    private $_table = "jurnal_pkl";

    public $id_jurnal_pkl;
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
        $this->db->from('jurnal_pkl');
        $this->db->join('pengajuanpkl', 'pengajuanpkl.id_peserta = jurnal_pkl.id_peserta');
        $this->db->join('data_peserta', 'data_peserta.id_peserta = pengajuanpkl.id_peserta');
        $this->db->where('pengajuanpkl.id_mentor', $this->session->userdata('id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id_jurnal_pkl)
    {
        $this->db->join('pengajuanpkl', 'pengajuanpkl.id_peserta = jurnal_pkl.id_peserta');
        $this->db->join('data_peserta', 'data_peserta.id_peserta = pengajuanpkl.id_peserta');
        return $this->db->get_where($this->_table, ["id_jurnal_pkl" => $id_jurnal_pkl])->row();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_jurnal_pkl = $post["id_jurnal_pkl"];
        $this->catatan = $post["catatan"];
        $this->status = $post["status"];
        return $this->db->update($this->_table, $this, array("id_jurnal_pkl" => $post["id_jurnal_pkl"]));
    }
}
