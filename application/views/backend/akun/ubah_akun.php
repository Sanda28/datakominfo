<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <?php foreach ($akun as $b) { ?>
                <form action="<?= base_url('akun/ubahakun'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" id="id_user" name="id_user"  value="<?= $b['id_user']; ?>">
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= $b['nama']; ?>">
                    </div>
                    <div class="form-group">
                    
                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email" value="<?= $b['email']; ?>">
                    </div>
                    
                    <div class="form-group">
                        <select name ="role_id" id="role_id" class="form-control form-control-user" >
                            <option value="<?= $b['role_id']; ?>"><?= $b['role_id']; ?></option>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="button" class="form-control form-control-user btn btn-dark col-lg-3 mt-3" value="Kembali" onclick="window.history.go(-1)">
                        <input type="submit" class="form-control form-control-user btn btn-primary col-lg-3 mt-3" value="Update">
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>
