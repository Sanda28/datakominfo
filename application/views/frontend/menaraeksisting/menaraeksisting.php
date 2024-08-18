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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#permohonanmenaraEksistingModal"><i class="fas fa-file-alt"></i>Tambah permohonan Menara Eksisting</a>
            <table class="table table-hover" >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Advice</th>
                        <th scope="col">IMB</th>
                        <th scope="col">Ktp</th>
                        <th scope="col">Pks</th>
                        <th scope="col">Pernyataan</th>
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
                            <a href="<?= base_url('user/detaildokumen/' . $k['id_menaraeksisting'] .'/'. $k['advice']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Kosong
                        <?php } ?>    
                        </td>
                        <td>
                        <?php
                        if (!empty($k['imb'])){ ?>
                            <a href="<?= base_url('user/detaildokumen/' . $k['id_menaraeksisting'] .'/'. $k['imb']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Kosong
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['ktp'])){ ?>
                            <a href="<?= base_url('user/detaildokumen/' . $k['id_menaraeksisting'] .'/'. $k['ktp']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Kosong
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['pks'])){ ?>
                            <a href="<?= base_url('user/detaildokumen/' . $k['id_menaraeksisting'] .'/'. $k['pks']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Kosong
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['pernyataan'])){ ?>
                            <a href="<?= base_url('user/detaildokumen/' . $k['id_menaraeksisting'] .'/'. $k['pernyataan']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Kosong
                        <?php } ?>
                        </td>
                        
                        <td>
                        <?php
                        if (!empty($k['keselamatan'])){ ?>
                            <a href="<?= base_url('user/detaildokumen/' . $k['id_menaraeksisting'] .'/'. $k['keselamatan']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Kosong
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['kuasa'])){ ?>
                            <a href="<?= base_url('user/detaildokumen/' . $k['id_menaraeksisting'] .'/'. $k['kuasa']) ; ?>"></i>Ada</a>
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
<div class="modal fade" id="permohonanmenaraEksistingModal" tabindex="-1" role="dialog" aria-labelledby="menaraEksistingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div  div class="modal-header">
                <h5 class="modal-title" id="menaraEksistingModalLabel">Tambah Permohonan Menara Eksisting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/menaraeksisting'); ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                <input type="hidden" id="lol" name="lol"  value="1">
                  <label >Surat Permohonan Advice Menara Eksisting kepada Diskominfo</label>
                  <input type="file" class="form-control form-control-user" id="advice" name="advice" required>
                </div>
                <div class="form-group">
                  <label >F. Copy IMB /PBG Terakhir</label>
                  <input type="file" class="form-control form-control-user" id="imb" name="imb" >
                </div>
                <div class="form-group">
                  <label >Foto Copy KTP Pemohon</label>
                  <input type="file" class="form-control form-control-user" id="ktp" name="ktp" >
                </div>
                <div class="form-group">
                  <label >Foto Copy Surat Perjanjian Kontrak Sewa (PKS) Tanah/Bangunan</label>
                  <input type="file" class="form-control form-control-user" id="pks" name="pks" >
                </div>
                <div class="form-group">
                  <label >Surat Pernyataan Menara Bersama Bermaterai Asli dari Penyedia Menara</label>
                  <input type="file" class="form-control form-control-user" id="pernyataan" name="pernyataan" >
                </div>
                <div class="form-group">
                  <label >Surat Pernyataan Jaminan Keselamatan Bermaterai Asli</label>
                  <input type="file" class="form-control form-control-user" id="keselamatan" name="keselamatan" >
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

