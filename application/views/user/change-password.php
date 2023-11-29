<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-5 text-gray-800"><?= $judul?></h1>
    <div class="row">
        <div class="col-lg-6">
        <?= $this->session->flashdata('pesan'); ?>
            <form action="<?= base_url('user/changePassword'); ?>" method="post">
                <div class="form-group">
                    <label for="current_password">Password Lama</label>
                    <input type="password" class="form-control form-control-user"
                    id="current_password" name="current_password">
                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password1">Password Baru</label>
                    <input type="password" class="form-control form-control-user"
                    id="new_password1" name="new_password1">
                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password1">Password Baru</label>
                    <input type="password" class="form-control form-control-user"
                    id="new_password2" name="new_password2">
                </div>
                <div class="form-group">
                    <input type="button" class="form-control form-control-user btn btn-dark col-lg-3 mt-3" value="Kembali" onclick="window.history.go(-1)">
                    <input type="submit" class="form-control form-control-user btn btn-primary col-lg-3 mt-3" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>

</div>