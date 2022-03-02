<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success alert-dismissible " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <i class="fa fa-check"></i> <?= session()->getFlashdata('message'); ?>
    </div>
<?php endif; ?>