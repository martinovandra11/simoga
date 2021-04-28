<?php

class c_dualima extends CI_Controller {

    public function __construct()
  {
      parent::__construct();

      if($this->session->userdata('username') != 'admin')
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Silahkan login terlebih dahulu
                </div>');
                redirect('c_auth');
        }
        $this->load->model('m_simoga');
      }

    public function index()
    {
        $data['dualima'] = $this->m_simoga->dualima();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_dualima', $data);
        $this->load->view('templates/footer');
    }
}