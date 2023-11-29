<!-- Begin Page Content -->
<div class="container-fluid">
    
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if(validation_errors()){?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors();?>
                </div>
            <?php }?>
            <?= $this->session->flashdata('pesan'); ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Member Sejak</th>
                        <th scope="col">Poto Profil</th>
                        <th scope="col">Status</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        $a = 1;
                        foreach ($anggota as $u) { ?>
                    <tr>
                        <th scope="row"><?= $a++; ?></th>
                        <td><?= $u['nama']; ?></td>
                        <td><?= $u['email']; ?></td>
                        <td><?= date('d F Y', $u['tanggal_input']); ?></td>
                        <td>
                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img width="100" src="<?= base_url('assets/img/profile/') . $u['image'];?>" class="img-fluid img-thumbnail" alt="...">
                            </picture>
                        </td>
                        <td>
                            <?php
                            if ($u['is_active'] == 0) {
                                echo 'Non-aktif';}
                                else 
                                {echo 'Aktif';} ?>
                        </td>
                        <td>
                            <a href="<?= base_url('user/updateAnggota/').$u['id']; ?>" type="submit" onclick="return confirm('Kamu yakin akan <?php
                            if ($u['is_active'] == 0) {
                                echo 'mengaktifkan';}
                                else 
                                {echo 'menon-aktifkan';} ?> <?= $u['nama']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i>
                            <?php
                            if ($u['is_active'] == 0) {
                                echo 'Aktifkan';}
                                else 
                                {echo 'Nonaktifkan';} ?>
                        </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
