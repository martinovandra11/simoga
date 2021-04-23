<!-- Main Content -->
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Trip Hari ini</h1>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
            </div>
            <input class="mb-3 mr-3 col-2 form-control" type="date">

            <select class=" mb-3 mr-3 col-2 form-control">
              <option>Isi dengan Nama PKS</option>
            </select>
            
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
                    <tr>
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