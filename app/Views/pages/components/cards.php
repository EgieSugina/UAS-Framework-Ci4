<div class="<?= $col ?> mb-3  ">
    <?php $uniq = uniqid() . '-' . trim($row['judul_game']) ?>
    <div class="product-grid">
        <div class="product-image">
            <a href="#" class="image">
                <img class="pic-1"
                    src="<?= isset($row['cover']) && !empty($row['cover']) ? 'data:image/png;base64,' . $row['cover'] : '//placehold.it/200x250'; ?>">
                <img class="pic-2"
                    src="<?= isset($row['backcover']) && !empty($row['backcover']) ? 'data:image/png;base64,' . $row['backcover'] : '//placehold.it/200x250'; ?>">
            </a>
            <!-- <span class="product-hot-label bg-danger">hot</span> -->
            <ul class="product-links">
                <li><a href="#" data-tip="Add to Cart"><i class="far fa-solid fa-cart-shopping "></i></a></li>
                <li><a href="#" data-tip="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                <!-- <li><a href="#" data-tip="Compare"><i class="fa fa-random"></i></a></li> -->
                <li><a href="#" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
            </ul>
        </div>
        <div class="product-content">
            <!-- <a class="add-to-cart" href="#">
                <i class="fas fa-plus"></i>Add to cart
            </a> -->
            <h3 class="title"><a href="#">
                    <?= $row['judul_game'] ?>
                </a></h3>
            <ul class="rating" id="rating-<?= $row['game_id'] ?>-<?= $uniq ?>"></ul>
            <div class="price">
                <?php if (is_numeric($row['harga'])) {
                    echo 'Rp ' . number_format($row['harga'], 0, '.', '.');
                } ?>
            </div>
        </div>
    </div>
</div>


<script>
    var rating = <?= $row['rating'] ?>;
    var rating_on_five_scale = Math.round(rating / 2);
    var uniqueId = "<?= $row['game_id'] ?>-" + "<?= $uniq ?>";
    console.log(uniqueId);
    var ratingContainer = document.getElementById("rating-" + uniqueId);

    for (var i = 1; i <= 5; i++) {
        var star = document.createElement('li');
        var starClass = (i < rating_on_five_scale) ? 'fas fa-star' : (i === rating_on_five_scale) ? 'fas fa-star-half-alt' : 'far fa-star';
        star.className = starClass;
        ratingContainer.appendChild(star);
    }
</script>