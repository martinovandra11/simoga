<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
		</div>

		<div class="row">
               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-user"></i>
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

               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-user"></i>
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
		</div>
</div>
