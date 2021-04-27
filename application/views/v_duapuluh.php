<!-- Main Content -->
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Durasi < 20 Menit dan Kapasitas < 5 Ton</h1>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
            </select>
            </div>
          
            <div class="table-responsive">
            
              
            <table class="table table-hover table-bordered nowrap" id="table-1">
              <thead class="table-success">
                <tr>
                  <th class="text-center">Kode Kebun</th>
                  <th class="text-center">Kode Plasma</th>
                  <th class="text-center">Jenis</th>
                  <th class="text-center">Tanggal</th>
                  <th class="text-center">Jam Masuk</th>
                  <th class="text-center">Jam Keluar</th>
                  <th class="text-center">Durasi</th>
                  <th class="text-center">Pemasok</th>
                  <th class="text-center">No Polisi</th>
                  <th class="text-center">Supir</th>
                  <th class="text-center">Bruto</th>
                  <th class="text-center">Netto</th>
                  <th class="text-center">Jumlah TBS diterima</th>
                  <th class="text-center">TBS Mentah</th>
                  <th class="text-center">TBS Tankos</th>
                  <th class="text-center">TBS Kecil</th>
                  <th class="text-center">Jumlah TBS Sample</th>
                  <th class="text-center">Tenera</th>
                  <th class="text-center">Dura</th>
                  <th class="text-center">Grade</th>
                  <th class="text-center">Potongan</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Dibuat</th>
                </tr>
              </thead>
                
              <tbody>

                <?php 

                if(empty($duapuluh)) { ?>
                <tr><td style="text-align:center" colspan='19'>Tidak ada data</td></tr>

                <?php

                }
                else 
                {
                  foreach ($duapuluh as $dua) : ?>

                      <?php

                      $warna = "";
                      if($dua['durasi'] < 20 && $dua['bruto'] < 5000)
                      {
                        $warna = 'background-color: #FFEB9C; '; // hijau
                      }
                      else
                      {
                        $warna = 'background-color: white;';
                      }

                      ?>
                      
                      <?php
                      $a = ($dua['dura']/$dua['jumlah_tbs_sample'])*100;
                      $b = ($dua['tenera']/$dua['jumlah_tbs_sample'])*100;
                      $c;
                      if($dua['status'] == 2){
                        $c = "Data Lengkap";
                      }else{
                        $c = "Data Tidak Lengkap";
                      }
                    ?>

                      <tr>
                        <td><?php echo $dua['kode_kebun'];?></td>
                        <td><?php echo $dua['kode_plasma'];?></td>
                        <td><?php echo $dua['jenis'];?></td>
                        <td><?php echo $dua['tanggal'];?></td>
                        <td style="<?= $warna ?>"><?php echo $dua['masuk'];?></td>
                        <td style="<?= $warna ?>"><?php echo $dua['keluar'];?></td>
                        <td style="<?= $warna ?>"><?php echo $dua['durasi'];?></td>
                        <td><?php echo $dua['pemasok'];?></td>
                        <td><?php echo $dua['nopol'];?></td>
                        <td><?php echo $dua['supir'];?></td>
                        <td style="<?= $warna ?>"><?php echo number_format($dua['bruto'], 0, ',','.');?></td>
                        <td><?php echo $dua['netto'];?></td>
                        <td><?php echo $dua['jumlah_tbs_diterima'];?></td>
                        <td><?php echo $dua['tbs_mentah'];?></td>
                        <td><?php echo $dua['tbs_tankos'];?></td>
                        <td><?php echo $dua['tbs_kecil'];?></td>
                        <td><?php echo $dua['jumlah_tbs_sample'];?></td>
                        <td><?php echo $b;?></td>
                        <td><?php echo $a;?></td>
                        <td><?php echo $dua['grade'];?></td>
                        <td><?php echo $dua['potongan'];?></td>
                        <td><?php echo $c;?></td>
                        <td><?php echo $dua['on_create'];?></td>
                    </tr>

                  <?php endforeach; ?>
                  <?php } ?>

                </tbody>
                
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>