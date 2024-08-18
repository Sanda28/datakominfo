<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
    <div class="col-sm-12">
		    <div class="card shadow">
			    <div class="card-header">
				    <h6 class="m-0 font-weight-bold text-primary">Permohonan Menara Baru</h6>
			    </div>
			    <div class="modal-content">
                <table class="table table-hover" >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Permohonan Advice</th>
                        <th scope="col">Akta</th>
                        <th scope="col">Ktp</th>
                        <th scope="col">Surat Izin Warga</th>
                        <th scope="col">Rekomendasi</th>
                        <th scope="col">PKS</th>
                        <th scope="col">Pernyataan</th>
                        <th scope="col">Ats</th>
                        <th scope="col">Keselamatan</th>
                        <th scope="col">Kuasa</th>
                        <th scope="col">Status</th>
                        <th scope="col">Lainnya</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                    $a = 1;
                    foreach ($menarabaru as $k) { ?>
                    <tr>
                        <td><?php echo $a++ ?></td>
                        <td> <?= $k['email']; ?> </td>
                        <td>
                        <?php
                        if (!empty($k['advice'])){ ?>
                            <a href="<?= base_url('permohonan/detaildokumen/' . $k['id_menarabaru'] .'/'. $k['advice']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Tidak Ada
                        <?php } ?>    
                        </td>
                        <td>
                        <?php
                        if (!empty($k['akta'])){ ?>
                            <a href="<?= base_url('permohonan/detaildokumen/' . $k['id_menarabaru'] .'/'. $k['akta']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Tidak Ada
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['ktp'])){ ?>
                            <a href="<?= base_url('permohonan/detaildokumen/' . $k['id_menarabaru'] .'/'. $k['ktp']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Tidak Ada
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['ktpwarga'])){ ?>
                            <a href="<?= base_url('permohonan/detaildokumen/' . $k['id_menarabaru'] .'/'. $k['ktpwarga']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Tidak Ada
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['rekomendasi'])){ ?>
                            <a href="<?= base_url('permohonan/detaildokumen/' . $k['id_menarabaru'] .'/'. $k['rekomendasi']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Tidak Ada
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['pks'])){ ?>
                            <a href="<?= base_url('permohonan/detaildokumen/' . $k['id_menarabaru'] .'/'. $k['pks']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Tidak Ada
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['pernyataan'])){ ?>
                            <a href="<?= base_url('permohonan/detaildokumen/' . $k['id_menarabaru'] .'/'. $k['pernyataan']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Tidak Ada
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['ats'])){ ?>
                            <a href="<?= base_url('permohonan/detaildokumen/' . $k['id_menarabaru'] .'/'. $k['ats']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Tidak Ada
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['keselamatan'])){ ?>
                            <a href="<?= base_url('permohonan/detaildokumen/' . $k['id_menarabaru'] .'/'. $k['keselamatan']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Tidak Ada
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['kuasa'])){ ?>
                            <a href="<?= base_url('permohonan/detaildokumen/' . $k['id_menarabaru'] .'/'. $k['kuasa']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Tidak Ada
                        <?php } ?>
                        </td>
                        
                        <td> 
                        <?php 
                            if ($k['status'] == "Proses") { ?>
                                <a class="btn btn-sm btn-outline-success" href="<?= base_url('permohonan/setuju/' . $k['id_menarabaru']); ?>"></i>Setuju</a>
                                <a class="btn btn-sm btn-outline-danger" href="<?= base_url('permohonan/tidaksetuju/' . $k['id_menarabaru']); ?>"></i>Tidak Setuju</a>
                                
                        <?php 
                            } elseif ($k['status'] == "Disetujui") { ?>
                                <a class="btn btn-sm btn-success" ></i>Disetujui</a>
                        <?php    
                            
                            } else { ?>
                                <a class="btn btn-sm btn-danger" ></i>Tidak Disetujui</a>
                           <?php } ?>
                        </td>
                        <td>
                        <a href="<?= base_url('permohonan/hapusmenarabaru/') . $k['id_menarabaru']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $k['email']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                        
                    </tr>  
                    
                <?php } ?>
                </tbody>   
            </table>
                </div>
            </div>
        </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Modal -->
<div class="modal fade" id="detaildokumen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Preview</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="detail_data">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<script>
    $(document).on('click','lihat_data', function(){
        var id_menarabaru = $(this).attr("id");
        $.ajax({
            url:"<?php echo base_url('permohonan/detaildokumen') ?>",
            method:"POST",
            data:{
                id_menarabaru: id_menarabaru
            },
            success:function(data){
                $('#detail_data').html(data);
                $('#detaildokumen').modal("show");
            }
        });
    });
</script>
