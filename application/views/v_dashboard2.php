<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
		</div>

		<div class="row justify-content-left">
			<div class="col-6 col-sm-6 col-md-12">
					<h3>Tabel Informasi Grading</h3>
			</div>
		</div>

		<div class="row justify-content-left">
			<div class="col-6 col-sm-6 col-md-12">
				<table class="table table-hover table-bordered nowrap">
					<thead class="table-primary">
						<tr>
							<td>Bruto</td>
							<td>Netto</td>
							<td>A1+</td>
							<td>A</td>
							<td>A1</td>
							<td>A2</td>
							<td>A+</td>
							<td>A3</td>
							<td>PLS</td>
							<td>B</td>
							<td>A ALPHA</td>
							<td>PLS A</td>
							<td>A1/PLASMA</td>
						</tr>
					</thead>

					<tbody>
						<tr>
						<?php foreach ($jumlahbruto_today as $bruto) :?>
								<td><div class="text-success"><?php echo $bruto['JumlahBruto'];?></div>
							<?php endforeach ; ?>

							<?php foreach ($jumlahbruto as $bruto) :?>
								<?php echo $bruto['JumlahBruto'];?></td>
							<?php endforeach ; ?>
							
							<?php foreach ($jumlahnetto_today as $netto) :?>
								<td><div class="text-success"><?php echo $netto['JumlahNetto'];?></div>
							<?php endforeach ; ?>

							<?php foreach ($jumlahnetto as $netto) :?>
								<?php echo $netto['JumlahNetto'];?></td>
							<?php endforeach ; ?>

							
							
							<?php 
								foreach ($allgrade as $grade) :
									foreach($aplus as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['atu_plus'];
										$c = ($b/$a)*100;
							?>
									<td><?php echo round($c,4);?> %</td>
							<?php endforeach; endforeach ; ?>
							
							<?php //persentase grade A
								foreach ($allgrade as $grade) :
									foreach($gradea as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['GradeA'];
										$c = ($b/$a)*100;
							?>
									<td><?php echo round($c,4);?> %</td>
							<?php endforeach; endforeach ; ?>

							<?php //persentase grade A1
								foreach ($allgrade as $grade) :
									foreach($gradea1 as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['GradeA1'];
										$c = ($b/$a)*100;
							?>
									<td><?php echo round($c,4);?> %</td>
							<?php endforeach; endforeach ; ?>

							<?php //persentase grade A+
								foreach ($allgrade as $grade) :
									foreach($gradea2 as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['GradeA2'];
										$c = ($b/$a)*100;
							?>
									<td><?php echo round($c,4);?> %</td>
							<?php endforeach; endforeach ; ?>


							<?php //persentase grade A+
								foreach ($allgrade as $grade) :
									foreach($gradeaplus as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['GradeAplus'];
										$c = ($b/$a)*100;
							?>
									<td><?php echo round($c,4);?> %</td>
							<?php endforeach; endforeach ; ?>
							

							<?php //persentase grade A3
								foreach ($allgrade as $grade) :
									foreach($gradea3 as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['GradeA3'];
										$c = ($b/$a)*100;
							?>
									<td><?php echo round($c,4);?> %</td>
							<?php endforeach; endforeach ; ?>

							<?php //persentase grade PLS
								foreach ($allgrade as $grade) :
									foreach($gradepls as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['GradePLS'];
										$c = ($b/$a)*100;
							?>
									<td><?php echo round($c,4);?> %</td>
							<?php endforeach; endforeach ; ?>

							<?php //persentase grade B
								foreach ($allgrade as $grade) :
									foreach($gradeB as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['GradeB'];
										$c = ($b/$a)*100;
							?>
									<td><?php echo round($c,4);?> %</td>
							<?php endforeach; endforeach ; ?>

							<?php //persentase grade A ALPHA
								foreach ($allgrade as $grade) :
									foreach($gradeAlpha as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['GradeApha'];
										$c = ($b/$a)*100;
							?>
									<td><?php echo round($c,4);?> %</td>
							<?php endforeach; endforeach ; ?>

							<?php //persentase grade PLS A
								foreach ($allgrade as $grade) :
									foreach($gradePlsa as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['GradePlsa'];
										$c = ($b/$a)*100;
							?>
									<td><?php echo round($c,4);?> %</td>
							<?php endforeach; endforeach ; ?>

							<?php //persentase grade A1/PLASMA
								foreach ($allgrade as $grade) :
									foreach($gradeApls as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['GradeApls'];
										$c = ($b/$a)*100;
							?>
									<td><?php echo round($c,4);?> %</td>
							<?php endforeach; endforeach ; ?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="row justify-content-left">
			<div class="col-6 col-sm-6 col-md-12">
					<h3>Total Inputan Trip</h3>
			</div>
		</div>

		<div class="row justify-content-center">
               <div class="col-6 col-sm-6 col-md-6">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Trip Hari Ini</h4>
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($hariini as $ini) { 
                                   ?>
                                   
                                   <?= number_format($ini['JumlahPerHari'], 0,',','.');?>
                                   
                                   <?php } ?>
						</div>
                              <div>
                                   <a href="<?= base_url('c_dashboard') ?>" >Lihat Data</a>
                              </div>
                              
					</div>
				</div>
			</div>

               <div class="col-6 col-md-6">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Trip Bulan Ini</h4>
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($bulanini as $ini) { 
                                   ?>
                                   
                                        <?= number_format($ini['JumlahPerBulan'], 0,',','.');?>
                                   
                                   <?php } ?>
						</div>
                              <div>
                                   <a href="<?= base_url('c_bulanini') ?>">Lihat Data</a>
                              </div>
					</div>
				</div>
			</div>

			<div class="col-6 col-md-6">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="fas fa-award"></i> 
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Halaman Grading</h4>
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($countgrading as $ini) { 
                                   ?>
                                   
                                        <?= number_format($ini['hitung'], 0,',','.');?>
                                   
                                   <?php } ?>
						</div>
                              <div>
                                   <a href="<?= base_url('c_grading') ?>">Lihat Data</a>
                              </div>
					</div>
				</div>
			</div>

			<div class="col-6 col-md-6">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="fas fa-award"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Informasi Grading</h4>
						</div>
						<div class="card-body">
						<?php 
                                        foreach($countgradinginfo as $ini) { 
                                   ?>
                                   
                                        <?= number_format($ini['hitung'], 0,',','.');?>
                                   
                                   <?php } ?>
						</div>
                              <div>
                                   <a href="<?= base_url('c_gradinginfo') ?>">Lihat Data</a>
                              </div>
					</div>
				</div>
			</div>

			


			<div class="col-6 col-md-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Rekap Trip</h4>
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($rekap as $rkp) { 
                                   ?>
                                        <?= number_format($rkp['totalData'], 0,',','.');?>
                                   
                                   <?php } ?>
						</div>
                              <div>
                                   <a href="<?= base_url('c_rekap') ?>">Lihat Data</a>
                              </div>
					</div>
				</div>
			</div>
				

		</div>
									
		<div class="row justify-content-left">
			<div class="col-6 col-sm-6 col-md-12">
					<h3>Laporan Bongkar Bulan Ini</h3>
			</div>
		</div>
		
		<div class="row justify-content-center">
               <div class="col-6 col-sm-6 col-md-6">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Durasi < 20 Menit dan Kapasitas < 5 Ton</h4>
						</div>
						<div class="card-body">
						<table>
							<tr>
							<?php foreach($duapuluh as $dua) { ?>
                                   	<td>(<?= number_format($dua['KurangDuaPuluh'], 0,',','.');?>)</td>
                                   <?php } ?>

							<?php foreach($sumbruto as $dua) { ?>
                                   	<td class="text-success">(<?= number_format($dua['Sum_bruto'], 0,',','.');?>)</td>
                                   <?php } ?>

							<?php foreach($sumnetto as $dua) { ?>
                                   	<td class="text-warning">(<?= number_format($dua['Sum_netto'], 0,',','.');?>)</td>
                                   <?php } ?>
							</tr>
						</table>
                                   

							
						</div>
                              <div>
                                   <a href="<?= base_url('c_duapuluh') ?>">Lihat Data</a>
                              </div>
                              
					</div>
				</div>
			</div>

            <div class="col-6 col-md-6">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Bongkar < 20 Menit Dan Kapasitas > 5 Ton</h4>
						</div>
						<div class="card-body">

						<table>
							<tr>
							<?php foreach($dualima as $ini) { ?>
                                   	<td><?= number_format($ini['DuaLima'], 0,',','.');?></td>
                                   <?php } ?>

							<?php foreach($sumbruto2 as $dua) { ?>
                                   	<td class="text-success">(<?= number_format($dua['Sum_bruto'], 0,',','.');?>)</td>
                                   <?php } ?>

							<?php foreach($sumnetto2 as $dua) { ?>
                                   	<td class="text-warning">(<?= number_format($dua['Sum_netto'], 0,',','.');?>)</td>
                                   <?php } ?>
							</tr>
						</table>

                                   
						</div>
                              <div>
                                   <a href="<?= base_url('c_dualima') ?>" >Lihat Data</a>
                              </div>
                              
					</div>
				</div>
			</div>
			</div>
			<div class="row justify-content-left">
				<div class="col-6 col-sm-6 col-md-12">
					<h3>Laporan Bongkar Hari Ini</h3>
				</div>
			</div>

			<div class="row justify-content-center">
               <div class="col-6 col-sm-6 col-md-6">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Durasi < 20 Menit dan Kapasitas < 5 Ton</h4>
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($hitung1 as $dua) { 
                                   ?>
                                   
                                   <?= number_format($dua['KurangDuaPuluh'], 0,',','.');?>
                                   
                                   <?php } ?>
						</div>
                              <div>
                                   <a href="<?= base_url('c_bagian1') ?>">Lihat Data</a>
                              </div>
                              
					</div>
				</div>
			</div>

            	<div class="col-6 col-md-6">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Bongkar < 20 Menit Dan Kapasitas > 5 Ton</h4>
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($hitung2 as $ini) { 
                                   ?>
                                   
                                   <?= number_format($ini['LebihDuaPuluh'], 0,',','.');?>
                                   
                                   <?php } ?>
						</div>
                              <div>
                                   <a href="<?= base_url('c_bagian2') ?>" >Lihat Data</a>
                              </div>
                              
					</div>
				</div>
			</div>
			</div>
		</div>
</div>
<script>
	
</script>