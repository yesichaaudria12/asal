<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CatatanKunjunganPRAKERIN extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("catatankunjunganprakerin_model");
        $this->load->model("permohonanprakerin_model");
        $this->load->model('admin');
        if ($this->admin->is_role() != "peserta") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = ' Internship Visit Notes';
        $data['catatankunjunganprakerin'] = $this->catatankunjunganprakerin_model->getAll();
        $data['pengajuanprakerin'] = $this->permohonanprakerin_model->getAll();
        $data['data_guru'] = $this->catatankunjunganprakerin_model->getGuruPembimbing();
        $this->load->view("peserta/catatankunjunganprakerin/catatankunjunganprakerin", $data);
    }
}
