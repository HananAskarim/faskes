<?= $this->extend('web/layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="mt-3 mb-3">
    <?php foreach ($detailkategori as $data) : ?>
        <h1 class="text-center">Pemetaan Fasilitas Kesehatan Berdasarkan <?= $data->nama_kategori; ?></h1>
    <?php endforeach ?>
</div>

<div class="row">
    <div class="card">
        <div class="card-body">
            <div id="map"></div>
        </div>
    </div>
</div>

<script>
    var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    });

    var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
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

    var faskes = L.layerGroup();

    var map = L.map('map', {
        center: [-7.418810418919889, 111.00126631256072],
        zoom: 12,
        layers: [peta1, faskes]
    });

    var baseMaps = {
        "Grayscale": peta1,
        "Satellite": peta2,
        "Streets": peta3,
        "Dark": peta4
    };

    var overLayer = {
        "Faskes": faskes
    };

    L.control.layers(baseMaps, overLayer).addTo(map);

    // var map = L.map('map').setView([-7.418810418919889, 111.00126631256072], 12);

    // var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    //     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
    //         'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    //     id: 'mapbox/streets-v11',
    // }).addTo(map);

    // marker
    var myIcon = L.Icon.extend({
        options: {
            iconSize: [38, 40],
        }
    });

    <?php foreach ($faskategori as $row) : ?>
        var informasi = '<table class="table"><tr><td colspan="2"><img src="<?= base_url('assets/uploads/faskes/' . $row->foto); ?>" width="200px" height="200px"></td></tr><tr><td>Nama</td><td>: <?= $row->nama_faskes ?></td></tr><tr><td colspan="2" class="text-center"><a href="/web/detail/<?= $row->id_kategori; ?>" class="btn btn-success">Detail</a></td></tr></table>';
        var marker = L.marker([<?= $row->latitude; ?>, <?= $row->longitude; ?>], {
                icon: new myIcon({
                    iconUrl: '<?= base_url('assets/uploads/marker/' . $row->marker); ?>'
                })
            }).addTo(faskes)
            .bindPopup(informasi);
    <?php endforeach; ?>
</script>

<!-- Tabel data -->
<div class="mt-5 mb-3">
    <?php foreach ($detailkategori as $data) : ?>
        <h1 class="text-center">Daftar Tabel <?= $data->nama_kategori; ?></h1>
    <?php endforeach ?>
</div>
<div class="col-sm-12">
    <div class="card table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                    <th>Layanan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($faskategori as $row) : ?>
                    <tr>
                        <td class="text-center"><?= $i++; ?></td>
                        <td><?= $row->nama_faskes; ?></td>
                        <td><?= $row->alamat; ?></td>
                        <td><?= $row->telp; ?></td>
                        <td><?= $row->layanan; ?></td>
                        <td>
                            <a href="<?= base_url("/web/detail"); ?>" class="btn btn-sm btn-success">Detail</i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- end Tabel data -->
<?= $this->endSection(); ?>