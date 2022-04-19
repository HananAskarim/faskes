<?= $this->extend('web/layouts/template'); ?>

<?= $this->section('content'); ?>
<!-- Tabel data -->
<div class="mt-3 mb-3">
    <h3 class="text-center">Daftar Tabel Fasilitas Kesehatan Kabupaten Sragen</h3>
</div>
<div class="row">
    <div class="col-lg-3">
        <form action="" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search.." name="keyword">
                <button class="btn btn-outline-secondary" type="submit" name="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>
<div class="col-sm-12">
    <div class="table-responsive">
        <table class="table table-bordered bg-white">
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
                <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                <?php foreach ($faskes as $row) : ?>
                    <tr>
                        <td class="text-center"><?= $i++; ?></td>
                        <td><?= $row->nama_faskes; ?></td>
                        <td><?= $row->alamat; ?></td>
                        <td><?= $row->telp; ?></td>
                        <td><?= $row->layanan; ?></td>
                        <td>
                            <a href="<?= base_url("/web/detail/" . $row->id_faskes); ?>" class="btn btn-sm btn-success" style="width: 65px;">Detail</i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $pager->links('default', 'pagination') ?>
    </div>
</div>
<!-- end Tabel data -->
<?= $this->endSection(); ?>