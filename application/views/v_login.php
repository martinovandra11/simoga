<body style="background-image: url('<?php echo base_url('assets/assets/img/back.png') ?>'); background-size: cover;  ">
    <div class="container">
    <div class="text-left">
            <!-- <img src="<?php echo base_url("assets/assets/img/logo-ptpn-fix.png") ?>" class="mt-5" width="10%" alt="logo.png"> -->
        </div>
        <!-- Outer Row -->
        
        <div class="row justify-content-center">
        
        
            <div class="col-xl-5 col-lg-12 col-md-9 mt-3">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                    <center><img src="<?php echo base_url("assets/assets/img/simogawebicon.png") ?>" class="mt-5" width="20%" alt="logo.png"></center>
                        
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">SIMOGA</h1>
                                    </div>

                                    <?php echo $this->session->flashdata('pesan') ?>

                                    <form method="post" action="<?= base_url('c_auth')?>" class="user">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukkan username">
                                                <?php echo form_error('username', '<div class="text-danger small mx-2 mt-2">','</div>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Masukkan password">
                                                <?php echo form_error('password', '<div class="text-danger small mx-2 mt-2">','</div>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary form-control">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>