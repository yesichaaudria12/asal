<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ValidasiJurnalPKL extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin");
        $this->load->model("validasijurnalpkl_model");
        if ($this->admin->is_role() != "pembimbing_mentor") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Validasi Logbook ';
        $data["jurnal_pkl"] = $this->validasijurnalpkl_model->getAll();
        $this->load->view("pembimbingmentor/jurnalpkl/validasijurnalpkl", $data);
    }

    public function editvalidasijurnalpkl($id_jurnal_pkl = null)
    {
        $data['title'] = 'Edit Validasi Logbook';
        if (!isset($id_jurnal_pkl)) redirect('pembimbingmentor/ValidasiJurnalPKL');
        $validasijurnalpkl = $this->validasijurnalpkl_model;
        $validation = $this->form_validation;
        $validation->set_rules($validasijurnalpkl->rules());

        if ($validation->run()) {
            $validasijurnalpkl->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('pembimbingmentor/ValidasiJurnalPKL');
        }

        $data["jurnal_pkl"] = $validasijurnalpkl->getById($id_jurnal_pkl);
        if (!$data["jurnal_pkl"]) show_404();
        $this->load->view("pembimbingmentor/jurnalpkl/editvalidasijurnalpkl", $data);
    }
}
