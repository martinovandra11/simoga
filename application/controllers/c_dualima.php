<?php

class c_dualima extends CI_Controller {

    public function index()
    {
        $data['dualima'] = $this->m_simoga->dualima();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_dualima', $data);
        $this->load->view('templates/footer');
    }
}