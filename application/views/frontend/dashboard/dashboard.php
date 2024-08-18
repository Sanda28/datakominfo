<!-- Begin Page Content -->
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
 <!-- row ux-->
    <div class="row">
        <div class="card" style="margin-bottom: 120px; width: 65%">
            <div class="card-header font-weight-bold bg-info text-white">
                Data User
            </div>
            <?php
            foreach ($user as $b) { ?>
            <div class="card-body">
                <div class="row">
                <div class="col-md-5">
                    <img style="width: 250px" src="<?= base_url('assets/img/profile/') . $b['image']; ?>" >
                </div>
                <div class="col-md-7">
                    <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $b['nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?= $b['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $b['alamat']; ?></td>
                        </tr>
                        <tr>
                            <td>No telp</td>
                            <td>:</td>
                            <td><?= $b['no_hp']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Masuk</td>
                            <td>:</td>
                            <td><?= date('d F Y', $b['date_created']); ?></td>
                        </tr>
                    </table>
                    <div class="btn btn-success ml-3 my-3 ">
                    <a href="<?= base_url('user/ubahprofil'); ?>"class="text text-white"><i class="fas fa-user-edit"></i> Ubah Profil</a>
                </div>

                </div>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>
<!-- end row ux-->
 <!-- Divider -->
    <hr class="sidebar-divider">
 <!-- row table-->

 <!-- end of row table-->
</div>
 <!-- end of row table-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->


