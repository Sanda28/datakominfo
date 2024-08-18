<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-sm-12">
		<div class="card shadow">
			<div class="card-header">
				<h6 class="m-0 font-weight-bold text-primary">Data Gaji</h6>
			</div>

            <?php
            $jml_data = count($gaji);
            if($jml_data > 0) { ?>
			<div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Bulan/Tahun</th>
                        <th scope="col">Gaji Per hari</th>
                        <th scope="col">Tunjangan per hari</th>
                        <th scope="col">Hadir</th>
                        <th scope="col">Total Gaji</th>
                        <th scope="col">Cetak Slip Gaji</th>
                
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $a = 1;
                        foreach ($gaji as $b) { ?>
                    <tr>
                        <td><?= $b['bulan']; ?></td>
                        <td><?= $b['gaji_pokok']; ?></td>
                        <td><?= $b['tunjangan']; ?></td>
                        <td><?= $b['hadir']; ?></td>
                        <td><?= ($b['gaji_pokok'] + $b['tunjangan'])*$b['hadir']; ?></td>

                        
                        <td>
                            <a class="btn btn-sm btn-success" href="<?= base_url('gajikaryawan/cetakslip/').$b['id_absen'];?>"><i class="fas fa-print"></i>Cetak Slip</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php }else{  ?>
                <center><span class="badge badge-danger"><i class="fas fa-info-circle"></i>Data Masih Kosong, Menunggu Admin Mengisi Data</span></center>
            <?php } ?>
        </div>
    </div>         
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->




