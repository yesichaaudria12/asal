<?php

defined('BASEPATH') or exit('No direct script access allowed');

class InfoMENTOR extends CI_Controller
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
        $data['title'] = 'Informasi Tempat Prakerin / Perusahaan';
        $data['data_mentor'] = $this->datamentor_model->getInfoMENTOR();
        $this->load->view("siswa/mentor/infomentor", $data);
    }
}
