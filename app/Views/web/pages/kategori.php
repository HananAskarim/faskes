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
    var map = L.map('map').setView([-7.418810418919889, 111.00126631256072], 12);

    var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
    }).addTo(map);

    // marker
    var myIcon = L.Icon.extend({
        options: {
            iconSize: [38, 45],
        }
    });
    <?php foreach ($faskategori as $row) : ?>
        var marker = L.marker([<?= $row->latitude; ?>, <?= $row->longitude; ?>], {
                icon: new myIcon({
                    iconUrl: '<?= base_url('assets/uploads/marker/' . $row->marker); ?>'
                })
            }).addTo(map)
            .bindPopup("Nama : <?= $row->nama_faskes; ?><br>Alamat : <?= $row->alamat; ?>");
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