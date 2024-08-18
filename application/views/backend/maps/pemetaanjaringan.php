
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
                    const map = L.map('map').setView([-6.559021780087441,106.79122920700688], 11);

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);


                function popUp(f,l){
                    var out = [];
                    if (f.properties){
                        for(key in f.properties){
                        out.push(key+" : "+f.properties[key]);
                        }
                        l.bindPopup(out.join("<br />"));
                    }
                }

                new L.GeoJSON.AJAX(["../assets/geojson/datamenara.geojson"],{onEachFeature:popUp}).addTo(map); 
    
                </script>      
                <?php 
                foreach ($kecamatan as $kec) { ?>
                    
                <script>  
                    new L.GeoJSON.AJAX(["../assets/geojson/kecamatan/<?= $kec['geojson'];?>"],{fillColor: "<?= $kec['warna'];?>"}).addTo(map);
                </script> 
                    
                <?php } ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>

]
            
<!-- Begin Page Content -->
            
                <script type="text/javascript">

                    const map = L.map('map').setView([-6.559021780087441,106.79122920700688], 11);

                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);
                    
                    new L.GeoJSON.AJAX(["./assets/geojson/pemetaanjaringan.geojson"]).addTo(map);    
                    
        
                    
               
                    
                </script> 
                    
               

            </div>
                
                
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
