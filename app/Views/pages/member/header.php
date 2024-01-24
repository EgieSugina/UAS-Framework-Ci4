<?php
$role = strtolower(session('user')['role'] ?? '');
$profile = session('user');
?>
<header class="d-flex flex-wrap align-items-center justify-content-between justify-content-md-between  mb-4 ">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="<?= base_url('/assets/images/logo.png') ?>" alt="Gamegeist Logo" width="70px"
            class="brand-image text-white" style="opacity: .8">
        <H1>Game<b>geist</b></H1>
    </a>
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0" id="mainNav">
        <li class="p-4"><a href="<?= base_url('/'); ?>" class="nav-link px-2 link-dark"><strong>STORE</strong></a></li>
        <li class="p-4"><a href="<?= base_url('member/library'); ?>" class="nav-link px-2 link-dark"><strong>LIBRARY</strong></a></li>
        <li class="p-4"><a href="<?= base_url('member/profile'); ?>" class="nav-link px-2 link-dark"><strong>PROFILE</strong></a></li>
    </ul>
    <div class="">
        <ul class="navbar-nav ml-auto d-flex flex-row">

            <!-- Messages Dropdown Menu -->
            <!-- <li class="mx-4 h2 align-self-center mb-0 dropdown">
                <a class="nav-link h2 align-self-center mb-0" href="<?= base_url('member/wishlist'); ?>">
                    <i class="far fa-regular fa-heart "></i>
                </a>
            </li> -->
            <!-- Notifications Dropdown Menu -->
            <li class="mx-4 h2 align-self-center mb-0 dropdown">
                <a class="nav-link h2 align-self-center mb-0" href="<?= base_url('member/cart'); ?>">
                    <i class="far fa-solid fa-cart-shopping "></i>
                    <?php if (isset($cart) && $cart > 0) { ?>
                        <span class="badge  badge-danger navbar-badge navbar-badge-mod">
                            <?= $cart ?>
                        </span>
                    <?php } ?>

                </a>

            </li>

            <?php if (isset($profile['fullname'])) { ?>
                <li class="mx-4 align-self-center">
                    <div class="user-panel  d-flex">
                        <div class="image">
                            <img src="<?= isset($profile['img']) ? 'data:image/png;base64,' . $profile['img'] : base_url('/assets/images/no-user.jpg') ?> "
                                class="img-circle  " alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">
                                <?= $profile['fullname'] ?>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="mx-4 align-self-center">
                    <div class="user-panel  d-flex">
                        <a class="nav-link" href="<?= base_url('auth/logout'); ?>" role="button">
                            <i class="fas fa-sign-out text-danger"> Logout </i>
                        </a>
                    </div>
                </li>
            <?php } else { ?>
                <li class="mx-4 align-self-center">
                    <a class="nav-link font-weight-bolder" href="login">
                        <i class="fa-solid fa-right-to-bracket  text-warning"> Login</i>

                    </a>
                </li>
            <?php } ?>

        </ul>
    </div>
</header>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var currentUrl = window.location.href;

        // Get all the anchors inside the #mainNav
        var navLinks = document.querySelectorAll("#mainNav a");

        // Loop through each anchor and check if its href matches the current URL
        navLinks.forEach(function (link) {
            if (link.href === currentUrl) {
                // Add the 'bg-primary' class to the parent <li> element
                link.parentElement.classList.add("bg-primary");
            }
        });
    });
</script>