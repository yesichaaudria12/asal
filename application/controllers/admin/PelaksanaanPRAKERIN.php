<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PelaksanaanPRAKERIN extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pelaksanaanprakerin_model");
        $this->load->library('form_validation');
        $this->load->model('admin');
        if ($this->admin->is_role() != "admin_prakerin") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Pelaksanaan Prakerin';
        $data['pelaksanaanprakerin'] = $this->pelaksanaanprakerin_model->getAll();
        $this->load->view("admin/pelaksanaanprakerin/listpelaksanaanprakerin", $data);
    }

    public function editpelaksanaanprakerin($id = null)
    {

        if (!isset($id)) redirect('admin/Pelaksanaanprakerin');
        $pelaksanaanprakerin = $this->pelaksanaanprakerin_model;
        $validation = $this->form_validation;
        $validation->set_rules($pelaksanaanprakerin->rules());

        if ($validation->run()) {
            $pelaksanaanprakerin->update();
            $this->session->set_flashdata('success', 'Berhasil diubah');
            redirect('admin/PelaksanaanPRAKERIN');
        }
        $data['title'] = 'Kelompok Pelaksanaan Prakerin';
        $data["pelaksanaanprakerin"] = $pelaksanaanprakerin->getById($id);
        if (!$data["pelaksanaanprakerin"]) show_404();
        $this->load->view("admin/pelaksanaanprakerin/editpelaksanaanprakerin", $data);
    }
}
