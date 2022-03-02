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
  </div>
</div>
<?= $this->endSection('content'); ?>