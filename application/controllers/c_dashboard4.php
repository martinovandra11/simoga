<?php

class c_dashboard4 extends CI_Controller
{

     public function __construct(){
          parent::__construct();

          if ($this->session->userdata('username') == NULL) {
               $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Silahkan login terlebih dahulu
                </div>');
               redirect('c_auth');
          }
          $this->load->model('m_simoga');
     }

     public function index(){
          $data['kodekebun'] = $this->m_simoga->get_kebun();
          $this->load->view('templates/header');
          $this->load->view('templates/sidebar');
          $this->load->view('v_dashboard4',$data);
          $this->load->view('templates/footer');
     }

     public function lihat(){
          $tgl1 = $_GET['tglmulai'];
          $tgl2 = $_GET['tglakhir'];
          $kebun = $_GET['kodekebun'];

          $data['tglmulai'] = $tgl1;
          $data['tglakhir'] = $tgl2;
          $data['kodekebun2'] = $kebun;
          
          $data['databeli2'] = $this->m_simoga->count_pembelian2_pihak3($tgl1, $tgl2, $kebun);
          $data['databeli'] = $this->m_simoga->count_pembelian2($tgl1, $tgl2, $kebun);

          $data['tabelbeli'] = $this->m_simoga->tabel_pemebelian($tgl1, $tgl2, $kebun);
          $data['tabelbeli2'] = $this->m_simoga->tabel_pemebelian2($tgl1, $tgl2, $kebun);
          $data['kodekebun'] = $this->m_simoga->get_kebun();
          
          //grafik grade
          $data['A1'] = $this->m_simoga->grafikA1($tgl1, $tgl2, $kebun);
          $this->load->view('templates/header');
          $this->load->view('templates/sidebar');
          $this->load->view('v_dashboard4_detail',$data);
          $this->load->view('templates/footer');
     }
}