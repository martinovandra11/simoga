<?php

class c_dashboard2 extends CI_Controller {

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
          $data['countgrading'] = $this->m_simoga->count_grading();
          $data['countgradinginfo'] = $this->m_simoga->count_gradinginfo();
          $data['dualima'] = $this->m_simoga->count_dualima();
          $data['limaton'] = $this->m_simoga->countlebih_limaton();
          $data['duapuluh'] = $this->m_simoga->countkurang_duapuluh();
          $data['hariini'] = $this->m_simoga->count_today();
          $data['bulanini'] = $this->m_simoga->count_mounth();
          $data['rekap'] = $this->m_simoga->count_alldata();
          $data['hitung1'] = $this->m_simoga->count_bagian1();
          $data['hitung2'] = $this->m_simoga->count_bagian2();
          $data['jumlahbruto'] = $this->m_simoga->sum_bruto();
          $data['jumlahnetto'] = $this->m_simoga->sum_netto();
          $data['jumlahbruto_today'] = $this->m_simoga->sum_bruto_today();
          $data['jumlahnetto_today'] = $this->m_simoga->sum_netto_today();
          $data['allgrade'] = $this->m_simoga->all_grade();
          //grade
          $data['aplus'] = $this->m_simoga->atu_plus();
          $data['gradea'] = $this->m_simoga->grade_a();
          $data['gradea1'] = $this->m_simoga->grade_a1();
          $data['gradea2'] = $this->m_simoga->grade_a2();
          $data['gradeaplus'] = $this->m_simoga->grade_aplus();
          $data['gradea3'] = $this->m_simoga->grade_a3();
          $data['gradepls'] = $this->m_simoga->grade_pls();
          $data['gradeB'] = $this->m_simoga->grade_B();
          $data['gradeAlpha'] = $this->m_simoga->grade_Apha();
          $data['gradePlsa'] = $this->m_simoga->grade_plsa();
          $data['gradeApls'] = $this->m_simoga->grade_apls();
          $this->load->view('templates/header');
          $this->load->view('templates/sidebar');
          $this->load->view('v_dashboard2', $data);
          $this->load->view('templates/footer');
     }

}