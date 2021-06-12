<?php

class c_duapuluh extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('username') == NULL) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Silahkan login terlebih dahulu
                </div>');
      redirect('c_auth');
    }
    $this->load->model('m_simoga');
  }

  public function index()
  {
    if ($this->session->userdata('level') == 0) {
      $data['duapuluh'] = $this->m_simoga->kurang_duapuluh();
    } elseif ($this->session->userdata('level') == 1) {
      $data['duapuluh'] = $this->m_simoga->kurang_duapuluh_sgh();
    } elseif ($this->session->userdata('level') == 2) {
      $data['duapuluh'] = $this->m_simoga->kurang_duapuluh_tpu();
    } elseif ($this->session->userdata('level') == 3) {
      $data['duapuluh'] = $this->m_simoga->kurang_duapuluh_sbt();
    } elseif ($this->session->userdata('level') == 4) {
      $data['duapuluh'] = $this->m_simoga->kurang_duapuluh_sta();
    }
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('v_duapuluh', $data);
    $this->load->view('templates/footer');
  }
}
