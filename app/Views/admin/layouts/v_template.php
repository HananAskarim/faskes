<!DOCTYPE html>
<html lang="en">

<?= $this->include('admin/layouts/v_head'); ?>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <?= $this->include('admin/layouts/v_sidebar'); ?>
      <?= $this->include('admin/layouts/v_header'); ?>

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3><?= $title; ?></h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12  ">
              <?= $this->renderSection('content'); ?>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->

    </div>
    <?= $this->include('admin/layouts/v_footer'); ?>
  </div>
  <?= $this->include('admin/layouts/v_javascript'); ?>
  <?= $this->renderSection('script'); ?>
</body>

</html>