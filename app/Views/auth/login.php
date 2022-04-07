<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title; ?></title>

    <!-- Bootstrap -->
    <link href="<?= base_url('/assets/template/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('/assets/template/vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('/assets/template/vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('/assets/template/vendors/animate.css/animate.min.css'); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('/assets/template/build/css/custom.min.css'); ?>" rel="stylesheet">
</head>

<body class="login">
    <div>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="<?= base_url('admin/auth/process'); ?>" method="post">
                        <?= csrf_field(); ?>

                        <h1>Login </h1>
                        <?= $this->include('admin/alert/error'); ?>
                        <div>
                            <input type="text" name="username" class="form-control" placeholder="Username" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-info">Log in</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-map"></i> SIG Faskes !</h1>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

        </div>
    </div>
</body>

</html>