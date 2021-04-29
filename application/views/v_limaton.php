<!-- Main Content -->
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Muatan lebih dari 5 Ton</h1>
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

                if(empty($limaton)) { ?>
                <tr><td style="text-align:center" colspan='19'>Tidak ada data</td></tr>

                <?php

                }
                else 
                {
                  foreach ($limaton as $dua) : ?>

                      <?php

                      $warna = "";
                      if($dua['durasi'] < 20 && $dua['bruto'] >= 5000)
                      {
                        $warna = 'background-color: #E94B3CFF; color: #FFFFFFFF;'; // orange
                      }
                      else if($dua['durasi'] < 20)
                      {
                        $warna = 'background-color: #FF7F50; color: #FFFFFFFF;'; // merah
                      }
                      else
                      {
                        $warna = 'background-color: white;';
                      }

                      ?>

                      <tr style="<?= $warna ?>">
                        <td><?php echo $dua['kode_kebun'];?></td>
                        <td><?php echo $dua['kode_plasma'];?></td>
                        <td><?php echo $dua['jenis'];?></td>
                        <td><?php echo $dua['tanggal'];?></td>
                        <td><?php echo $dua['masuk'];?></td>
                        <td><?php echo $dua['keluar'];?></td>
                        <td><?php echo $dua['durasi'];?></td>
                        <td><?php echo $dua['pemasok'];?></td>
                        <td><?php echo $dua['nopol'];?></td>
                        <td><?php echo $dua['supir'];?></td>
                        <td><?php echo $dua['bruto'];?></td>
                        <td><?php echo $dua['netto'];?></td>
                        <td><?php echo $dua['jumlah_tbs_diterima'];?></td>
                        <td><?php echo $dua['tbs_mentah'];?></td>
                        <td><?php echo $dua['tbs_tankos'];?></td>
                        <td><?php echo $dua['tbs_kecil'];?></td>
                        <td><?php echo $dua['jumlah_tbs_sample'];?></td>
                        <td><?php echo $dua['tenera'];?></td>
                        <td><?php echo $dua['dura'];?></td>
                        <td><?php echo $dua['grade'];?></td>
                        <td><?php echo $dua['potongan'];?></td>
                        <td><?php echo $dua['status'];?></td>
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