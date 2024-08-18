<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
    <div class="col-sm-3">
		    <div class="card shadow">
			    <div class="card-header">
				    <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
			    </div>
			    <div class="modal-content">
                <form action="<?= base_url('akun'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" id="email" placeholder="Masukkan Email" class="form-control form-control-user">
                    </div>
                    
                    <div class="form-group">
                        <select name ="role_id" class="form-control form-control-user">
                            <option value="">Role</option>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
                    <?php if(validation_errors()) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors();?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="col-sm-9">
		<div class="card shadow">
			<div class="card-header">
				<h6 class="m-0 font-weight-bold text-primary">Daftar Akun</h6>
			</div>
			<div class="card-body">
            <table class="table table-hover" id="menara">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Role Id</th>
                        <th scope="col">Lainnya</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                    $a = 1;
                    foreach ($akun as $k) { ?>
                    <tr>
                        <td><?php echo $a++ ?></td>
                        <td> <?= $k['nama']; ?> </td>
                        <td> <?= $k['email']; ?> </td>
                        <td> <?= $k['no_hp']; ?> </td>
                        <td> <?= $k['role_id']; ?> </td>
                        <td>
                            <a href="<?= base_url('akun/ubahakun/') . $k['id_user']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                            <a href="<?= base_url('akun/hapusakun/') . $k['id_user']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $k['nama']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
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