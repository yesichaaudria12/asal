<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataMENTOR extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("datamentor_model");
        $this->load->library('form_validation');
        $this->load->model('admin');
        if ($this->admin->is_role() != "admin_pkl") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Data Mentor';
        $data['data_mentor'] = $this->datamentor_model->getAll();
        $this->load->view("admin/datamentor/listmentor", $data);
    }

    public function daftarmentor()
    {
        $datamentor = $this->datamentor_model;
        $validation = $this->form_validation;
        $validation->set_rules($datamentor->rules());

        if ($validation->run()) {
            $datamentor->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/DataMENTOR');
        }
        $data['title'] = 'Tambah Data Mentor';
        $this->load->view("admin/datamentor/daftarmentor", $data);
    }

    public function editdatamentor($id = null)
    {

        if (!isset($id)) redirect('admin/DataMENTOR');
        $datamentor = $this->datamentor_model;
        $validation = $this->form_validation;
        $validation->set_rules($datamentor->rules());

        if ($validation->run()) {
            $datamentor->update();
            $this->session->set_flashdata('success', 'Berhasil diubah');
            redirect('admin/DataMENTOR');
        }
        $data['title'] = 'Edit Data Mentor';
        $data["datamentor"] = $datamentor->getById($id);
        if (!$data["datamentor"]) show_404();
        $this->load->view("admin/datamentor/editdatamentor", $data);
    }

    public function hapusdatamentor($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->datamentor_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('admin/DataMENTOR');
        }
    }
}
