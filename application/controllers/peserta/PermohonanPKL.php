<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PermohonanPKL extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('permohonanpkl_model');
        $this->load->model('datamentor_model');
        $this->load->model('admin');
        if ($this->admin->is_role() != "peserta") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Permohonan Pelaksanaan Prakerin';
        $data['permohonanpkl'] = $this->permohonanpkl_model->getAll();
        $data['pengajuanpkl'] = $this->permohonanpkl_model->getHistory();
        $data['data_mentor'] = $this->datamentor_model->getDataMENTOR();
        $this->load->view("peserta/permohonanpkl/permohonanpkl", $data);
    }

    public function tambahpermohonanpkl()
    {
        $permohonanpkl = $this->permohonanpkl_model;
        $validation = $this->form_validation;
        $validation->set_rules($permohonanpkl->rules());

        if ($validation->run()) {
            $permohonanpkl->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('peserta/PermohonanPKL');
        } else {
            $this->session->set_flashdata('danger', 'Gagal tersimpan, cek kembali masukan yang Anda berikan');
            redirect('peserta/PermohonanPKL');
        }
    }

    public function hapuspermohonanpkl($id_pengajuanpkl = null)
    {
        if (!isset($id_pengajuanpkl)) show_404();
        if ($this->permohonanpkl_model->delete($id_pengajuanpkl)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('peserta/PermohonanPKL');
        }
    }
}
