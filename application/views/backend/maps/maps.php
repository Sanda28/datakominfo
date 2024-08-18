
<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
    <div class="card-body">
        <div class="col-md-2">
        </div>
        <hr>
           
        
        <div id="map" style="width: 100%; height: 700px;" class="col-lg-12"></div>
                <script type="text/javascript">

                    
                    const peta1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    });


                    const peta2 = L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                        attribution: '© Google Maps',
                        maxZoom: 20,
                    });

                    const peta3 = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                        maxZoom: 20,
                        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                    });


                    const peta4 = L.tileLayer('https://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
                        maxZoom: 20,
                        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                        attribution: 'Map data &copy; <a href="https://www.google.com/maps">Google Maps</a>'
                    });

                    
                    const menaraa  = L.layerGroup(),
                        wifii = L.layerGroup();
                    

                    const map  = L.map('map', {
                        center : [-6.559021780087441,106.79122920700688],
                        zoom : 11,
                        layers: [peta1, menaraa, wifii],
                    });
                    const baseLayers = {
                        'peta 1': peta1,
                        'peta 2': peta2,
                        'peta 3': peta3,
                        'peta 4': peta4,

                    };
                    
                    const overlays = {
                                        'Menara': menaraa,
                                        'Wifi' : wifii
                                    };

                    const layerControl = L.control.layers(baseLayers, overlays).addTo(map);

                    var menaraicon = L.icon({
                        iconUrl: './assets/icons/menara.png',
                        iconSize:     [30, 35], // size of the icon
                        
                    });
                    
                    var wifiicon = L.icon({
                        iconUrl: './assets/icons/wifi.png',
                        iconSize:     [30, 35], // size of the icon
                        
                    });
                    function popUp(f,l){
                    var out = [];
                    if (f.properties){
                        for(key in f.properties){
                        out.push(key+" : "+f.properties[key]);
                        }
                        l.bindPopup(out.join("<br />"));
                    }
                }
                    

                </script>
                <?php 
                foreach ($menara as $k) { ?>
                    
                    <script>  L.marker([<?= $k['latitude'];?>, <?= $k['longitude'];?>],{icon:menaraicon}).addTo(menaraa).bindPopup(
                        "Id Site: <?= $k['id_site'];?> <br>Site Name : <?= $k['site_name'];?> <br> Nama Perusahaan: <?= $k['nama_perusahaan'];?> <br> Alamat : <?= $k['alamat'];?> <br> Tinggi Menara: <?= $k['tinggi_menara'];?> <br>IMB : <?= $k['imb'];?> <br>Rekom : <?= $k['rekom'];?> <br> Tahun Rekom: <?= $k['tahun_rekom'];?>"); </script> 
                    
                <?php } ?>
                <?php 
                foreach ($wifi as $w) { ?>
                    
                    <script>  L.marker([<?= $w['latitude'];?>, <?= $w['longitude'];?>],{icon:wifiicon}).addTo(wifii).bindPopup(
                        "<br>Name Site: <?= $w['name_site'];?> <br>Tahun: <?= $w['tahun'];?> <br>Bandwitch: <?= $w['bandwitch'];?>") 
                    </script> 
                    
                <?php } ?>

                <?php 
                foreach ($kecamatan as $kec) { ?>
                    
                <script>  
                    new L.GeoJSON.AJAX(["./assets/geojson/kecamatan/<?= $kec['geojson'];?>"],{onEachFeature:popUp,fillColor: "<?= $kec['warna'];?>"}).addTo(map);
                </script> 
                    
                <?php } ?>
                
                
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
