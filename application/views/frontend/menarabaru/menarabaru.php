<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
    <div class="card-body">
        
          
        <div class="col-lg-12">
            <?php if(validation_errors()){?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors();?>
                </div>
            <?php }?>
            <?php 
                foreach ($menara as $m) { ?>
                if 
            

            <?php } ?>

    

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#permohonanmenaraBaruModal"><i class="fas fa-file-alt"></i>Tambah permohonan Menara Baru</a>
            <table class="table table-hover" >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Advice</th>
                        <th scope="col">Akta</th>
                        <th scope="col">Ktp</th>
                        <th scope="col">Ktp warga</th>
                        <th scope="col">Rekomendasi</th>
                        <th scope="col">Pks</th>
                        <th scope="col">Pernyataan</th>
                        <th scope="col">Ats</th>
                        <th scope="col">Keselamatan</th>
                        <th scope="col">Kuasa</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                    $a = 1;
                    foreach ($menara as $k) { ?>
                    <tr>
                        <td><?php echo $a++ ?></td>
                        
                        <td>
                        <?php
                        if (!empty($k['advice'])){ ?>
                            <a href="<?= base_url('user/detaildokumen/' . $k['id_menarabaru'] .'/'. $k['advice']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Kosong
                        <?php } ?>    
                        </td>
                        <td>
                        <?php
                        if (!empty($k['akta'])){ ?>
                            <a href="<?= base_url('user/detaildokumen/' . $k['id_menarabaru'] .'/'. $k['akta']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Kosong
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['ktp'])){ ?>
                            <a href="<?= base_url('user/detaildokumen/' . $k['id_menarabaru'] .'/'. $k['ktp']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Kosong
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['ktpwarga'])){ ?>
                            <a href="<?= base_url('user/detaildokumen/' . $k['id_menarabaru'] .'/'. $k['ktpwarga']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Kosong
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['rekomendasi'])){ ?>
                            <a href="<?= base_url('user/detaildokumen/' . $k['id_menarabaru'] .'/'. $k['rekomendasi']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Kosong
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['pks'])){ ?>
                            <a href="<?= base_url('user/detaildokumen/' . $k['id_menarabaru'] .'/'. $k['pks']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Kosong
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['pernyataan'])){ ?>
                            <a href="<?= base_url('user/detaildokumen/' . $k['id_menarabaru'] .'/'. $k['pernyataan']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Kosong
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['ats'])){ ?>
                            <a href="<?= base_url('user/detaildokumen/' . $k['id_menarabaru'] .'/'. $k['ats']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Kosong
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['keselamatan'])){ ?>
                            <a href="<?= base_url('user/detaildokumen/' . $k['id_menarabaru'] .'/'. $k['keselamatan']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Kosong
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['kuasa'])){ ?>
                            <a href="<?= base_url('user/detaildokumen/' . $k['id_menarabaru'] .'/'. $k['kuasa']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Kosong
                        <?php } ?>
                        </td>
                        <td><?= $k['status']; ?> </td>
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
<!-- Modal Tambah buku baru-->
<div class="modal fade" id="permohonanmenaraBaruModal" tabindex="-1" role="dialog" aria-labelledby="menaraBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div  div class="modal-header">
                <h5 class="modal-title" id="menaraBaruModalLabel">Tambah Permohonan Menara Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/menarabaru'); ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                <input type="hidden" id="lol" name="lol"  value="1">
                  <label >Surat Permohonan Advice Cell Plan Pendirian menara BTS kepada Diskominfo</label>
                  <input type="file" class="form-control form-control-user" id="advice" name="advice"required>
                </div>
                <div class="form-group">
                  <label >Akta Pendirian Perusahaan</label>
                  <input type="file" class="form-control form-control-user" id="akta" name="akta">
                </div>
                <div class="form-group">
                  <label >Foto Copy KTP Pemohon</label>
                  <input type="file" class="form-control form-control-user" id="ktp" name="ktp">
                </div>
                <div class="form-group">
                  <label >Persetujuan Warga / Foto Copy KTP Warga Setempat</label>
                  <input type="file" class="form-control form-control-user" id="ktpwarga" name="ktpwarga">
                </div>
                <div class="form-group">
                  <label >Rekomendasi dari Desa / Kelurahan dan Kecamatan Setempat</label>
                  <input type="file" class="form-control form-control-user" id="rekomendasi" name="rekomendasi">
                </div>
                <div class="form-group">
                  <label >Foto Copy Surat Perjanjian Kontrak Sewa (PKS) Tanah/Bangunan</label>
                  <input type="file" class="form-control form-control-user" id="pks" name="pks">
                </div>
                <div class="form-group">
                  <label >Surat Pernyataan Menara Bersama Bermaterai Asli dari Penyedia Menara</label>
                  <input type="file" class="form-control form-control-user" id="pernyataan" name="pernyataan">
                </div>
                <div class="form-group">
                  <label >Rekomendasi dari Lanud Atang Sanjaya radius 6 km dan /untuk wilayah Tertentu </label>
                  <input type="file" class="form-control form-control-user" id="ats" name="ats">
                </div>
                <div class="form-group">
                  <label >Surat Pernyataan Jaminan Keselamatan Bermaterai Asli</label>
                  <input type="file" class="form-control form-control-user" id="keselamatan" name="keselamatan">
                </div>
                <div class="form-group">
                  <label >Surat Kuasa Bermaterai  Asli & Fotocopy KTP Yang Diberi Kuasa</label>
                  <input type="file" class="form-control form-control-user" id="kuasa" name="kuasa">
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i>Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Mneu -->

