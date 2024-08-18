<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
    <div class="col-sm-12">
		    <div class="card shadow">
			    <div class="card-header">
				    <h6 class="m-0 font-weight-bold text-primary">Permohonan Menara Eksisting</h6>
			    </div>
			    <div class="modal-content">
                <table class="table table-hover" >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Advice</th>
                        <th scope="col">IMB</th>
                        <th scope="col">Ktp</th>
                        <th scope="col">PKS</th>
                        <th scope="col">Pernyataan</th>
                        <th scope="col">Keselamatan</th>
                        <th scope="col">Kuasa</th>
                        <th scope="col">Status</th>
                        <th scope="col">Lainnya</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                    $a = 1;
                    foreach ($menaraeksisting as $k) { ?>
                    <tr>
                        <td><?php echo $a++ ?></td>
                        <td> <?= $k['email']; ?> </td>
                        <td>
                        <?php
                        if (!empty($k['advice'])){ ?>
                            <a href="<?= base_url('permohonan/detaildokumen/' . $k['id_menaraeksisting'] .'/'. $k['advice']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Tidak Ada
                        <?php } ?>    
                        </td>
                        <td>
                        <?php
                        if (!empty($k['imb'])){ ?>
                            <a href="<?= base_url('permohonan/detaildokumen/' . $k['id_menaraeksisting'] .'/'. $k['imb']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Tidak Ada
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['ktp'])){ ?>
                            <a href="<?= base_url('permohonan/detaildokumen/' . $k['id_menaraeksisting'] .'/'. $k['ktp']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Tidak Ada
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['pks'])){ ?>
                            <a href="<?= base_url('permohonan/detaildokumen/' . $k['id_menaraeksisting'] .'/'. $k['pks']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Tidak Ada
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['pernyataan'])){ ?>
                            <a href="<?= base_url('permohonan/detaildokumen/' . $k['id_menaraeksisting'] .'/'. $k['pernyataan']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Tidak Ada
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['keselamatan'])){ ?>
                            <a href="<?= base_url('permohonan/detaildokumen/' . $k['id_menaraeksisting'] .'/'. $k['keselamatan']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Tidak Ada
                        <?php } ?>
                        </td>
                        <td>
                        <?php
                        if (!empty($k['kuasa'])){ ?>
                            <a href="<?= base_url('permohonan/detaildokumen/' . $k['id_menaraeksisting'] .'/'. $k['kuasa']) ; ?>"></i>Ada</a>
                        <?php
                        } else { ?>
                            Tidak Ada
                        <?php } ?>
                        </td>
                        
                        <td> 
                        <?php 
                            if ($k['status'] == "Proses") { ?>
                                <a class="btn btn-sm btn-outline-success" href="<?= base_url('permohonan/setujumenara/' . $k['id_menaraeksisting']); ?>"></i>Setuju</a>
                                <a class="btn btn-sm btn-outline-danger" href="<?= base_url('permohonan/tidaksetujumenara/' . $k['id_menaraeksisting']); ?>"></i>Tidak Setuju</a>
                                <?php 
                            } elseif ($k['status'] == "Disetujui") { ?>
                                <a class="btn btn-sm btn-success" ></i>Disetujui</a>
                        <?php    
                            
                            } else { ?>
                                <a class="btn btn-sm btn-danger" ></i>Tidak Disetujui</a>
                           <?php } ?>
                        </td>
                        <td>
                        <a href="<?= base_url('permohonan/hapusmenaraeksisting/') . $k['id_menaraeksisting']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $k['email']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
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