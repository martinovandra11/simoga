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
		
		<div class="row">
			<div class="col">
				<div class="row justify-content-left">
					<div class="col col-sm-6 col-md-4">
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
									foreach ($hariini as $ini) {
									?>
										<?= number_format($ini['JumlahPerHari'], 0, ',', '.'); ?> Trip

									<?php } ?>
								</div>
								<div>
									<a href="<?= base_url('c_dashboard') ?>">Lihat Data</a>
								</div>

							</div>
						</div>
					</div>

					<div class="col col-sm-6 col-md-4">
						<div class="card card-statistic-1">
							<div class="card-icon bg-primary">
								<i class="fas fa-shipping-fast"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h4>Bruto(Kg)</h4>
								</div>
								<div class="card-body">
									<?php foreach ($jumlahbruto_today as $bruto) : ?>
										<?php echo number_format($bruto['JumlahBruto'], 0, ',', '.'); ?> Kg
									<?php endforeach; ?>
								</div>		
							</div>
						</div>
					</div>

					<div class="col col-sm-6 col-md-4">
						<div class="card card-statistic-1">
							<div class="card-icon bg-primary">
								<i class="fas fa-shipping-fast"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h4>Netto(Kg)</h4>
								</div>
								<div class="card-body">
									<?php foreach ($jumlahnetto_today as $netto) : ?>
										<H5><?php echo number_format($netto['JumlahNetto'], 0, ',', '.');?> Kg</H5>
									<?php endforeach; ?>
								</div>	
							</div>
						</div>
					</div>
				</div>

				<div class="row justify-content-left">
					<div class="col col-sm-6 col-md-12">
						<h3 class="text-dark">Data Tonase Kemarin, <?php echo date('d - M - Y', strtotime("-1 day", strtotime(date("d - M - Y")))); ?></h3>
					</div>
				</div>


				<div class="row justify-content-left">
					<div class="col col-sm-6 col-md-4">
						<div class="card card-statistic-1">
							<div class="card-icon bg-primary">
								<i class="fas fa-shipping-fast"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h4>Total Trip</h4>
								</div>
								<div class="card-body">
								<?php
									foreach ($kemarin as $ini) {
									?>
										<?= number_format($ini['Kemarin'], 0, ',', '.'); ?> Trip

									<?php } ?>
								</div>
								
							</div>
						</div>
					</div>

					<div class="col col-sm-6 col-md-4">
						<div class="card card-statistic-1">
							<div class="card-icon bg-primary">
								<i class="fas fa-shipping-fast"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h4>Bruto(kg)</h4>
								</div>
								<div class="card-body">
									<?php foreach ($jumlahbruto_yes as $bruto) : ?>
										<h5><?php echo number_format($bruto['JumlahBruto'], 0, ',', '.'); ?> Kg</h5>
									<?php endforeach; ?>
								
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
									<h4>Netto(Kg)</h4>
								</div>
								<div class="card-body">
									<?php foreach ($jumlahnetto_yes as $netto) : ?>
										<h5><?php echo number_format($netto['JumlahNetto'], 0, ',', '.'); ?> Kg</h5>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row justify-content-left">
					<div class="col col-sm-6 col-md-12">
						<h3 class="text-dark">Informasi Pembelian</h3>
					</div>
				</div>
				
				<div class="row justify-content-left">
					<div class="col col-sm-6 col-md-6">
						<div class="card card-statistic-1">
							<div class="card-icon bg-primary">
								<i class="fas fa-shipping-fast"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									
								</div>
								<div class="card-body">
								<h5>Plasma</h5>
									<?php foreach ($beli as $netto) : ?>
										<?php foreach ($jumlahnetto_today as $sum) :?>
										<?php 
											$penyebut = $sum['JumlahNetto'];
											$pembilang = $netto['totalplasma'];
											$hasil = "";

											if($penyebut == 0){
												$hasil = 0;
											}else{
												$hasil = ($pembilang / $penyebut) * 100;
											}
										?>
										<h5><?php echo number_format($pembilang, 0, ',', '.'); ?> Kg ( <?php echo round($hasil,2)  ?> % )</h5>
									<?php endforeach; endforeach; ?>
								</div>
								
							</div>
						</div>
					</div>


					<div class="col-6 col-md-6">
						<div class="card card-statistic-1">
							<div class="card-icon bg-primary">
								<i class="fas fa-shipping-fast"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h5>Pihak Ke-III</h5>
								</div>
								<div class="card-body">
									
									<?php foreach ($pihaktiga as $netto) : ?>
										<?php foreach ($jumlahnetto_today as $sum) :?>
										<?php 
											$penyebut = $sum['JumlahNetto'];
											$pembilang = $netto['totalp3'];
											$hasil = "";

											if($penyebut == 0){
												$hasil = 0;
											}else{
												$hasil = ($pembilang / $penyebut) * 100;
											}
										?>
										<p class="text-medium"><?php echo number_format($pembilang, 0, ',', '.'); ?> Kg (<?php echo round($hasil,2)  ?> %)</p>
									<?php endforeach; endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
					<!-- grafik		 -->
			<div class="col">
				<div class="card card-statistic-1">
					<div class="card-wrap">
						<div class="card-header">
							<h3>Informasi Grade Hari Ini</h3>
						</div>
						<div class="card-body">

						<?php
							
							foreach($grade_tampil as $g){
								$netto = $this->db->query("SELECT grade, SUM(netto) AS netto FROM sortasi_plasma WHERE grade = '$g[grade]'")->result_array();
								foreach($netto as $n){
									$arrMat[] = [ 'y' => $n['netto'], 'name' => $n['grade']];
								}		
							}
						?>
							<script type="text/javascript">
							
							function tampil() {
								var chart = new CanvasJS.Chart("chartContainer", {
									exportEnabled: true,
									animationEnabled: true,
									
									legend:{
										cursor: "pointer",
										itemclick: explodePie
									},
									data: [{
										type: "pie",
										showInLegend: true,
										toolTipContent: "{name}: <strong>{y}</strong>",
										indexLabel: "{name} - {y}",
										dataPoints: <?= json_encode($arrMat, JSON_NUMERIC_CHECK);?>
									}]
								});
								chart.render();
								
								
								function explodePie (e) {
									if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
										e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
									} else {
										e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
									}
									e.chart.render();
								
								}
							}
							</script>
							<div id="chartContainer" style="height: 370px; width: 100%;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-left">
			<div class="col-6 col-md-6">
				<div class="card card-statistic-1">
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">
						<?php
							foreach($grafikpks as $g){
								// $itu = $g['hitung'];
								$pks[] = [ 'label' => $g['kode_kebun'], 'y' => $g['netto']];				
							}
						?>
						<script>
							function pks(){
								var chart = new CanvasJS.Chart("chartPKS", {
								theme: "light2", // "light2", "dark1", "dark2"
								animationEnabled: true, // change to true		
								title:{
									text: "Jumlah Netto Per PKS"
								},
								data: [
								{
									// Change type to "bar", "area", "spline", "pie",etc.
									type: "column",
									dataPoints: 
									<?= json_encode($pks, JSON_NUMERIC_CHECK);?>
								}
								]
							});
							chart.render();
							}
						</script>
						<div id="chartPKS" style="height: 370px; width: 100%;"></div>
						</div>
					</div>
				</div>
			</div>
		

			<div class="col-6 col-md-6">
				<div class="card card-statistic-1">
					<div class="card-wrap">
						<div class="card-header">
							
						</div>
						<div class="card-body">

						<?php
							$label = "Lama Bongkar < 20 Menit dan Netto < 5 Ton";
							$label2 = "Lama Bongkar < 20 Menit dan Netto > 5 Ton";
							foreach($grafikbongkar as $g){
								$itu = $g['hitung'];
								$bongkar[] = [ 'label' => $label, 'y' => $g['hitung']];				
							}

							foreach($grafikbongkar2 as $g){
								$ini = $g['hitung'];
								$bongkar[] = [ 'label' => $label2, 'y' => $g['hitung']];				
							}
						?>
						<script>
							function tampil2() {

							var chart2 = new CanvasJS.Chart("chartBongkar", {
								animationEnabled: true,
								title:{
									text : "Informasi Lama Bongkar"
								},
								data: [{
									type: "doughnut",
									startAngle: 60,
									innerRadius: 60,
									indexLabelFontSize: 16,
									indexLabel: "{label} - #percent%",
									toolTipContent: "{label}: <b>{y} Trip</b> (#percent%)",
									dataPoints: [
										{ y: <?= $itu ?>, label: "Lama Bongkar < 20 Menit dan Netto < 5 Ton" },
										{ y: <?= $ini ?>, label: "Lama Bongkar < 20 Menit dan Netto > 5 Ton" },
									]			
								}]
							});
								chart2.render();
							}
						</script>
						<div id="chartBongkar" style="height: 370px; width: 100%;"></div>
						</div>
					</div>
				</div>

				</div>
			</div>
		</div>
	</div>

			

			

			

				
		

		

		
		


		<!-- BATAS -->

		<?php if ($this->session->userdata('level') == 0) { ?>
			<div class="row justify-content-left">
				<div class="col-6 col-sm-6 col-md-12">
					<h3 class="text-dark">Data Grading Hari Ini</h3>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-6 col-sm-6 col-md-4">
					<div class="card card-statistic-1">
						<div class="card-icon bg-info">
							<a href="<?= base_url('c_gradea1plus'); ?>"><i class="fas"><u>A1+</u></i></a>
						</div>
						<div class="card-wrap">
							<div class="card-header">
							</div>
							<div class="card-body">
								<?php
								foreach ($aplus_netto as $ini) {
								?>

									<h3><?= number_format($ini['atu_plus'], 0, ',', '.'); ?> KG</h3>

								<?php } ?>

							</div>
							<div>
								<?php
								foreach ($jumlahnetto_today as $grade) :
									foreach ($aplus_netto as $grade2) :
										$a = $grade['JumlahNetto'];
										$b = $grade2['atu_plus'];
										$c;
										if ($a == 0) {
											$c = 0;
										} else {
											$c = ($b / $a) * 100;
										}
								?>
										<h5><?php echo round($c, 2); ?> %</h5>
								<?php endforeach;
								endforeach; ?>
							</div>
						</div>
					</div>
				</div>

				<div class="col-6 col-md-4">
					<div class="card card-statistic-1">
						<div class="card-icon bg-info">
							<a href="<?= base_url('c_gradea'); ?>"><i class="fas"><u>A</u></i></a>
						</div>
						<div class="card-wrap">
							<div class="card-header">

							</div>
							<div class="card-body">
								<?php
								foreach ($gradea_netto as $ini) {
								?>

									<h3><?= number_format($ini['GradeA'], 0, ',', '.'); ?> KG</h3>

								<?php } ?>
							</div>
							<div>
								<?php //persentase grade A
								foreach ($jumlahnetto_today as $grade) :
									foreach ($gradea_netto as $grade2) :
										$a = $grade['JumlahNetto'];
										$b = $grade2['GradeA'];
										$c;
										if ($a == 0) {
											$c = 0;
										} else {
											$c = ($b / $a) * 100;
										}
								?>
										<h5><?php echo round($c, 2); ?> %</h5>
								<?php endforeach;
								endforeach; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 col-md-4">
					<div class="card card-statistic-1">
						<div class="card-icon bg-info">
							<a href="<?= base_url('c_gradea1'); ?>"><i class="fas"><u>A1</u></i></a>
						</div>
						<div class="card-wrap">
							<div class="card-header">

							</div>
							<div class="card-body">
								<?php
								foreach ($gradea1_netto as $ini) {
								?>

									<h3><?= number_format($ini['GradeA1'], 0, ',', '.'); ?> KG</h3>

								<?php } ?>
							</div>
							<div>
								<?php //persentase grade A1
								foreach ($jumlahnetto_today as $grade) :
									foreach ($gradea1_netto as $grade2) :
										$a = $grade['JumlahNetto'];
										$b = $grade2['GradeA1'];
										$c;
										if ($a == 0) {
											$c = 0;
										} else {
											$c = ($b / $a) * 100;
										}
								?>
										<h5><?php echo round($c, 2); ?> %</h5>
								<?php endforeach;
								endforeach; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 col-md-4">
					<div class="card card-statistic-1">
						<div class="card-icon bg-warning">
							<a href="<?= base_url('c_gradea2'); ?>"><i class="fas"><u>A2</u></i></a>
						</div>
						<div class="card-wrap">
							<div class="card-header">

							</div>
							<div class="card-body">
								<?php
								foreach ($gradea2_netto as $ini) {
								?>

									<h3><?= number_format($ini['GradeA2'], 0, ',', '.'); ?> KG</h3>

								<?php } ?>
							</div>
							<div>
								<?php //persentase grade A1
								foreach ($jumlahnetto_today as $grade) :
									foreach ($gradea2_netto as $grade2) :
										$a = $grade['JumlahNetto'];
										$b = $grade2['GradeA2'];
										$c;
										if ($a == 0) {
											$c = 0;
										} else {
											$c = ($b / $a) * 100;
										}
								?>
										<h5><?php echo round($c, 2); ?> %</h5>
								<?php endforeach;
								endforeach; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 col-md-4">
					<div class="card card-statistic-1">
						<div class="card-icon bg-warning">
							<a href="<?= base_url('c_gradeaplus'); ?>"><i class="fas"><u>A+</u></i></a>
						</div>
						<div class="card-wrap">
							<div class="card-header">

							</div>
							<div class="card-body">
								<?php
								foreach ($gradeaplus_netto as $ini) {
								?>

									<h3><?= number_format($ini['GradeAplus'], 0, ',', '.'); ?> KG</h3>

								<?php } ?>
							</div>
							<div>
								<?php //persentase grade A+
								foreach ($jumlahnetto_today as $grade) :
									foreach ($gradeaplus_netto as $grade2) :
										$a = $grade['JumlahNetto'];
										$b = $grade2['GradeAplus'];
										$c;
										if ($a == 0) {
											$c = 0;
										} else {
											$c = ($b / $a) * 100;
										}
								?>
										<h5><?php echo round($c, 2); ?> %</h5>
								<?php endforeach;
								endforeach; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 col-md-4">
					<div class="card card-statistic-1">
						<div class="card-icon bg-warning">
							<a href="<?= base_url('c_gradea3'); ?>"><i class="fas"><u>A3</u></i></a>
						</div>
						<div class="card-wrap">
							<div class="card-header">

							</div>
							<div class="card-body">
								<?php
								foreach ($gradea3_netto as $ini) {
								?>

									<h3><?= number_format($ini['GradeA3'], 0, ',', '.'); ?> KG</h3>

								<?php } ?>
							</div>
							<div>
								<?php //persentase grade A3
								foreach ($jumlahnetto_today as $grade) :
									foreach ($gradea3_netto as $grade2) :
										$a = $grade['JumlahNetto'];
										$b = $grade2['GradeA3'];
										$c;
										if ($a == 0) {
											$c = 0;
										} else {
											$c = ($b / $a) * 100;
										}
								?>
										<h5><?php echo round($c, 2); ?> %</h5>
								<?php endforeach;
								endforeach; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 col-md-4">
					<div class="card card-statistic-1">
						<div class="card-icon bg-secondary">
							<a href="<?= base_url('c_gradepls'); ?>"><i class="fas"><u>PLS</u></i></a>
						</div>
						<div class="card-wrap">
							<div class="card-header">

							</div>
							<div class="card-body">
								<?php
								foreach ($gradepls_netto as $ini) {
								?>

									<h3><?= number_format($ini['GradePLS'], 0, ',', '.'); ?> KG</h3>

								<?php } ?>
							</div>
							<div>
								<?php //persentase grade PLS
								foreach ($jumlahnetto_today as $grade) :
									foreach ($gradepls_netto as $grade2) :
										$a = $grade['JumlahNetto'];
										$b = $grade2['GradePLS'];
										$c;
										if ($a == 0) {
											$c = 0;
										} else {
											$c = ($b / $a) * 100;
										}
								?>
										<h5><?php echo round($c, 2); ?> %</h5>
								<?php endforeach;
								endforeach; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 col-md-4">
					<div class="card card-statistic-1">
						<div class="card-icon bg-secondary">
							<a href="<?= base_url('c_gradeb'); ?>"><i class="fas"><u>B</u></i></a>
						</div>
						<div class="card-wrap">
							<div class="card-header">

							</div>
							<div class="card-body">
								<?php
								foreach ($gradeB_netto as $ini) {
								?>

									<h3><?= number_format($ini['GradeB'], 0, ',', '.'); ?> KG</h3>

								<?php } ?>
							</div>
							<div>
								<?php //persentase grade B
								foreach ($jumlahnetto_today as $grade) :
									foreach ($gradeB_netto as $grade2) :
										$a = $grade['JumlahNetto'];
										$b = $grade2['GradeB'];
										$c;
										if ($a == 0) {
											$c = 0;
										} else {
											$c = ($b / $a) * 100;
										}
								?>
										<h5><?php echo round($c, 2); ?> %</h5>
								<?php endforeach;
								endforeach; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 col-md-4">
					<div class="card card-statistic-1">
						<div class="card-icon bg-secondary">
							<a href="<?= base_url('c_gradealpha'); ?>"><i class="fas"><u>A Alpha</u></i></a>

						</div>
						<div class="card-wrap">
							<div class="card-header">

							</div>
							<div class="card-body">
								<?php
								foreach ($gradeAlpha_netto as $ini) {
								?>

									<h3><?= number_format($ini['GradeApha'], 0, ',', '.'); ?> KG</h3>

								<?php } ?>
							</div>
							<div>
								<?php //persentase grade A ALPHA
								foreach ($jumlahnetto_today as $grade) :
									foreach ($gradeAlpha_netto as $grade2) :
										$a = $grade['JumlahNetto'];
										$b = $grade2['GradeApha'];
										$c;
										if ($a == 0) {
											$c = 0;
										} else {
											$c = ($b / $a) * 100;
										}
								?>
										<h5><?php echo round($c, 2); ?> %</h5>
								<?php endforeach;
								endforeach; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 col-md-4">
					<div class="card card-statistic-1">
						<div class="card-icon bg-primary">
							<a href="<?= base_url('c_gradeplsa'); ?>"><i class="fas"><u>PLS A</u></i></a>
						</div>
						<div class="card-wrap">
							<div class="card-header">

							</div>
							<div class="card-body">
								<?php
								foreach ($gradePlsa_netto as $ini) {
								?>

									<h3><?= number_format($ini['GradePlsa'], 0, ',', '.'); ?> KG</h3>

								<?php } ?>
							</div>
							<div>
								<?php //persentase grade PLS A
								foreach ($jumlahnetto_today as $grade) :
									foreach ($gradePlsa_netto as $grade2) :
										$a = $grade['JumlahNetto'];
										$b = $grade2['GradePlsa'];
										$c;
										if ($a == 0) {
											$c = 0;
										} else {
											$c = ($b / $a) * 100;
										}
								?>
										<h5><?php echo round($c, 2); ?> %</h5>
								<?php endforeach;
								endforeach; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 col-md-4">
					<div class="card card-statistic-1">
						<div class="card-icon bg-primary">
							<a href="<?= base_url('c_gradea1pls'); ?>"><i class="fas"><u>A1/PLS</u></i></a>
						</div>
						<div class="card-wrap">
							<div class="card-header">

							</div>
							<div class="card-body">
								<?php
								foreach ($gradeApls_netto as $ini) {
								?>

									<h3><?= number_format($ini['GradeApls'], 0, ',', '.'); ?> KG</h3>

								<?php } ?>
							</div>
							<div>
								<?php //persentase grade A1/PLASMA
								foreach ($jumlahnetto_today as $grade) :
									foreach ($gradeApls_netto as $grade2) :
										$a = $grade['JumlahNetto'];
										$b = $grade2['GradeApls'];
										$c;
										if ($a == 0) {
											$c = 0;
										} else {
											$c = ($b / $a) * 100;
										}
								?>
										<h5><?php echo round($c, 2); ?> %</h5>
								<?php endforeach;
								endforeach; ?>

							</div>
						</div>
					</div>
				</div>

				<div class="col-6 col-md-4"></div>
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
										<?php foreach ($hitung1 as $dua) { ?>
											<td><?= number_format($dua['KurangDuaPuluh'], 0, ',', '.'); ?> / </td>
										<?php } ?>

										<?php foreach ($sumbruto_today as $dua) { ?>
											<td class="text-success"><?= number_format($dua['Sum_bruto'], 0, ',', '.'); ?> / </td>
										<?php } ?>

										<?php foreach ($sumnetto_today as $dua) { ?>
											<td class="text-warning"><?= number_format($dua['Sum_netto'], 0, ',', '.'); ?></td>
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
								<h4>Bongkar < 20 Menit Dan Kapasitas> 5 Ton</h4>
							</div>
							<div class="card-body">
								<table>
									<tr>
										<?php foreach ($hitung1 as $dua) { ?>
											<td><?= number_format($dua['KurangDuaPuluh'], 0, ',', '.'); ?> / </td>
										<?php } ?>

										<?php foreach ($sumbruto2_today as $dua) { ?>
											<td class="text-success"><?= number_format($dua['Sum_bruto'], 0, ',', '.'); ?> / </td>
										<?php } ?>

										<?php foreach ($sumnetto2_today as $dua) { ?>
											<td class="text-warning"><?= number_format($dua['Sum_netto'], 0, ',', '.'); ?></td>
										<?php } ?>
									</tr>
								</table>
							</div>
							<div>
								<a href="<?= base_url('c_bagian2') ?>">Lihat Data</a>
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
										<?php foreach ($duapuluh as $dua) { ?>
											<td><?= number_format($dua['KurangDuaPuluh'], 0, ',', '.'); ?> / </td>
										<?php } ?>

										<?php foreach ($sumbruto as $dua) { ?>
											<td class="text-success"><?= number_format($dua['Sum_bruto'], 0, ',', '.'); ?> / </td>
										<?php } ?>

										<?php foreach ($sumnetto as $dua) { ?>
											<td class="text-warning"><?= number_format($dua['Sum_netto'], 0, ',', '.'); ?></td>
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
								<h4>Bongkar < 20 Menit Dan Kapasitas> 5 Ton</h4>
							</div>
							<div class="card-body">

								<table>
									<tr>
										<?php foreach ($dualima as $ini) { ?>
											<td class=""><?= number_format($ini['DuaLima'], 0, ',', '.'); ?> / </td>
										<?php } ?>

										<?php foreach ($sumbruto2 as $dua) { ?>
											<td class="text-success"><?= number_format($dua['Sum_bruto'], 0, ',', '.'); ?> / </td>
										<?php } ?>

										<?php foreach ($sumnetto2 as $dua) { ?>
											<td class="text-warning"><?= number_format($dua['Sum_netto'], 0, ',', '.'); ?></td>
										<?php } ?>
									</tr>

								</table>

							</div>

							<a href="<?= base_url('c_dualima') ?>">Lihat Data</a>

						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<div class="row justify-content-left">
			<div class="col-6 col-sm-6 col-md-12">
				<h3 class="text-dark">Data Grade Per PKS</h3>
			</div>
		</div>
		<?php foreach ($pks as $ks) :
			$jumlahnetto = $this->db->query("SELECT SUM(netto) AS jml_netto FROM sortasi_plasma WHERE kode_kebun = '$ks[kode_kebun]' AND tanggal = DATE(NOW())");
			$jmlnetto = $jumlahnetto->result_array();

			foreach ($jmlnetto as $jn) : ?>

				<?php
				if ($this->session->userdata('level') == 1) {
					if ($ks['kode_kebun'] == 'SGH' or $ks['kode_kebun'] == 'SPA' or $ks['kode_kebun'] == 'SGO') {
				?>

						<div class="row justify-content-left">
							<div class="col-6 col-sm-6 col-md-12">
								<h5 class="text-dark">PKS <?php echo $ks['kode_kebun']; ?> ( <?php echo $jn['jml_netto']; ?> )</h5>
								<a href="<?php echo base_url('c_dashboard2/detail/' . $ks['kode_kebun']) ?>">Lihat Data</a>
							</div>
						</div>
						<div class="row justify-content-left">

							<?php
							$query = $this->db->query("SELECT DISTINCT kode_kebun, grade  FROM sortasi_plasma WHERE kode_kebun = '$ks[kode_kebun]'ORDER BY kode_kebun");
							$sql = $query->result_array();

							foreach ($sql as $key => $ini) {

								$query1 = $this->db->query("SELECT SUM(netto) as diatas FROM sortasi_plasma WHERE kode_kebun = '$ks[kode_kebun]' AND grade = '$ini[grade]' AND tanggal = DATE(NOW())");
								$sql1 = $query1->result_array();

								$query2 = $this->db->query("SELECT SUM(netto) as dibawah FROM sortasi_plasma WHERE tanggal = DATE(NOW())");
								$sql2 = $query2->result_array();

								foreach ($sql2 as $key => $itu) {
									foreach ($sql1 as $key => $itu2) {
										$a = $itu['dibawah'];
										$b = $itu2['diatas'];
										$c;
										if ($a == 0) {
											$c = 0;
										} else {
											$c = ($b / $a) * 100;
										} ?>

										<div class="col-6 col-sm-6 col-md-3">
											<div class="card card-statistic-1">
												<div class="card-icon bg-primary">
													<i class="fas fa-shipping-fast"></i>
												</div>
												<div class="card-wrap">
													<div class="card-header">

													</div>
													<div class="card-body">
														<h5 class="text-dark"><?php echo $ini['grade'] ?></h5>
														<h5 class="text-success">Netto <?php echo round($b, 2); ?> KG
														</h5>
														<h5 class="text-dark">Persentase Netto (<?php echo round($c, 2); ?> %)</h5>
													</div>
												</div>
											</div>
										</div>

							<?php }
								}
							} ?>

						</div>
					<?php }
				} else if ($this->session->userdata('level') == 2) {
					if ($ks['kode_kebun'] == 'TPU' or $ks['kode_kebun'] == 'TME') { ?>
						<div class="row justify-content-left">
							<div class="col-6 col-sm-6 col-md-12">
								<h5 class="text-dark">PKS <?php echo $ks['kode_kebun']; ?> ( <?php echo $jn['jml_netto']; ?> )</h5>
								<a href="<?php echo base_url('c_dashboard2/detail/' . $ks['kode_kebun']) ?>">Lihat Data</a>
							</div>
						</div>
						<div class="row justify-content-left">

							<?php
							$query = $this->db->query("SELECT DISTINCT kode_kebun, grade  FROM sortasi_plasma WHERE kode_kebun = '$ks[kode_kebun]' ORDER BY kode_kebun");
							$sql = $query->result_array();

							foreach ($sql as $key => $ini) {

								$query1 = $this->db->query("SELECT SUM(netto) as diatas FROM sortasi_plasma WHERE kode_kebun = '$ks[kode_kebun]' AND grade = '$ini[grade]' AND tanggal = DATE(NOW())");
								$sql1 = $query1->result_array();

								$query2 = $this->db->query("SELECT SUM(netto) as dibawah FROM sortasi_plasma WHERE tanggal = DATE(NOW())");
								$sql2 = $query2->result_array();

								foreach ($sql2 as $key => $itu) {
									foreach ($sql1 as $key => $itu2) {
										$a = $itu['dibawah'];
										$b = $itu2['diatas'];
										$c;
										if ($a == 0) {
											$c = 0;
										} else {
											$c = ($b / $a) * 100;
										} ?>

										<div class="col-6 col-sm-6 col-md-3">
											<div class="card card-statistic-1">
												<div class="card-icon bg-primary">
													<i class="fas fa-shipping-fast"></i>
												</div>
												<div class="card-wrap">
													<div class="card-header">

													</div>
													<div class="card-body">
														<h5 class="text-dark"><?php echo $ini['grade'] ?></h5>
														<h5 class="text-success">Netto <?php echo round($b, 2); ?> KG
														</h5>
														<h5 class="text-dark">Persentase Netto (<?php echo round($c, 2); ?> %)</h5>
													</div>
												</div>
											</div>
										</div>

							<?php }
								}
							} ?>

						</div>

					<?php }
				} else if ($this->session->userdata('level') == 3) {
					if ($ks['kode_kebun'] == 'SBT' or $ks['kode_kebun'] == 'LDA') { ?>
						<div class="row justify-content-left">
							<div class="col-6 col-sm-6 col-md-12">
								<h5 class="text-dark">PKS <?php echo $ks['kode_kebun']; ?> ( <?php echo $jn['jml_netto']; ?> )</h5>
								<a href="<?php echo base_url('c_dashboard2/detail/' . $ks['kode_kebun']) ?>">Lihat Data</a>
							</div>
						</div>
						<div class="row justify-content-left">

							<?php
							$query = $this->db->query("SELECT DISTINCT kode_kebun, grade  FROM sortasi_plasma WHERE kode_kebun = '$ks[kode_kebun]' ORDER BY kode_kebun");
							$sql = $query->result_array();

							foreach ($sql as $key => $ini) {

								$query1 = $this->db->query("SELECT SUM(netto) as diatas FROM sortasi_plasma WHERE kode_kebun = '$ks[kode_kebun]' AND grade = '$ini[grade]' AND tanggal = DATE(NOW())");
								$sql1 = $query1->result_array();

								$query2 = $this->db->query("SELECT SUM(netto) as dibawah FROM sortasi_plasma WHERE tanggal = DATE(NOW())");
								$sql2 = $query2->result_array();

								foreach ($sql2 as $key => $itu) {
									foreach ($sql1 as $key => $itu2) {
										$a = $itu['dibawah'];
										$b = $itu2['diatas'];
										$c;
										if ($a == 0) {
											$c = 0;
										} else {
											$c = ($b / $a) * 100;
										} ?>

										<div class="col-6 col-sm-6 col-md-3">
											<div class="card card-statistic-1">
												<div class="card-icon bg-primary">
													<i class="fas fa-shipping-fast"></i>
												</div>
												<div class="card-wrap">
													<div class="card-header">

													</div>
													<div class="card-body">
														<h5 class="text-dark"><?php echo $ini['grade'] ?></h5>
														<h5 class="text-success">Netto <?php echo round($b, 2); ?> KG
														</h5>
														<h5 class="text-dark">Persentase Netto (<?php echo round($c, 2); ?> %)</h5>
													</div>
												</div>
											</div>
										</div>

							<?php }
								}
							} ?>

						</div>

					<?php }
				} else if ($this->session->userdata('level') == 4) {
					if ($ks['kode_kebun'] == 'STA' or $ks['kode_kebun'] == 'TER' or $ks['kode_kebun'] == 'SIN') { ?>
						<div class="row justify-content-left">
							<div class="col-6 col-sm-6 col-md-12">
								<h5 class="text-dark">PKS <?php echo $ks['kode_kebun']; ?> ( <?php echo $jn['jml_netto']; ?> )</h5>
								<a href="<?php echo base_url('c_dashboard2/detail/' . $ks['kode_kebun']) ?>">Lihat Data</a>
							</div>
						</div>
						<div class="row justify-content-left">

							<?php
							$query = $this->db->query("SELECT DISTINCT kode_kebun, grade FROM sortasi_plasma WHERE kode_kebun = '$ks[kode_kebun]' ORDER BY kode_kebun");
							$sql = $query->result_array();

							foreach ($sql as $key => $ini) {

								$query1 = $this->db->query("SELECT SUM(netto) as diatas FROM sortasi_plasma WHERE kode_kebun = '$ks[kode_kebun]' AND grade = '$ini[grade]' AND tanggal = DATE(NOW())");
								$sql1 = $query1->result_array();

								$query2 = $this->db->query("SELECT SUM(netto) as dibawah FROM sortasi_plasma where kode_kebun = '$ks[kode_kebun]' AND tanggal = DATE(NOW())");
								$sql2 = $query2->result_array();

								foreach ($sql2 as $key => $itu) {
									foreach ($sql1 as $key => $itu2) {
										$a = $itu['dibawah'];
										$b = $itu2['diatas'];
										$c;
										if ($a == 0) {
											$c = 0;
										} else {
											$c = ($b / $a) * 100;
										} ?>

										<div class="col-6 col-sm-6 col-md-3">
											<div class="card card-statistic-1">
												<div class="card-icon bg-primary">
													<i class="fas fa-shipping-fast"></i>
												</div>
												<div class="card-wrap">
													<div class="card-header">

													</div>
													<div class="card-body">
														<h5 class="text-dark"><?php echo $ini['grade'] ?></h5>
														<h5 class="text-success">Netto <?php echo round($b, 2); ?> KG
														</h5>
														<h5 class="text-dark">Persentase Netto (<?php echo round($c, 2); ?> %)</h5>
													</div>
												</div>
											</div>
										</div>

							<?php }
								}
							} ?>

						</div>

					<?php }
				} else { ?>
					<div class="row justify-content-left">
						<div class="col-6 col-sm-6 col-md-12">
							<h5 class="text-dark">PKS <?php echo $ks['kode_kebun']; ?> ( <?php echo $jn['jml_netto']; ?> )</h5>
							<a href="<?php echo base_url('c_dashboard2/detail/' . $ks['kode_kebun']) ?>">Lihat Data</a>
						</div>
					</div>
					<div class="row justify-content-left">

						<?php
						$query = $this->db->query("SELECT DISTINCT kode_kebun, grade  FROM sortasi_plasma WHERE kode_kebun = '$ks[kode_kebun]' ORDER BY kode_kebun");
						$sql = $query->result_array();

						foreach ($sql as $key => $ini) {

							$query1 = $this->db->query("SELECT SUM(netto) as diatas FROM sortasi_plasma WHERE kode_kebun = '$ks[kode_kebun]' AND grade = '$ini[grade]' AND tanggal = DATE(NOW())");
							$sql1 = $query1->result_array();

							$query2 = $this->db->query("SELECT SUM(netto) as dibawah FROM sortasi_plasma where kode_kebun = '$ks[kode_kebun]' AND tanggal = DATE(NOW())");
							$sql2 = $query2->result_array();

							foreach ($sql2 as $key => $itu) {
								foreach ($sql1 as $key => $itu2) {
									$a = $itu['dibawah'];
									$b = $itu2['diatas'];
									$c;
									if ($a == 0) {
										$c = 0;
									} else {
										$c = ($b / $a) * 100;
									} ?>

									<div class="col-6 col-sm-6 col-md-3">
										<div class="card card-statistic-1">
											<div class="card-icon bg-primary">
												<i class="fas fa-shipping-fast"></i>

											</div>

											<div class="card-wrap">
												<div class="card-header">

												</div>
												<div class="card-body">
													<h5 class="text-dark"><?php echo $ini['grade'] ?></h5>
													<h5 class="text-success">Netto <?php echo round($b, 2); ?> KG
													</h5>
													<h5 class="text-dark">Persentase Netto (<?php echo round($c, 2); ?> %)</h5>

												</div>

											</div>
										</div>
									</div>

						<?php }
							}
						} ?>

					</div>

		<?php }
			endforeach;
		endforeach; ?>


</div>
</div>
</div>
<script>
	window.onload = tampil()
	window.onload = tampil2()
	window.onload = pks()
</script>