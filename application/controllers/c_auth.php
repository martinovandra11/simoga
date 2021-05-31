<?php

class c_auth extends CI_Controller
{

    public function construct()
    {
        parent::__construct();
        $this->load->model("m_auth");
        $this->load->library("form_validation");
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username is required']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password is required']);

        // if ($this->session->userdata('level') != NULL) {
        //     redirect(site_url('c_dashboard2'));
        // }

        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post()) {
                $user = $this->m_auth->cek_login($_POST['username'], $_POST['password']);

                if ($user != NULL) {
                    $this->session->set_userdata('id', $user->id);
                    $this->session->set_userdata('username', $user->username);
                    $this->session->set_userdata('level', $user->level);
                    redirect(site_url('c_dashboard2'));
                    return true;
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                Username atau Password Salah
                                                                </div>');
                    $this->load->view('templates/header');
                    $this->load->view('v_login');
                }
                return false;
            }
        } else {
            $this->load->view('templates/header');
            $this->load->view('v_login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('c_auth'));
    }
}
