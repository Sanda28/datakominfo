<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header bg-success text-white">
            Filter Data Absen
        </div>

        <?php
        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        }else{
            $bulan = date("m");
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        } ?>
        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mb-2">
                    <label for="staticEmail2" >Bulan</label>
                    <select class="form-control" name="bulan">
                        <option value="">--Pilih Bulan--</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="staticEmail2" >Tahun</label>
                    <select class="form-control" name="tahun">
                        <option value="">--Pilih Tahun--</option>
                        <?php $tahun = date('Y');
                        for($i=2023;$i<$tahun+5;$i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                </div>
                <?php if(count($absen) > 0) { ?>
                    <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i>Tampilkan data</button>
                <?php } else{ ?>
                    <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i>Tampilkan data</button>
                    <a href="<?php echo base_url('absen/inputabsen?bulan='.$bulan),'&tahun='.$tahun ?>" class="btn btn-success mb-2 ml-2"><i class="fas fa-plus"></i>Input Kehadiran</a>
                <?php } ?>
            </form>
        </div>
    </div>

    

    <div class="alert alert-info">
        Menampilkan Data Kehadiran Karyawan Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span>    Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
    </div>
    <?php
            $jml_data = count($absen);
            if($jml_data > 0) { ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Hadir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $a = 1;
                        foreach ($absen as $b) { ?>
                    <tr>
                        <th scope="row"><?= $a++; ?></th>
                        <td><?= $b['nama_karyawan']; ?></td>
                        <td><?= $b['jenis_kelamin']; ?></td>
                        <td><?= $b['nama_jabatan']; ?></td>
                        <td><?= $b['hadir']; ?></td>
                        
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php }else{  ?>
                <center><span class="badge badge-danger"><i class="fas fa-info-circle"></i>Data Masih Kosong, Silahkan Input Data Kehadiran</span></center>
            <?php } ?>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->







    