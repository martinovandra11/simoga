<div class="table-responsive">


            <table class="table table-hover table-bordered nowrap" id="table-1">
  

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
                    if($plasma['durasi'] < 20 && $plasma['bruto'] >= 5000)
                    {
                      $warna = 'background-color: #E94B3CFF ; color: #FFFFFFFF;';
                    }
                    else if($plasma['durasi'] < 20)
                    {
                      $warna = 'background-color: #FF7F50 ; color: #FFFFFFFF;';
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
                        <td><?php echo $b;?></td>
                        <td><?php echo $a;?></td>
                        <td><?php echo $plasma['grade'];?></td>
                        <td><?php echo $plasma['potongan'];?></td>
                        <td><?php echo $plasma['status'];?></td>
                        <td><?php echo $plasma['on_create'];?></td>
                    </tr>

                  <?php endforeach; } ?>

                </tbody>
                
              </table>
            </div>