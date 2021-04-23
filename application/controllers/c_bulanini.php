<?php

class c_bulanini extends CI_Controller {

    public function index()
    {
        // $tgl = date("Y-m-d");
        $data['dataplasma'] = $this->m_simoga->bulan_ini();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_bulanini', $data);
        $this->load->view('templates/footer');
    }

}