<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
                <form action="<?= base_url('admin/ubahpassword'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Password Sekarang</label>
                        <input type="password" name="password_sekarang" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" name="password_baru1" class="form-control">
                    <div class="form-group">
                        <label> Ulangi Password Baru</label>
                        <input type="password" name="password_baru2" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
        </div>
    </div>
</div>
