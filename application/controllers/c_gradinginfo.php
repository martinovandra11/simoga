<?php

class c_gradinginfo extends CI_Controller {

    public function __construct()
  {
      parent::__construct();

      if($this->session->userdata('username') != 'admin')
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Silahkan login terlebih dahulu
                </div>');
                redirect('c_auth');
        }
        $this->load->model('m_simoga');
      }

    public function index()
    {
        // $tgl = date("Y-m-d");
        $data['datagrading'] = $this->m_simoga->grading_info();
        $data['dt_grade'] = $this->m_simoga->grading_info_dropdown();
        $data['dt_grade2'] = $this->m_simoga->grading_info_dropdown2();
     //    $data['datagrade'] = $this->m_simoga->list_grading();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_gradinginfo', $data);
        $this->load->view('templates/footer');
    }

    public function load_filter(){

        
            $grd = $_GET['grade'];
            $kebun = $_GET['pks'];

            if($grd != '' && $kebun != ''){
                $data['datagrading'] = $this->m_simoga->kbn_grd($grd, $kebun);
            }
            // elseif($kebun = '')
            // {
            //     $data['datagrading'] = $this->m_simoga->filter_pks($kebun);
            // }
            elseif($grd != '')
            {
                $data['datagrading'] = $this->m_simoga->filter_grade($grd);
            }
            elseif($kebun != '')
            {
                $data['datagrading'] = $this->m_simoga->filter_pks($kebun);
            }
            // elseif($grd = '')
            // {
            //     $data['datagrading'] = $this->m_simoga->filter_grade($grd);
            // }
            // elseif($grd = '' && $kebun = ''){
            //     $data['datagrading'] = $this->m_simoga->grading_info();
            // }
            
            else{
                $data['datagrading'] = $this->m_simoga->grading_info();
            }

            if(!empty($data['datagrading'])){
                foreach ($data['datagrading'] as $plasma) : ?>

                    <tr>
                        <td><?php echo $plasma['id_grade'];?></td>
                        <td><?php echo $plasma['grade'];?></td>
                        <td><?php echo $plasma['unit'];?></td>
                        <td><?php echo $plasma['tenera_min'];?></td>
                        <td><?php echo $plasma['tenera_max'];?></td>
                        <td><?php echo $plasma['dura_min'];?></td>
                        <td><?php echo $plasma['dura_max'];?></td>    
                    </tr>
                <?php endforeach;
                }else{
                ?>

                <tr>
                    <td style="text-align:center" colspan='19'>Tidak ada data</td>
                </tr>   
                <?php
            }
        }  
    }