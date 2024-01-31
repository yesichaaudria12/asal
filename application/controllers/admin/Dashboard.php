<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin');
        $this->load->model('pengajuanpkl_model');
        if ($this->admin->is_role() != "admin_pkl") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['total_pengajuan'] = $this->pengajuanpkl_model->getTotalPengajuan();
        $data['total_peserta'] = $this->pengajuanpkl_model->getTotalPeserta();
        $data['peserta_belum_mengajukan'] = $this->pengajuanpkl_model->getTotalPesertaBelumMengajukan();
        $data['peserta_sudah_mengajukan'] = $this->pengajuanpkl_model->getTotalPesertaSudahMengajukan();
        $data['belum_tervalidasi'] = $this->pengajuanpkl_model->getBelumTervalidasi();
        $data['proses_pengajuan'] = $this->pengajuanpkl_model->getProsesPengajuan();
        $data['diterima'] = $this->pengajuanpkl_model->getDiterima();
        $data['ditolak'] = $this->pengajuanpkl_model->getDitolak();
        $this->load->view("admin/dashboard", $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
