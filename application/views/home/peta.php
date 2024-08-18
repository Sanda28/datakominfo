<div class="container-fluid">
    <div class="row">
        <!-- Koordinat Section -->
        <div class="col-lg-3 col-sm-12 mb-4" id="koordinat">
            <div class="card shadow-sm p-3">
                <h4 class="mb-3">Pilih Koordinat</h4>
                <p>Silahkan masukan koordinat lokasi menara melalui form dibawah, kemudian klik tombol <strong class="text-primary">Cek Koordinat</strong></p>
                <div class="form-group">
                    <label for="Latitude">Latitude:</label>
                    <input type="text" class="form-control" name="latitude" placeholder="contoh:-6.899253" id="Latitude">
                </div>
                <div class="form-group mt-3">
                    <label for="Longitude">Longitude:</label>
                    <input type="text" class="form-control" name="longitude" placeholder="contoh:110.341364" id="Longitude">
                </div>
            </div>
        </div>
        
        <!-- Map Section -->
        <div class="col-lg-9 col-sm-12">
            <div class="card shadow-sm p-3">
                <h4 class="mb-3">Peta</h4>
                <p>Silahkan sematkan pin lokasi menara pada peta atau dengan cara masukkan koordinat lokasi menara pada <a href="#" class="text-primary"><strong>Form Koordinat</strong></a>, kemudian klik tombol <a href="#" class="text-primary"><strong>Cek Koordinat</strong></a> untuk mengetahui rincian menara yang dapat dibangun.</p>
                <div id="map" style="width: 100%; height: 700px;"></div>
            </div>
        </div>
    </div>

    <!-- Leaflet Map Script -->
    <script type="text/javascript">
        const map = L.map('map').setView([-6.559021780087441, 106.79122920700688], 11);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        
        const latInput = document.querySelector("[name=latitude]");
        const lngInput = document.querySelector("[name=longitude]");
        
        const curLocation = [-6.559021780087441, 106.79122920700688];
        map.attributionControl.setPrefix(false);

        let marker = new L.marker(curLocation, {
            draggable: true
        }).addTo(map);

        map.on("click", function(e) {
            const lat = e.latlng.lat;
            const lng = e.latlng.lng;
            marker.setLatLng(e.latlng);
            latInput.value = lat;
            lngInput.value = lng;
        });

        var menaraicon = L.icon({
            iconUrl: '../assets/icons/menara.png',
            iconSize: [20, 25], // size of the icon
        });

        <?php foreach ($kecamatan as $kec) { ?>
            new L.GeoJSON.AJAX(["../assets/geojson/kecamatan/<?= $kec['geojson']; ?>"], { fillColor: "<?= $kec['warna']; ?>" }).addTo(map);
        <?php } ?>
    </script>
</div>
<!-- /.container-fluid -->
