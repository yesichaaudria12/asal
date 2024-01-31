<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PenilaianPRAKERIN extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("penilaianprakerin_model");
        $this->load->library('form_validation');
        $this->load->model('admin');
        if ($this->admin->is_role() != "admin_prakerin") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Penilaian Prakerin';
        $data['data_peserta'] = $this->penilaianprakerin_model->getAll();
        $this->load->view("admin/penilaianprakerin/listpenilaianprakerin", $data);
    }

    public function tambahpenilaianprakerin($nama_peserta = null)
    {
        if (!isset($nama_peserta)) redirect('admin/PenilaianPRAKERIN');
        $data['peserta'] = $this->penilaianprakerin_model->getById($nama_peserta);
        $data['title'] = 'Add Data  New Penilaian Prakerin';
        $this->load->view("admin/penilaianprakerin/tambahpenilaianprakerin", $data);
    }

    public function tambahnilaiprakerin()
    {
        $datanilai = $this->penilaianprakerin_model;
        $datanilai->save();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
        redirect('admin/PenilaianPRAKERIN');
    }

    public function editpenilaianprakerin($nama_peserta = null)
    {
        if (!isset($nama_peserta)) redirect('admin/PenilaianPRAKERIN');
        $data['title'] = 'Edit Data Penilaian Prakerin';
        $data['data_peserta'] = $this->penilaianprakerin_model->getById($nama_peserta);
        $data['peserta'] = $this->penilaianprakerin_model->getNilaiPeserta($nama_peserta);
        $this->load->view("admin/penilaianprakerin/editpenilaianprakerin", $data);
    }

    public function editnilaiprakerin()
    {
        $datanilai = $this->penilaianprakerin_model;
        $datanilai->update();
        $this->session->set_flashdata('success', 'Berhasil diubah');
        redirect('admin/PenilaianPRAKERIN');
    }

    public function lihatpenilaianprakerin($nama_peserta)
    {
        $data['data_peserta'] = $this->penilaianprakerin_model->getById($nama_peserta);
        $data['peserta'] = $this->penilaianprakerin_model->getNilaiPeserta($nama_peserta);
        $this->load->library('pdf');
        $this->load->view('admin/penilaianprakerin/lihatpenilaianprakerin', $data);
    }
}
