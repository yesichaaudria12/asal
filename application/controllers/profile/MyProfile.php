<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyProfile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function showprofile()
    {
        $user_id = $this->session->userdata('id');
        $data['user_profile'] = $this->user_model->getById($user_id);
        $data["title"] = "MY PROFILE";

        if (!$data['user_profile']) {
            show_404();
        } else {
            $this->load->view('profile/myprofile', $data);
        }
    }

    public function save($id = null)
    {

        if (!isset($id)) redirect('profile/MyProfile');
        $data= $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($data->rules());

        if ($validation->run()) {
            $data->update();
            $this->session->set_flashdata('success', 'Berhasil diubah');
            redirect('profile/MyProfile');
        }
        $data['title'] = 'Edit Data Profile';
        $data["user_profile"] = $data->getById($id);
        if (!$data["user_profile"]) show_404();
        $this->load->view('profile/myprofile', $data);
    }
}
