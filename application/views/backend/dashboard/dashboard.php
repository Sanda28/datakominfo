<!-- Begin Page Content -->
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
 <!-- row ux-->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-6">
            <div class="card border-left-primary shadow h-100 py-2 bg-info">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Total kecamatan</div>
                            <div class="h1 mb-0 font-weight-bold text-white"><?= $this->ModelData->getKecamatan()->num_rows(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-home fa-3x text-white"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-6">
            <div class="card border-left-primary shadow h-100 py-2 bg-info">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Total Desa/Kelurahan</div>
                            <div class="h1 mb-0 font-weight-bold text-white"><?= $this->ModelData->getDesa()->num_rows(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-home fa-3x text-white"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-6">
            <div class="card border-left-primary shadow h-100 py-2 bg-info">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Total Menara</div>
                            <div class="h1 mb-0 font-weight-bold text-white"><?= $this->ModelMenara->getMenara()->num_rows(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-backward rotate-n-50 fa-3x text-white"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-6">
            <div class="card border-left-primary shadow h-100 py-2 bg-info">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Total Wifi</div>
                            <div class="h1 mb-0 font-weight-bold text-white"><?= $this->ModelMenara->getWifi()->num_rows(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-wifi fa-3x text-white"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- end row ux-->
 <!-- Divider -->
    <hr class="sidebar-divider">
 <!-- row table-->
 <div class="row"> 
    <div class="table-responsive table-bordered col-sm-12 ml-auto mr-auto mt-2">   
        <div class="page-header"> <span class="fas fa-users text-primary mt-2 "> Data Menara</span> 
        <div>
            <canvas id="popChart" weight="100%" height="100%"></canvas>
        </div>
        <hr>
        <div class="page-header"> <span class="fas fa-users text-primary mt-2 ">Data Wifi</span> 
        <div>
            <canvas id="wifiChart" weight="100%" height="100%"></canvas>
        </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                var data_nama =[];
                var data_jumlah = [];
                
                $.post("<?= base_url('admin/loadchart') ?>",
                function (data){
                    var obj = JSON.parse(data);
                    $.each(obj, function (test, item){
                        data_nama.push(item.kecamatan);
                        data_jumlah.push(item.jumlah)
                    });
                
            
            const ctx = document.getElementById('popChart').getContext("2d");
            
            var lineChart = new Chart(ctx, {
                type: 'bar',
                data: {
                labels: data_nama,
                datasets: [{
                    label: 'Jumlah Menara',
                    data: data_jumlah,
                    borderWidth: 1
                }]
                },
                    options: {
                    scales: {
                        y: {
                        beginAtZero: true
                        }
                    }
                    }
                });
            });
            </script>
            <script>
                var nama_data =[];
                var jumlah_data = [];
        
                $.post("<?= base_url('admin/loadchartwifi') ?>",
                function (data){
                    var obj = JSON.parse(data);
                    $.each(obj, function (test, item){
                        nama_data.push(item.kecamatan);
                        jumlah_data.push(item.jumlah)
                    });
                
            
            const ctx = document.getElementById('wifiChart').getContext("2d");
            

            var lineChart = new Chart(ctx, {
                type: 'bar',
                data: {
                labels: nama_data,
                datasets: [{
                    label: 'Jumlah Wifi',
                    data: jumlah_data,
                    borderWidth: 1
                }]
                },
                    options: {
                    scales: {
                        y: {
                        beginAtZero: true
                        }
                    }
                    }
                });
            });
            </script>
        </div>
    </div>
 <!-- end of row table-->
</div>
 <!-- end of row table-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->


