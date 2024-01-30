<?php

defined('BASEPATH') or exit('No direct script access allowed');

class InfoMentor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("datamentor_model");
        $this->load->model('admin');
        if ($this->admin->is_role() != "siswa") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Informasi Tempat Prakerin / Mentor';
        $data['data_dudi'] = $this->datamentor_model->getInfoMentor();
        $this->load->view("siswa/mentor/infomentor", $data);
    }
}
