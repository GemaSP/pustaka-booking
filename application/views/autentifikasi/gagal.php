<!-- Begin Page Content -->
<div class="container-fluid">

<!-- 404 Error Text -->
<div class="text-center">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="error mx-auto" data-text="404">404</div>
    <p class="lead text-gray-800 mb-5">Akses tidak diizinkan</p>
    <p class="text-gray-500 mb-0">Sepertinya kamu mengakses halaman yang salah</p>
    <a href="<?= base_url('autentifikasi');?>">&larr; Kembali ke Dashboard</a>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
