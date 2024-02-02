<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataPeserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("dataprofil_model");
        $this->load->library('form_validation');
        $this->load->model('admin');
        if ($this->admin->is_role() != "admin_prakerin") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Data Profil';
        $data['data_profil'] = $this->dataprofil_model->getAll();
        $this->load->view("admin/dataprofil/listprofil", $data);
    }

	public function daftarprofil()
    {
        $dataprofil = $this->dataprofil_model;
        $validation = $this->form_validation;
        $validation->set_rules($dataprofil->rules());

        if ($validation->run()) {
            $dataprofil->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/DataProfil');
        }
        $data['title'] = 'Tambah Data Profil';
        $this->load->view("admin/dataprofil/daftarprofil", $data);
    }

    public function editdataprofil($id = null)
    {

        if (!isset($id)) redirect('admin/DataProfil');
        $dataprofil = $this->dataprofil_model;
        $validation = $this->form_validation;
        $validation->set_rules($dataprofil->rules());

        if ($validation->run()) {
            $dataprofil->update();
            $this->session->set_flashdata('success', 'Berhasil diubah');
            redirect('admin/DataProfil');
        }
        $data['title'] = 'Edit Data Profil';
        $data["dataprofil"] = $dataprofil->getById($id);
        if (!$data["dataprofil"]) show_404();
        $this->load->view("admin/dataprofil/editdatapeserta", $data);
    }

    public function hapusdataprofil($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->dataprofil_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('admin/DataProfil');
        }
    }
}
