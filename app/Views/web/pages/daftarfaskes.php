<?= $this->extend('web/layouts/template'); ?>

<?= $this->section('content'); ?>
<!-- Faskes -->
<div class="text-center mx-auto row mt-5 row-cols-3">
    <div class="col-lg-2">
        <div class="p-3 mb-2 border border-dark bg-warning shadow">
            <?php foreach ($detailkategori as $data) : ?>
                <a href="/web/daftarfaskes/<?= $data->id_kategori; ?>"><img src="/assets/web/icon/rumahsakit.png" alt="Rumah Sakit" width="40"></a>
            <?php endforeach ?>
        </div>
        <h4>Rumah Sakit</h4>
    </div>
    <div class="col-lg-2">
        <div class="p-3 mb-2 border border-dark bg-warning shadow">
            <img src="/assets/web/icon/puskesmas.png" alt="Puskesmas" width="40">
        </div>
        <h4>Puskesmas</h4>
    </div>
    <div class="col-lg-2">
        <div class="p-3 mb-2 border border-dark bg-warning shadow">
            <img src="/assets/web/icon/clinic.png" alt="Klinik" width="40">
        </div>
        <h4>Klinik</h4>
    </div>
    <div class="col-lg-2">
        <div class="p-3 mb-2 border border-dark bg-warning shadow">
            <img src="/assets/web/icon/apotek.png" alt="Apotek" width="40">
        </div>
        <h4>Apotek</h4>
    </div>
    <div class="col-lg-2">
        <div class="p-3 mb-2 border border-dark bg-warning shadow">
            <img src="/assets/web/icon/dokterpraktek.png" alt="Dokter Praktek" width="40">
        </div>
        <h4>Dokter Praktek</h4>
    </div>
    <div class="col-lg-2">
        <div class="p-3 mb-2 border border-dark bg-warning shadow">
            <img src="/assets/web/icon/lab.png" alt="LAB" width="40">
        </div>
        <h4>LAB</h4>
    </div>
</div>
<!-- end Faskes -->

<!-- Tabel data -->
<h1><?= $title; ?></h1>
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