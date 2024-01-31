<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PresensiPRAKERIN extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("absensiprakerin_model");
        $this->load->model("permohonanprakerin_model");
        $this->load->model('admin');
        if ($this->admin->is_role() != "peserta") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Presensi Prakerin';
        $data['absensi'] = $this->absensiprakerin_model->getAll();
        $data['pengajuanprakerin'] = $this->permohonanprakerin_model->getAll();
        $data['data_peserta'] = $this->absensiprakerin_model->getDataPeserta();
        $this->load->view("peserta/absensiprakerin/listabsensiprakerin", $data);
    }

    public function tambahpresensiprakerin()
    {
        $absensiprakerin = $this->absensiprakerin_model;
        $validation = $this->form_validation;
        $validation->set_rules($absensiprakerin->rules());

        if ($validation->run()) {
            $absensiprakerin->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('peserta/PresensiPRAKERIN');
        }
    }

    public function hapuspresensiprakerin($id_absensi = null)
    {
        if (!isset($id_absensi)) show_404();
        if ($this->absensiprakerin_model->delete($id_absensi)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('peserta/PresensiPRAKERIN');
        }
    }
}
