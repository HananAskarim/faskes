<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissible " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>