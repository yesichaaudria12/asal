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
		$data["title"] = "MY PROFILE";

        // Jika data profil tidak ditemukan, tampilkan error 404
        if (!$data['user_profile']) {
            show_404();
        }

        // Mengirim data profil ke tampilan myprofile.php
        $this->load->view("profile/MyProfile", $data);
    }

    public function profile()
    {
        $datapengguna = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($datapengguna->rules());

        if ($validation->run()) {
            $datapengguna->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/Akun');
        }
        $data['title'] = 'Tambah Data pengguna';
        $this->load->view("admin/datapengguna/daftarpengguna", $data);
    }

    public function editdataprofile($id = null)
    {

        if (!isset($id)) redirect('admin/Akun');
        $datapengguna = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($datapengguna->rules());

        if ($validation->run()) {
            $datapengguna->update();
            $this->session->set_flashdata('success', 'Berhasil diubah');
            redirect('admin/Akun');
        }
        $data['title'] = 'Edit Data Prakerin';
        $data["profile"] = $datapengguna->getById($id);
        if (!$data["profile"]) show_404();
        $this->load->view("profile/myprofile", $data);
    }

    public function hapusdataprofile($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->datapeserta_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('admin/Akun');
        }
    }
}
