<?php

class c_bulanini extends CI_Controller {


  public function __construct()
  {
      parent::__construct();

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

        
        // die(var_dump($));

        // die(var_dump($data['dataplasma']));

        if(!empty($data['dataplasma'])){
            foreach ($data['dataplasma'] as $plasma) : ?>

                <?php

                $warna = "";
                if($plasma['durasi'] < 20 && $plasma['bruto'] >= 5000)
                {
                  $warna = 'background-color: #E94B3CFF ; color: #FFFFFFFF;'; // orange
                }
                else if($plasma['durasi'] < 20)
                {
                  $warna = 'background-color: #FF7F50; ; color: #FFFFFFFF;'; // merah
                }
                else
                {
                  $warna = 'background-color: white;';
                }

                ?>

                <tr style="<?= $warna ?>">
                  <td><?php echo $plasma['kode_kebun'];?></td>
                  <td><?php echo $plasma['kode_plasma'];?></td>
                  <td><?php echo $plasma['jenis'];?></td>
                  <td><?php echo $plasma['tanggal'];?></td>
                  <td><?php echo $plasma['masuk'];?></td>
                  <td><?php echo $plasma['keluar'];?></td>
                  <td><?php echo $plasma['durasi'];?></td>
                  <td><?php echo $plasma['pemasok'];?></td>
                  <td><?php echo $plasma['nopol'];?></td>
                  <td><?php echo $plasma['supir'];?></td>
                  <td><?php echo $plasma['bruto'];?></td>
                  <td><?php echo $plasma['netto'];?></td>
                  <td><?php echo $plasma['jumlah_tbs_diterima'];?></td>
                  <td><?php echo $plasma['tbs_mentah'];?></td>
                  <td><?php echo $plasma['tbs_tankos'];?></td>
                  <td><?php echo $plasma['tbs_kecil'];?></td>
                  <td><?php echo $plasma['jumlah_tbs_sample'];?></td>
                  <td><?php echo $plasma['tenera'];?></td>
                  <td><?php echo $plasma['dura'];?></td>
                  <td><?php echo $plasma['grade'];?></td>
                  <td><?php echo $plasma['potongan'];?></td>
                  <td><?php echo $plasma['status'];?></td>
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

    // public function excel()
    // {
    //   $data['dataplasma'] = $this->m_simoga->bulan_ini();
      
    //   require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
    //   require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

    //   $object = new PHPExcel();
    //   $object->getProperties()->setCreator("SIMOGA");
    //   $object->getProperties()->setLastModifiedBy("SIMOGA");
    //   $object->getProperties()->setTitle("LAPORAN BULANAN");

    //   $object->setActiveSheetIndex(0);

    //   $object->getActiveSheet()->setCellValue('A1:A2','Kode Kebun');
    //   $object->getActiveSheet()->setCellValue('B1:B2','Kode Plasma');
    //   $object->getActiveSheet()->setCellValue('C1:C2','Jenis');
    //   $object->getActiveSheet()->setCellValue('D1:D2','Tanggal');
    //   $object->getActiveSheet()->setCellValue('E1:G1','Data Lama Bongkar');

    // }

    public function export()
    {
      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=Contoh.csv");

      $data['dataplasma'] = $this->m_simoga->bulan_ini();
      $this->load->view('v_export', $data);

    }

}