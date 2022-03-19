<?= $this->extend('web/layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="mt-3 mb-3">
    <h1 class="text-center"><?= $title; ?></h1>
</div>

<div class="row mx-auto">
    <div class="col-sm-6 mt-3">
        <div class="card">
            <div class="card-body">
                <?php foreach ($detailfaskes as $row) : ?>
                    <img class="img-fluid" src="<?= base_url('assets/uploads/faskes/' . $row->foto); ?>" width="510px" height="410px">
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <div class="col-sm-6 mt-3">
        <div class="card">
            <div id="map" style="height: 410px;"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 mt-5">
        <div class="card">
            <table class="table">
                <?php foreach ($detailfaskes as $row) : ?>
                    <tr>
                        <td>Nama Fasilitas</td>
                        <td>:</td>
                        <td><?= $row->nama_faskes; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?= $row->alamat; ?></td>
                    </tr>
                    <tr>
                        <td>Telephone</td>
                        <td>:</td>
                        <td><?= $row->telp; ?></td>
                    </tr>
                    <tr>
                        <td>Layanan</td>
                        <td>:</td>
                        <td><?= $row->layanan; ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
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

    <?php foreach ($detailfaskes as $ow) : ?>
        var map = L.map('map', {
            center: [<?= $row->latitude; ?>, <?= $row->longitude; ?>],
            zoom: 15,
            layers: [peta1]
        });
    <?php endforeach ?>

    var baseMaps = {
        "Grayscale": peta1,
        "Satellite": peta2,
        "Streets": peta3,
        "Dark": peta4
    };

    L.control.layers(baseMaps).addTo(map);

    // marker
    var myIcon = L.Icon.extend({
        options: {
            iconSize: [38, 40],
        }
    });

    <?php foreach ($detailfaskes as $row) : ?>
        var marker = L.marker([<?= $row->latitude; ?>, <?= $row->longitude; ?>], {
            icon: new myIcon({
                iconUrl: '<?= base_url('assets/uploads/marker/' . $row->marker); ?>'
            })
        }).addTo(map)
    <?php endforeach ?>
</script>
<?= $this->endSection(); ?>