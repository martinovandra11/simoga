<?php

class c_bulanini extends CI_Controller {

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
        $data['dataplasma'] = $this->m_simoga->bulan_ini();
        $data['kodekebun'] = $this->m_simoga->get_kebun();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_bulanini', $data);
        $this->load->view('templates/footer');
    }

    public function rentang(){
        $tgl1 = $_GET['filtertgl1'];
        $tgl2 = $_GET['filtertgl2'];
        $kbn = $_GET['filterkebun'];

        if($tgl1 != '' && $tgl2 != '' && $kbn != '')
        {
            $data['dataplasma'] = $this->m_simoga->filter_all($tgl1, $tgl2, $kbn);
        }
        elseif($tgl1 != '' && $tgl2 != '') 
        {
            $data['dataplasma'] = $this->m_simoga->filter_rentang($tgl1, $tgl2);
        }
        elseif($kbn != '')
        {
            $data['dataplasma'] = $this->m_simoga->filter_kebun($kbn);
        }
        elseif($tgl1 != '')
        {;
            $data['dataplasma'] = $this->m_simoga->filterentang_tgl1($tgl1);
        }
        elseif($tgl2 != '')
        { 
            $data['dataplasma'] = $this->m_simoga->filterentang_tgl2($tgl2);
        }
        else
        {
            $data['dataplasma'] = $this->m_simoga->bulan_ini();
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
                  $c ="";
                  if($plasma['status'] == 2){
                    $c = "Data Lengkap";
                  }else{
                    $c = "Data Timbangan Belum Diisi";
                  }
                ?>

                <tr>
                  <td><?php echo $plasma['kode_kebun'];?></td>
                  <td><?php echo $plasma['kode_plasma'];?></td>
                  <td><?php echo $plasma['jenis'];?></td>
                  <td><?php echo $plasma['tanggal'];?></td>
                  <td style="<?= $warna ?>"><?php echo $plasma['masuk'];?></td>
                  <td style="<?= $warna ?>"><?php echo $plasma['keluar'];?></td>
                  <td style="<?= $warna ?>"><?php echo $plasma['durasi'];?></td>
                  <td><?php echo $plasma['pemasok'];?></td>
                  <td><?php echo $plasma['nopol'];?></td>
                  <td><?php echo $plasma['supir'];?></td>
                  <td style="<?= $warna ?>"><?php echo number_format($plasma['bruto'], 0, ',','.');?></td>
                  <td><?php echo number_format($plasma['netto'], 0, ',','.');?></td>
                  <td><?php echo number_format($plasma['jumlah_tbs_diterima'], 0, ',','.');?></td>
                  <td><?php echo $plasma['tbs_mentah'];?></td>
                  <td><?php echo $plasma['tbs_tankos'];?></td>
                  <td><?php echo $plasma['tbs_kecil'];?></td>
                  <td><?php echo $plasma['jumlah_tbs_sample'];?></td>
                  <td><?php echo $b;?></td>
                  <td><?php echo $a;?></td>
                  <td><?php echo $plasma['grade'];?></td>
                  <td><?php echo $plasma['potongan'];?></td>
                  <td><?php echo $c;?></td>
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

    public function export()
    {
      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=Contoh.xls");

      $data['dataplasma'] = $this->m_simoga->bulan_ini();
      $this->load->view('v_export', $data);

    }

}