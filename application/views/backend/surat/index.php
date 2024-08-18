<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
        <div class="card-header">
				    <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
			    </div>
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <form action="<?= base_url('surat/cetakadvice'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="id_user" id="id_user" class="form-control form-control-user">
                            <option value="0">Pilih Perusahaan</option>
                            <?php
                            foreach ($userr as $k) { ?>
                                <option value="<?= $k['id_user'];?>"><?= $k['nama'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama_pemohon" id="nama_pemohon" placeholder="Masukkan Nama Pemohon" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="id_site" id="id_site" placeholder="Masukkan Id Site" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="site_name" id="site_name" placeholder="Masukkan Site Name" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat Lokasi" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="latitude" id="latitude" placeholder="Masukkan latitude" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="longitude" id="longitude" placeholder="Masukkan Longitude" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="tinggi_menara" id="tinggi_menara" placeholder="Masukkan Tinggi Menara" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="jenis_menara" id="jenis_menara" placeholder="Masukkan Jenis Menara" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="status" id="status" placeholder="Masukkan Status" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="antena" id="antena" placeholder="Masukkan Antena" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="cellplan" id="cellplan" placeholder="Masukkan Cell Plan" class="form-control form-control-user">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
