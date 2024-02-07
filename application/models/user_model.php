<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{
    private $_table = "pengguna";

    public $user_id;
    public $name;
    public $username;
    public $email;

    public function rules()
    {
        return [

            [
                'field' => 'name',
                'label' => 'Nama Lengkap',
                'rules' => 'required'
            ],

            [
                'field' => 'username',
                'label' => 'Nama Admin',
                'rules' => 'required'
            ],

            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ],
        ];
    }


    public function getById($user_id)
    {
        return $this->db->get_where($this->_table, ["id" => $user_id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->user_id = $post["user_id"];
        $this->name = $post["name"];
        $this->username = $post["username"];
        $this->email = $post["email"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->user_id = $post["user_id"];
        $this->name = $post["name"];
        $this->username = $post["username"];
        $this->email = $post["email"];
        return $this->db->update($this->_table, $this, array("user_id" => $post["user_id"]));
    }
}
