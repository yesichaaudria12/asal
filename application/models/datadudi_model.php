<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class datadudi_model extends CI_Model
{
    private $_table = "data_dudi";

    public $id_dudi;
	public $nip;
    public $nama_dudi;
    public $alamat_dudi;
    public $no_telp_dudi;
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
                'field' => 'nama_dudi',
                'label' => 'Nama Mentor',
                'rules' => 'required'
            ],

            [
                'field' => 'alamat_dudi',
                'label' => 'Alamat Mentor',
                'rules' => 'required'
            ],

            [
                'field' => 'no_telp_dudi',
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
        $this->db->join('jurusan', 'jurusan.id_jurusan = data_dudi.id_jurusan');
        $this->db->order_by('nama_dudi', 'ASC');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getInfoDUDI()
    {
        $this->db->where('id_jurusan', $this->session->userdata('id_jurusan'));
        $this->db->order_by('nama_dudi', 'asc');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getDataDUDI()
    {
        $this->db->where('id_jurusan', $this->session->userdata('id_jurusan'));
        $this->db->order_by('nama_dudi', 'asc');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getById($id_dudi)
    {
        $this->db->join('jurusan', 'jurusan.id_jurusan = data_dudi.id_jurusan');
        return $this->db->get_where($this->_table, ["id_dudi" => $id_dudi])->row();
    }

    public function save()
    {
        $post = $this->input->post();
		$this->nip = $post["nip"];
        $this->nama_dudi = $post["nama_dudi"];
        $this->alamat_dudi = $post["alamat_dudi"];
        $this->no_telp_dudi = $post["no_telp_dudi"];
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
        $this->id_dudi = $post["id_dudi"];
        $this->nama_dudi = $post["nama_dudi"];
        $this->alamat_dudi = $post["alamat_dudi"];
        $this->no_telp_dudi = $post["no_telp_dudi"];
        $this->jenis_usaha = $post["jenis_usaha"];
        $this->nama_pimpinan = $post["nama_pimpinan"];
        $this->no_telp_pimpinan = $post["no_telp_pimpinan"];
        $this->kuota = $post["kuota"];
        $this->id_jurusan = $post["id_jurusan"];
        return $this->db->update($this->_table, $this, array("id_dudi" => $post["id_dudi"]));
    }

    public function delete($id_dudi)
    {
        return $this->db->delete($this->_table, array("id_dudi" => $id_dudi));
    }
}