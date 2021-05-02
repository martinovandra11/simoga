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
                                   
                                   <?= number_format($ini['JumlahPerHari'], 0,',','.');?> Trip
                                   
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
								<h5><?php echo number_format($bruto['JumlahBruto'], 0, ',','.');?> Kg</h5>
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
								<h5><?php echo number_format($netto['JumlahNetto'], 0, ',', '.');?> Kg</h5>
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
						<a href="<?= base_url('c_gradea1plus'); ?>"><i class="fas"><u>A1+</u></i></a>
					</div>
					<div class="card-wrap">
						<div class="card-header">
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($aplus_netto as $ini) { 
                                   ?>
                                   
                                   <h3><?= number_format($ini['atu_plus'], 0,',','.');?> KG</h3>
                                   
                                   <?php } ?>
							
						</div>
                              <div>
							<?php 
								foreach ($allgrade as $grade) :
									foreach($aplus_today as $grade2) :
								 		$a = $grade['JumlahNetto'];
										$b = $grade2['atu_plus'];
										$c = ($b/$a)*100;
							?>
									<h5><?php echo round($c,2);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>

               <div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-info">
					<a href="<?= base_url('c_gradea'); ?>"><i class="fas"><u>A</u></i></a>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($gradea_netto as $ini) { 
                                   ?>
                                   
                                        <h3><?= number_format($ini['GradeA'], 0,',','.');?> KG</h3>
                                   
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
									<h5><?php echo round($c,2);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-info">
						<a href="<?= base_url('c_gradea1'); ?>"><i class="fas"><u>A1</u></i></a>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($gradea1_netto as $ini) { 
                                   ?>
                                   
                                        <h3><?= number_format($ini['GradeA1'], 0,',','.');?> KG</h3>
                                   
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
									<h5><?php echo round($c,2);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-info">
						<a href="<?= base_url('c_gradea2'); ?>"><i class="fas"><u>A2</u></i></a>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($gradea2_netto as $ini) { 
                                   ?>
                                   
                                        <h3><?= number_format($ini['GradeA2'], 0,',','.');?> KG</h3>
                                   
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
									<h5><?php echo round($c,2);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<a href="<?= base_url('c_gradeaplus'); ?>"><i class="fas"><u>A+</u></i></a>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($gradeaplus_netto as $ini) { 
                                   ?>
                                   
                                        <h3><?= number_format($ini['GradeAplus'], 0,',','.');?> KG</h3>
                                   
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
									<h5><?php echo round($c,2);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<a href="<?= base_url('c_gradea3'); ?>"><i class="fas"><u>A3</u></i></a>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($gradea3_netto as $ini) { 
                                   ?>
                                   
                                        <h3><?= number_format($ini['GradeA3'], 0,',','.');?> KG</h3>
                                   
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
									<h5><?php echo round($c,2);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<a href="<?= base_url('c_gradepls'); ?>"><i class="fas"><u>PLS</u></i></a>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($gradepls_netto as $ini) { 
                                   ?>
                                   
                                        <h3><?= number_format($ini['GradePLS'], 0,',','.');?> KG</h3>
                                   
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
									<h5><?php echo round($c,2);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<a href="<?= base_url('c_gradeb'); ?>"><i class="fas"><u>B</u></i></a>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($gradeB_netto as $ini) { 
                                   ?>
                                   
                                        <h3><?= number_format($ini['GradeB'], 0,',','.');?> KG</h3>
                                   
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
									<h5><?php echo round($c,2);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<a href="<?= base_url(); ?>"><i class="fas"><u>A Alpha</u></i></a>
						
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($gradeAlpha_netto as $ini) { 
                                   ?>
                                   
                                        <h3><?= number_format($ini['GradeApha'], 0,',','.');?> KG</h3>
                                   
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
									<h5><?php echo round($c,2);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<a href="<?= base_url(); ?>"><i class="fas"><u>PLS A</u></i></a>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($gradePlsa_netto as $ini) { 
                                   ?>
                                   
                                        <h3><?= number_format($ini['GradePlsa'], 0,',','.');?> KG</h3>
                                   
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
									<h5><?php echo round($c,2);?> %</h5>
							<?php endforeach; endforeach ; ?>
                              </div>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
					<a href="<?= base_url(); ?>"><i class="fas"><u>A1/PLS</u></i></a>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($gradeApls_netto as $ini) { 
                                   ?>
                                   
                                        <h3><?= number_format($ini['GradeApls'], 0,',','.');?> KG</h3>
                                   
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
									<h5><?php echo round($c,2);?> %</h5>
							<?php endforeach; endforeach ; ?>

                              </div>
					</div>
				</div>
			</div>
		</div>

		<div class="row justify-content-left">
			<div class="col-6 col-sm-6 col-md-12">
				<h3 class="text-dark">Laporan Bongkar Hari Ini (Trip / Bruto / Netto)</h3>
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
							<?php foreach($hitung1 as $dua) { ?>
                                   	<td><?= number_format($dua['KurangDuaPuluh'], 0,',','.');?> / </td>
                                   <?php } ?>

							<?php foreach($sumbruto_today as $dua) { ?>
                                   	<td class="text-success"><?= number_format($dua['Sum_bruto'], 0,',','.');?> / </td>
                                   <?php } ?>

							<?php foreach($sumnetto_today as $dua) { ?>
                                   	<td class="text-warning"><?= number_format($dua['Sum_netto'], 0,',','.');?></td>
                                   <?php } ?>
							</tr>
						</table>
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
						<table>
							<tr>
							<?php foreach($hitung1 as $dua) { ?>
                                   	<td><?= number_format($dua['KurangDuaPuluh'], 0,',','.');?> / </td>
                                   <?php } ?>

							<?php foreach($sumbruto2_today as $dua) { ?>
                                   	<td class="text-success"><?= number_format($dua['Sum_bruto'], 0,',','.');?> / </td>
                                   <?php } ?>

							<?php foreach($sumnetto2_today as $dua) { ?>
                                   	<td class="text-warning"><?= number_format($dua['Sum_netto'], 0,',','.');?></td>
                                   <?php } ?>
							</tr>
						</table>
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
					<h3 class="text-dark">Laporan Bongkar Bulan Ini (Trip / Bruto / Netto)</h3>
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
                                   	<td><?= number_format($dua['KurangDuaPuluh'], 0,',','.');?> / </td>
                                   <?php } ?>

							<?php foreach($sumbruto as $dua) { ?>
                                   	<td class="text-success"><?= number_format($dua['Sum_bruto'], 0,',','.');?> / </td>
                                   <?php } ?>

							<?php foreach($sumnetto as $dua) { ?>
                                   	<td class="text-warning"><?= number_format($dua['Sum_netto'], 0,',','.');?></td>
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
                                    <td class=""><?= number_format($ini['DuaLima'], 0,',','.');?> / </td>
                                   <?php } ?>

							<?php foreach($sumbruto2 as $dua) { ?>
                                   	<td class="text-success"><?= number_format($dua['Sum_bruto'], 0,',','.');?> / </td>
                                   <?php } ?>
								   
							<?php foreach($sumnetto2 as $dua) { ?>
                                   	<td class="text-warning"><?= number_format($dua['Sum_netto'], 0,',','.');?></td>
                                   <?php } ?>
							</tr>
							
						</table>
							
						</div>
                              
							<a href="<?= base_url('c_dualima') ?>" >Lihat Data</a>
                              
					</div>
				</div>
			</div>
			</div>
			
			</div>
		</div>
</div>
<script>
	
</script>