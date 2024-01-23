<style>
    .card-holder {
        padding: 5px 13px;
        background: #fff;
        border-radius: 5px;
        /* flex: auto; */
    }
</style>
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
                                    <h5 class="mb-0">Payment Method</h5>
                                </div>
                                <p class="small mb-2">Card type</p>
                                <a href="#!" type="submit" class="card-holder "><img
                                        src="<?= base_url('/assets/images/ovo.png') ?>" width="20px" height="20px"> OVO</a>
                                <a href="#!" type="submit" class="card-holder "><img
                                        src="<?= base_url('/assets/images/dana.png') ?>" width="30px" height="20px"> DANA</a>
                                <a href="#!" type="submit" class="card-holder "><img
                                        src="<?= base_url('/assets/images/gopay.png') ?>" width="20px"
                                        height="20px"> GoPay</a>
                                <!-- <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a> -->
                                <form class="mt-4">
                                    <!-- <div class="form-outline form-white mb-4">

                                        <div class="btn-group btn-group-toggle bg-light" data-toggle="buttons">
                                            <label class="btn  ">
                                                <input type="radio" name="options" id="option_a1" autocomplete="off"
                                                    checked=""> <img src="<?= base_url('/assets/images/ovo.png') ?>"
                                                    width="20px" height="20px"> OVO
                                            </label>
                                            <label class="btn  ">
                                                <input type="radio" name="options" id="option_a2" autocomplete="off">
                                                <img src="<?= base_url('/assets/images/dana.png') ?>" width="30px"
                                                    height="20px">DANA
                                            </label>
                                            <label class="btn   active">
                                                <input type="radio" name="options" id="option_a3" autocomplete="off">
                                                <img src="<?= base_url('/assets/images/gopay.png') ?>" width="20px"
                                                    height="20px">Gopay
                                            </label>
                                        </div>


                                    </div> -->
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typeText">Phone Number</label>
                                        <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                                            placeholder="081 320 xxx xxx" minlength="19" maxlength="19" />
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