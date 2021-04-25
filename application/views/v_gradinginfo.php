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
            
            <div class="table-responsive">
            <table class="table table-hover table-bordered nowrap" id="table-1">
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
                  
                  <?php

                    // $warna = "";
                    // if($plasma['durasi'] < 20 && $plasma['bruto'] >= 5000)
                    // {
                    //   $warna = 'background-color: #E94B3CFF ; color: #FFFFFFFF;';
                    // }
                    // else if($plasma['durasi'] < 20)
                    // {
                    //   $warna = 'background-color: #FF7F50 ; color: #FFFFFFFF;';
                    // }
                    // else
                    // {
                    //   $warna = 'background-color: white;';
                    // }

                    ?>

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