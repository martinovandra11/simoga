<?php

class c_dashboard2 extends CI_Controller
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
          $data['countgrading'] = $this->m_simoga->count_grading();
          $data['countgradinginfo'] = $this->m_simoga->count_gradinginfo();

          //data_tonase_kemarin
          $data['jumlahtrip_yes'] = $this->m_simoga->trip_yes();
          $data['jumlahbruto_yes'] = $this->m_simoga->sum_bruto_yes();
          $data['jumlahnetto_yes'] = $this->m_simoga->sum_netto_yes();

          //laporan bongkar bulan ini
          $data['dualima'] = $this->m_simoga->count_dualima();
          $data['limaton'] = $this->m_simoga->countlebih_limaton();
          $data['duapuluh'] = $this->m_simoga->countkurang_duapuluh();
          $data['sumbruto'] = $this->m_simoga->sumbruto_bulanini();
          $data['sumnetto'] = $this->m_simoga->sumnetto_bulanini();
          $data['sumbruto2'] = $this->m_simoga->sumbruto2_hariini();
          $data['sumnetto2'] = $this->m_simoga->sumnetto2_bulanini();

          //Laporan Bongkar Hari Ini
          $data['sumbruto_today'] = $this->m_simoga->sumbruto_hariini();
          $data['sumnetto_today'] = $this->m_simoga->sumnetto_hariini();
          $data['sumbruto2_today'] = $this->m_simoga->sumbruto2_hariini();
          $data['sumnetto2_today'] = $this->m_simoga->sumnetto2_hariini();

          $data['hariini'] = $this->m_simoga->count_today();
          $data['bulanini'] = $this->m_simoga->count_mounth();
          $data['rekap'] = $this->m_simoga->count_alldata();
          $data['hitung1'] = $this->m_simoga->count_bagian1();
          $data['hitung2'] = $this->m_simoga->count_bagian2();
          $data['jumlahbruto'] = $this->m_simoga->sum_bruto();
          $data['jumlahnetto'] = $this->m_simoga->sum_netto();
          $data['jumlahbruto_today'] = $this->m_simoga->sum_bruto_today();
          $data['jumlahnetto_today'] = $this->m_simoga->sum_netto_today();
          $data['allgrade'] = $this->m_simoga->sum_netto();

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

          //garde_today
          $data['aplus_today'] = $this->m_simoga->atu_plus_today();
          $data['gradea_today'] = $this->m_simoga->grade_a_today();
          $data['gradea1_today'] = $this->m_simoga->grade_a1_today();
          $data['gradea2_today'] = $this->m_simoga->grade_a2_today();
          $data['gradeaplus_today'] = $this->m_simoga->grade_aplus_today();
          $data['gradea3_today'] = $this->m_simoga->grade_a3_today();
          $data['gradepls_today'] = $this->m_simoga->grade_pls_today();
          $data['gradeB_today'] = $this->m_simoga->grade_B_today();
          $data['gradeAlpha_today'] = $this->m_simoga->grade_Apha_today();
          $data['gradePlsa_today'] = $this->m_simoga->grade_plsa_today();
          $data['gradeApls_today'] = $this->m_simoga->grade_apls_today();

          //grade_netto_today
          $data['aplus_netto'] = $this->m_simoga->atu_plus_netto();
          $data['gradea_netto'] = $this->m_simoga->grade_a_netto();
          $data['gradea1_netto'] = $this->m_simoga->grade_a1_netto();
          $data['gradea2_netto'] = $this->m_simoga->grade_a2_netto();
          $data['gradeaplus_netto'] = $this->m_simoga->grade_aplus_netto();
          $data['gradea3_netto'] = $this->m_simoga->grade_a3_netto();
          $data['gradepls_netto'] = $this->m_simoga->grade_pls_netto();
          $data['gradeB_netto'] = $this->m_simoga->grade_B_netto();
          $data['gradeAlpha_netto'] = $this->m_simoga->grade_Apha_netto();
          $data['gradePlsa_netto'] = $this->m_simoga->grade_plsa_netto();
          $data['gradeApls_netto'] = $this->m_simoga->grade_apls_today();

          //Data Per PKS
          $data['pks'] = $this->m_simoga->pks();

          $this->load->view('templates/header');
          $this->load->view('templates/sidebar');
          $this->load->view('v_dashboard2', $data);
          $this->load->view('templates/footer');
     }


     public function detail($nama){
          $data['detail'] = $this->m_simoga->detail_pks($nama);

          $this->load->view('templates/header');
          $this->load->view('templates/sidebar');
          $this->load->view('v_detailpks', $data);
          $this->load->view('templates/footer');
     }
}
