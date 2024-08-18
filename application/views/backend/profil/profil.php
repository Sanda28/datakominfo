<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 justify-content-x">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . (isset($user['image']) ? $user['image'] : 'default.jpg'); ?>" class="card-img" alt="Profile Image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= isset($user['nama']) ? $user['nama'] : 'Nama tidak tersedia'; ?></h5>
                    <p class="card-text"><?= isset($user['email']) ? $user['email'] : 'Email tidak tersedia'; ?></p>
                    <p class="card-text"><small class="text-muted">Jadi member sejak: <br><b><?= isset($user['date_created']) ? date('d F Y', $user['date_created']) : 'Tanggal tidak tersedia'; ?></b></small></p>
                </div>
                <div class="btn btn-info ml-3 my-3">
                    <a href="<?= base_url('admin/ubahprofil'); ?>" class="text text-white"><i class="fas fa-user-edit"></i> Ubah Profil</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->
