<?php

class c_dashboard extends CI_Controller {

    public function index()
    {
        // $tgl = date("Y-m-d");
        $data['dataplasma'] = $this->m_simoga->get_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_dashboard', $data);
        $this->load->view('templates/footer');
    }

}