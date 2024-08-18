<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
    <div class="card-body">
    </div> 
        <div class="col-lg-12">
            <?php if(validation_errors()){?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors();?>
                </div>
            <?php }?>
            <?= $this->session->flashdata('pesan'); ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Jumlah Menara</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php
                    $a = 1;
                    // Mengambil data menara dari database
                    $this->db->select('id_kecamatan, COUNT(*) as jumlah_menara');
                    $this->db->group_by('id_kecamatan');
                    $query = $this->db->get('menara');
                    $menara = $query->result_array();

                    // Membuat array jumlah menara per kecamatan
                    $jumlah_menara = array();
                    foreach ($menara as $m) {
                        $jumlah_menara[$m['id_kecamatan']] = $m['jumlah_menara'];
                    }

                    // Menampilkan tabel kecamatan
                    foreach ($kecamatan as $k) { 
                        $id_kecamatan = $k['id_kecamatan']; ?>
                    <tr>
                        <td><?php echo $a++ ?></td>
                        <td> <?= $k['kecamatan']; ?> </td>
                        <td><?php echo isset($jumlah_menara[$id_kecamatan]) ? $jumlah_menara[$id_kecamatan] : 0; ?></td>
                    </tr>  
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
