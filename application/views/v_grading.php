<!-- Main Content -->
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Halaman Grading</h1>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
          <div class="row">
          <!-- Filter Grading -->
               <select class="form-control ml-3 mb-3 mr-3 col-2" name="grade" id="grade">
                    <option value="#">Semua Grade</option>
                    <?php foreach($datagrade as $grd) : ?>
                         <option value="<?= $grd['grade'] ?>"><?= $grd['grade'] ?></option>
                    <?php endforeach; ?>
               </select>
          
          <!-- Filter PKS -->
          <select class="form-control mb-3 mr-3 col-2" id="kodekebun" name="kodekebun">
                <option value="#">Pilih Kebun</option>
              <?php foreach($kodekebun as $kbn) : ?>
                <option value="<?= $kbn['kode_kebun'] ?>"><?= $kbn['kode_kebun'] ?></option>
              <?php endforeach; ?>
              </select>
          
            <div class="table-responsive">
            <table class="table table-hover table-bordered nowrap" style="width: 100%" id="table-1">
              <thead class="table-success">
                <tr>
                <th class="text-center">Kode Kebun</th>
                  <th class="text-center">Kode Plasma</th>
                  <th class="text-center">Tanggal</th>
                  <th class="text-center">Pemasok</th>
                  <th class="text-center">Jumlah TBS diterima</th>
                  <th class="text-center">Jumlah TBS Sample</th>
                  <th class="text-center">Tenera</th>
                  <th class="text-center">Dura</th>
                  <th class="text-center">Grade</th>
                  <th class="text-center">Potongan</th>
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
                    ?>

                    <tr>
                        <td><?php echo $plasma['kode_kebun'];?></td>
                        <td><?php echo $plasma['kode_plasma'];?></td>
                        <td><?php echo $plasma['tanggal'];?></td>
                        <td><?php echo $plasma['pemasok'];?></td>
                        <td><?php echo number_format($plasma['jumlah_tbs_diterima'], 0, ',','.');?></td>
                        <td><?php echo $plasma['jumlah_tbs_sample'];?></td>
                        <td><?php echo $b;?></td>
                        <td><?php echo $a;?></td>
                        <td><?php echo $plasma['grade'];?></td>
                        <td><?php echo $plasma['potongan'];?></td>
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
  $("#grade").change(function(){
    grade();
  });
  $("#kodekebun").change(function(){
    grade();
  });
});

function grade(){
  var grd = $("#grade").val();
  var kbn = $("#kodekebun").val();
  $.ajax({
    url : "<?= base_url('c_grading/filtering')?>",
    data : "grade=" + grd + "&filterkebun=" + kbn,
    success:function(data){
      $("#table-1 tbody").html(data);
    }
  });
}

</script>