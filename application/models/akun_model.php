<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class akun_model extends CI_Model
{
    private $_table = "pengguna";

    public function rules()
    {
        return [
            [
                'field' => 'username',
                'label' => 'Nama Pengguna',
                'rules' => 'required'
            ],
            [
                'field' => 'password',
                'label' => 'Kata Sandi',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        $this->db->join('data_guru', 'data_guru.id_guru = pengguna.id', 'left');
        $this->db->join('data_staf_tu', 'data_staf_tu.id_staf_tu = pengguna.id', 'left');
        $this->db->join('data_peserta', 'data_peserta.id_peserta = pengguna.id', 'left');
        $this->db->join('data_mentor', 'data_mentor.id_mentor = pengguna.id', 'left');
        $this->db->order_by('id', 'asc');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getAkun()
    {
        $tabel_mentor = $this->db->query("SELECT * FROM `data_mentor` left join pengguna on pengguna.id = data_mentor.id_mentor where pengguna.id is null");
        return $tabel_mentor->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->role = $post["role"];
        return $this->db->insert($this->_table, $this);
    }
}
