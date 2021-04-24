<!-- Main Content -->
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Trip Bulan Ini</h1>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            
            <form action="<?= base_url('c_bulanini/fitertgl')?>" method="GET">
              <!-- Tanggal Pertama -->
              <label class="mb-3 mr-3 ml-3 col-2">Tanggal Awal</label>
              <input class="mb-3 mr-3 ml-3 col-2 form-control" type="date" name="filtertgl1" id="filtertgl1" text="input tanggal">
              <!-- Tanggal Kedua -->
              <label class="mb-3 mr-3 ml-3 col-2">Tanggal Akhir</label>
              <input class="mb-3 mr-3 ml-3 col-2 form-control" type="date" name="filtertgl2" id="filtertgl2" text="input tanggal">
              <!-- <button type="button" class="btn btn-success mb-3 mr-3 ml-3 col-2 form-control">Tampilkan</button> -->
            </form>

            
          
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
                  <th class="text-center">Catatan</th>
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

$(document).ready(function(){
  $("#filtertgl1").change(function(){
    rekap();
  });
  $("#filtertgl2").change(function(){
    rekap();
  });
});

function rekap(){
  var tgl1 = $("#filtertgl1").val();
  var tgl2 = $("#filtertgl2").val();
  $.ajax({
    url : "<?= base_url('c_bulanini/rentang')?>",
    data : "filtertgl1=" + tgl1 + "&filtertgl2= "+tgl2,
    success:function(data){
      $("#table-1 tbody").html(data);
    }
  });
}

</script>