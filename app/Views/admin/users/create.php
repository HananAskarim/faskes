<?= $this->extend('admin/layouts/v_template'); ?>
<?= $this->section('content'); ?>

<div class="x_panel">
    <div class="x_title">
        <h2>Tambah Data Admin</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <?= $this->include('admin/alert/error'); ?>
        <br />
        <form action="<?= base_url('/admin/users/save'); ?>" method="post" data-parsley-validate class="form-horizontal form-label-left">
            <?= csrf_field(); ?>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="username" name="username" class="form-control " value="<?= old('username'); ?>" autofocus>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="nama" name="nama" class="form-control" value="<?= old('nama'); ?>">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="password" id="password" name="password" class="form-control">
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                    <a href="/admin/users" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
                </div>
            </div>

        </form>
    </div>
</div>

<?= $this->endSection('content'); ?>