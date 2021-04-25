<?php

class c_gradinginfo extends CI_Controller {

    public function index()
    {
        // $tgl = date("Y-m-d");
        $data['datagrading'] = $this->m_simoga->grading_info();
     //    $data['datagrade'] = $this->m_simoga->list_grading();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_gradinginfo', $data);
        $this->load->view('templates/footer');
    }
}