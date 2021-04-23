<?php

class c_duapuluh extends CI_Controller {

    public function index()
    {
        // $tgl = date("Y-m-d");
        $data['duapuluh'] = $this->m_simoga->kurang_duapuluh();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_duapuluh', $data);
        $this->load->view('templates/footer');
    }

}