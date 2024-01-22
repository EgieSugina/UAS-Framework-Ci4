<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gamegeist |
        <?= $title ?>
    </title>


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/custom.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/animate.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/owl.carousel.min.css'); ?>">

    <!-- Summernote -->
</head>

<body class="hold-transition bg-content  dark-mode ">
    <div class="bg-header position-sticky fixed-top">
        <div class="container">
            <header
                class="d-flex flex-wrap align-items-center justify-content-between justify-content-md-between  mb-4 ">
                <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                    <img src="<?= base_url('/assets/images/logo.png') ?>" alt="Gamegeist Logo" width="70px"
                        class="brand-image text-white" style="opacity: .8">
                    <H1>Game<b>geist</b></H1>
                </a>
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li class="p-4 bg-primary"><a href="#" class="nav-link px-2">STORE</a></li>
                    <li class="p-4"><a href="#" class="nav-link px-2 link-dark">LIBRARY</a></li>

                </ul>

                <div class="">
                    <ul class="navbar-nav ml-auto d-flex flex-row">

                        <!-- Messages Dropdown Menu -->
                        <li class="mx-4 h2 align-self-center mb-0 dropdown">
                            <a class="nav-link h2 align-self-center mb-0" href="#">
                                <i class="far fa-regular fa-heart "></i>
                            </a>
                        </li>
                        <!-- Notifications Dropdown Menu -->
                        <li class="mx-4 h2 align-self-center mb-0 dropdown">
                            <a class="nav-link h2 align-self-center mb-0" data-toggle="dropdown" href="#">
                                <i class="far fa-solid fa-cart-shopping "></i>
                                <span class="badge  badge-danger navbar-badge navbar-badge-mod">15</span>
                            </a>

                        </li>
                        <li class="mx-4 align-self-center">
                            <a class="nav-link font-weight-bolder" href="login">
                                Login
                            </a>
                        </li>
                        <li class="mx-4 align-self-center">
                            <div class="user-panel  d-flex">
                                <div class="image">
                                    <img src="<?= base_url('/assets/images/no-user.jpg') ?>" class="img-circle  "
                                        alt="User Image">
                                </div>
                                <div class="info">
                                    <a href="#" class="d-block"> Nama User</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>
        </div>
    </div>

    <div class="wrapper ">
        <div class="container  glass ">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Recently Released
                            </h1>
                        </div>
                        <!-- <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item font-weight-bold"><a href="#">VIEW ALL PRODUCTS <i
                                                class="fas fa-solid fa-arrow-right"></i></a></li>
                                        </ol>
                                    </div> -->
                    </div>
                </div>
            </div>



            <section class="content">
                <?= $content ?>

            </section>
        </div>



        <!-- <aside class="control-sidebar control-sidebar-dark">

                    </aside> -->



    </div>


    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/adminlte.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/owl.carousel.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-mousewheel/jquery.mousewheel.js'); ?>"></script>
    <script src="" data-auto-replace-svg="nest"></script>

    <!-- <script src="plugins/raphael/raphael.min.js"></script> -->
    <script src="<?= base_url('assets/dist/js/demo.js'); ?>""></script>
    <script>
        $(document).ready(function () {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                // items: 1,
                // loop: true,
                // autoplay: true,
                // autoplayTimeout: 1000,
                // autoplayHoverPause: true,
                // animateOut: 'slideOutDown',
                // animateIn: 'flipInX',
                items: 1, // Number of items to show
                loop: true, // Enable infinite loop
                autoplay: true, // Enable autoplay
                autoplayTimeout: 2000, // Autoplay interval in milliseconds
                animateOut: 'animate__bounceOutDown', // Animation type for the item disappearing
                animateIn: 'animate__backInDown', // Animation type for the item appearing
                autoplayHoverPause: true,
                // You can customize other options as needed

            });

        });

    </script>
</body>

</html>