<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AbsensiPKL extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin");
        $this->load->model("absensipkl_model");
        if ($this->admin->is_role() != "pembimbing_mentor") {
            redirect("login/");
        }
    }

    public function index()
    {
        $sort = $this->input->post('sort');
        $data['title'] = 'Absensi / Ketidakhadiran Peserta Prakerin';
        if (!isset($sort)) {
            $data["absensi"] = $this->absensipkl_model->getKetidakhadiran();
        } else {
            $data["absensi"] = $this->absensipkl_model->getAllByMonth($sort);
        }
        $this->load->view("pembimbingmentor/absensipkl/absensipkl", $data);
    }
}
