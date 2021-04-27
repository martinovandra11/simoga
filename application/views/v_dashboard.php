<!-- Main Content -->
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Trip Hari Ini</h1>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">

            <!-- Filtering berdasarkan kode kebun -->
              <select class="form-control mb-3 ml-3 mr-3 col-2"  id="kebun" name="kebun">
                <option value="#">Pilih PKS</option>
                <?php foreach($kodekebun as $kbn) : ?>
                  <option value="<?= $kbn['kode_kebun']?>"><?= $kbn['kode_kebun'] ?></option>
                <?php endforeach; ?> 
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
                      $a = ($plasma['dura']/$plasma['jumlah_tbs_sample'])*100;
                      $b = ($plasma['tenera']/$plasma['jumlah_tbs_sample'])*100;
                      $c;
                      if($plasma['status'] == 2){
                        $c = "Data Lengkap";
                      }else{
                        $c = "Data Tidak Lengkap";
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
                        <td><?php echo $b;?></td>
                        <td><?php echo $a;?></td>
                        <td><?php echo $plasma['grade'];?></td>
                        <td><?php echo $plasma['potongan'];?></td>
                        <td><?php echo $c;?></td>
                        <td><?php echo $plasma['on_create'];?></td>
                    </tr>

                  <?php endforeach; } ?>

                </tbody>
                
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $("#kebun").change(function(){
    laporan();
  });
});

function laporan() {
  var kbn = $("#kebun").val();
  $.ajax({
    url : "<?= base_url('c_dashboard/filterkebun')?>",
    data : "kebun=" +kbn,
    success:function(data){
      $("#table-1 tbody").html(data);
    }
  });
}

</script>