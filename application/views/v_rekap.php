
<!-- Main Content -->
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Rekap Trip</h1>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
          <div class="row">
            <!-- <form action="<?= base_url('c_bulanini/fitertgl')?>" method="GET"> -->
            <!-- <?= form_open('c_bulanini/filtertgl') ?> -->

              <!-- Tanggal Pertama -->
              <!-- <label class="mb-3 mt-2 col-2">Tanggal Awal</label> -->
              <p class="ml-3 mr-3 mt-2">Tanggal Awal</p>
              <input class="mb-3 mr-3 col-2 form-control" type="date" name="filtertgl1" id="filtertgl1" text="input tanggal">

              <!-- Tanggal Kedua -->
              <!-- <label class="mb-3 mt-2 col-2">Tanggal Akhir</label> -->
              <p class="ml-3 mr-3 mt-2">Tanggal Akhir</p>
              <input class="mb-3 mr-3 col-2 form-control" type="date" name="filtertgl2" id="filtertgl2" text="input tanggal">
            <!-- </form> -->

              <!-- Filter PKS -->
              <!-- <label class="mb-3 mt-2 ml-3 col-2">Filter Kebun</label> -->
              <p class="ml-3 mr-3 mt-2">Nama PKS</p>
              <select class="form-control mb-3 mr-3 col-2" id="kodekebun" name="kodekebun">
                <option value="#">Pilih Kebun</option>
              <?php foreach($kodekebun as $kbn) : ?>
                <option value="<?= $kbn['kode_kebun'] ?>"><?= $kbn['kode_kebun'] ?></option>
              <?php endforeach; ?>
              </select>

           
            </div>
            <a class="btn btn-success mb-3" href="<?= base_url('c_bulanini/export') ?>">Download Excel</a>
          
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
                    if($plasma['durasi'] < 20 && $plasma['bruto'] > 5000)
                    {
                      $warna = 'background-color: #FF6363 ; color: #FFFFFFFF;'; // merah
                    }
                    else if($plasma['durasi'] < 20 && $plasma['bruto'] < 5000)
                    {
                      $warna = 'background-color: #FFEB9C ;'; // kuning
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

$(document).ready(function(){
  $("#filtertgl1").change(function(){
    rekap();
  });
  $("#filtertgl2").change(function(){
    rekap();
  });
  $("#kodekebun").change(function(){
    rekap();
  });
});

function rekap(){
  var tgl1 = $("#filtertgl1").val();
  var tgl2 = $("#filtertgl2").val();
  var kbn = $("#kodekebun").val();
  $.ajax({
    url : "<?= base_url('c_bulanini/rentang')?>",
    data : "filtertgl1=" + tgl1 + "&filtertgl2=" + tgl2 + "&filterkebun=" + kbn,
    success:function(data){
      $("#table-1 tbody").html(data);

      $('#table-1').css( 'display', 'block' );
      table.columns.adjust().draw();
    }
  });
}

</script>