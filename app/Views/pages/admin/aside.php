<?php $role = strtolower(session('user')['role'] ?? ''); ?>
<a href=" " class="brand-link">
    <img src="<?= base_url('/assets/images/logo.png') ?>" alt="Gamegeist Logo" width="1000px"
        class="brand-image text-white" style="opacity: .8">
    <span class="brand-text font-weight-light">Gamegeist</span>
</a>


<div class="sidebar">

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div> -->
        <div class="info">
            <a href="#" class="d-block">Egie Sugina</a>
        </div>
    </div>

 

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="<?= base_url($role . '/games'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-solid fa-list"></i>
                    <p>
                        Games Product
                        <!-- <span class="badge badge-info right">2</span> -->
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url($role . '/transactions'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                    <p>
                        Transactions
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url($role . '/members'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Members
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url($role . '/users'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Users
                    </p>
                </a>
            </li>

            <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-envelope"></i>
                    <p>
                        Mailbox
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/mailbox/mailbox.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Inbox</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/mailbox/compose.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Compose</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/mailbox/read-mail.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Read</p>
                        </a>
                    </li>
                </ul>
            </li> -->


        </ul>
    </nav>

</div>