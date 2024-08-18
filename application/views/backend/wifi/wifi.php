<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
    <div class="card-body">
    <form>
        <div class="form-group">

            <div class="col-sm-2">
            <label for="recipient-name" class="col-form-label">Tahun :</label>
            <select name="tahun" id="tahun"  class="form-control form-control-user">
                <option value="0">Tahun</option>
                <?php
                for ($i=date('Y'); $i > 2015 ; $i--) { ?>
                    <option value="<?= $i;?>"><?= $i;?></option>
                <?php } ?>
            </select>
            </div>
        </div>
    </form>
        
           
        <div class="col-lg-12">
            <?php if(validation_errors()){?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors();?>
                </div>
            <?php }?>
            <?= $this->session->flashdata('pesan'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#wifiBaruModal"><i class="fas fa-file-alt"></i>Wifi Baru</a>
            <table class="table table-hover" id="wifi">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Site</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Desa/Kelurahan</th>
                        <th scope="col">Lainnya</th>
                    </tr>
                </thead>
                <?php if  (empty($tahun)){ ?>
                <tbody>
                <?php
                    $a = 1;
                    foreach ($wifi as $k) { ?>
                    <tr>
                        <td><?php echo $a++ ?></td>
                        <td> <?= $k['name_site']; ?> </td>
                        <td> <?= $k['alamat']; ?> </td>
                        <td> <?= $k['kecamatan']; ?> </td>
                        <td> <?= $k['desa']; ?> </td>
                        
                        <td>
                            <a href="<?= base_url('wifi/ubahwifi/') . $k['id_wifi']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                            <a href="<?= base_url('wifi/detailwifi/') . $k['id_wifi']; ?>" class="badge badge-search"><i class="fas fw fa-search"></i> Detail</a>
                            <a href="<?= base_url('wifi/hapuswifi/') . $k['id_wifi']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $k['name_site']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>  
                    
                <?php } ?>
                </tbody>   
                <?php } else { ?>
                    <tbody>

                    </tbody>   
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>


<!-- End of Main Content -->
<!-- Modal Tambah buku baru-->
<div class="modal fade" id="wifiBaruModal" tabindex="-1" role="dialog" aria-labelledby="wifiBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div  div class="modal-header">
                <h5 class="modal-title" id="wifiBaruModalLabel">Tambah Wifi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('wifi'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    
                    <div class="form-group">
                        <input type="text" name="id_site" id="id_site" placeholder="Masukkan Id Site" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="name_site" id="name_site" placeholder="Masukkan Name Site" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <select name="id_kecamatan" id="id_kecamatan" class="form-control form-control-user">
                            <option value="0">Pilih Kecamatan</option>
                            <?php
                            foreach ($kecamatan as $k) { ?>
                                <option value="<?= $k['id_kecamatan'];?>"><?= $k['kecamatan'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="id_desa" id="id_desa" class="form-control form-control-user">
                            <option value="0">-Pilih Desa/Kelurahan-</option>
                        </select> 
                    </div>
                    <div class="form-group">
                        <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="latitude" id="latitude" placeholder="Masukkan latitude" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="longitude" id="longitude" placeholder="Masukkan Longitude" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <select name="tahun" class="form-control form-control-user">
                            <option value="">Tahun</option>
                            <?php
                            for ($i=date('Y'); $i > 1990 ; $i--) { ?>
                                <option value="<?= $i;?>"><?= $i;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="bandwitch" id="bandwitch" placeholder="Masukkan Bandwitch" class="form-control form-control-user">
                    </div>

                    <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="image" name="image">
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
<!-- End of Modal Tambah Mneu -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
            $(document).ready(function(){
                $("#id_kecamatan").change(function(){
                    var id_kecamatan = $("#id_kecamatan").val();
                    $.ajax({
                        type: "POST",
                        url : "<?= base_url('menara/load_desaa') ?>",
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


    <script>
        $(document).ready(function(){
            $("#tahun").change(function(){
               tahunn();
            });
        });
        function tahunn(){
            var tahun = $("#tahun").val();
            $.ajax({
                url : "<?= base_url('wifi/load_wifi') ?>",
                data : "tahun=" + tahun,
                success:function(data){
                    $("#wifi tbody").html(data)
                }
            })
        }
    </script>
    
