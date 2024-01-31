<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class permohonanprakerin_model extends CI_Model
{

    private $_table = "pengajuanprakerin";

    public $id_pengajuanprakerin;
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
        $this->db->join('data_guru', 'data_guru.id_guru = pengajuanprakerin.id_guru', 'left');
        $this->db->join('data_mentor', 'data_mentor.id_mentor = pengajuanprakerin.id_mentor');
        $this->db->order_by('pengajuanprakerin.id_pengajuanprakerin', 'desc');
        return $this->db->get_where($this->_table, ["pengajuanprakerin.id_peserta" => $this->session->userdata('id')])->row();
    }

    public function getHistory()
    {
        $this->db->select('*');
        $this->db->join('data_guru', 'data_guru.id_guru = pengajuanprakerin.id_guru', 'left');
        $this->db->join('data_peserta', 'data_peserta.id_peserta = pengajuanprakerin.id_peserta');
        $this->db->join('data_mentor', 'data_mentor.id_mentor = pengajuanprakerin.id_mentor');
        $this->db->where('pengajuanprakerin.id_peserta', $this->session->userdata('id'));
        $this->db->order_by('id_pengajuanprakerin', 'desc');
        return $this->db->get($this->_table)->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_peserta = $post['id_peserta'];
        $this->id_mentor = $post["id_mentor"];
        return $this->db->insert($this->_table, $this);
    }

    public function delete($id_pengajuanprakerin)
    {
        return $this->db->delete($this->_table, array("id_pengajuanprakerin" => $id_pengajuanprakerin));
    }
}
