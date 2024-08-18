<!-- Begin Page Content -->
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
 <!-- row ux-->
    <div class="row">
        <div class="card" style="margin-bottom: 120px; width: 65%">
            <?php
            foreach ($menara as $b) { ?>
            <div class="card-body">
                <div class="row">
                <div class="col-md-5">
                    <img style="width: 250px" src="<?= base_url('assets/img/menara/') . $b['image']; ?>" >
                </div>
                <div class="col-md-7">
                    <table class="table">
                        <tr>
                            <td>Nama Perusahaan</td>
                            <td>:</td>
                            <td><?= $b['nama_perusahaan']; ?></td>
                        </tr>
                        <tr>
                            <td>Id Site</td>
                            <td>:</td>
                            <td><?= $b['id_site']; ?></td>
                        </tr>
                        <tr>
                            <td>Site Name</td>
                            <td>:</td>
                            <td><?= $b['site_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $b['alamat']; ?></td>
                        </tr>
                        <tr>
                            <td>Latitude</td>
                            <td>:</td>
                            <td><?= $b['latitude']; ?></td>
                        </tr>
                        <tr>
                            <td>Longitude</td>
                            <td>:</td>
                            <td><?= $b['longitude']; ?></td>
                        </tr>
                        <tr>
                            <td>Tinggi Menara</td>
                            <td>:</td>
                            <td><?= $b['tinggi_menara']; ?></td>
                        </tr>
                        <tr>
                            <td>IMB</td>
                            <td>:</td>
                            <td><?= $b['imb']; ?></td>
                        </tr>
                        <tr>
                            <td>Surat Rekomendasi</td>
                            <td>:</td>
                            <td><?= $b['rekom']; ?></td>
                        </tr>
                        <tr>
                            <td>Tahun Rekomendasi</td>
                            <td>:</td>
                            <td><?=  $b['tahun_rekom']; ?></td>
                        </tr>
                    </table>

                </div>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>
<!-- end row ux-->


