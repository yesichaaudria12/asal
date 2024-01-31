<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ProgramPKL extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin');
        $this->load->model("programpkl_model");
        $this->load->model("permohonanpkl_model");
        $this->load->library("form_validation");
        if ($this->admin->is_role() != "peserta") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Program Prakerin';
        $data['pengajuanpkl'] = $this->permohonanpkl_model->getAll();
        $data['program_pkl'] = $this->programpkl_model->getAll();
        $this->load->view("peserta/programpkl/listprogrampkl", $data);
    }

    public function tambahprogrampkl()
    {
        $programpkl = $this->programpkl_model;
        $validation = $this->form_validation;
        $validation->set_rules($programpkl->rules());

        if ($validation->run()) {
            $programpkl->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('peserta/ProgramPKL');
        }
        $data['title'] = 'Add New Data Program Prakerin';
        $data['mapel'] = $this->programpkl_model->getMapel();
        $data['pengajuanpkl'] = $this->permohonanpkl_model->getAll();
        $this->load->view("peserta/programpkl/tambahprogrampkl", $data);
    }

    public function getKompetensidasar()
    {
        $id = $this->input->post('id', true);
        $data = $this->programpkl_model->getKompetensidasar($id);
        echo json_encode($data);
    }

    public function editprogrampkl($id = null)
    {
        if (!isset($id)) redirect('peserta/ProgramPKL');
        $programpkl = $this->programpkl_model;
        $validation = $this->form_validation;
        $validation->set_rules($programpkl->rules());

        if ($validation->run()) {
            $programpkl->update();
            $this->session->set_flashdata('success', 'Berhasil diubah');
            redirect('peserta/ProgramPKL');
        }
        $data['title'] = 'Edit Data Logbook ';
        $data['mapel'] = $this->programpkl_model->getMapel();
        $data['pengajuanpkl'] = $this->permohonanpkl_model->getAll();
        $data["programpkl"] = $programpkl->getId($id);
        if (!$data["programpkl"]) show_404();
        $this->load->view("peserta/programpkl/ubahprogrampkl", $data);
    }

    public function hapusprogrampkl($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->programpkl_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('peserta/ProgramPKL');
        }
    }

    public function cetak_program_pkl($id_peserta = null)
    {
        $this->load->library('pdf');
        $data['program_pkl'] = $this->programpkl_model->getData();
        $data['data_program_pkl'] = $this->programpkl_model->getById($id_peserta);
        if (!isset($id_peserta)) redirect('peserta/ProgramPKL');
        if (!$data["program_pkl"]) show_error('Data tidak ditemukan', '404', 'Tidak dapat mencetak laporan program PKL');
        $this->load->view('peserta/programpkl/cetakprogrampkl', $data);
    }
}
