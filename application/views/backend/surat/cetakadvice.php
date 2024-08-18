<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <style type="text/css">
    .table-data{
        width: 100%;
        border-collapse: collapse;
    }
    .table-data tr th,
    .table-data tr td{
        border:1px solid black;
        font-size: 11pt;
        font-family:Verdana;
        padding: 10px 10px 10px 10px;
    }
    h3{
        font-family:Verdana;
    }
    </style>
<center>
	<div class="kop-surat">
        <div class="kop-surat-text">
            <b><p>PEMERINTAH KABUPATEN BOGOR</p></b>
            <b><p>DINAS KOMUNIKASI DAN INFORMATIKA</p></b>
            <h5><p>Jl. Tegar Beriman Telp (021)8758605 Fax (021)8758605 Cibinong - 16914</p></h5>
            <h5><p>Website: datakominfo.bogorkab.go.id, Email: diskominfo@bogorkab.go.id</p></h5>
        </div>
    </div>
	</center>
<hr>
<table>


    <tr>
        <td>Nomor</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td>Sifat</td>
        <td>:</td>
        <td>Biasa</td>
    </tr>
    <tr>
        <td>Lampiran</td>
        <td>:</td>
        <td> -</td>
    </tr>
    <tr>
        <td>Perihal</td>
        <td>:</td>
        <td>Advice Cell Plan Pendirian Menara <br>Base Transceiver Station (BTS)</td>
    </tr>
</table>
<br>Kepada Yth.
<br> di
<br> tempat
<br>
<br>Dasar :
<br>1. Peraturan Daerah Kabupaten Bogor Nomor 4 tahun 2011 tentang Pembangunan danger
<br>    Penggunaan Bersama Menara Telekomunikasi;
<br>2. Peraturan bupati Bogor nomor 61 Tahun 2011 tentang zona pemanfaatan menara telekomunikasi bersama di Kabupatem Bogor</br>
<p>Memperhatikan surat persetujuan warga dalam radius Kp.Juga Jalan RT.004/004.Desa/Kel.Sukaraksa yang diketahui/disetujui oleh kepala Desa Sukaraksa dan Camat Cigudeg tanggal 28 Agustus 2023 serta menindaklanjuti surat permohonan dari PT.Profrsional Telekomunikasi Indonesia Npmpr :0521/PRTL.MIT/BGR/08/2023 tanggal 28 Agustus 2023 perihal permohonan Advice Call Plan Pendirian menara BTS</p>
<?php foreach($printadvice as $b) : ?>
<table>

    <tr>
        <td>Nama Pemohon</td>
        <td>:</td>
        <td><?php echo $nama_pemohon ?></td>
    </tr>
    <tr>
        <td>Nama Perusahaan</td>
        <td>:</td>
        <td><?= $b['nama']; ?></td>
    </tr>
    <tr>
        <td>Alamat Perusahaan</td>
        <td>:</td>
        <td><?= $b['alamat']; ?></td>
    </tr>
    <tr>
        <td>Alamat Lokasi</td>
        <td>:</td>
        <td><?php echo $alamatlokasi ?></td>
    </tr>
    <tr>
        <td>Koordinat</td>
        <td>:</td>
        <td>S : <?php echo $latitude ?></td>
        
    </tr>
    <tr>
        <td></td>
        <td>:</td>
        <td>E : <?php echo $longitude ?></td>
        
    </tr>
    <tr>
        <td>Site Id</td>
        <td>:</td>
        <td><?php echo $id_site ?></td>
    </tr>
    <tr>
        <td>Site Name</td>
        <td>:</td>
        <td><?php echo $site_name ?></td>
    </tr>
    <tr>
        <td>Tinggi Menara</td>
        <td>:</td>
        <td><?php echo $tinggi_menara ?></td>
    </tr>
    <tr>
        <td>Rencana Antena Terpasang</td>
        <td>:</td>
        <td><?php echo $antena ?></td>
    </tr>
    <tr>
        <td>Jenis Menara</td>
        <td>:</td>
        <td><?php echo $jenis_menara ?></td>
    </tr>
    
    <tr>
        <td>Status</td>
        <td>:</td>
        <td><?php echo $status ?></td>
    </tr>
    <tr>
        <td>Cell Plan</td>
        <td>:</td>
        <td><?php echo $cellplan ?></td>
    </tr>
</table>
<?php endforeach; ?>

<p>Dengan ini disampaikan hal-hal sebagai berikut:</p>
        <ol>
            <li>Agar segera mengajukan persetujuan bangunan gedung (PBG) sesuai dengan ketentuan yang berlaku;</li>
            <li>Pembangunan menara BTS disesuaikan dengan peruntukan ruang;</li>
            <li>Pembangunan menara BTS wajib mempedomani peraturan perundang-undangan di bidang bangunan gedung;</li>
            <li>Pembangunan menara telekomunikasi dilaksanakan dengan memperhatikan keamanan, ketersediaan lahan, dan kenyamanan warga serta kesinambungan usaha dan pertumbuhan industri;</li>
            <li>Menempatkan sarana pendukung seperti grounding, penangkal petir, catu daya, pagar pengaman, lampu penerangan menara, marka halangan penerbangan (aviation obstruction light), dan sarana lainnya sesuai peraturan perundang-undangan;</li>
            <li>Mengasuransikan menara bersama dan menjamin seluruh risiko dan kerugian yang ditimbulkan akibat dari bangunan menara sesuai dengan radius ketinggian menara;</li>
            <li>Kontruksi yang dibangun agar dapat dimanfaatkan sebagai menara bersama;</li>
            <li>Memanfaatkan menara sesuai dengan peruntukannya;</li>
            <li>Melakukan perawatan dan pemeliharaan secara berkala;</li>
            <li>Membayar pajak dan/atau retribusi sesuai peraturan perundang-undangan;</li>
            <li>Diwajibkan mencantumkan identitas kepemilikan menara yang dapat dengan mudah dilihat pada saat pengawasan oleh pemerintah Kabupaten Bogor;</li>
            <li>Advice Call Plan pendirian menara BTS ini tidak dapat dipindahtangankan secara tidak berlaku sebagai izin;</li>
            <li>Advice Call Plan pendirian menara BTS ini diterbitkan sebagai penempatan titik koordinat sesuai dengan perkembangan teknologi telekomunikasi dan pemenuhan layanan telekomunikasi pada wilayah setempat;</li>
            <li>Agar menyampaikan selain PBG dan sertifikat layak fungsi (SLP) apabila telah terbit kepada Dinas Komunikasi dan Informatika Kabupaten Bogor.</li>
        </ol>

        <p>Apabila dikemudian hari terdapat kekeliruan dalam Advice Call Plan ini, maka akan dilakukan perbaikan sebagaimana mestinya.</p>

        <p>Demikian disampaikan, atas perhatiannya diucapkan terima kasih.</p>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
