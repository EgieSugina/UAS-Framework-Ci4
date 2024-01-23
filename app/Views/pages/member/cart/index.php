<div class="row d-flex justify-content-center align-items-center h-100 ">
    <div class="col">
        <div class="card bg-header">
            <div class="card-body p-4">

                <div class="row">

                    <div class="col-lg-7">
                        <h5 class="mb-3"><a href="#!" class="text-body text-white"><i
                                    class="fas fa-long-arrow-alt-left me-2 text-white"></i> Continue shopping</a></h5>
                        <hr>

                        <!-- <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <p class="mb-1">Shopping cart</p>
                                <p class="mb-0">You have 4 items in your cart</p>
                            </div>
                            <div>
                                <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                                        class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                            </div>
                        </div> -->

                        <?php foreach ($cartItems as $item) {
                            ?>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                            <div class="ms-3">
                                                <h5>
                                                    <?= $item['judul_game'] ?>
                                                </h5>
                                                <p class="small mb-0">
                                                    <?= $item['genre'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center">
                                            <div style="width: 50px;">
                                                <h5 class="fw-normal mb-0">
                                                    <?= $item['total_quantity'] ?>
                                                </h5>
                                            </div>
                                            <div style="width: 180px;">
                                                <h5 class="mb-0">

                                                    <?= 'Rp ' . number_format($item['harga'], 0, '.', '.') ?>

                                                </h5>
                                            </div>
                                            <a href="#!" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>


                    </div>
                    <div class="col-lg-5">

                        <div class="card card-orange text-white rounded-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="mb-0">Select Payment Method</h5>

                                </div>
                                <form class="mt-4">
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                                            placeholder="Cardholder's Name" />
                                        <!-- <label class="form-label" for="typeName">Cardholder's Name</label> -->
                                    </div>



                                </form>

                                <hr class="my-4">

                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Subtotal</p>
                                    <p class="mb-2">
                                        <?= 'Rp ' . number_format($total, 0, '.', '.') ?>

                                    </p>
                                </div>


                                <div class="d-flex justify-content-between mb-4">
                                    <p class="mb-2">Total(Incl. taxes)</p>
                                    <p class="mb-2">
                                        <?= 'Rp ' . number_format(($total * 0.2) + $total, 0, '.', '.') ?>


                                    </p>
                                </div>
                                <?php $id = strtolower(session('user')['user_id'] ?? ''); ?>

                                <a href="<?= base_url('/member/checkout/') . $id ?>" type="button"
                                    class="btn btn-info btn-block btn-lg">
                                    <div class="d-flex justify-content-between">
                                        <span>
                                            <?= 'Rp ' . number_format(($total * 0.2) + $total, 0, '.', '.') ?>
                                        </span>
                                        <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                    </div>
                                </a>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>