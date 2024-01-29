<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class datasiswa_model extends CI_Model
{
    private $_table = "data_siswa";

	public $id_siswa;
    public $nis_nim;
    public $nama_siswa;
    public $kelas;
	public $id_jurusan;
    public $jenis_kelamin;
	public $hp_siswa;
    public $ayah;
    public $no_hp_orang_tua;


    public function rules()
    {
        return [
            [
                'field' => 'nis_nim',
                'label' => 'Nis',
                'rules' => 'numeric'
            ],

            [
                'field' => 'nama_siswa',
                'label' => 'Nama Siswa',
                'rules' => 'required'
            ],

            [
                'field' => 'kelas',
                'label' => 'Kelas',
                'rules' => 'numeric'
            ],

			[
                'field' => 'id_jurusan',
                'label' => 'jurusan',
                'rules' => 'required'
            ],

            [
                'field' => 'jenis_kelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'required'
            ],

			[
                'field' => 'hp_siswa',
                'label' => 'No. HP Siswa',
                'rules' => 'numeric'
			],

			[
                'field' => 'ayah',
                'label' => 'Nama Orang Tua',
                'rules' => 'required'
			],

			[
                'field' => 'no_hp_orang_tua',
                'label' => 'No. Hp Orang Tua',
                'rules' => 'numeric'
			],

        ];
    }


    public function getAll()
    {
        $this->db->join('jurusan', 'jurusan.id_jurusan = data_siswa.id_jurusan');
		$this->db->order_by('nama_siswa', 'ASC');
        $query = $this->db->get($this->_table);
		return $query->result();

    }

	public function getInfoSiswa()
    {
        $this->db->where('id_jurusan', $this->session->userdata('id_jurusan'));
        $this->db->order_by('nama_siswa', 'asc');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getDataSiswa()
    {
        $this->db->where('id_jurusan', $this->session->userdata('id_jurusan'));
        $this->db->order_by('nama_siswa', 'asc');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getById($id_siswa)
    {
        $this->db->join('jurusan', 'jurusan.id_jurusan = data_siswa.id_jurusan');
        return $this->db->get_where($this->_table, ["id_siswa" => $id_siswa])->row();
    }

    public function save()
    {
        $post = $this->input->post();
		$this->nis_nim = $post["nis_nim"];
        $this->nama_siswa = $post["nama_siswa"];
		$this->kelas = $post["kelas"];
        $this->id_jurusan = $post["id_jurusan"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->hp_siswa = $post["hp_siswa"];
        $this->ayah = $post["ayah"];
        $this->no_hp_orang_tua = $post["no_hp_orang_tua"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_siswa = $post["id_siswa"];
		$this->nis_nim = $post["nis_nim"];
        $this->nama_siswa = $post["nama_siswa"];
		$this->kelas = $post["kelas"];
        $this->id_jurusan = $post["id_jurusan"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->hp_siswa = $post["hp_siswa"];
        $this->ayah = $post["ayah"];
        $this->no_hp_orang_tua = $post["no_hp_orang_tua"];
        return $this->db->update($this->_table, $this, array("id_siswa" => $post["id_siswa"]));
    }

    public function delete($id_siswa)
    {
        return $this->db->delete($this->_table, array("id_siswa" => $id_siswa));
    }
}
