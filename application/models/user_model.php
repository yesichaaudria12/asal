<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "pengguna";

    public $id_pengguna;
    public $username;
    public $gambar;
    public $password;
    public $confirmpassword;

    public function rules()
    {
        return [
            [
                'field' => 'id_pengguna',
                'label' => 'No',
                'rules' => 'numeric'
            ],

            [
                'field' => 'username',
                'label' => 'Nama Admin',
                'rules' => 'required'
            ],

            [
                'field' => 'gambar',
                'label' => 'Foto',
                'rules' => 'required'
            ],

            [
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required'
            ],

            [
                'field' => 'confirmpassword',
                'label' => 'confirmpassword',
                'rules' => 'required'
            ],

        ];
    }


    public function getAll()
    {
        $this->db->order_by('username', 'ASC');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getById($id_pengguna)
    {
        return $this->db->get_where($this->_table, ["id_pengguna" => $id_pengguna])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_pengguna = $post["id_pengguna"];
        $this->username = $post["username"];
        $this->gambar = $post["gambar"];
        $this->password = $post["password"];
        $this->confirmpassword = $post["confirmpassword"];;
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pengguna = $post["id_pengguna"];
        $this->username = $post["username"];
        $this->gambar = $post["gambar"];
        $this->password = $post["password"];
        $this->confirmpassword = $post["confirmpassword"];
        return $this->db->update($this->_table, $this, array("id_pengguna" => $post["id_pengguna"]));
    }

    public function delete($id_pengguna)
    {
        return $this->db->delete($this->_table, array("id_pengguna" => $id_pengguna));
    }
}
