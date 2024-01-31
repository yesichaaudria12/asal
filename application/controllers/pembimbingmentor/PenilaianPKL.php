<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PenilaianPKL extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("penilaianpkl_model");
        $this->load->library('form_validation');
        $this->load->model('admin');
        if ($this->admin->is_role() != "pembimbing_mentor") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Penilaian Prakerin';
        $data['data_peserta'] = $this->penilaianpkl_model->getAllForMENTOR();
        $this->load->view("pembimbingmentor/penilaianpkl/listpenilaianpkl", $data);
    }

    public function tambahpenilaianpkl($nama_peserta = null)
    {
        if (!isset($nama_peserta)) redirect('pembimbingmentor/PenilaianPKL');
        $data['peserta'] = $this->penilaianpkl_model->getById($nama_peserta);
        $data['title'] = 'Tambah Data Penilaian Prakerin';
        $this->load->view("pembimbingmentor/penilaianpkl/tambahpenilaianpkl", $data);
    }

    public function tambahnilaipkl()
    {
        $datanilai = $this->penilaianpkl_model;
        $datanilai->save();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
        redirect('pembimbingmentor/PenilaianPKL');
    }

    public function editpenilaianpkl($nama_peserta = null)
    {
        if (!isset($nama_peserta)) redirect('pembimbingmentor/PenilaianPKL');
        $data['title'] = 'Ubah Data Penilaian Prakerin';
        $data['data_peserta'] = $this->penilaianpkl_model->getById($nama_peserta);
        $data['peserta'] = $this->penilaianpkl_model->getNilaiPeserta($nama_peserta);
        $this->load->view("pembimbingmentor/penilaianpkl/editpenilaianpkl", $data);
    }

    public function editnilaipkl()
    {
        $datanilai = $this->penilaianpkl_model;
        $datanilai->update();
        $this->session->set_flashdata('success', 'Berhasil diubah');
        redirect('pembimbingmentor/PenilaianPKL');
    }

    public function lihatpenilaianpkl($nama_peserta)
    {
        $data['data_peserta'] = $this->penilaianpkl_model->getById($nama_peserta);
        $data['peserta'] = $this->penilaianpkl_model->getNilaiPeserta($nama_peserta);
        $this->load->library('pdf');
        $this->load->view('pembimbingmentor/penilaianpkl/lihatpenilaianpkl', $data);
    }
}
