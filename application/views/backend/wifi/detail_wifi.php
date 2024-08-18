<!-- Begin Page Content -->
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
 <!-- row ux-->
    <div class="row">
        <div class="card" style="margin-bottom: 120px; width: 65%">
            <?php
            foreach ($wifi as $b) { ?>
            <div class="card-body">
                <div class="row">
                <div class="col-md-5">
                    <img style="width: 250px" src="<?= base_url('assets/img/wifi/') . $b['image']; ?>" >
                </div>
                <div class="col-md-7">
                    <table class="table">
                        <tr>
                            <td>Id Site</td>
                            <td>:</td>
                            <td><?= $b['id_site']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Site</td>
                            <td>:</td>
                            <td><?= $b['name_site']; ?></td>
                        </tr>
                        <tr>
                            <td>Kecamatan</td>
                            <td>:</td>
                            <td><?= $b['kecamatan']; ?></td>
                        </tr>
                        <tr>
                            <td>Desa</td>
                            <td>:</td>
                            <td><?= $b['desa']; ?></td>
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
                            <td>Tahun </td>
                            <td>:</td>
                            <td><?=  $b['tahun']; ?></td>
                        </tr>
                        <tr>
                            <td>Bandwitch </td>
                            <td>:</td>
                            <td><?=  $b['bandwitch']; ?></td>
                        </tr>
                    </table>
                </div>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>
<!-- end row ux-->


