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
									text : "Tabel Total Pembelian",
									horizontalAlign: "center"
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
							
						</div>
						<div class="card-body border-1">
						<?php 
						$gradeA1 = array();
						$x = array();
						$tgl = array();
						?>
						<?php foreach($grafik_tabelbeli as $db) :  ?>
							<?php 
								$sql_grade = $this->db->query("SELECT grade.grade,
								(SELECT SUM(netto) AS total FROM sortasi_plasma 
								WHERE sortasi_plasma.grade = 'A2'
								AND sortasi_plasma.kode_kebun = '$db[kode_kebun]'
								AND sortasi_plasma.tanggal = '$db[tanggal]' ) as totalnetto 
								FROM grade WHERE grade.unit = '$db[kode_kebun]'");

								$tabel_grade = $sql_grade->result_array();
								
								foreach($tabel_grade as $key => $val){ 
									$a = $db['totalnettopks'];
									$b = $val['totalnetto'];
									$c;

									if($a == 0){
										$c = 0;
									}else{
										$c = ($b/$a)*100;
									}
									
									array_push($x, $c);
									array_push($tgl, strtotime($db['tanggal']));
									break;
								?>	
							<?php }  ?>
								
						<?php endforeach;  ?>


						<script>
							function grafik2() {
								var chart = new CanvasJS.Chart("grafikKedua", {
								title:{
									text: "Grafik Grade Pembelian"
								},
								axisX: {
									valueFormatString: "DD MMM,YY"
								},
								axisY:[{
									title: "Persen",
									lineColor: "#C24642",
									tickColor: "#C24642",
									labelFontColor: "#C24642",
									titleFontColor: "#C24642",
									includeZero: true,
									suffix: "%"
								}],
								legend: {
									cursor: "pointer",
									itemclick: toggleDataSeries
								},
								toolTip: {
									shared: true
								},
								data: [{
									type: "line",
									name: "A2",
									color: "#369EAD",
									
									yValueFormatString: "##,#0%",
									suffix: "%",
									showInLegend: true,
									axisYIndex: 1,
									dataPoints:[
										<?php 
										foreach($tgl as $key=>$value){
											echo '{ x: new Date('.date('Y,n-1,d',$tgl[$key]).'), y: '. round($x[$key],2).'},';
										}
										?>
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
								chart.render();
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
	window.onload = grafik1();
	window.onload = grafik2();
</script>