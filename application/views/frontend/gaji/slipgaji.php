<!DOCTYPE html>
<html>
<head>
    <title><?php echo $judul ?></title>
    <style type="text/css">
        body{
            font-family: Arial;
            color: black;
        }
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
</head>
<body>
    <center>
        <h1>YOURTEA</h1>
        <h2>Slip Gaji Karyawan</h2>
        <hr style="width: 50%; border-width: 5px; color: black">
    </center>
    <?php
    if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']
        ) && $_GET['tahun']!='')){
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $bulantahun = $bulan.$tahun;
    }else{
        $bulan = date("m");
        $tahun = date('Y');
        $bulantahun = $bulan.$tahun;
        
    }?>
    <?php foreach($printgaji as $b) : ?>
    <table style="width: 100%">
        <tr>
            <td width="20%">Nama Karyawan</td>
            <td width="2%">:</td>
            <td><?= $b['nama']; ?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><?= $b['nama_jabatan']; ?></td>
        </tr>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td><?php echo $bulan ?></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><?php echo $tahun ?></td>
        </tr>
        <tr>
            <td>Jumlah Hadir</td>
            <td>:</td>
            <td><?= $b['hadir']; ?></td>
        </tr>
    </table>

    <table class="table-data">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Keterangan</th>
            <th class="text-center">Jumlah Gaji</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Gaji Pokok</td>
            <td><?= $b['gaji_pokok'] *$b['hadir']; ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Tunjangan</td>
            <td><?= $b['tunjangan'] *$b['hadir']; ?></td>
        </tr>
        
        <tr>
            <td colspan="2" style="text-align: right;">Total Gaji</td>
            <td><?= ($b['gaji_pokok'] + $b['tunjangan'])*$b['hadir']; ?></td>
        </tr>
        
    </table>
    <?php endforeach; ?>
    <table width="100%">
        <tr>
            <td></td>
            <td width="200px">
                <p>Bogor, <?php echo date("d M Y")?> <br> Keuangan</p>
                <br>
                <br>
                <p>_______________</p>
            </td>
            
        </tr>
    </table>
<script type="text/javascript">
window.print();
</script>
    
</body>


</html>