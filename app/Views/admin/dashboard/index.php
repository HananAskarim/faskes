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
          <?= session()->get('info'); ?>
        </div>
      </div>
    </div>
    <div class="row" style="display: inline-block;">
      <div class="top_tiles">
        <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 ">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-map-marker"></i></div>
            <div class="count"><?= $jml_kategori; ?></div>
            <h3>KATEGORI</h3>
            <p>Jumlah data tabel kategori</p>
          </div>
        </div>
        <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 ">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-hospital-o"></i></div>
            <div class="count"><?= $jml_faskes; ?></div>
            <h3>FASKES</h3>
            <p>Jumlah data tabel fasilitas kesehatan</p>
          </div>
        </div>
        <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 ">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-user"></i></div>
            <div class="count"><?= $jml_admin; ?></div>
            <h3>ADMIN</h3>
            <p>Jumlah data tabel admin</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection('content'); ?>