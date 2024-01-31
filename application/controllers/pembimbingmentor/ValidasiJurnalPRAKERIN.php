<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ValidasiJurnalPRAKERIN extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin");
        $this->load->model("validasijurnalprakerin_model");
        if ($this->admin->is_role() != "pembimbing_mentor") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Validasi Logbook ';
        $data["jurnal_prakerin"] = $this->validasijurnalprakerin_model->getAll();
        $this->load->view("pembimbingmentor/jurnalprakerin/validasijurnalprakerin", $data);
    }

    public function editvalidasijurnalprakerin($id_jurnal_prakerin = null)
    {
        $data['title'] = 'Edit Validasi Logbook';
        if (!isset($id_jurnal_prakerin)) redirect('pembimbingmentor/ValidasiJurnalPRAKERIN');
        $validasijurnalprakerin = $this->validasijurnalprakerin_model;
        $validation = $this->form_validation;
        $validation->set_rules($validasijurnalprakerin->rules());

        if ($validation->run()) {
            $validasijurnalprakerin->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('pembimbingmentor/ValidasiJurnalPRAKERIN');
        }

        $data["jurnal_prakerin"] = $validasijurnalprakerin->getById($id_jurnal_prakerin);
        if (!$data["jurnal_prakerin"]) show_404();
        $this->load->view("pembimbingmentor/jurnalprakerin/editvalidasijurnalprakerin", $data);
    }
}
