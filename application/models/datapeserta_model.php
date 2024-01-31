<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class datapeserta_model extends CI_Model
{
    private $_table = "data_peserta";

	public $id_peserta;
    public $nis_nim;
    public $nama_peserta;
    public $kelas;
	public $id_jurusan;
    public $jenis_kelamin;
	public $hp_peserta;
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
                'field' => 'nama_peserta',
                'label' => 'Nama peserta',
                'rules' => 'required'
            ],

            [
                'field' => 'kelas',
                'label' => 'Kelas',
                'rules' => 'required'
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
                'field' => 'hp_peserta',
                'label' => 'No. HP peserta',
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
        $this->db->join('jurusan', 'jurusan.id_jurusan = data_peserta.id_jurusan');
		$this->db->order_by('nama_peserta', 'ASC');
        $query = $this->db->get($this->_table);
		return $query->result();

    }

	public function getInfoPeserta()
    {
        $this->db->where('id_jurusan', $this->session->userdata('id_jurusan'));
        $this->db->order_by('nama_peserta', 'asc');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getDataSPeserta()
    {
        $this->db->where('id_jurusan', $this->session->userdata('id_jurusan'));
        $this->db->order_by('nama_peserta', 'asc');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getById($id_peserta)
    {
        $this->db->join('jurusan', 'jurusan.id_jurusan = data_peserta.id_jurusan');
        return $this->db->get_where($this->_table, ["id_peserta" => $id_peserta])->row();
    }

    public function save()
    {
        $post = $this->input->post();
		$this->nis_nim = $post["nis_nim"];
        $this->nama_peserta = $post["nama_peserta"];
		$this->kelas = $post["kelas"];
        $this->id_jurusan = $post["id_jurusan"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->hp_peserta = $post["hp_peserta"];
        $this->ayah = $post["ayah"];
        $this->no_hp_orang_tua = $post["no_hp_orang_tua"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_peserta = $post["id_peserta"];
		$this->nis_nim = $post["nis_nim"];
        $this->nama_peserta = $post["nama_peserta"];
		$this->kelas = $post["kelas"];
        $this->id_jurusan = $post["id_jurusan"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->hp_peserta = $post["hp_peserta"];
        $this->ayah = $post["ayah"];
        $this->no_hp_orang_tua = $post["no_hp_orang_tua"];
        return $this->db->update($this->_table, $this, array("id_peserta" => $post["id_peserta"]));
    }

    public function delete($id_peserta)
    {
        return $this->db->delete($this->_table, array("id_peserta" => $id_peserta));
    }
}
