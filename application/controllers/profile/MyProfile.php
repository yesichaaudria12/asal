<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyProfile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function update_profile()
    {
        // Validate form input
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        if ($this->form_validation->run() === FALSE) {
            // Validation failed, reload the profile page with validation errors
            $this->showProfile();
        } else {
            // Validation passed, update the user profile
            $user_id = $this->session->userdata('id');
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $email = $this->input->post('email');

            // Call the method in your user_model to update the profile
            $update_result = $this->user_model->updateProfile($user_id, $name, $username, $email);


            if ($update_result) {
                // Update successful, set a success flash message
                $this->session->set_flashdata('success', 'Berhasil diubah!');
            } else {
                // Update failed, set an error flash message
                $this->session->set_flashdata('success', 'Failed to update profile. Please try again.');
            }

            // Redirect to the profile page
            redirect('profile/MyProfile/showprofile');
        }
    }

    public function showProfile()
    {
        // You can implement the logic for displaying the profile page here
        // Make sure to load necessary data and views
        $data['user_profile'] = $this->user_model->getById($this->session->userdata('id'));
        $data['title'] = "Profil Saya";
        $this->load->view("profile/myprofile",  $data);
    }
}