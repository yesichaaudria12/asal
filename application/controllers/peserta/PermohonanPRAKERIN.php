<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PermohonanPRAKERIN extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('permohonanprakerin_model');
        $this->load->model('datamentor_model');
        $this->load->model('admin');
        if ($this->admin->is_role() != "peserta") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Permohonan Pelaksanaan Prakerin';
        $data['permohonanprakerin'] = $this->permohonanprakerin_model->getAll();
        $data['pengajuanprakerin'] = $this->permohonanprakerin_model->getHistory();
        $data['data_mentor'] = $this->datamentor_model->getDataMENTOR();
        $this->load->view("peserta/permohonanprakerin/permohonanprakerin", $data);
    }

    public function tambahpermohonanprakerin()
    {
        $permohonanprakerin = $this->permohonanprakerin_model;
        $validation = $this->form_validation;
        $validation->set_rules($permohonanprakerin->rules());

        if ($validation->run()) {
            $permohonanprakerin->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('peserta/PermohonanPRAKERIN');
        } else {
            $this->session->set_flashdata('danger', 'Gagal tersimpan, cek kembali masukan yang Anda berikan');
            redirect('peserta/PermohonanPRAKERIN');
        }
    }

    public function hapuspermohonanprakerin($id_pengajuanprakerin = null)
    {
        if (!isset($id_pengajuanprakerin)) show_404();
        if ($this->permohonanprakerin_model->delete($id_pengajuanprakerin)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('peserta/PermohonanPRAKERIN');
        }
    }
}
