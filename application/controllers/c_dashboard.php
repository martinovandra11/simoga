<?php

class c_dashboard extends CI_Controller {

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_dashboard');
        $this->load->view('templates/footer');
    }

}