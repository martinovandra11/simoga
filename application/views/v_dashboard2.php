<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
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
					<div class="card-icon bg-warning">
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
						<i class="fas fa-stopwatch"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Waktu Bongkar kurang 20 Menit</h4>
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($duapuluh as $dua) { 
                                   ?>
                                   
                                   <?= number_format($dua['KurangDuaPuluh'], 0,',','.');?>
                                   
                                   <?php } ?>
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
							<h4>Muatan Lebih dari 5 TON</h4>
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

		<div class="row justify-content-center">
               <div class="col-6 col-sm-6 col-md-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Bongkar < 20 Menit Dan Kapasitas > 5 Ton</h4>
						</div>
						<div class="card-body">
                                   <?php 
                                        foreach($hariini as $ini) { 
                                   ?>
                                   
                                   <?= number_format($ini['JumlahPerHari'], 0,',','.');?>
                                   
                                   <?php } ?>
						</div>
                              <div>
                                   <a href="<?= base_url('c_duapuluh') ?>" >Lihat Data</a>
                              </div>
                              
					</div>
				</div>
			</div>
		</div>

		
</div>
