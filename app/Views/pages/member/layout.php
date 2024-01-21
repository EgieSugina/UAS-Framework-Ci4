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
                    <li class="p-4 bg-primary"><a href="#" class="nav-link px-2">Discover</a></li>
                    <li class="p-4"><a href="#" class="nav-link px-2 link-dark">Browse</a></li>

                </ul>

                <div class="col-md-3 text-end d-flex justify-content-between">
                    <div class="info">
                        <a href="login" class="h2"><i class="far fa-regular fa-heart"></i></a>
                        <a href="login" class="h2"><i class="far fa-solid fa-cart-shopping "></i></i></a>
                    </div>
                    <div class="info">
                        <a href="login">Login</a>
                    </div>
                    <!-- <div class="user-panel  d-flex">
                        <div class="image">
                            <img src="<?= base_url('/assets/images/no-user.jpg') ?>" class="img-circle  " alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block"><a href="login">Nama User</a></a>
                        </div>
                    </div> -->

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
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item font-weight-bold"><a href="#">VIEW ALL PRODUCTS <i
                                            class="fas fa-solid fa-arrow-right"></i></a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>



            <section class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-3 col-sm-6">
                            <div class="product-grid">
                                <div class="product-image">
                                    <a href="#" class="image">
                                        <img class="pic-1"
                                            src="https://cdn.akamai.steamstatic.com/steam/apps/1313140/hero_capsule_alt_assets_5.jpg">
                                        <img class="pic-2"
                                            src="https://image.api.playstation.com/vulcan/ap/rnd/202308/2022/58e732815b72c5fa8e0be6bfb8f1949256f63495417cba21.png">
                                    </a>
                                    <span class="product-hot-label bg-danger">hot</span>
                                    <ul class="product-links">
                                        <li><a href="#" data-tip="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        <li><a href="#" data-tip="Compare"><i class="fa fa-random"></i></a></li>
                                        <li><a href="#" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <a class="add-to-cart" href="#">
                                        <i class="fas fa-plus"></i>Add to cart
                                    </a>
                                    <h3 class="title"><a href="#">Men's Jacket</a></h3>
                                    <ul class="rating">
                                        <li class="fas fa-star"></li>
                                        <li class="fas fa-star"></li>
                                        <li class="fas fa-star"></li>
                                        <li class="far fa-star"></li>
                                        <li class="far fa-star"></li>
                                    </ul>
                                    <div class="price">$75.99</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>



        <!-- <aside class="control-sidebar control-sidebar-dark">

        </aside> -->



    </div>


    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/adminlte.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-mousewheel/jquery.mousewheel.js'); ?>"></script>
    <script src="" data-auto-replace-svg="nest"></script>

    <!-- <script src="plugins/raphael/raphael.min.js"></script> -->
    <script src="<?= base_url('assets/dist/js/demo.js'); ?>""></script>
 
</body>

</html>