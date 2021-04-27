<?php

class c_dashboard2 extends CI_Controller {

    public function index()
     {
          $data['dualima'] = $this->m_simoga->count_dualima();
          $data['limaton'] = $this->m_simoga->countlebih_limaton();
          $data['duapuluh'] = $this->m_simoga->countkurang_duapuluh();
          $data['hariini'] = $this->m_simoga->count_today();
          $data['bulanini'] = $this->m_simoga->count_mounth();
          $data['rekap'] = $this->m_simoga->count_alldata();
          $this->load->view('templates/header');
          $this->load->view('templates/sidebar');
          $this->load->view('v_dashboard2', $data);
          $this->load->view('templates/footer');
     }

}