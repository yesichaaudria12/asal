<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class datamentor_model extends CI_Model
{
    private $_table = "data_mentor";

    public $id_mentor;
	public $nip;
    public $nama_mentor;
    public $alamat_mentor;
    public $no_telp_mentor;
    public $jenis_usaha;
    public $nama_pimpinan;
    public $no_telp_pimpinan;
    public $kuota;

    public function rules()
    {
        return [
			[
                'field' => 'nip',
                'label' => 'NIP',
                'rules' => 'required'
            ],
			
            [
                'field' => 'nama_mentor',
                'label' => 'Nama Mentor',
                'rules' => 'required'
            ],

            [
                'field' => 'alamat_mentor',
                'label' => 'Alamat Mentor',
                'rules' => 'required'
            ],

            [
                'field' => 'no_telp_mentor',
                'label' => 'No Telpon Mentor',
                'rules' => 'numeric'
            ],

            [
                'field' => 'nama_pimpinan',
                'label' => 'Nama Pimpinan',
                'rules' => 'required'
            ],

            [
                'field' => 'no_telp_pimpinan',
                'label' => 'No Telp Pimpinan',
                'rules' => 'numeric'
            ],

            [
                'field' => 'kuota',
                'label' => 'Kuota Mentor',
                'rules' => 'required'
            ],

            [
                'field' => 'id_jurusan',
                'label' => 'Rujukan Jurusan',
                'rules' => 'required'
            ]

        ];
    }

    public function getAll()
    {
        $this->db->join('jurusan', 'jurusan.id_jurusan = data_mentor.id_jurusan');
        $this->db->order_by('nama_mentor', 'ASC');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getInfoMENTOR()
    {
        $this->db->where('id_jurusan', $this->session->userdata('id_jurusan'));
        $this->db->order_by('nama_mentor', 'asc');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getDataMENTOR()
    {
        $this->db->where('id_jurusan', $this->session->userdata('id_jurusan'));
        $this->db->order_by('nama_mentor', 'asc');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getById($id_mentor)
    {
        $this->db->join('jurusan', 'jurusan.id_jurusan = data_mentor.id_jurusan');
        return $this->db->get_where($this->_table, ["id_mentor" => $id_mentor])->row();
    }

    public function save()
    {
        $post = $this->input->post();
		$this->nip = $post["nip"];
        $this->nama_mentor = $post["nama_mentor"];
        $this->alamat_mentor = $post["alamat_mentor"];
        $this->no_telp_mentor = $post["no_telp_mentor"];
        $this->jenis_usaha = $post["jenis_usaha"];
        $this->nama_pimpinan = $post["nama_pimpinan"];
        $this->no_telp_pimpinan = $post["no_telp_pimpinan"];
        $this->kuota = $post["kuota"];
        $this->id_jurusan = $post["id_jurusan"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
		$this->nip = $post["nip"];
        $this->id_mentor = $post["id_mentor"];
        $this->nama_mentor = $post["nama_mentor"];
        $this->alamat_mentor = $post["alamat_mentor"];
        $this->no_telp_mentor = $post["no_telp_mentor"];
        $this->jenis_usaha = $post["jenis_usaha"];
        $this->nama_pimpinan = $post["nama_pimpinan"];
        $this->no_telp_pimpinan = $post["no_telp_pimpinan"];
        $this->kuota = $post["kuota"];
        $this->id_jurusan = $post["id_jurusan"];
        return $this->db->update($this->_table, $this, array("id_mentor" => $post["id_mentor"]));
    }

    public function delete($id_mentor)
    {
        return $this->db->delete($this->_table, array("id_mentor" => $id_mentor));
    }
}
