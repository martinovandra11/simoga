<?php

class c_limaton extends CI_Controller {

    public function index()
    {
        $data['limaton'] = $this->m_simoga->lebih_limaton();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_limaton', $data);
        $this->load->view('templates/footer');
    }
}