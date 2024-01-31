<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataPeserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("datapeserta_model");
        $this->load->library('form_validation');
        $this->load->model('admin');
        if ($this->admin->is_role() != "admin_prakerin") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Data Prakerin';
        $data['data_peserta'] = $this->datapeserta_model->getAll();
        $this->load->view("admin/datapeserta/listpeserta", $data);
    }

	public function daftarpeserta()
    {
        $datapeserta = $this->datapeserta_model;
        $validation = $this->form_validation;
        $validation->set_rules($datapeserta->rules());

        if ($validation->run()) {
            $datapeserta->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/DataPeserta');
        }
        $data['title'] = 'Tambah Data Peserta';
        $this->load->view("admin/datapeserta/daftarpeserta", $data);
    }

    public function editdatapeserta($id = null)
    {

        if (!isset($id)) redirect('admin/DataPeserta');
        $datapeserta = $this->datapeserta_model;
        $validation = $this->form_validation;
        $validation->set_rules($datapeserta->rules());

        if ($validation->run()) {
            $datapeserta->update();
            $this->session->set_flashdata('success', 'Berhasil diubah');
            redirect('admin/DataPeserta');
        }
        $data['title'] = 'Edit Data Prakerin';
        $data["datapeserta"] = $datapeserta->getById($id);
        if (!$data["datapeserta"]) show_404();
        $this->load->view("admin/datapeserta/editdatapeserta", $data);
    }

    public function hapusdatapeserta($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->datapeserta_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('admin/DataPeserta');
        }
    }
}
