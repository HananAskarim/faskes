<?= $this->extend('admin/layouts/v_template'); ?>
<?= $this->section('content'); ?>
<div class="x_panel">
    <div class="x_title">
        <h2><?= $title; ?></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <?= $this->include('admin/alert/success'); ?>
                    <a href="<?= base_url('/admin/faskes/create'); ?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah</a>
                    <hr>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Faskes</th>
                                <th>Kategori</th>
                                <th>Alamat</th>
                                <th>Telp</th>
                                <th>Layanan</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($faskes as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td><?= $row->nama_faskes; ?></td>
                                    <td><?= $row->nama_kategori; ?></td>
                                    <td><?= $row->alamat; ?></td>
                                    <td><?= $row->telp; ?></td>
                                    <td><?= $row->layanan; ?></td>
                                    <td><?= $row->latitude; ?></td>
                                    <td><?= $row->longitude; ?></td>
                                    <td><img width="50px" src="<?= base_url('assets/uploads/faskes/' . $row->foto); ?>" /></td>
                                    <td>
                                        <a data-toggle="tooltip" title="Ubah" href="<?= base_url("/admin/faskes/edit/$row->id_faskes"); ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        <a data-toggle="tooltip" title="Hapus" href="<?= base_url("/admin/faskes/delete/$row->id_faskes"); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin menghapus data?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>