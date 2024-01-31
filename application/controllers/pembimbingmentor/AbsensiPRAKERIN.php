<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AbsensiPRAKERIN extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin");
        $this->load->model("absensiprakerin_model");
        if ($this->admin->is_role() != "pembimbing_mentor") {
            redirect("login/");
        }
    }

    public function index()
    {
        $sort = $this->input->post('sort');
        $data['title'] = 'Absensi / Ketidakhadiran Peserta Prakerin';
        if (!isset($sort)) {
            $data["absensi"] = $this->absensiprakerin_model->getKetidakhadiran();
        } else {
            $data["absensi"] = $this->absensiprakerin_model->getAllByMonth($sort);
        }
        $this->load->view("pembimbingmentor/absensiprakerin/absensiprakerin", $data);
    }
}
