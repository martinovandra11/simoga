<div class="table-responsive">

            <table class="table table-hover table-bordered nowrap" border="1" id="table-1">
  

              <thead class="table-success">
                <tr>
                  <th class="align-middle text-center" rowspan="2">Kode Kebun</th>
                  <th class="align-middle text-center" rowspan="2">Kode Plasma</th>
                  <th class="align-middle text-center" rowspan="2">Jenis</th>
                  <th class="align-middle text-center" rowspan="2">Tanggal</th>
                  <th class="text-center" colspan="3">Data Lama Bongkar</th>
                  <th class="align-middle text-center" rowspan="2">Pemasok</th>
                  <th class="align-middle text-center" rowspan="2">No Polisi</th>
                  <th class="align-middle text-center" rowspan="2">Supir</th>
                  <th class="text-center" colspan="2">Tonase</th>
                  <th class="align-middle text-center" rowspan="2">Jumlah TBS diterima</th>
                  <th class="text-center" colspan="3">TBS yang dipulangkan</th>
                  <th class="text-center" colspan="4">Data Grading</th>
                  <th class="align-middle text-center" rowspan="2">Potongan</th>
                  <th class="align-middle text-center" rowspan="2">Status</th>
                  <th class="align-middle text-center" rowspan="2">Dibuat</th>
                </tr>
                <tr>
                  <th class="text-center">Jam Masuk</th>
                  <th class="text-center">Jam Keluar</th>
                  <th class="text-center">Durasi</th>
                  <th class="text-center">Bruto</th>
                  <th class="text-center">Netto</th>
                  <th class="text-center">TBS Mentah</th>
                  <th class="text-center">TBS Tankos</th>
                  <th class="text-center">TBS Kecil</th>
                  <th class="text-center">Jumlah TBS Sample</th>
                  <th class="text-center">Tenera</th>
                  <th class="text-center">Dura</th>
                  <th class="text-center">Grade</th>
                </tr>
              </thead>
                
              <tbody>

                <?php 

                if(empty($dataplasma)) { ?>
                <tr><td style="text-align:center" colspan='19'>Tidak ada data</td></tr>

                <?php

                }
                else 
                {
                  foreach ($dataplasma as $plasma) : ?>
                  
                  <?php

                    $warna = "";
                    if($plasma['durasi'] < 20 && $plasma['bruto'] > 5000)
                    {
                      $warna = 'background-color: #FF6363 ; color: #FFFFFFFF;';
                    }
                    else if($plasma['durasi'] < 20 && $plasma['bruto'] < 5000)
                    {
                      $warna = 'background-color: #FFEB9C ; color: #FFFFFFFF;';
                    }
                    else
                    {
                      $warna = 'background-color: white;';
                    }

                    ?>

                    <?php
                      $a = ($plasma['dura']/$plasma['jumlah_tbs_sample'])*100;
                      $b = ($plasma['tenera']/$plasma['jumlah_tbs_sample'])*100;
                      $c;
                      if($plasma['status'] == 2){
                        $c = "Data Lengkap";
                      }else{
                        $c = "Data Timbangan Belum Diisi";
                      }
                    ?>

                    <tr>
                        <td class="text-right"><?php echo $plasma['kode_kebun'];?></td>
                        <td class="text-right"><?php echo $plasma['kode_plasma'];?></td>
                        <td class="text-right"><?php echo $plasma['jenis'];?></td>
                        <td class="text-right"><?php echo $plasma['tanggal'];?></td>
                        <td class="text-right" style="<?= $warna ?>"><?php echo $plasma['masuk'];?></td>
                        <td class="text-right" style="<?= $warna ?>"><?php echo $plasma['keluar'];?></td>
                        <td class="text-right" style="<?= $warna ?>"><?php echo $plasma['durasi'];?></td>
                        <td class="text-right"><?php echo $plasma['pemasok'];?></td>
                        <td class="text-right"><?php echo $plasma['nopol'];?></td>
                        <td class="text-right"><?php echo $plasma['supir'];?></td>
                        <td class="text-right" style="<?= $warna ?>"><?php echo number_format($plasma['bruto'], 0, ',','.');?></td>
                        <td class="text-right"><?php echo number_format($plasma['netto'], 0, ',','.');?></td>
                        <td class="text-right"><?php echo number_format($plasma['jumlah_tbs_diterima'], 0, ',','.');?></td>
                        <td class="text-right"><?php echo $plasma['tbs_mentah'];?></td>
                        <td class="text-right"><?php echo $plasma['tbs_tankos'];?></td>
                        <td class="text-right"><?php echo $plasma['tbs_kecil'];?></td>
                        <td class="text-right"><?php echo $plasma['jumlah_tbs_sample'];?></td>
                        <td class="text-right"><?php echo round($b,2);?></td>
                        <td class="text-right"><?php echo round($a,2);?></td>
                        <td class="text-right"><?php echo $plasma['grade'];?></td>
                        <td class="text-right"><?php echo $plasma['potongan'];?></td>
                        <td class="text-right"><?php echo $c;?></td>
                        <td class="text-right"><?php echo $plasma['on_create'];?></td>
                    </tr>

                  <?php endforeach; } ?>

                </tbody>
                
              </table>
            </div>