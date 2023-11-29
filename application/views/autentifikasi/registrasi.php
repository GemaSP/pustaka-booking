<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="<?php echo base_url('assets/img/login&register.jpg') ?>"
                        width="100%" alt="">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftar Menjadi Member!</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url('autentifikasi/registrasi'); ?>">
                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama"
                                    name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>   
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email"
                                    name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" 
                                        id="password1" name="password1" placeholder="Password">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" 
                                        id="password2" name="password2" placeholder="Ulangi Password">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block">
                                    Daftar Menjadi Member
                                </button>
                                <hr>
                                <a href="#" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="#" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('autentifikasi/lupaPassword'); ?>">Lupa Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('autentifikasi'); ?>">Sudah Menjadi Member? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>