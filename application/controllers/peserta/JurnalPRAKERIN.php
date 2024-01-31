<?php

defined('BASEPATH') or exit('No direct script access allowed');

class JurnalPRAKERIN extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin');
        $this->load->model("jurnalprakerin_model");
        $this->load->model("permohonanprakerin_model");
        $this->load->library("form_validation");
        if ($this->admin->is_role() != "peserta") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Logbook';
        $data['pengajuanprakerin'] = $this->permohonanprakerin_model->getAll();
        $data['jurnal_prakerin'] = $this->jurnalprakerin_model->getAll();
        $this->load->view("peserta/jurnalprakerin/listjurnalprakerin", $data);
    }

    public function tambahjurnalprakerin()
    {
        $jurnalprakerin = $this->jurnalprakerin_model;
        $validation = $this->form_validation;
        $validation->set_rules($jurnalprakerin->rules());

        if ($validation->run()) {
            $jurnalprakerin->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('peserta/JurnalPRAKERIN');
        }
        $data['title'] = 'Add New Data Logbook ';
        $data['mapel'] = $this->jurnalprakerin_model->getMapel();
        $data['pengajuanprakerin'] = $this->permohonanprakerin_model->getAll();
        $this->load->view("peserta/jurnalprakerin/tambahjurnalprakerin", $data);
    }

    public function getKompetensidasar()
    {
        $id = $this->input->post('id', true);
        $data = $this->jurnalprakerin_model->getKompetensidasar($id);
        echo json_encode($data);
    }

    public function editjurnalprakerin($id = null)
    {
        if (!isset($id)) redirect('peserta/JurnalPRAKERIN');
        $jurnalprakerin = $this->jurnalprakerin_model;
        $validation = $this->form_validation;
        $validation->set_rules($jurnalprakerin->rules());

        if ($validation->run()) {
            $jurnalprakerin->update();
            $this->session->set_flashdata('success', 'Berhasil diubah');
            redirect('peserta/JurnalPRAKERIN');
        }
        $data['title'] = 'Edit Data Logbook';
        $data['mapel'] = $this->jurnalprakerin_model->getMapel();
        $data['pengajuanprakerin'] = $this->permohonanprakerin_model->getAll();
        $data["jurnalprakerin"] = $jurnalprakerin->getId($id);
        if (!$data["jurnalprakerin"]) show_404();
        $this->load->view("peserta/jurnalprakerin/ubahjurnalprakerin", $data);
    }

    public function hapusjurnalprakerin($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->jurnalprakerin_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('peserta/JurnalPRAKERIN');
        }
    }

    public function cetak_jurnal_prakerin($id_peserta = null)
    {
        $this->load->library('pdf');
        $data['jurnal_prakerin'] = $this->jurnalprakerin_model->getData();
        $data['data_jurnal_prakerin'] = $this->jurnalprakerin_model->getById($id_peserta);
        if (!$data["jurnal_prakerin"]) show_error('Tidak ditemukan data', '404', 'Tidak dapat mencetak laporan jurnal PRAKERIN');
        $this->load->view('peserta/jurnalprakerin/cetakjurnalprakerin', $data);
    }

    public function cetak_dokumentasi_jurnal($id_peserta = null)
    {
        $this->load->library('pdf');
        $data['jurnal_prakerin'] = $this->jurnalprakerin_model->getData();
        $data['data_jurnal_prakerin'] = $this->jurnalprakerin_model->getById($id_peserta);
        if (!$data["jurnal_prakerin"]) show_error('Data tidak ditemukan', '404', 'Tidak dapat mencetak laporan jurnal PRAKERIN');
        $this->load->view('peserta/jurnalprakerin/cetakdokumentasi', $data);
    }
}
