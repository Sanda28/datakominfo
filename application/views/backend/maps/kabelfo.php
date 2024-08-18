
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

                    
                const routee  = L.layerGroup(),
                    hhhhh = L.layerGroup(),
                    closuree = L.layerGroup(),
                    nppp = L.layerGroup(),
                    otbb = L.layerGroup(),
                    sitee = L.layerGroup(),
                    slackk = L.layerGroup(),
                    tiangg = L.layerGroup();
            
                    

                    const map  = L.map('map', {
                        center : [-6.4990216,106.8413543],
                        zoom : 13,
                        layers: [peta1, routee, hhhhh, closuree, nppp, otbb, sitee, slackk, tiangg],
                    });
                    const baseLayers = {
                        'peta 1': peta1,
                        'peta 2': peta2,
                        'peta 3': peta3,
                        'peta 4': peta4,
                    };


            
            const overlays = {
                'Route': routee,
                'HH' : hhhhh,
                'Closure' : closuree,
                'NP': nppp,
                'OTB' : otbb,
                'Site': sitee,
                'Slack' : slackk,
                'Tiang Ex' : tiangg,
            };

            const layerControl = L.control.layers(baseLayers, overlays).addTo(map);
            
                //geojson
                function popUp(f,l){
                    var out = [];
                    if (f.properties){
                        for(key in f.properties){
                        out.push(key+" : "+f.properties[key]);
                        }
                        l.bindPopup(out.join("<br />"));
                    }
                }
                var routestyle = {
                    "color": "#0000ff"
                };
                var hhicon = L.icon({
                    iconUrl: '../assets/geojson/gambar/HH.png',
                    iconSize:     [25, 25], // size of the icon 
                    iconcolor: "#ff7800"
                });
            
                var tiangicon = L.icon({
                    iconUrl: '../assets/geojson/gambar/tiang.png',
                    iconSize:     [15, 15], // size of the icon 
                });
                var closureicon = L.icon({
                    iconUrl: '../assets/geojson/gambar/closure.png',
                    iconSize:     [20, 20], // size of the icon 
                });
                var otbicon = L.icon({
                    iconUrl: '../assets/geojson/gambar/OTB.jpeg',
                    iconSize:     [60, 40], // size of the icon 
                    
                });
                var siteicon = L.icon({
                    iconUrl: '../assets/geojson/gambar/Site.png',
                    iconSize:     [35, 35], // size of the icon 
                });
                var slackicon = L.icon({
                    iconUrl: '../assets/geojson/gambar/Slack.png',
                    iconSize:     [25, 25], // size of the icon 
                });
            new L.GeoJSON.AJAX(["../assets/geojson/Route_FO.geojson"],{onEachFeature:popUp,style: routestyle}).addTo(routee);

            new L.GeoJSON.AJAX(["../assets/geojson/HH.geojson"],{ //options object for GeoJSON
                pointToLayer: function(geoJsonPoint, latlng) {
                    return L.marker(latlng, { icon: hhicon }); //options object for Marker
                },
                onEachFeature:popUp
                }).addTo(hhhhh);

            new L.GeoJSON.AJAX(["../assets/geojson/closure.geojson"],{ //options object for GeoJSON
                pointToLayer: function(geoJsonPoint, latlng) {
                    return L.marker(latlng, { icon: closureicon }); //options object for Marker
                },
                onEachFeature:popUp
                }).addTo(closuree);

            new L.GeoJSON.AJAX(["../assets/geojson/NP.geojson"],{ //options object for GeoJSON
                pointToLayer: function(geoJsonPoint, latlng) {
                    return L.marker(latlng, { icon: tiangicon }); //options object for Marker
                },
                onEachFeature:popUp
                }).addTo(nppp);

            new L.GeoJSON.AJAX(["../assets/geojson/OTB.geojson"],{ //options object for GeoJSON
                pointToLayer: function(geoJsonPoint, latlng) {
                    return L.marker(latlng, { icon: otbicon }); //options object for Marker
                },
                onEachFeature:popUp
                }).addTo(otbb);

            new L.GeoJSON.AJAX(["../assets/geojson/Site.geojson"],{ //options object for GeoJSON
                pointToLayer: function(geoJsonPoint, latlng) {
                    return L.marker(latlng, { icon: siteicon }); //options object for Marker
                },
                onEachFeature:popUp
                }).addTo(sitee); 

            new L.GeoJSON.AJAX(["../assets/geojson/Slack.geojson"],{ //options object for GeoJSON
                pointToLayer: function(geoJsonPoint, latlng) {
                    return L.marker(latlng, { icon: slackicon }); //options object for Marker
                },
                onEachFeature:popUp
                }).addTo(slackk);

            new L.GeoJSON.AJAX(["../assets/geojson/Tiang_Ex.geojson"],{ //options object for GeoJSON
                pointToLayer: function(geoJsonPoint, latlng) {
                    return L.marker(latlng, { icon: tiangicon }); //options object for Marker
                },
                onEachFeature:popUp
                }).addTo(tiangg);
            
        </script>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
