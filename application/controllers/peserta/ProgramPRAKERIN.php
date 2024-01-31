<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ProgramPRAKERIN extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin');
        $this->load->model("programprakerin_model");
        $this->load->model("permohonanprakerin_model");
        $this->load->library("form_validation");
        if ($this->admin->is_role() != "peserta") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Program Prakerin';
        $data['pengajuanprakerin'] = $this->permohonanprakerin_model->getAll();
        $data['program_prakerin'] = $this->programprakerin_model->getAll();
        $this->load->view("peserta/programprakerin/listprogramprakerin", $data);
    }

    public function tambahprogramprakerin()
    {
        $programprakerin = $this->programprakerin_model;
        $validation = $this->form_validation;
        $validation->set_rules($programprakerin->rules());

        if ($validation->run()) {
            $programprakerin->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('peserta/ProgramPRAKERIN');
        }
        $data['title'] = 'Add New Data Program Prakerin';
        $data['mapel'] = $this->programprakerin_model->getMapel();
        $data['pengajuanprakerin'] = $this->permohonanprakerin_model->getAll();
        $this->load->view("peserta/programprakerin/tambahprogramprakerin", $data);
    }

    public function getKompetensidasar()
    {
        $id = $this->input->post('id', true);
        $data = $this->programprakerin_model->getKompetensidasar($id);
        echo json_encode($data);
    }

    public function editprogramprakerin($id = null)
    {
        if (!isset($id)) redirect('peserta/ProgramPRAKERIN');
        $programprakerin = $this->programprakerin_model;
        $validation = $this->form_validation;
        $validation->set_rules($programprakerin->rules());

        if ($validation->run()) {
            $programprakerin->update();
            $this->session->set_flashdata('success', 'Berhasil diubah');
            redirect('peserta/ProgramPRAKERIN');
        }
        $data['title'] = 'Edit Data Logbook ';
        $data['mapel'] = $this->programprakerin_model->getMapel();
        $data['pengajuanprakerin'] = $this->permohonanprakerin_model->getAll();
        $data["programprakerin"] = $programprakerin->getId($id);
        if (!$data["programprakerin"]) show_404();
        $this->load->view("peserta/programprakerin/ubahprogramprakerin", $data);
    }

    public function hapusprogramprakerin($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->programprakerin_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('peserta/ProgramPRAKERIN');
        }
    }

    public function cetak_program_prakerin($id_peserta = null)
    {
        $this->load->library('pdf');
        $data['program_prakerin'] = $this->programprakerin_model->getData();
        $data['data_program_prakerin'] = $this->programprakerin_model->getById($id_peserta);
        if (!isset($id_peserta)) redirect('peserta/ProgramPRAKERIN');
        if (!$data["program_prakerin"]) show_error('Data tidak ditemukan', '404', 'Tidak dapat mencetak laporan program PRAKERIN');
        $this->load->view('peserta/programprakerin/cetakprogramprakerin', $data);
    }
}
