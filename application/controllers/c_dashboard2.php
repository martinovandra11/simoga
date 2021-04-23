<?php

class c_dashboard2 extends CI_Controller {

    public function index()
     {
          $data['duapuluh'] = $this->m_simoga->countkurang_duapuluh();
          $data['hariini'] = $this->m_simoga->count_today();
          $data['bulanini'] = $this->m_simoga->count_mounth();
          $this->load->view('templates/header');
          $this->load->view('templates/sidebar');
          $this->load->view('v_dashboard2', $data);
          $this->load->view('templates/footer');
     }

}