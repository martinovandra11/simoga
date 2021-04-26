<?php

class c_dashboard extends CI_Controller {

    public function index()
    {
        // $tgl = date("Y-m-d");
        $data['dataplasma'] = $this->m_simoga->get_data();
        $data['kodekebun'] = $this->m_simoga->get_kebun();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function filterkebun()
    {
        $kebun = $_GET['kebun'];

        if($kebun != ''){
            $data['dataplasma'] = $this->m_simoga->get_kebun_today($kebun);
        }else{
            $data['dataplasma'] = $this->m_simoga->get_data();
        }

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
                  <td><?php echo $plasma['catatan'];?></td>
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