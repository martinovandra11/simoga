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
                    <option value=" ">Semua Grade</option>
                    <?php foreach($datagrade as $grd) : ?>
                         <option value="<?= $grd['grade'] ?>"><?= $grd['grade'] ?></option>
                    <?php endforeach; ?>
               </select>
          
          <!-- Filter PKS -->
          <select class="form-control mb-3 mr-3 col-2" name="grade" id="grade">
                    <option value=" ">Semua PKS</option>
                    <?php foreach($datagrade as $grd) : ?>
                         <option value="<?= $grd['grade'] ?>"><?= $grd['grade'] ?></option>
                    <?php endforeach; ?>
               </select>
            </div>
          
            <div class="table-responsive">
            <table class="table table-hover table-bordered nowrap" id="table-1">
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
                        <td><?php echo $plasma['tanggal'];?></td>
                        <td><?php echo $plasma['pemasok'];?></td>
                        <td><?php echo $plasma['jumlah_tbs_diterima'];?></td>
                        <td><?php echo $plasma['jumlah_tbs_sample'];?></td>
                        <td><?php echo $plasma['tenera'];?></td>
                        <td><?php echo $plasma['dura'];?></td>
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
});

function grade(){
  var grd = $("#grade").val();
  $.ajax({
    url : "<?= base_url('c_grading/filtering')?>",
    data : "grade=" + grd,
    success:function(data){
      $("#table-1 tbody").html(data);
    }
  });
}

</script>