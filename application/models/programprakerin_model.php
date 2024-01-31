<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class programprakerin_model extends CI_Model
{
    private $_table = "program_prakerin";

    public $id_program_prakerin;
    public $id_peserta;
    public $id_kompetensi_dasar;
    public $tanggal;
    public $topik_pekerjaan;

    public function rules()
    {
        return [
            [
                'field' => 'id_kompetensi_dasar',
                'label' => 'Kompetensi Dasar',
                'rules' => 'required'
            ],
            [
                'field' => 'topik_pekerjaan',
                'label' => 'Topik Pekerjaan',
                'rules' => 'required'
            ],

            [
                'field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->join('data_peserta', 'data_peserta.id_peserta = program_prakerin.id_peserta');
        $this->db->join('kompetensi_dasar', 'kompetensi_dasar.id = program_prakerin.id_kompetensi_dasar');
        $this->db->where('program_prakerin.id_peserta', $this->session->userdata('id'));
        $this->db->order_by('id_program_prakerin', 'desc');
        return $this->db->get($this->_table)->result();
    }

    public function getData()
    {
        $this->db->select('*');
        $this->db->join('pengajuanprakerin', 'pengajuanprakerin.id_peserta = program_prakerin.id_peserta');
        $this->db->join('data_mentor', 'data_mentor.id_mentor = pengajuanprakerin.id_mentor');
        $this->db->join('data_peserta', 'data_peserta.id_peserta = program_prakerin.id_peserta');
        $this->db->join('jurusan', 'jurusan.id_jurusan = data_peserta.id_jurusan');
        $this->db->join('kompetensi_dasar', 'kompetensi_dasar.id = program_prakerin.id_kompetensi_dasar');
        $this->db->where('program_prakerin.id_peserta', $this->session->userdata('id'));
        $this->db->order_by('tanggal', 'asc');
        return $this->db->get($this->_table)->result_array();
    }

    public function getById($id_peserta)
    {
        $this->db->join('data_peserta', 'data_peserta.id_peserta = program_prakerin.id_peserta');
        $this->db->join('jurusan', 'jurusan.id_jurusan = data_peserta.id_jurusan');
        $this->db->join('kompetensi_dasar', 'kompetensi_dasar.id = program_prakerin.id_kompetensi_dasar');
        $this->db->join('pengajuanprakerin', 'pengajuanprakerin.id_peserta = program_prakerin.id_peserta');
        $this->db->join('data_mentor', 'data_mentor.id_mentor = pengajuanprakerin.id_mentor');
        return $this->db->get_where($this->_table, ["program_prakerin.id_peserta" => $id_peserta])->row();
    }

    public function getId($id_program_prakerin)
    {
        return $this->db->get_where($this->_table, ["id_program_prakerin" => $id_program_prakerin])->row();
    }

    public function getMapel()
    {
        $this->db->select('*');
        $this->db->from('mapel');
        $query = $this->db->get();
        return $query->result();
    }

    public function getKompetensidasar($id)
    {
        $kompetensi_dasar = $this->db->query("SELECT * FROM kompetensi_dasar WHERE id_mapel = '$id'");
        return $kompetensi_dasar->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_peserta = $post["id_peserta"];
        $this->id_kompetensi_dasar = $post["id_kompetensi_dasar"];
        $this->tanggal = $post["tanggal"];
        $this->topik_pekerjaan = $post["topik_pekerjaan"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_program_prakerin = $post["id_program_prakerin"];
        $this->id_peserta = $post["id_peserta"];
        $this->tanggal = $post["tanggal"];
        $this->topik_pekerjaan = $post["topik_pekerjaan"];
        $this->id_kompetensi_dasar = $post["id_kompetensi_dasar"];
        return $this->db->update($this->_table, $this, array("id_program_prakerin" => $post["id_program_prakerin"]));
    }

    public function delete($id_program_prakerin)
    {
        return $this->db->delete($this->_table, array("id_program_prakerin" => $id_program_prakerin));
    }
}
