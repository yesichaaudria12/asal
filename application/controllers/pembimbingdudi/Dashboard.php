<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin');
        if ($this->admin->is_role() != "pembimbing_dudi") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view("pembimbingdudi/dashboard", $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}