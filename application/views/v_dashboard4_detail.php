<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Laporan Persentase Grading Plasma dan Pihak III</h1>
		</div>

          <form action="<?= base_url('c_dashboard4/lihat') ?>" method="GET">
		<div class="row justify-content-center">
			<div class="col-6 col-sm-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Tanggal Mulai</h4>
						</div>
						<div class="card-body">
							<input class="mb-3 mr-3 col-6 form-control" type="date" name="tglmulai" id="tglmulai" value="<?= $tglmulai ?>"/>
						</div>
					</div>
				</div>
			</div>

			<div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
                                   <h4>Tanggal Selesai</h4>
						</div>
						<div>
                                   <input class="mb-3 mr-3 col-6 form-control" type="date" name="tglakhir" id="tglakhir" value="<?= $tglakhir ?>"/>
						</div>
					</div>
				</div>
			</div>


               <div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
                                   <h4>Nama Kebun</h4>
						</div>
						<div>
						<select class="form-control mb-3 mr-3 col-6" id="kodekebun" name="kodekebun">
                				<option class="bg bg-danger" value="#"><?= $kodekebun2 ?></option>
                				<?php foreach ($kodekebun as $kbn) : ?>
                  					<option value="<?= $kbn['kode_kebun'] ?>"><?= $kbn['kode_kebun'] ?></option>
                				<?php endforeach; ?>
              				</select>
						</div>
					</div>
				</div>
			</div>

			<div class="col-6 col-md-3">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="card-wrap">
                              <div class="card-header">
                                   
						</div>
						<div class="card-body">
                                   <button name="button" class="btn btn-warning">Lihat</button>
						</div>
					</div>
				</div>
			</div>
		</div>
          </form>

		<div class="row justify-content-left">
			<div class="col-6 col-sm-6 col-md-6">
				<div class="card card-statistic-1">
					<div class="card-wrap">
						<div class="card-header">
							<h4 class="text text-dark">Tabel Total Pembelian Tanggal <?= $tglmulai?> s/d <?= $tglmulai?></h4>
						</div>
						<div class="card-body border-1">
							<Table class="table table-bordered">
								<thead class="bg bg-primary">
									<tr>
										<td>Nama PKS</td>
										<td>Plasma</td>
										<td>Pihak III</td>
									</tr>
								</thead>
								<tbody>
								<tr>
									<?php foreach($databeli as $db) :  ?>
										<?php 
											$a = $db['totalnetto'] / 1000;
										?>
										<td><?= $db['kode_kebun']?></td>
										<td><?= round($a, 2)?> Ton</td>
									<?php endforeach;?>
									<?php foreach($databeli2 as $db) :  ?>
										<?php 
											$a = $db['totalnetto'] / 1000;
										?>
										<td><?= round($a, 2)?> Ton</td>
									<?php endforeach;?>
								</tr>
								</tbody>
							</Table>
						</div>
					</div>
				</div>

				<div class="row justify-content-left">
					<div class="card card-statistic-1">
						<div class="card-wrap">
							<div class="card-header">
								<h4>Tabel Grade Pembelian</h4>
							</div>
							<div class="card-body border-1">
								<Table class="table table-bordered table-striped table-hover">
									<thead class="">
										<tr>
											<td>Tanggal </td>
											<td>Grade</td>
											<td>Total Pembelian</td>
											<td>Persentase</td>
										</tr>
									</thead>
									<tbody>
									<?php foreach($tabelbeli as $db) :  ?>
									<tr>	
											<td><?= $db['tanggal']?></td>
											<?php 
												$sql = $this->db->query("SELECT grade.grade,
												(SELECT SUM(netto) AS total FROM sortasi_plasma 
												WHERE sortasi_plasma.grade = grade.grade 
												AND sortasi_plasma.kode_kebun = '$db[kode_kebun]'
												AND sortasi_plasma.tanggal = '$db[tanggal]' ) as totalnetto FROM grade WHERE grade.unit = '$db[kode_kebun]'");

												$tabelbeli2 = $sql->result_array();
											?>
											<td>
											<?php foreach($tabelbeli2 as $db2) : ?>
												<div>
													<?= $db2['grade']?>
												</div>
											<?php endforeach; ?>
											</td>

											<td>
											<?php foreach($tabelbeli2 as $db2) : ?>
											<div>
												<?php 
												$total;
												if($db2['totalnetto'] == NULL){
													echo $total = "-";
												}else{?>
												
													<?= $db2['totalnetto']?>
												
											<?php }?></div>
											<?php endforeach; ?>
											</td>
	
											<td>
												<?php foreach($tabelbeli2 as $db2) : ?>
													<?php 
													$a = $db['totalnettopks'];
													$b = $db2['totalnetto'];
													$c;

													if($a == 0){
														$c = 0;
													}else{
														$c = ($b/$a)*100;
													}
													?>
													<div><?php echo round($c,2)?> %</div>
												<?php endforeach; ?>
											</td>
									</tr>
									<?php  endforeach;?>
									</tbody>
								</Table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-6 col-sm-6 col-md-6">
				<div class="card card-statistic-1">
					<div class="card-wrap">
						<div class="card-header">
							<h4>grafik</h4>
						</div>
						<div class="card-body border-1">

						<?php foreach($databeli as $db) :  ?>
						<?php $a = $db['totalnetto'] / 1000;?>
							
						<?php endforeach;?>
						<?php foreach($databeli2 as $db) :  ?>
							<?php $b = $db['totalnetto'] / 1000;?>
								
							<?php endforeach;?>
						<script>
							function grafik1() {

							var chart = new CanvasJS.Chart("chartContainer", {
								animationEnabled: true,
								title:{
									
									horizontalAlign: "left"
								},
								data: [{
									type: "doughnut",
									startAngle: 60,
									//innerRadius: 60,
									indexLabelFontSize: 17,
									indexLabel: "{label} - #percent%",
									toolTipContent: "<b>{label}:</b> {y} ton (#percent%)",
									dataPoints: [
										{ y: <?= round($a, 2)?> , label: "Plasma" },
										{ y: <?= round($b, 2)?>, label: "Pihak Ke III" }
										
									]
								}]
							});
							chart.render();

							}
						</script>

						<div id="chartContainer" style="height: 370px; width: 100%;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row justify-content-left">
		<div class="col-6 col-sm-6 col-md-12">
				<div class="card card-statistic-1">
					<div class="card-wrap">
						<div class="card-header">
							<h4>Ini Mana</h4>
						</div>
						<div class="card-body border-1">
						<?php foreach($tabelbeli as $db) :  ?>
							<?php 
								$sql = $this->db->query("SELECT grade.grade,
								(SELECT SUM(netto) AS total FROM sortasi_plasma 
								WHERE sortasi_plasma.grade = 'A1' 
								AND sortasi_plasma.kode_kebun = '$db[kode_kebun]'
								AND sortasi_plasma.tanggal = '$db[tanggal]' ) as totalnetto FROM grade WHERE grade.unit = '$db[kode_kebun]'");

								$tabelbeli2 = $sql->result_array();?>

						<?php endforeach;?>
						<script>
							function grafik2() {
								var chart = new CanvasJS.Chart("grafikKedua", {
								title:{
									text: "Grafik Grade Pembelian"
								},
								axisY:[{
									title: "Order",
									lineColor: "#C24642",
									tickColor: "#C24642",
									labelFontColor: "#C24642",
									titleFontColor: "#C24642",
									includeZero: true,
									suffix: "k"
								}],
								
								toolTip: {
									shared: true
								},
								legend: {
									cursor: "pointer",
									itemclick: toggleDataSeries
								},
								data: [{
									type: "line",
									name: "Footfall",
									color: "#369EAD",
									showInLegend: true,
									// axisYIndex: 1,
									dataPoints: [
										{ x: 'b', y: 85.4 }, 
										{ x: new Date(2017, 00, 14), y: 92.7 },
										{ x: new Date(2017, 00, 21), y: 64.9 },
										{ x: new Date(2017, 00, 28), y: 58.0 },
										{ x: new Date(2017, 01, 4), y: 63.4 },
										{ x: new Date(2017, 01, 11), y: 69.9 },
										{ x: new Date(2017, 01, 18), y: 88.9 },
										{ x: new Date(2017, 01, 25), y: 66.3 },
										{ x: new Date(2017, 02, 4), y: 82.7 },
										{ x: new Date(2017, 02, 11), y: 60.2 },
										{ x: new Date(2017, 02, 18), y: 87.3 },
										{ x: new Date(2017, 02, 25), y: 98.5 }
									]
								},
								{
									type: "line",
									name: "Order",
									color: "#C24642",
									// axisYIndex: 0,
									showInLegend: true,
									dataPoints: [
										{ x: new Date(2017, 00, 7), y: 32.3 }, 
										{ x: new Date(2017, 00, 14), y: 33.9 },
										{ x: new Date(2017, 00, 21), y: 26.0 },
										{ x: new Date(2017, 00, 28), y: 15.8 },
										{ x: new Date(2017, 01, 4), y: 18.6 },
										{ x: new Date(2017, 01, 11), y: 34.6 },
										{ x: new Date(2017, 01, 18), y: 37.7 },
										{ x: new Date(2017, 01, 25), y: 24.7 },
										{ x: new Date(2017, 02, 4), y: 35.9 },
										{ x: new Date(2017, 02, 11), y: 12.8 },
										{ x: new Date(2017, 02, 18), y: 38.1 },
										{ x: new Date(2017, 02, 25), y: 42.4 }
									]
								},
								{
									type: "line",
									name: "Revenue",
									color: "#7F6084",
									axisYType: "secondary",
									showInLegend: true,
									dataPoints: [
										{ x: new Date(2017, 00, 7), y: 42.5 }, 
										{ x: new Date(2017, 00, 14), y: 44.3 },
										{ x: new Date(2017, 00, 21), y: 28.7 },
										{ x: new Date(2017, 00, 28), y: 22.5 },
										{ x: new Date(2017, 01, 4), y: 25.6 },
										{ x: new Date(2017, 01, 11), y: 45.7 },
										{ x: new Date(2017, 01, 18), y: 54.6 },
										{ x: new Date(2017, 01, 25), y: 32.0 },
										{ x: new Date(2017, 02, 4), y: 43.9 },
										{ x: new Date(2017, 02, 11), y: 26.4 },
										{ x: new Date(2017, 02, 18), y: 40.3 },
										{ x: new Date(2017, 02, 25), y: 54.2 }
									]
								}]
							});
							chart.render();

							function toggleDataSeries(e) {
								if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
									e.dataSeries.visible = false;
								} else {
									e.dataSeries.visible = true;
								}
								e.chart.render();
							}

							}
							</script>

						<div id="grafikKedua" style="height: 370px; width: 100%;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
     </div>
</div>
</div>
</div>

<script>
	window.onload = grafik1()
	window.onload = grafik2()
</script>