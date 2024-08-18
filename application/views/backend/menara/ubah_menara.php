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
            <?php foreach ($menara as $b) { ?>
                <form action="<?= base_url('menara/ubahmenara'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" id="id_menara" name="id_menara" placeholder="Masukkan Id Menara" value="<?= $b['id_menara']; ?>">
                        <input type="text" class="form-control form-control-user" id="nama_perusahaan" name="nama_perusahaan" placeholder="Masukkan Perusahaan" value="<?= $b['nama_perusahaan']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="id_site" name="id_site" placeholder="Masukkan Id Site" value="<?= $b['id_site']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="site_name" name="site_name" placeholder="Masukkan Site Name" value="<?= $b['site_name']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukkan alamat" value="<?= $b['alamat']; ?>">
                    </div>
                    
                    <div class="form-group">
                        <select name ="id_kecamatan" id="id_kecamatan" class="form-control form-control-user">
                        <option value="<?= $b['id_kecamatan']; ?>"><?= $b['kecamatan']; ?></option>
                        <?php
                            foreach ($kecamatan as $k) { ?>
                                <option value="<?= $k['id_kecamatan'];?>"><?= $k['kecamatan'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name ="id_desa" id="id_desa" class="form-control form-control-user">
                            <option value="<?= $b['id_desa']; ?>"><?= $b['desa']; ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="latitude" name="latitude" placeholder="Masukkan latitude" value="<?= $b['latitude']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="longitude" name="longitude" placeholder="Masukkan Longitude" value="<?= $b['longitude']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="tinggi_menara" name="tinggi_menara" placeholder="Masukkan Tinggi Menara" value="<?= $b['tinggi_menara']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="imb" name="imb" placeholder="Masukkan IMB" value="<?= $b['imb']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="rekom" name="rekom" placeholder="Masukkan Rekomendasi" value="<?= $b['rekom']; ?>">
                    </div>
                    <div class="form-group">
                        <select name="tahun_rekom" class="form-control form-control-user">
                            <option value="<?= $b['tahun_rekom']; ?>"><?= $b['tahun_rekom']; ?></option>
                            <?php
                            for ($i = date('Y'); $i > 1500; $i--) { ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php
                        if (isset($b['image'])) { ?>

                            <input type="hidden" name="old_pict" id="old_pict" value="<?= $b['image']; ?>">

                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img src="<?= base_url('assets/img/menara/') . $b['image']; ?>" class="rounded mx-auto mb-3 d-blok" alt="...">
                            </picture>

                        <?php } ?>

                        <input type="file" class="form-control form-control-user" id="image" name="image">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script type="text/javascript">
            $(document).ready(function(){
                $("#id_kecamatan").change(function(){
                    var id_kecamatan = $("#id_kecamatan").val();
                    $.ajax({
                        type: "POST",
                        url : "<?= base_url('menara/desa_load') ?>",
                        data : {
                            id_kecamatan : id_kecamatan
                        },
                        success:function(data){
                            $('#id_desa').html(data);
                        }
                    });
                });
            });
    </script>