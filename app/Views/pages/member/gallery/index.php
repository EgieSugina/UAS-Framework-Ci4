<style>
    .owl-carousel {


        background-color: #1c1e21;
        height: 40.9rem;

    }
</style>
<div class="container-fluid">
    <div class="d-flex flex-wrap">


        <?php foreach ($data as $index => $row): ?>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <img class="w-100 shadow-1-strong rounded mb-4"
                    src="<?= isset($row['cover']) && !empty($row['cover']) ? 'data:image/png;base64,' . $row['cover'] : '//placehold.it/200x250'; ?>">
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <img class="w-100 shadow-1-strong rounded mb-4"
                    src="<?= isset($row['backcover']) && !empty($row['backcover']) ? 'data:image/png;base64,' . $row['backcover'] : '//placehold.it/200x250'; ?>">
            </div>
        <?php endforeach; ?>




    </div>


</div>