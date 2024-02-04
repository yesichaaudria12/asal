<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyProfile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model yang diperlukan
        $this->load->model("user_model");
        // Load library-session
        $this->load->library('session');
    }

    public function showprofile()
    {
		$user_id = $this->session->userdata('id');
		// Mengambil data profil pengguna berdasarkan ID pengguna
        $data['user_profile'] = $this->user_model->getById($user_id);
		$data["title"] = "My Profile";

        // Jika data profil tidak ditemukan, tampilkan error 404
        if (!$data['user_profile']) {
            show_404();
        }

        // Mengirim data profil ke tampilan myprofile.php
        $this->load->view("profile/myprofile", $data);
    }

    public function daftarprofil()
    {
        // Implementasi fungsi daftarprofil
    }

    public function editdataprofil($id = null)
    {
        // Implementasi fungsi editdataprofil
    }

    public function hapusdataprofil($id = null)
    {
        // Implementasi fungsi hapusdataprofil
    }
}