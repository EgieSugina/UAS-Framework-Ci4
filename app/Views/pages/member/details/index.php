<section class="py-2 card bg-header">
    <h5 class="pt-3 px-3"><a href="<?= previous_url() ?>" class="text-body text-white"><i
                class="fas fa-long-arrow-alt-left mr-2 text-white"></i> Continue shopping</a></h5>
    <hr>
    <div class="container  px-4 px-lg-5 my-5">

        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                    src="<?= 'data:image/png;base64,' . $game_product['cover'] ?>" alt="..." /></div>
            <div class="col-md-6">
                <h1 class="display-5 fw-bolder">
                    <?= $game_product['judul_game'] ?>
                </h1>
                <div class="fs-5 ">
                    <!-- <span class="text-decoration-line-through">$45.00</span> -->
                    <span class="mb-3 text-warning">
                        <?php if (isset($game_product['product_code'])) { ?>
                            <span class="text-info">Product Code</span>
                            <?php echo strtoupper($game_product['product_code']);
                        } else if (is_numeric($game_product['harga'])) {
                            if ($game_product['harga'] == 0) {
                                echo 'D1A.220.400';
                            } else {
                                echo 'Rp ' . number_format($game_product['harga'], 0, '.', '.');

                            }
                        } ?>
                    </span>
                    <div class="mb-2" id="yourDivId">

                    </div>
                </div>
                <p class="lead">
                    <?= $game_product['deskripsi'] ?>
                </p>

                <div class="d-flex">

                    <a href="<?= base_url('/member/addcart' . '/' . $game_product['game_id']); ?>"
                        class="btn btn-outline-info flex-shrink-0" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
<script>
    // Your input string
    var gameGenres = "<?= $game_product['genre'] ?>";

    // Split the string into an array using the comma as a separator
    var genresArray = gameGenres.split(',');

    // Get the div element where you want to insert the items
    var targetDiv = document.getElementById('yourDivId'); // replace 'yourDivId' with the actual ID of your div

    // Loop through the array and insert each item into a separate div
    genresArray.forEach(function (genre) {
        var newDiv = document.createElement('span');
        newDiv.classList.add('badge', 'rounded-pill', 'bg-secondary', 'mx-1');
        newDiv.textContent = genre.trim(); // trim to remove leading/trailing spaces
        targetDiv.appendChild(newDiv);
    });
</script>