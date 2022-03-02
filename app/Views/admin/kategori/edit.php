<?= $this->extend('admin/layouts/v_template'); ?>
<?= $this->section('content'); ?>

<div class="x_panel">
    <div class="x_title">
        <h2>Edit Data Kategori</h2>
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
        <form action="<?= base_url('/admin/kategori/update/' . $kategori->id_kategori); ?>" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
            <?= csrf_field(); ?>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_kategori">Nama Kategori <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="nama_kategori" name="nama_kategori" class="form-control " value="<?= $kategori->nama_kategori; ?>" autofocus>
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                <div class="col-md-6 col-sm-6 ">
                    <img src="<?= base_url("assets/uploads/marker/$kategori->marker"); ?>" class="rounded" />
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="marker">Marker <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="file" id="marker" name="marker" class="form-control">
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Ubah</button>
                    <a href="/admin/kategori" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
                </div>
            </div>

        </form>
    </div>
</div>

<?= $this->endSection('content'); ?>