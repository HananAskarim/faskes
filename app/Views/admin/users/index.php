<?= $this->extend('admin/layouts/v_template'); ?>
<?= $this->section('content'); ?>
<div class="x_panel">
    <div class="x_title">
        <?= $this->include('admin/alert/success'); ?>
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
                    <a href="<?= base_url('/admin/users/create'); ?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah</a>
                    <hr>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($users as $a) : ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td><?= $a->username; ?></td>
                                    <td><?= $a->nama; ?></td>
                                    <td>
                                        <a data-toggle="tooltip" title="Ubah" href="<?= base_url('/admin/users/edit/' . $a->id_user); ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        <a data-toggle="tooltip" title="Hapus" href="<?= base_url('/admin/users/delete/' . $a->id_user); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin menghapus data?')"><i class="fa fa-trash"></i></a>
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