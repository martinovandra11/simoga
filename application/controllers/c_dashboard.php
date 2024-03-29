<?php

class c_dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('username') == NULL) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Silahkan login terlebih dahulu
                </div>');
      redirect('c_auth');
    }
    $this->load->model('m_simoga');
  }

  public function index()
  {
    if ($this->session->userdata('level') == 0) {
      $data['dataplasma'] = $this->m_simoga->get_data();
      $data['kodekebun'] = array('SGH', 'SGO', 'SPA', 'TPU', 'TME', 'SBT', 'LDA', 'STA', 'TER', 'SIN');
    } else if ($this->session->userdata('level') == 1) {
      $data['dataplasma'] = $this->m_simoga->get_data_sgh();
      $data['kodekebun'] = array('SGH', 'SGO', 'SPA');
    } else if ($this->session->userdata('level') == 2) {
      $data['dataplasma'] = $this->m_simoga->get_data_tpu();
      $data['kodekebun'] = array('TPU', 'TME');
    } else if ($this->session->userdata('level') == 3) {
      $data['dataplasma'] = $this->m_simoga->get_data_sbt();
      $data['kodekebun'] = array('SBT', 'LDA');
    } else if ($this->session->userdata('level') == 4) {
      $data['dataplasma'] = $this->m_simoga->get_data_sta();
      $data['kodekebun'] = array('STA', 'TER', 'SIN');
    }

    // $data['kodekebun'] = $this->m_simoga->get_kebun();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('v_dashboard', $data);
    $this->load->view('templates/footer');
  }

  public function filterkebun()
  {
    $kebun = $_GET['kebun'];

    if ($kebun != '') {
      $data['dataplasma'] = $this->m_simoga->get_kebun_today($kebun);
    } else {
      if ($this->session->userdata('level') == 0) {
        $data['dataplasma'] = $this->m_simoga->get_data();
      } else if ($this->session->userdata('level') == 1) {
        $data['dataplasma'] = $this->m_simoga->get_data_sgh();
      } else if ($this->session->userdata('level') == 2) {
        $data['dataplasma'] = $this->m_simoga->get_data_tpu();
      } else if ($this->session->userdata('level') == 3) {
        $data['dataplasma'] = $this->m_simoga->get_data_sbt();
      } else if ($this->session->userdata('level') == 4) {
        $data['dataplasma'] = $this->m_simoga->get_data_sta();
      }
    }

    if (!empty($data['dataplasma'])) {
      foreach ($data['dataplasma'] as $plasma) : ?>

        <?php

        $warna = "";
        if ($plasma['durasi'] < 20 && $plasma['bruto'] > 5000) {
          $warna = 'background-color: #FF6363; color: #FFFFFFFF;'; // merah
        } else if ($plasma['durasi'] < 20 && $plasma['bruto'] < 5000) {
          $warna = 'background-color: #FFEB9C;'; // kuning
        } else {
          $warna = 'background-color: white;';
        }

        ?>

        <?php
        $a = ($plasma['dura'] / $plasma['jumlah_tbs_sample']) * 100;
        $b = ($plasma['tenera'] / $plasma['jumlah_tbs_sample']) * 100;
        $c = "";
        if ($plasma['status'] == 2) {
          $c = "Data Lengkap";
        } else {
          $c = "Data Timbangan Belum Diisi";
        }
        ?>

        <tr>
          <td><?php echo $plasma['kode_kebun']; ?></td>
          <td><?php echo $plasma['kode_plasma']; ?></td>
          <td><?php echo $plasma['jenis']; ?></td>
          <td><?php echo $plasma['tanggal']; ?></td>
          <td style="<?= $warna ?>"><?php echo $plasma['masuk']; ?></td>
          <td style="<?= $warna ?>"><?php echo $plasma['keluar']; ?></td>
          <td style="<?= $warna ?>"><?php echo $plasma['durasi']; ?></td>
          <td><?php echo $plasma['pemasok']; ?></td>
          <td><?php echo $plasma['nopol']; ?></td>
          <td><?php echo $plasma['supir']; ?></td>
          <td style="<?= $warna ?>"><?php echo number_format($plasma['bruto'], 0, ',', '.'); ?></td>
          <td><?php echo number_format($plasma['netto'], 0, ',', '.'); ?></td>
          <td><?php echo number_format($plasma['jumlah_tbs_diterima'], 0, ',', '.'); ?></td>
          <td><?php echo $plasma['tbs_mentah']; ?></td>
          <td><?php echo $plasma['tbs_tankos']; ?></td>
          <td><?php echo $plasma['tbs_kecil']; ?></td>
          <td><?php echo $plasma['jumlah_tbs_sample']; ?></td>
          <td><?php echo round($b, 2); ?></td>
          <td><?php echo round($a, 2); ?></td>
          <td><?php echo $plasma['grade']; ?></td>
          <td><?php echo $plasma['potongan']; ?></td>
          <td><?php echo $c; ?></td>
          <td><?php echo $plasma['on_create']; ?></td>
        </tr>

      <?php
      endforeach;
    } else {
      ?>

      <tr>
        <td style="text-align:center" colspan='19'>Tidak ada data</td>
      </tr>
<?php
    }
  }

  public function data_kemarin(){
    if ($this->session->userdata('level') == 0) {
      $data['dataplasma'] = $this->m_simoga->get_data_yes();
      $data['kodekebun'] = array('SGH', 'SGO', 'SPA', 'TPU', 'TME', 'SBT', 'LDA', 'STA', 'TER', 'SIN');
    } else if ($this->session->userdata('level') == 1) {
      $data['dataplasma'] = $this->m_simoga->get_data_sghyes();
      $data['kodekebun'] = array('SGH', 'SGO', 'SPA');
    } else if ($this->session->userdata('level') == 2) {
      $data['dataplasma'] = $this->m_simoga->get_data_tpuyes();
      $data['kodekebun'] = array('TPU', 'TME');
    } else if ($this->session->userdata('level') == 3) {
      $data['dataplasma'] = $this->m_simoga->get_data_sbtyes();
      $data['kodekebun'] = array('SBT', 'LDA');
    } else if ($this->session->userdata('level') == 4) {
      $data['dataplasma'] = $this->m_simoga->get_data_stayes();
      $data['kodekebun'] = array('STA', 'TER', 'SIN');
    }

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('v_kemarin',$data);
    $this->load->view('templates/footer');
  }

  public function filterkebun_kemarin(){
    $kebun = $_GET['kebun'];

    if ($kebun != '') {
      $data['dataplasma'] = $this->m_simoga->get_kebun_yesterday($kebun);
    } else {
      if ($this->session->userdata('level') == 0) {
        $data['dataplasma'] = $this->m_simoga->get_data_yes();
      } else if ($this->session->userdata('level') == 1) {
        $data['dataplasma'] = $this->m_simoga->get_data_sghyes();
      } else if ($this->session->userdata('level') == 2) {
        $data['dataplasma'] = $this->m_simoga->get_data_tpuyes();
      } else if ($this->session->userdata('level') == 3) {
        $data['dataplasma'] = $this->m_simoga->get_data_sbtyes();
      } else if ($this->session->userdata('level') == 4) {
        $data['dataplasma'] = $this->m_simoga->get_data_stayes();
      }
    }

    if (!empty($data['dataplasma'])) {
      foreach ($data['dataplasma'] as $plasma) : ?>

        <?php

        $warna = "";
        if ($plasma['durasi'] < 20 && $plasma['bruto'] > 5000) {
          $warna = 'background-color: #FF6363; color: #FFFFFFFF;'; // merah
        } else if ($plasma['durasi'] < 20 && $plasma['bruto'] < 5000) {
          $warna = 'background-color: #FFEB9C;'; // kuning
        } else {
          $warna = 'background-color: white;';
        }

        ?>

        <?php
        $a = ($plasma['dura'] / $plasma['jumlah_tbs_sample']) * 100;
        $b = ($plasma['tenera'] / $plasma['jumlah_tbs_sample']) * 100;
        $c = "";
        if ($plasma['status'] == 2) {
          $c = "Data Lengkap";
        } else {
          $c = "Data Timbangan Belum Diisi";
        }
        ?>

        <tr>
          <td><?php echo $plasma['kode_kebun']; ?></td>
          <td><?php echo $plasma['kode_plasma']; ?></td>
          <td><?php echo $plasma['jenis']; ?></td>
          <td><?php echo $plasma['tanggal']; ?></td>
          <td style="<?= $warna ?>"><?php echo $plasma['masuk']; ?></td>
          <td style="<?= $warna ?>"><?php echo $plasma['keluar']; ?></td>
          <td style="<?= $warna ?>"><?php echo $plasma['durasi']; ?></td>
          <td><?php echo $plasma['pemasok']; ?></td>
          <td><?php echo $plasma['nopol']; ?></td>
          <td><?php echo $plasma['supir']; ?></td>
          <td style="<?= $warna ?>"><?php echo number_format($plasma['bruto'], 0, ',', '.'); ?></td>
          <td><?php echo number_format($plasma['netto'], 0, ',', '.'); ?></td>
          <td><?php echo number_format($plasma['jumlah_tbs_diterima'], 0, ',', '.'); ?></td>
          <td><?php echo $plasma['tbs_mentah']; ?></td>
          <td><?php echo $plasma['tbs_tankos']; ?></td>
          <td><?php echo $plasma['tbs_kecil']; ?></td>
          <td><?php echo $plasma['jumlah_tbs_sample']; ?></td>
          <td><?php echo round($b, 2); ?></td>
          <td><?php echo round($a, 2); ?></td>
          <td><?php echo $plasma['grade']; ?></td>
          <td><?php echo $plasma['potongan']; ?></td>
          <td><?php echo $c; ?></td>
          <td><?php echo $plasma['on_create']; ?></td>
        </tr>

      <?php
      endforeach;
    } else {
      ?>

      <tr>
        <td style="text-align:center" colspan='19'>Tidak ada data</td>
      </tr>
<?php
    }
  }
}
