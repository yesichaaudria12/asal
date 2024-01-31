<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PengajuanPRAKERIN extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pengajuanprakerin_model");
        $this->load->library('form_validation');
        $this->load->model('admin');
        if ($this->admin->is_role() != "admin_prakerin") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Pengajuan Prakerin';
        $data['pengajuanprakerin'] = $this->pengajuanprakerin_model->getAll();
        $data['data_guru'] = $this->pengajuanprakerin_model->get_data_guru();
        $this->load->view("admin/pengajuanprakerin/listpengajuan", $data);
    }

    public function editpengajuanprakerin($id = null)
    {
        $data['title'] = 'Edit Pengajuan Prakerin';
        if (!isset($id)) redirect('admin/pengajuanprakerin');
        $pengajuanprakerin = $this->pengajuanprakerin_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengajuanprakerin->rules());

        if ($validation->run()) {
            $pengajuanprakerin->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/PengajuanPRAKERIN');
        }

        $data['data_guru'] = $this->pengajuanprakerin_model->get_data_guru();
        $data["pengajuanprakerin"] = $pengajuanprakerin->getById($id);
        if (!$data["pengajuanprakerin"]) show_404();
        $this->load->view("admin/pengajuanprakerin/editpengajuanprakerin", $data);
    }
}