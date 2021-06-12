<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Bongkar < 20 Menit Dan Kapasitas> 5 Ton</h1>
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

                  if (empty($dualima)) { ?>
                    <tr>
                      <td style="text-align:center" colspan='19'>Tidak ada data</td>
                    </tr>

                    <?php

                  } else {
                    foreach ($dualima as $dua) : ?>

                      <?php

                      $warna = "";
                      if ($dua['durasi'] < 20 && $dua['bruto'] > 5000) {
                        $warna = 'background-color: #FF6363 ; color: #FFFFFFFF;'; // merah
                      } else {
                        $warna = 'background-color: white;';
                      }

                      ?>

                      <?php
                      $a = ($dua['dura'] / $dua['jumlah_tbs_sample']) * 100;
                      $b = ($dua['tenera'] / $dua['jumlah_tbs_sample']) * 100;
                      $c;
                      if ($dua['status'] == 2) {
                        $c = "Data Lengkap";
                      } else {
                        $c = "Data Timbangan Belum Diisi";
                      }
                      ?>

                      <tr>
                        <td><?php echo $dua['kode_kebun']; ?></td>
                        <td><?php echo $dua['kode_plasma']; ?></td>
                        <td><?php echo $dua['jenis']; ?></td>
                        <td><?php echo $dua['tanggal']; ?></td>
                        <td style="<?= $warna ?>"><?= $dua['masuk']; ?></td>
                        <td style="<?= $warna ?>"><?php echo $dua['keluar']; ?></td>
                        <td style="<?= $warna ?>"><?php echo $dua['durasi']; ?></td>
                        <td><?php echo $dua['pemasok']; ?></td>
                        <td><?php echo $dua['nopol']; ?></td>
                        <td><?php echo $dua['supir']; ?></td>
                        <td style="<?= $warna ?>"><?php echo number_format($dua['bruto'], 0, ',', '.'); ?></td>
                        <td><?php echo number_format($dua['netto'], 0, ',', '.'); ?></td>
                        <td><?php echo number_format($dua['jumlah_tbs_diterima'], 0, ',', '.'); ?></td>
                        <td><?php echo $dua['tbs_mentah']; ?></td>
                        <td><?php echo $dua['tbs_tankos']; ?></td>
                        <td><?php echo $dua['tbs_kecil']; ?></td>
                        <td><?php echo $dua['jumlah_tbs_sample']; ?></td>
                        <td><?php echo round($b,2); ?></td>
                        <td><?php echo round($a,2); ?></td>
                        <td><?php echo $dua['grade']; ?></td>
                        <td><?php echo $dua['potongan']; ?></td>
                        <td><?php echo $c; ?></td>
                        <td><?php echo $dua['on_create']; ?></td>
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