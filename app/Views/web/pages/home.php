<?= $this->extend('web/layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">

            <!-- Faskes -->
            <div class="text-center mx-auto row mt-5 row-cols-3">
                <div class="col-lg-2">
                    <div class="p-3 mb-2 border border-dark bg-warning shadow">
                        <img src="assets/web/icon/rumahsakit.png" alt="" width="40">
                    </div>
                    <h4>Rumah Sakit</h4>
                </div>
                <div class="col-lg-2">
                    <div class="p-3 mb-2 border border-dark bg-warning shadow">
                        <img src="assets/web/icon/puskesmas.png" alt="" width="40">
                    </div>
                    <h4>Puskesmas</h4>
                </div>
                <div class="col-lg-2">
                    <div class="p-3 mb-2 border border-dark bg-warning shadow">
                        <img src="assets/web/icon/clinic.png" alt="" width="40">
                    </div>
                    <h4>Klinik</h4>
                </div>
                <div class="col-lg-2">
                    <div class="p-3 mb-2 border border-dark bg-warning shadow">
                        <img src="assets/web/icon/apotek.png" alt="" width="40">
                    </div>
                    <h4>Apotek</h4>
                </div>
                <div class="col-lg-2">
                    <div class="p-3 mb-2 border border-dark bg-warning shadow">
                        <img src="assets/web/icon/dokterpraktek.png" alt="" width="40">
                    </div>
                    <h4>Dokter Praktek</h4>
                </div>
                <div class="col-lg-2">
                    <div class="p-3 mb-2 border border-dark bg-warning shadow">
                        <img src="assets/web/icon/lab.png" alt="" width="40">
                    </div>
                    <h4>LAB</h4>
                </div>
            </div>
            <!-- end Faskes -->

            <div class="mt-5">
                <h1 class="text-center">Pemetaan Fasilitas Kesehatan</h1>
            </div>

            <div id="map" style="height: 400px;"></div>

            <script>
                var map = L.map('map').setView([-7.418810418919889, 111.00126631256072], 13);

                var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: 'mapbox/streets-v11',
                }).addTo(map);

                <?php foreach ($faskes as $row) : ?>
                    var marker = L.marker([<?= $row->latitude; ?>, <?= $row->longitude; ?>]).addTo(map);
                <?php endforeach; ?>
            </script>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>