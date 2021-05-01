<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
		</div>

		<div class="row justify-content-left">
			<div class="col-6 col-sm-6 col-md-12">
					<h3 class="text-dark">Data Tonase Hari Ini, <?php echo date('d - M - Y'); ?></h3>
			</div>
		</div>

		<div class="row justify-content-center">
               <div class="col-6 col-sm-6 col-md-4">
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

               <div class="col-6 col-md-4">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">Total Bruto (Kg)</div>
                              <div>
							<?php foreach ($jumlahbruto_today as $bruto) :?>
								<h5><?php echo $bruto['JumlahBruto'];?> Kg</h5>
							<?php endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>

			<div class="col-6 col-md-4">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">						
							Total Netto (Kg)
						</div>
                              <div>
							<?php foreach ($jumlahnetto_today as $netto) :?>
								<h5><?php echo $netto['JumlahNetto'];?> Kg</h5>
							<?php endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row justify-content-left">
			<div class="col-6 col-sm-6 col-md-12">
					<h3 class="text-dark">Data Grading Hari Ini</h3>
			</div>
		</div>						

		<div class="row justify-content-center">
               <div class="col-6 col-sm-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-info">
					<i class="fas"> A1+</i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4 class="font-weight-bold text-dark">A1+</h4>
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($hariini as $ini) { 
                                   ?>
                                   
                                   <?= number_format($ini['JumlahPerHari'], 0,',','.');?> KG
                                   
                                   <?php } ?>
							<br>	
						</div>
                              <div>
							<?php 
								foreach ($allgrade as $grade) :
									foreach($aplus_today as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['atu_plus'];
										$c = ($b/$a)*100;
							?>
									<h5><?php echo round($c,4);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>

               <div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-info">
						<i class="fas"> A </i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($bulanini as $ini) { 
                                   ?>
                                   
                                        <?= number_format($ini['JumlahPerBulan'], 0,',','.');?>
                                   
                                   <?php } ?>
						</div>
                              <div>
							<?php //persentase grade A
								foreach ($allgrade as $grade) :
									foreach($gradea_today as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['GradeA'];
										$c = ($b/$a)*100;
							?>
									<h5><?php echo round($c,4);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-info">
						<i class="fas"> A1</i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($bulanini as $ini) { 
                                   ?>
                                   
                                        <?= number_format($ini['JumlahPerBulan'], 0,',','.');?>
                                   
                                   <?php } ?>
						</div>
                              <div>
							<?php //persentase grade A1
								foreach ($allgrade as $grade) :
									foreach($gradea1_today as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['GradeA1'];
										$c = ($b/$a)*100;
							?>
									<h5><?php echo round($c,4);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-info">
						<i class="fas"> A2</i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($bulanini as $ini) { 
                                   ?>
                                   
                                        <?= number_format($ini['JumlahPerBulan'], 0,',','.');?>
                                   
                                   <?php } ?>
						</div>
                              <div>
						<?php //persentase grade A1
								foreach ($allgrade as $grade) :
									foreach($gradea2_today as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['GradeA2'];
										$c = ($b/$a)*100;
							?>
									<h5><?php echo round($c,4);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="fas fa-award"> A+</i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($bulanini as $ini) { 
                                   ?>
                                   
                                        <?= number_format($ini['JumlahPerBulan'], 0,',','.');?>
                                   
                                   <?php } ?>
						</div>
                              <div>
						<?php //persentase grade A+
								foreach ($allgrade as $grade) :
									foreach($gradeaplus_today as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['GradeAplus'];
										$c = ($b/$a)*100;
							?>
									<h5><?php echo round($c,4);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="fas fa-award"> A3</i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($bulanini as $ini) { 
                                   ?>
                                   
                                        <?= number_format($ini['JumlahPerBulan'], 0,',','.');?>
                                   
                                   <?php } ?>
						</div>
                              <div>
							<?php //persentase grade A3
								foreach ($allgrade as $grade) :
									foreach($gradea3_today as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['GradeA3'];
										$c = ($b/$a)*100;
							?>
									<h5><?php echo round($c,4);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="fas fa-award"> PLS</i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($bulanini as $ini) { 
                                   ?>
                                   
                                        <?= number_format($ini['JumlahPerBulan'], 0,',','.');?> 
                                   
                                   <?php } ?>
						</div>
                              <div>
						<?php //persentase grade PLS
								foreach ($allgrade as $grade) :
									foreach($gradepls_today as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['GradePLS'];
										$c = ($b/$a)*100;
							?>
									<h5><?php echo round($c,4);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="fas fa-award"> B</i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($bulanini as $ini) { 
                                   ?>
                                   
                                        <?= number_format($ini['JumlahPerBulan'], 0,',','.');?>
                                   
                                   <?php } ?>
						</div>
                              <div>
						<?php //persentase grade B
								foreach ($allgrade as $grade) :
									foreach($gradeB_today as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['GradeB'];
										$c = ($b/$a)*100;
							?>
									<h5><?php echo round($c,4);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="fas fa-award"><br>A Alpha</i>
						
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($bulanini as $ini) { 
                                   ?>
                                   
                                        <?= number_format($ini['JumlahPerBulan'], 0,',','.');?>
                                   
                                   <?php } ?>
						</div>
                              <div>
						<?php //persentase grade A ALPHA
								foreach ($allgrade as $grade) :
									foreach($gradeAlpha_today as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['GradeApha'];
										$c = ($b/$a)*100;
							?>
									<h5><?php echo round($c,4);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="fas fa-award"><br>PLS A</i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($bulanini as $ini) { 
                                   ?>
                                   
                                        <?= number_format($ini['JumlahPerBulan'], 0,',','.');?>
                                   
                                   <?php } ?>
						</div>
                              <div>
						<?php //persentase grade PLS A
								foreach ($allgrade as $grade) :
									foreach($gradePlsa_today as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['GradePlsa'];
										$c = ($b/$a)*100;
							?>
									<h5><?php echo round($c,4);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="fas fa-award"><br>A1/PLS </i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($bulanini as $ini) { 
                                   ?>
                                   
                                        <?= number_format($ini['JumlahPerBulan'], 0,',','.');?>
                                   
                                   <?php } ?>
						</div>
                              <div>
						<?php //persentase grade A1/PLASMA
								foreach ($allgrade as $grade) :
									foreach($gradeApls_today as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['GradeApls'];
										$c = ($b/$a)*100;
							?>
									<h5><?php echo round($c,4);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>
		</div>

		<div class="row justify-content-left">
			<div class="col-6 col-sm-6 col-md-12">
				<h3 class="text-dark">Laporan Bongkar Hari Ini</h3>
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
		

		<div class="row justify-content-left">
			<div class="col-6 col-sm-6 col-md-12">
					<h3 class="text-dark">Laporan Bongkar Bulan Ini</h3>
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
                                   	<td><?= number_format($dua['KurangDuaPuluh'], 0,',','.');?></td>
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
                                    <td class=""><?= number_format($ini['DuaLima'], 0,',','.');?></td>
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
			
			</div>
		</div>
</div>
<script>
	
</script>