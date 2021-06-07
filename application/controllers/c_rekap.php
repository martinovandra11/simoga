<?php

class c_rekap extends CI_Controller {

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
        $data['kodekebun'] = $this->m_simoga->get_kebun();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_rekap', $data);
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
                $dura = $plasma['dura'];
                $tenera = $plasma['tenera'];
                $jmh_tbs = $plasma['jumlah_tbs_sample'];
                $a = "";
                $b = "";
                if($jmh_tbs == 0){
                  $a = 0;
                  $b = 0;
                }else{
                  $a = ($dura/$jmh_tbs)*100;
                  $b = ($tenera/$jmh_tbs)*100;
                }
                
                $c = "";
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
                        <td><?php echo round($b,2);?></td>
                        <td><?php echo round($a,2);?></td>
                        <td><?php echo $plasma['grade'];?></td>
                        <td><?php echo $plasma['potongan'];?></td>
                        <td><?php echo $c;?></td>
                        <td><?php echo $plasma['on_create'];?></td>
                        <td>
                        <?php echo anchor('c_rekap/hapus/'.$plasma['id_rekap'], '<div class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                          </div>'); ?>
                        </td>
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

  public function hapus($id){
    $where = array('id_rekap' => $id);
    $this->m_simoga->hapus_data($where, 'sortasi_plasma');

    $data['dataplasma'] = $this->m_simoga->get_all_data();
    $data['kodekebun'] = $this->m_simoga->get_kebun();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('v_rekap', $data);
    $this->load->view('templates/footer');
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

    public function edit($id){
      $data = array(
        'id_rekap' => $id,
        'editdata' => $this->m_simoga->get_by_id($id),
      );

      // var_dump($data);
      // die;

      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('v_edit', $data);
      $this->load->view('templates/footer');
    }

    public function actionedit(){
      $id = htmlspecialchars($this->input->post('id_rekap', true));
      $data = [
        'kode_kebun' => htmlspecialchars($this->input->post('kode_kebun', true)),
        'kode_plasma' => htmlspecialchars($this->input->post('kode_plasma', true)),
        'jenis' => htmlspecialchars($this->input->post('jenis', true)),
        'tanggal' => htmlspecialchars($this->input->post('tanggal', true)),
        'masuk' => htmlspecialchars($this->input->post('jam_masuk', true)),
        'keluar' => htmlspecialchars($this->input->post('jam_keluar', true)),
        'durasi' => htmlspecialchars($this->input->post('durasi', true)),
        'pemasok' => htmlspecialchars($this->input->post('pemasok', true)),
        'nopol' => htmlspecialchars($this->input->post('nopol', true)),
        'supir' => htmlspecialchars($this->input->post('supir', true)),
        'bruto' => htmlspecialchars($this->input->post('bruto', true)),
        'netto' => htmlspecialchars($this->input->post('netto', true)),
        'jumlah_tbs_diterima' => htmlspecialchars($this->input->post('tbs_diterima', true)),
        'tbs_mentah' => htmlspecialchars($this->input->post('tbs_mentah', true)),
        'tbs_tankos' => htmlspecialchars($this->input->post('tbs_tankos', true)),
        'tbs_kecil' => htmlspecialchars($this->input->post('tbs_kecil', true)),
        'jumlah_tbs_diterima' => htmlspecialchars($this->input->post('tbs_sample', true)),
        'tenera' => htmlspecialchars($this->input->post('tenera', true)),
        'dura' => htmlspecialchars($this->input->post('dura', true)),
        'grade' => htmlspecialchars($this->input->post('grade', true)),
        'potongan' => htmlspecialchars($this->input->post('potongan', true)),
        'status' => htmlspecialchars($this->input->post('status', true)),

      ];
      $this->m_simoga->update_rekap($id, $data);
      
      redirect('c_rekap');
    }

    public function export()
    {

      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=Contoh.xls");
      $data['dataplasma'] = $this->m_simoga->get_all_data();
      $this->load->view('v_export', $data);

    }

    public function export_detail_pks()
    {
      $kodekebun = $_GET['namapks'];
      $tgl1 = $_GET['filtertgl1'];
      
      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=Data PKS $kodekebun $tgl1.xls");
      $data['dataplasma'] = $this->m_simoga->export_detail_pks($kodekebun, $tgl1);
      $this->load->view('v_export', $data);
      
    }
}