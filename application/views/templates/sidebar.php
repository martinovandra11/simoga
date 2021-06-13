<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url() ?>assets/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">

                            <?php if ($this->session->userdata('username')) { ?>
                                <div class="d-sm-none d-lg-inline-block"><?= $this->session->userdata('username') ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="c_auth/logout" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i>Logout
                            <?php } else { ?>
                    <li><?= anchor('c_auth/login'); ?></li>

                <?php } ?>
                </a>
        </div>
        </li>
        </ul>
        </nav>
        <div class="main-sidebar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="<?= base_url('c_dashboard2') ?>">SIMOGA</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="<?= base_url() ?>">SMG</a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Dashboard</li>
                    <li class="<?php if ($this->uri->uri_string() == 'c_dashboard2') {
                                    echo 'nav-item active';
                                } ?>"><a class="nav-link" href="<?= base_url('c_dashboard2') ?>"><i class="far fa-clock"></i> <span>Dashboard</span></a></li>

                    <li class="<?php if ($this->uri->uri_string() == 'c_dashboard3') {echo 'nav-item active';} ?>">
                        <a class="nav-link" href="<?= base_url('c_dashboard3') ?>">
                            <i class="far fa-clock"></i> 
                            <span>Dashboard Pembelian Plasma Dan Pihak III</span>
                        </a>
                    </li>

                    <li class="menu-header">Total Inputan Trip</li>
                    <li class="<?php if ($this->uri->uri_string() == 'c_dashboard') {
                                    echo 'nav-item active';
                                } ?>"><a class="nav-link" href="<?= base_url('c_dashboard') ?>"><i class="far fa-file"></i> <span>Trip Hari Ini</span></a></li>
                    <?php if($this->session->userdata('level') == 0) { ?>
                    <li class="<?php if ($this->uri->uri_string() == 'c_bulanini') {
                                    echo 'nav-item active';
                                } ?>"><a class="nav-link" href="<?= base_url('c_bulanini') ?>"><i class="far fa-file"></i> <span>Trip Bulan Ini</span></a></li>
                    <?php } ?>
                    <li class="<?php if ($this->uri->uri_string() == 'c_gradinginfo') {
                                    echo 'nav-item active';
                                } ?>"><a class="nav-link" href="<?= base_url('c_gradinginfo') ?>"><i class="far fa-file"></i> <span>Informasi Grading</span></a></li>
                    <?php if($this->session->userdata('level') == 0) { ?>
                    <li class="<?php if ($this->uri->uri_string() == 'c_grading') {
                                    echo 'nav-item active';
                                } ?>"><a class="nav-link" href="<?= base_url('c_grading') ?>"><i class="far fa-file"></i> <span>Halaman Grading</span></a></li>
                    <li class="<?php if ($this->uri->uri_string() == 'c_rekap') {
                                    echo 'nav-item active';
                                } ?>"><a class="nav-link" href="<?= base_url('c_rekap') ?>"><i class="far fa-file"></i> <span>Rekap Trip</span></a></li>
                    <?php } ?>

                    <li class="menu-header">Laporan Bongkar Bulan Ini</li>
                    <li class="<?php if ($this->uri->uri_string() == 'c_duapuluh') {
                                    echo 'nav-item active';
                                } ?>"><a class="nav-link" href="<?= base_url('c_duapuluh') ?>"><i class="far fa-file"></i> <span>Durasi < 20 Menit dan Bruto < 5 Ton</span></a></li>
                    <hr />
                    <li class="<?php if ($this->uri->uri_string() == 'c_dualima') {
                                    echo 'nav-item active';
                                } ?>"><a class="nav-link" href="<?= base_url('c_dualima') ?>"><i class="far fa-file"></i> <span>Durasi < 20 Menit dan Bruto> 5 Ton</span></a></li>
                </ul>
            </aside>
        </div>