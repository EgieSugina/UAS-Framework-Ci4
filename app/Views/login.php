<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gamegeist | Log in</title>


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.css'); ?>">
</head>

<body class="hold-transition login-bg login-page ">
    <div class="login-box">
        <div class="login-logo">
            <a href=" "><b>Game</b>geist</a>
        </div>

        <div class="  rounded">
            <div class="card-body login-card-body rounded">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="<?= base_url('auth/login') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email / Username" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 align-self-center">
                            <p class="mb-0">
                                <a href="register" class="text-center text-light">Register a new account</a>
                            </p>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>

                    </div>
                </form>


            </div>

        </div>
    </div>
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
    <script src=" <?= base_url('assets/plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>
    <script>
        $(document).ready(function () {
            $(":input").attr("autocomplete", "off");
        });
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 10000
        });


        var errorMessage = '<?= session()->getFlashdata('error') ?>';
        if (errorMessage) {

            Toast.fire({
                icon: 'error',
                title: errorMessage
            });

        }
        var successMessage = '<?= session()->getFlashdata('success') ?>';
        if (successMessage) {

            Toast.fire({
                icon: 'success',
                title: successMessage
            });

        }
    </script>
</body>

</html>