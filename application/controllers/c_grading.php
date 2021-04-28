<?php

class c_grading extends CI_Controller {

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
        $data['dataplasma'] = $this->m_simoga->get_all_data();
        $data['datagrade'] = $this->m_simoga->list_grading();
        $data['kodekebun'] = $this->m_simoga->get_kebun();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_grading', $data);
        $this->load->view('templates/footer');
    }

    public function filtering(){
         $filter = $_GET['grade'];
         $kbn = $_GET['kodekebun'];
        //  die(var_dump($kbn));

         if($filter != '' && $kbn != '')
         {
            $data['dataplasma'] = $this->m_simoga->filter_grading_kebun($filter, $kbn);
         }
         elseif($filter != '')
         {
            $data['dataplasma'] = $this->m_simoga->filter_grading($filter);
         }
         elseif($kbn != '')
         {
            $data['dataplasma'] = $this->m_simoga->filter_kebun1($kbn);
            // die(var_dump($kbn));
         }
         else
         {
            $data['dataplasma'] = $this->m_simoga->get_all_data();
         }


         if(!empty($data['dataplasma'])){
              foreach ($data['dataplasma'] as $plasma) : ?>

              <?php
              $warna = "";
              if($plasma['durasi'] < 20 && $plasma['bruto'] > 5000)
              {
                $warna = 'background-color: #FF6363; color: #FFFFFFFF;'; // merah
              }
              else if($plasma['durasi'] < 20 && $plasma['bruto'] < 5000)
              {
                $warna = 'background-color: #FFEB9C;'; // kuning
              }
              else
              {
                $warna = 'background-color: white;';
              }

              ?>
              
              <?php
                $a = ($plasma['dura']/$plasma['jumlah_tbs_sample'])*100;
                $b = ($plasma['tenera']/$plasma['jumlah_tbs_sample'])*100;
              ?>

              <tr>
                <td><?php echo $plasma['kode_kebun'];?></td>
                <td><?php echo $plasma['kode_plasma'];?></td>
                <td><?php echo $plasma['tanggal'];?></td>
                <td><?php echo $plasma['pemasok'];?></td>
                <td><?php echo number_format($plasma['jumlah_tbs_diterima'], 0, ',','.');?></td>
                <td><?php echo $plasma['jumlah_tbs_sample'];?></td>
                <td><?php echo $b;?></td>
                <td><?php echo $a;?></td>
                <td><?php echo $plasma['grade'];?></td>
                <td><?php echo $plasma['potongan'];?></td>
                <td><?php echo $plasma['on_create'];?></td>
              </tr>

            <?php
            endforeach;
              }
              else
              {
            ?>

              <tr>
                  <td style="text-align:center" colspan='19'>Tidak ada data</td>
              </tr>
              <?php
         }
    }
}