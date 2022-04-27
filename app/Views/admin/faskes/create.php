<?= $this->extend('admin/layouts/v_template'); ?>
<?= $this->section('content'); ?>

<div class="x_panel">
    <div class="x_title">
        <h2>Tambah Data</h2>
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
        <form action="<?= base_url('/admin/faskes/save'); ?>" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
            <?= csrf_field(); ?>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_faskes">Nama faskes <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="nama_faskes" name="nama_faskes" class="form-control " value="<?= old('nama_faskes'); ?>" autofocus>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_kategori">Kategori <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <select name="id_kategori" id="id_kategori" class="form-control">
                        <?php
                        foreach ($kategori as $row) {
                            echo "<option value='$row->id_kategori'>$row->nama_kategori</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="alamat" name="alamat" class="form-control " value="<?= old('alamat'); ?>">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="telp">Telp <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="telp" name="telp" class="form-control " value="<?= old('telp'); ?>">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="layanan">Layanan <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="layanan" name="layanan" class="form-control " value="<?= old('layanan'); ?>">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="latitude">Latitude <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="latitude" name="latitude" class="form-control " value="<?= old('latitude'); ?>">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="longitude">Longitude <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="longitude" name="longitude" class="form-control " value="<?= old('longitude'); ?>">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <img src="<?= base_url("assets/uploads/faskes/default.png"); ?>" class="rounded img-preview" width="150px">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="foto">Foto <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="file" id="foto" name="foto" class="form-control" onchange="previewImg()">
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                    <a href="/admin/faskes" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
                </div>
            </div>

        </form>
    </div>
</div>

<?= $this->endSection('content'); ?>