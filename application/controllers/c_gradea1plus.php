<?php

class c_gradea1plus extends CI_Controller {

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
        
        $data['gradea1plus'] = $this->m_simoga->view_atu_plus();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_gradea1plus', $data);
        $this->load->view('templates/footer');
    }

    public function excel(){
      $tgl1 = $_GET['filtertgl1'];
      // var_dump($tgl1);
      // die;
      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=GradeA+.xls");
      $data['dataplasma'] = $this->m_simoga->get_a1plus_excel($tgl1);
      $this->load->view('v_export', $data);
    }
}