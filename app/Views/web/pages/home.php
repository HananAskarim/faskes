<?= $this->extend('web/layouts/template'); ?>

<?= $this->section('content'); ?>
<!-- Faskes -->
<!-- <div class="text-center mx-auto row mt-5 row-cols-3">
    <div class="col-lg-2">
        <div class="p-3 mb-5 border border-dark shadow" style="background-color: rgb(0,26,77);">
            <a href="#" data-toggle="tooltip" data-placement="top" title="Rumah Sakit"><img src="/assets/web/icon/rumahsakit.png" alt="Rumah Sakit" width="40"></a>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="p-3 mb-5 border border-dark shadow" style="background-color: rgb(0,26,77);">
            <a href="#" data-toggle="tooltip" data-placement="top" title="Puskesmas"><img src="/assets/web/icon/puskesmas.png" alt="Puskesmas" width="40"></a>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="p-3 mb-5 border border-dark shadow" style="background-color: rgb(0,26,77);">
            <a href="#" data-toggle="tooltip" data-placement="top" title="Klinik"><img src="/assets/web/icon/clinic.png" alt="Klinik" width="40"></a>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="p-3 mb-5 border border-dark shadow" style="background-color: rgb(0,26,77);">
            <a href="#" data-toggle="tooltip" data-placement="top" title="Apotek"><img src="/assets/web/icon/apotek.png" alt="Apotek" width="40"></a>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="p-3 mb-5 border border-dark shadow" style="background-color: rgb(0,26,77);">
            <a href="#" data-toggle="tooltip" data-placement="top" title="Dokter Praktek"><img src="/assets/web/icon/dokterpraktek.png" alt="Dokter Praktek" width="40"></a>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="p-3 mb-5 border border-dark shadow" style="background-color: rgb(0,26,77);">
            <a href="#" data-toggle="tooltip" data-placement="top" title="Laboratorium"><img src="/assets/web/icon/lab.png" alt="LAB" width="40"></a>
        </div>
    </div>
</div> -->
<!-- end Faskes -->
<div class="card mt-3">
    <div class="card-header">
        <h4 class="text-center">Sistem Informasi Geografis Persebaran Fasilitas Kesehatan Di Sragen</h4>
        Klik pada marker untuk melihat detail lokasi
    </div>
    <div class="card-body">
        <div class="mx-auto">
            <div id="map"></div>
        </div>
    </div>
</div>

<script>
    //data geojson point faskes
    <?php
    $jsonPoint = array();
    foreach ($faskes as $row) {
        $saveJson = null;
        $saveJson['type'] = "Feature";
        $saveJson['properties'] = [
            "name" => $row->nama_faskes,
            "kategori" => $row->nama_kategori,
            "icon" => ('assets/uploads/marker/' . $row->marker),
            "popUp" => '<table class="table"><tr><td colspan="2"><img src="' . ('assets/uploads/faskes/' . $row->foto) . '" width="200px" height="200px"></td></tr><tr><td>Nama</td><td>: ' . $row->nama_faskes . '</td></tr><tr><td colspan="2" class="text-center"><a href="/web/detail/' . $row->id_faskes . '"> <button class="btn btn-success">Detail</button></a></td></tr></table>'
        ];
        $saveJson['geometry'] = [
            "type" => "Point",
            "coordinates" => [$row->longitude, $row->latitude]
        ];
        $jsonPoint[] = $saveJson;
    ?>
    <?php
    }
    ?>

    var geojsonPoint = <?= json_encode($jsonPoint, JSON_PRETTY_PRINT) ?>
    //akhir data geojson faskes

    // peta
    var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        id: 'mapbox/streets-v11'
    });

    var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        id: 'mapbox/satellite-v9'
    });

    var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

    var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/dark-v10'
    });
    // akhir peta

    //layers basemaps
    var faskes = L.layerGroup();
    var kabupaten = L.layerGroup();

    var map = L.map('map', {
        center: [-7.418810418919889, 111.00126631256072],
        zoom: 11,
        layers: [peta1, faskes, kabupaten]
    });

    var baseMaps = {
        "Grayscale": peta1,
        "Satellite": peta2,
        "Streets": peta3,
        "Dark": peta4
    };

    var overLayer = {
        "Faskes": faskes,
        "Batas Sragen": kabupaten
    };

    L.control.layers(baseMaps, overLayer).addTo(map);

    // marker
    var myIcon = L.Icon.extend({
        options: {
            iconSize: [34, 36],
        }
    });

    //menampilkan point faskes
    var layerFaskesPoint = L.geoJSON(geojsonPoint, {
        pointToLayer: function(feature, latlng) {
            return L.marker(latlng, {
                icon: new myIcon({
                    iconUrl: feature.properties.icon
                })
            });
        },
        onEachFeature: function(feature, layer) {
            if (feature.properties && feature.properties.name) {
                layer.bindPopup(feature.properties.popUp);
            }
        }
    }).addTo(faskes);
    //akhir point faskes

    //pencarian
    var poiLayers = L.layerGroup([
        layerFaskesPoint
    ]);
    L.control.search({
        layer: poiLayers,
        zoom: 19,
        initial: false,
        propertyName: 'name',
        buildTip: function(text, val) {
            var kategori = val.layer.feature.properties.kategori;
            return '<a href="#" class="' + kategori + '">' + text + '<b>' + kategori + '</b></a>';
        },
        marker: {
            icon: new L.Icon({
                iconUrl: 'assets/web/icon/iconsearch.png',
                iconSize: [15, 15]
            }),
            circle: {
                radius: 20,
                color: '#0a0',
                opacity: 1
            }
        }
    }).addTo(map);
    //akhir pencarian

    //extent
    L.control.defaultExtent().addTo(map);

    //skala
    var jsonmap = L.control.scale().addTo(map);

    //legend
    var legend = L.control({
        position: 'bottomright'
    });

    legend.onAdd = function(map) {

        var div = L.DomUtil.create('div', 'legend');

        labels = ['<strong>Keterangan :</strong>'],

            categories = ['Rumah sakit', 'Puskesmas', 'Klinik', 'Dokter praktek', 'Apotek', 'LAB'];

        for (var i = 0; i < categories.length; i++) {

            if (i == 0) {
                div.innerHTML +=
                    labels.push(
                        '<img width="20" height="23" src="assets/web/icon/rumahsakit1.png">' +
                        (categories[i] ? categories[i] : '+'));
            } else if (i == 1) {
                div.innerHTML +=
                    labels.push(
                        '<img width="20" height="23" src="assets/web/icon/puskesmas2.png">' +
                        (categories[i] ? categories[i] : '+'));
            } else if (i == 2) {
                div.innerHTML +=
                    labels.push(
                        '<img width="20" height="23" src="assets/web/icon/klinik3.png">' +
                        (categories[i] ? categories[i] : '+'));
            } else if (i == 3) {
                div.innerHTML +=
                    labels.push(
                        '<img width="20" height="23" src="assets/web/icon/dokterpraktek4.png">' +
                        (categories[i] ? categories[i] : '+'));
            } else if (i == 4) {
                div.innerHTML +=
                    labels.push(
                        '<img width="20" height="23" src="assets/web/icon/apotek5.png">' +
                        (categories[i] ? categories[i] : '+'));
            } else {
                div.innerHTML +=
                    labels.push(
                        '<img width="20" height="23" src="assets/web/icon/lab6.png">' +
                        (categories[i] ? categories[i] : '+'));
            }
        }
        div.innerHTML = labels.join('<br>');

        return div;
    };

    legend.addTo(map);
    //akhir legend

    // warna utk geojson
    var myStyle = {
        "color": "#ff7800",
        "weight": 1,
        "opacity": 0.65
    };

    //geojspn
    function popUp(f, l) {
        var out = [];
        if (f.properties) {
            out.push("Kecamatan : " + f.properties['NAME_3']);
            l.bindPopup(out.join("<br />"));
        }
    }
    var jsonTest = new L.GeoJSON.AJAX(["assets/js/geojson/sragen.geojson"], {
        onEachFeature: popUp,
        style: myStyle
    }).addTo(kabupaten);
    //akhir geojson
</script>
<?= $this->endSection(); ?>