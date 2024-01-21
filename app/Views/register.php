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
                <p class="login-box-msg">Register a new account</p>

                <form action="<?= base_url('auth/register') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full Name" name="fullname">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" oninput="validatePassword()"
                            id="password" name="password">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock" id='passspan1'></span>
                            </div>
                        </div>

                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password" id="confirm_password"
                            name="confirm_password" oninput="validatePassword()">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock" id='passspan2'></span>
                            </div>
                        </div>
                        <span id="exampleInputPassword1-error" class="error invalid-feedback">Passwords do not
                            match</span>
                    </div>
                    <div class="row">
                        <div class="col-8 align-self-center">
                            <p class="mb-0">
                                <a href="login" class="text-center text-light">I already have account</a>
                            </p>
                        </div>

                        <div class="col-4">
                            <button type="submit" id="submitBtn" class="btn btn-primary btn-block">Register</button>
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
    <script defer>

        function validatePassword() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            // const passwordError = document.getElementById('passwordError');
            const submitBtn = document.getElementById('submitBtn');



            if (password !== confirmPassword) {
                document.getElementById('confirm_password').classList.add('is-invalid');
                document.getElementById('password').classList.add('is-invalid');
                document.getElementById('passspan1').classList.add('text-danger');
                document.getElementById('passspan2').classList.add('text-danger');
                submitBtn.disabled = true;
            } else {
                document.getElementById('confirm_password').classList.remove('is-invalid');
                document.getElementById('password').classList.remove('is-invalid');
                document.getElementById('passspan1').classList.remove('text-danger');
                document.getElementById('passspan2').classList.remove('text-danger');
                submitBtn.disabled = false;
            }
        }
    </script>
</body>

</html>