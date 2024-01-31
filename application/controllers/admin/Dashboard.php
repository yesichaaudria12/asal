<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin');
        $this->load->model('pengajuanprakerin_model');
        if ($this->admin->is_role() != "admin_prakerin") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['total_pengajuan'] = $this->pengajuanprakerin_model->getTotalPengajuan();
        $data['total_peserta'] = $this->pengajuanprakerin_model->getTotalPeserta();
        $data['peserta_belum_mengajukan'] = $this->pengajuanprakerin_model->getTotalPesertaBelumMengajukan();
        $data['peserta_sudah_mengajukan'] = $this->pengajuanprakerin_model->getTotalPesertaSudahMengajukan();
        $data['belum_tervalidasi'] = $this->pengajuanprakerin_model->getBelumTervalidasi();
        $data['proses_pengajuan'] = $this->pengajuanprakerin_model->getProsesPengajuan();
        $data['diterima'] = $this->pengajuanprakerin_model->getDiterima();
        $data['ditolak'] = $this->pengajuanprakerin_model->getDitolak();
        $this->load->view("admin/dashboard", $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
