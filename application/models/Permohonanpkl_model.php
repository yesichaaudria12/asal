<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class permohonanpkl_model extends CI_Model
{

    private $_table = "pengajuanpkl";

    public $id_pengajuanpkl;
    public $id_mentor;

    public function rules()
    {
        return [

            [
                'field' => 'id_mentor',
                'label' => 'Nama Mentor',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->join('data_guru', 'data_guru.id_guru = pengajuanpkl.id_guru', 'left');
        $this->db->join('data_mentor', 'data_mentor.id_mentor = pengajuanpkl.id_mentor');
        $this->db->order_by('pengajuanpkl.id_pengajuanpkl', 'desc');
        return $this->db->get_where($this->_table, ["pengajuanpkl.id_siswa" => $this->session->userdata('id')])->row();
    }

    public function getHistory()
    {
        $this->db->select('*');
        $this->db->join('data_guru', 'data_guru.id_guru = pengajuanpkl.id_guru', 'left');
        $this->db->join('data_siswa', 'data_siswa.id_siswa = pengajuanpkl.id_siswa');
        $this->db->join('data_mentor', 'data_mentor.id_mentor = pengajuanpkl.id_mentor');
        $this->db->where('pengajuanpkl.id_siswa', $this->session->userdata('id'));
        $this->db->order_by('id_pengajuanpkl', 'desc');
        return $this->db->get($this->_table)->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_siswa = $post['id_siswa'];
        $this->id_mentor = $post["id_mentor"];
        return $this->db->insert($this->_table, $this);
    }

    public function delete($id_pengajuanpkl)
    {
        return $this->db->delete($this->_table, array("id_pengajuanpkl" => $id_pengajuanpkl));
    }
}