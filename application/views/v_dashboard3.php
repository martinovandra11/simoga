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
										<H5><?php echo number_format($netto['JumlahNetto'], 0, ',', '.'); ?> Kg</H5>
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
										<?php foreach ($jumlahnetto_today as $sum) : ?>
											<?php
											$penyebut = $sum['JumlahNetto'];
											$pembilang = $netto['totalplasma'];
											$hasil = "";

											if ($penyebut == 0) {
												$hasil = 0;
											} else {
												$hasil = ($pembilang / $penyebut) * 100;
											}
											?>
											<h5><?php echo number_format($pembilang, 0, ',', '.'); ?> Kg ( <?php echo round($hasil, 2)  ?> % )</h5>
									<?php endforeach;
									endforeach; ?>
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
										<?php foreach ($jumlahnetto_today as $sum) : ?>
											<?php
											$penyebut = $sum['JumlahNetto'];
											$pembilang = $netto['totalp3'];
											$hasil = "";

											if ($penyebut == 0) {
												$hasil = 0;
											} else {
												$hasil = ($pembilang / $penyebut) * 100;
											}
											?>
											<p class="text-medium"><?php echo number_format($pembilang, 0, ',', '.'); ?> Kg (<?php echo round($hasil, 2)  ?> %)</p>
									<?php endforeach;
									endforeach; ?>
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
							<h3>Informasi Grade Hari Ini ( Kg )</h3>
						</div>
						<div class="card-body">

							<?php

							foreach ($grade_tampil as $g) {
								$netto = $this->db->query("SELECT grade, SUM(netto) AS netto FROM sortasi_plasma WHERE grade = '$g[grade]'")->result_array();
								foreach ($netto as $n) {
									$arrMat[] = ['y' => $n['netto'], 'name' => $n['grade']];
								}
							}
							?>
							<script type="text/javascript">
								function tampil() {
									var chart = new CanvasJS.Chart("chartContainer", {
										exportEnabled: true,
										animationEnabled: true,

										legend: {
											cursor: "pointer",
											itemclick: explodePie
										},
										data: [{
											type: "pie",
											showInLegend: true,
											toolTipContent: "{name}: <strong>{y}</strong>",
											indexLabel: "{name} - {y}",
											dataPoints: <?= json_encode($arrMat, JSON_NUMERIC_CHECK); ?>
										}]
									});
									chart.render();


									function explodePie(e) {
										if (typeof(e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
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
							<center>
								<h3>Jumlah Netto Per PKS</h3>
							</center>	
						</div>
						<div class="card-body">
							<?php
							foreach ($grafikpks as $g) {
								
								$pks[] = ['label' => $g['kode_kebun'], 'y' => $g['netto']];
							}
							?>
								
							<script>
								function pks() {
									var chart = new CanvasJS.Chart("chartPKS", {
										theme: "light2", // "light2", "dark1", "dark2"
										animationEnabled: true, // change to true	
										exportEnabled: true,	
										title: {
											
										},
										
										data: [{
											// Change type to "bar", "area", "spline", "pie",etc.
											type: "column",
											indexLabel: "{label} - {y}",
											toolTipContent: "{label}: <strong>{y}</strong>",
											dataPoints: <?= json_encode($pks, JSON_NUMERIC_CHECK); ?>	
										}]
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
							<center>
								<h3>Informasi Lama Bongkar ( Trip )</h3>
							</center>
						</div>
						<div class="card-body">

							<?php
							$label = "Lama Bongkar < 20 Menit dan Netto < 5 Ton";
							$label2 = "Lama Bongkar < 20 Menit dan Netto > 5 Ton";
							foreach ($grafikbongkar as $g) {
								$itu = $g['hitung'];
								$bongkar[] = ['label' => $label, 'y' => $g['hitung']];
							}

							foreach ($grafikbongkar2 as $g) {
								$ini = $g['hitung'];
								$bongkar[] = ['label' => $label2, 'y' => $g['hitung']];
							}
							?>
							<script>
								function tampil2() {

									var chart2 = new CanvasJS.Chart("chartBongkar", {
										animationEnabled: true,
										title: {
											text: ""
										},
										data: [{
											type: "doughnut",
											startAngle: 60,
											innerRadius: 60,
											indexLabelFontSize: 16,
											indexLabel: "{label} - #percent%",
											toolTipContent: "{label}: <b>{y} Trip</b> (#percent%)",
											dataPoints: [{
													y: <?= $itu ?>,
													label: "Lama Bongkar < 20 Menit dan Netto < 5 Ton"
												},
												{
													y: <?= $ini ?>,
													label: "Lama Bongkar < 20 Menit dan Netto > 5 Ton"
												},
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

			<div class="col-6 col-md-6">
				<div class="card card-statistic-1">
					<div class="card-wrap">
						<div class="card-header text-center">
							<h3 class="text-dark">Plasma TPU</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-hover table-bordered nowrap h6">
									<tr>
										<th class="text-center">PKS</th>
										<th class="text-center">Grade</th>
										<th class="text-center">Produksi</th>
										<th class="text-center">Persen</th>
									</tr>
									<?php if (!empty($totalpkstpu)) { ?>
										<?php foreach ($totalpkstpu as $tpks) :
											$detail_grade = $this->db->query("SELECT grade.grade,
											(
												SELECT SUM(netto) as a
												FROM sortasi_plasma WHERE sortasi_plasma.grade = grade.grade AND sortasi_plasma.kode_kebun = '$tpks[kode_kebun]' AND sortasi_plasma.tanggal = DATE(NOW())
											) as totalnetto FROM grade WHERE grade.unit = '$tpks[kode_kebun]'")->result_array() ?>
											<tr>
												<td class="text-center"><?= $tpks['kode_kebun'] ?></td>
												<td>
													<?php foreach ($detail_grade as $dg) : ?>
														<div>
															<div style="padding: 5px; text-align: center;"><?= $dg['grade']; ?></div>
														</div>
													<?php endforeach; ?>
												</td>
												<td>
													<?php foreach ($detail_grade as $dg) : ?>
														<?php if ($dg['totalnetto'] == NULL) $dg['totalnetto'] = 0 ?>
														<div style="padding: 5px; text-align: center;"><?= $dg['totalnetto']; ?></div>
													<?php endforeach; ?>
												</td>
												<td>
													<?php foreach ($detail_grade as $dg) : ?>
														<?php if ($dg['totalnetto'] == NULL) $dg['totalnetto'] = 0 ?>
														<div style="padding: 5px; text-align: center;"><?= round($dg['totalnetto'] / $tpks['totalpkstpu'] * 100, 2); ?> %</div>
													<?php endforeach; ?>
												</td>
											</tr>
										<?php
										endforeach;
									} else {
										?> <tr>
											<td class="text-center" colspan='4'>Tidak ada data</td>
										</tr> <?php } ?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-6 col-md-6">
				<div class="card card-statistic-1">
					<div class="card-wrap">
						<div class="card-header text-center">
							<h3 class="text-dark">Plasma SBT</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-hover table-bordered nowrap h6">
									<tr>
										<th class="text-center">PKS</th>
										<th class="text-center">Grade</th>
										<th class="text-center">Produksi</th>
										<th class="text-center">Persen</th>
									</tr>
									<?php if (!empty($totalpkssbt)) { ?>
										<?php foreach ($totalpkssbt as $tpks) :
											$detail_grade = $this->db->query("SELECT grade.grade,
											(
												SELECT SUM(netto) as a
												FROM sortasi_plasma WHERE sortasi_plasma.grade = grade.grade AND sortasi_plasma.kode_kebun = '$tpks[kode_kebun]' AND sortasi_plasma.tanggal = DATE(NOW())
											) as totalnetto FROM grade WHERE grade.unit = '$tpks[kode_kebun]'")->result_array() ?>
											<tr>
												<td class="text-center"><?= $tpks['kode_kebun'] ?></td>
												<td>
													<?php foreach ($detail_grade as $dg) : ?>
														<div>
															<div style="padding: 5px; text-align: center;"><?= $dg['grade']; ?></div>
														</div>
													<?php endforeach; ?>
												</td>
												<td>
													<?php foreach ($detail_grade as $dg) : ?>
														<?php if ($dg['totalnetto'] == NULL) $dg['totalnetto'] = 0 ?>
														<div style="padding: 5px; text-align: center;"><?= $dg['totalnetto']; ?></div>
													<?php endforeach; ?>
												</td>
												<td>
													<?php foreach ($detail_grade as $dg) : ?>
														<?php if ($dg['totalnetto'] == NULL) $dg['totalnetto'] = 0 ?>
														<div style="padding: 5px; text-align: center;"><?= round($dg['totalnetto'] / $tpks['totalpkssbt'] * 100, 2); ?> %</div>
													<?php endforeach; ?>
												</td>
											</tr>
										<?php
										endforeach;
									} else {
										?> <tr>
											<td class="text-center" colspan='4'>Tidak ada data</td>
										</tr> <?php } ?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-6 col-md-6">
				<div class="card card-statistic-1">
					<div class="card-wrap">
						<div class="card-header text-center">
							<h3 class="text-dark">Plasma SGH</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-hover table-bordered nowrap h6">
									<tr>
										<th class="text-center">PKS</th>
										<th class="text-center">Grade</th>
										<th class="text-center">Produksi</th>
										<th class="text-center">Persen</th>
									</tr>
									<?php if (!empty($totalpkssgh)) { ?>
										<?php foreach ($totalpkssgh as $tpks) :
											$detail_grade = $this->db->query("SELECT grade.grade,
											(
												SELECT SUM(netto) as a
												FROM sortasi_plasma WHERE sortasi_plasma.grade = grade.grade AND sortasi_plasma.kode_kebun = '$tpks[kode_kebun]' AND sortasi_plasma.tanggal = DATE(NOW())
											) as totalnetto FROM grade WHERE grade.unit = '$tpks[kode_kebun]'")->result_array() ?>
											<tr>
												<td class="text-center"><?= $tpks['kode_kebun'] ?></td>
												<td>
													<?php foreach ($detail_grade as $dg) : ?>
														<div>
															<div style="padding: 5px; text-align: center;"><?= $dg['grade']; ?></div>
														</div>
													<?php endforeach; ?>
												</td>
												<td>
													<?php foreach ($detail_grade as $dg) : ?>
														<?php if ($dg['totalnetto'] == NULL) $dg['totalnetto'] = 0 ?>
														<div style="padding: 5px; text-align: center;"><?= $dg['totalnetto']; ?></div>
													<?php endforeach; ?>
												</td>
												<td>
													<?php foreach ($detail_grade as $dg) : ?>
														<?php if ($dg['totalnetto'] == NULL) $dg['totalnetto'] = 0 ?>
														<?php 
															$a = $dg['totalnetto'];
															$b = $tpks['totalpkssgh'];
															$c;

															if($b == 0){
																$c = 0;
															}else{
																$c = ($a / $b) * 100;
															}
														?>
														<div style="padding: 5px; text-align: center;"><?= round($c, 2); ?> %</div>
													<?php endforeach; ?>
												</td>
											</tr>
										<?php
										endforeach;
									} else {
										?> <tr>
											<td class="text-center" colspan='4'>Tidak ada data</td>
										</tr> <?php } ?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			

			

			<div class="col-6 col-md-6">
				<div class="card card-statistic-1">
					<div class="card-wrap">
						<div class="card-header text-center">
							<h3 class="text-dark">Plasma STA</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-hover table-bordered nowrap h6">
									<tr>
										<th class="text-center">PKS</th>
										<th class="text-center">Grade</th>
										<th class="text-center">Produksi</th>
										<th class="text-center">Persen</th>
									</tr>

									<?php if (!empty($totalpkssta)) { ?>
										<?php foreach ($totalpkssta as $tpks) :
											$detail_grade = $this->db->query("SELECT grade.grade,
											(
												SELECT SUM(netto) as a
												FROM sortasi_plasma WHERE sortasi_plasma.grade = grade.grade AND sortasi_plasma.kode_kebun = '$tpks[kode_kebun]' AND sortasi_plasma.tanggal = DATE(NOW())
											) as totalnetto FROM grade WHERE grade.unit = '$tpks[kode_kebun]'")->result_array() ?>
											<tr>
												<td class="text-center"><?= $tpks['kode_kebun'] ?></td>
												<td>
													<?php foreach ($detail_grade as $dg) : ?>
														<div>
															<div style="padding: 5px; text-align: center;"><?= $dg['grade']; ?></div>
														</div>
													<?php endforeach; ?>
												</td>
												<td>
													<?php foreach ($detail_grade as $dg) : ?>
														<?php if ($dg['totalnetto'] == NULL) $dg['totalnetto'] = 0 ?>
														<div style="padding: 5px; text-align: center;"><?= $dg['totalnetto']; ?></div>
													<?php endforeach; ?>
												</td>
												<td>
													<?php foreach ($detail_grade as $dg) : ?>
														<?php if ($dg['totalnetto'] == NULL) $dg['totalnetto'] = 0 ?>
														<?php
															$a = $tpks['totalpkssta'];
															$b = $dg['totalnetto'];
															$c;

															if($a = 0){
																$c = 0;
															}else{
																$c = ($b/$a)*100;
															}
														?>
														<div style="padding: 5px; text-align: center;"><?= round($c, 2); ?> %</div>
													<?php endforeach; ?>
												</td>
											</tr>
										<?php
										endforeach;
									} else {
										?> <tr>
											<td class="text-center" colspan='4'>Tidak ada data</td>
										</tr> <?php } ?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
</div>
<script>
	window.onload = tampil();
	window.onload = tampil2();
	window.onload = pks();
</script>