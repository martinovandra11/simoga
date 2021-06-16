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
                                   <h4>Nama Kebun</h4>
						</div>
						<div>
						<select class="form-control mb-3 mr-3 col-6" id="kodekebun" name="kodekebun">
                				<option value="#">Pilih Kebun</option>
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


     </div>
</div>
</div>
</div>
