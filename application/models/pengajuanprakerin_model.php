<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class pengajuanprakerin_model extends CI_Model
{

    private $_table = "pengajuanprakerin";

    public $id_pengajuanprakerin;
    public $tanggal_masuk;
    public $tanggal_keluar;
    public $id_guru;
    public $status_validasi;

    public function rules()
    {
        return [

            [
                'field' => 'status_validasi',
                'label' => 'Status Validasi',
                'rules' => 'required'
            ],

            [
                'field' => 'tanggal_masuk',
                'label' => 'Tanggal Masuk',
                'rules' => 'required'
            ],

            [
                'field' => 'tanggal_keluar',
                'label' => 'Tanggal Keluar',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->join('data_guru', 'data_guru.id_guru = pengajuanprakerin.id_guru', 'left');
        $this->db->join('data_peserta', 'data_peserta.id_peserta = pengajuanprakerin.id_peserta');
        $this->db->join('data_mentor', 'data_mentor.id_mentor = pengajuanprakerin.id_mentor');
        $this->db->order_by('nama_mentor', 'asc');
        return $this->db->get($this->_table)->result();
    }

    public function getById($id_pengajuanprakerin)
    {
        $this->db->select('*');
        $this->db->join('data_guru', 'data_guru.id_guru = pengajuanprakerin.id_guru', 'left');
        $this->db->join('data_peserta', 'data_peserta.id_peserta = pengajuanprakerin.id_peserta');
        $this->db->join('data_mentor', 'data_mentor.id_mentor = pengajuanprakerin.id_mentor');
        return $this->db->get_where($this->_table, ["id_pengajuanprakerin" => $id_pengajuanprakerin])->row();
    }

    public function getBelumTervalidasi()
    {
        $query = $this->db->query('SELECT id_pengajuanprakerin FROM pengajuanprakerin where status_validasi = "Belum Tervalidasi"');
        return $query->num_rows();
    }

    public function getTotalPeserta()
    {
        $query = $this->db->query('SELECT id_peserta FROM data_peserta');
        return $query->num_rows();
    }

    public function getTotalPesertaBelumMengajukan()
    {
        $query = $this->db->query('SELECT data_peserta.id_peserta FROM data_peserta left join pengajuanprakerin on pengajuanprakerin.id_peserta = data_peserta.id_peserta where pengajuanprakerin.status_validasi is null');
        return $query->num_rows();
    }

    public function getTotalPesertaSudahMengajukan()
    {
        $query = $this->db->query('SELECT data_peserta.id_peserta FROM data_peserta join pengajuanprakerin on pengajuanprakerin.id_peserta = data_peserta.id_peserta');
        return $query->num_rows();
    }

    public function getProsesPengajuan()
    {
        $query = $this->db->query('SELECT * FROM pengajuanprakerin where status_validasi = "Proses Pengajuan"');
        return $query->num_rows();
    }

    public function getDitolak()
    {
        $query = $this->db->query('SELECT * FROM pengajuanprakerin where status_validasi = "Ditolak"');
        return $query->num_rows();
    }

    public function getDiterima()
    {
        $query = $this->db->query('SELECT * FROM pengajuanprakerin where status_validasi = "Diterima"');
        return $query->num_rows();
    }

    public function getTotalPengajuan()
    {
        $query = $this->db->query('SELECT * FROM pengajuanprakerin');
        return $query->num_rows();
    }

    function get_data_guru()
    {
        $this->db->select('*');
        $this->db->from('data_guru');
        $query = $this->db->get();
        return $query->result();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pengajuanprakerin = $post["id_pengajuanprakerin"];
        $this->id_guru = $post["id_guru"];
        $this->tanggal_masuk = $post["tanggal_masuk"];
        $this->tanggal_keluar = $post["tanggal_keluar"];
        $this->status_validasi = $post["status_validasi"];
        return $this->db->update($this->_table, $this, array("id_pengajuanprakerin" => $post["id_pengajuanprakerin"]));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pengajuanprakerin" => $id));
    }
}
