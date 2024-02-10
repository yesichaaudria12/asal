<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "pengguna";

    public $id_pengguna;
    public $name;
    public $username;
    public $email;

    public function rules()
    {
        return [
            [
                'field' => 'id_pengguna',
                'label' => 'No',
                'rules' => 'numeric'
            ],

            [
                'field' => 'name',
                'label' => 'Nama Admin',
                'rules' => 'required'
            ],

            [
                'field' => 'username',
                'label' => 'Username Admin',
                'rules' => 'required'
            ],

            [
                'field' => 'email',
                'label' => 'Email Admin',
                'rules' => 'required'
            ],
        ];
    }

    public function getById($id_pengguna)
    {
        return $this->db->get_where($this->_table, ["id" => $id_pengguna])->row();
    }

    public function updateProfile($user_id,  $name, $username, $email)
    {
        $data = [
            'name' => $name,
            'username' => $username,
            'email' => $email,
        ];

        $this->db->where('id', $user_id);
        return $this->db->update($this->_table, $data);
    }
}