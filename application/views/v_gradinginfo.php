<!-- Main Content -->
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Informasi Grading</h1>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            
          <div class="row">
          
            <!-- Filter Grading -->
            <select class="form-control ml-3 mb-3 mr-3 col-2" name="grade" id="grade">
                    <option value ="">Semua Grade</option>
                    <?php foreach($dt_grade as $grd) : ?>
                         <option value="<?= $grd['grade'] ?>"><?= $grd['grade'] ?></option>
                    <?php endforeach; ?>
               </select>
          
          <!-- Filter PKS -->
                <select class="form-control mb-3 mr-3 col-2" name="pks" id="pks">
                    <option value ="">Semua PKS</option>
                    <?php foreach($dt_grade2 as $grd) : ?>
                         <option value="<?= $grd['unit'] ?>"><?= $grd['unit'] ?></option>
                    <?php endforeach; ?>
               </select>
          
            
          </div>

            <div class="table-responsive">
            <table class="table table-hover table-bordered nowrap" width="100%" id="table-1">
              <thead class="table-success">
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Grade</th>
                  <th class="text-center">Unit</th>
                  <th class="text-center">Tenera Min</th>
                  <th class="text-center">Tenera Max</th>
                  <th class="text-center">Dura Min</th>
                  <th class="text-center">Dura Max</th>
                </tr>
              </thead>
                
              <tbody>

                <?php 

                if(empty($datagrading)) { ?>
                <tr><td style="text-align:center" colspan='7'>Tidak ada data</td></tr>

                <?php

                }
                else 
                {
                  foreach ($datagrading as $plasma) : ?>

                    <tr>
                        <td><?php echo $plasma['id_grade'];?></td>
                        <td><?php echo $plasma['grade'];?></td>
                        <td><?php echo $plasma['unit'];?></td>
                        <td><?php echo $plasma['tenera_min'];?></td>
                        <td><?php echo $plasma['tenera_max'];?></td>
                        <td><?php echo $plasma['dura_min'];?></td>
                        <td><?php echo $plasma['dura_max'];?></td>
                        
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
  $("#grade").change(function(){
    laporan();
  });
  $("#pks").change(function(){
    laporan();
  });
});

function laporan() {
  var grd = $("#grade").val();
  var kebun = $("#pks").val();
  $.ajax({
    url : "<?= base_url('c_gradinginfo/load_filter')?>",
    data : "grade=" + grd + "&pks=" +kebun,
    success:function(data){
      $("#table-1 tbody").html(data);
    }
  });
}


</script>
