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
        $data['data_siswa'] = $this->penilaianpkl_model->getAllForMentor();
        $this->load->view("pembimbingmentor/penilaianpkl/listpenilaianpkl", $data);
    }

    public function tambahpenilaianpkl($nama_siswa = null)
    {
        if (!isset($nama_siswa)) redirect('pembimbingmentor/PenilaianPKL');
        $data['siswa'] = $this->penilaianpkl_model->getById($nama_siswa);
        $data['title'] = 'Add New Data Penilaian Prakerin';
        $this->load->view("pembimbingmentor/penilaianpkl/tambahpenilaianpkl", $data);
    }

    public function tambahnilaipkl()
    {
        $datanilai = $this->penilaianpkl_model;
        $datanilai->save();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
        redirect('pembimbingmentor/PenilaianPKL');
    }

    public function editpenilaianpkl($nama_siswa = null)
    {
        if (!isset($nama_siswa)) redirect('pembimbingmentor/PenilaianPKL');
        $data['title'] = 'Edit Data Penilaian Prakerin';
        $data['data_siswa'] = $this->penilaianpkl_model->getById($nama_siswa);
        $data['siswa'] = $this->penilaianpkl_model->getNilaiSiswa($nama_siswa);
        $this->load->view("pembimbingmentor/penilaianpkl/editpenilaianpkl", $data);
    }

    public function editnilaipkl()
    {
        $datanilai = $this->penilaianpkl_model;
        $datanilai->update();
        $this->session->set_flashdata('success', 'Berhasil diubah');
        redirect('pembimbingmentor/PenilaianPKL');
    }

    public function lihatpenilaianpkl($nama_siswa)
    {
        $data['data_siswa'] = $this->penilaianpkl_model->getById($nama_siswa);
        $data['siswa'] = $this->penilaianpkl_model->getNilaiSiswa($nama_siswa);
        $this->load->library('pdf');
        $this->load->view('pembimbingmentor/penilaianpkl/lihatpenilaianpkl', $data);
    }
}