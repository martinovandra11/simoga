<?php

class c_bagian2 extends CI_Controller {

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
        
        $data['bagian2'] = $this->m_simoga->bagian2();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_bagian2', $data);
        $this->load->view('templates/footer');
    }
}