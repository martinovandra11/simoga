<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Laporan Persentase Grading Plasma dan Pihak III</h1>
		</div>

          <form action="<?= base_url('c_dashboard4/lihat') ?>" method="POST">
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
							<input class="mb-3 mr-3 col-6 form-control" type="date" name="tglmulai" id="tglmulai"/>
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
                                   <input class="mb-3 mr-3 col-6 form-control" type="date" name="tglakhir" id="tglakhir"/>
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
                                   <h4>Nama PKS</h4>
						</div>
						<div>
                                   <input class="mb-3 mr-3 col-6 form-control" type="text" name="pks" id="pks"/>
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
			<div class="col-6 col-sm-6 col-md-8">
				<div class="card card-statistic-1">
					<div class="card-wrap">
						<div class="card-header">
							<h4>Tanggal Mulai</h4>
						</div>
						<div class="card-body border-1">
							<Table class="table table-bordered">
								<thead>
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
								<Table class="table table-bordered">
									<thead>
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
											<td id="tgl"><?= $db['tanggal']?></td>
											<td>
											<?php foreach($tabelbeli2 as $db2) : ?>
												<div><?= $db2['totalnetto']?></div>
											<?php endforeach;?>
											</td>

									</tr>
									<?php endforeach;?>
									</tbody>
								</Table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-6 col-sm-6 col-md-4">
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
						window.onload = function () {

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


     </div>
</div>
</div>
</div>
