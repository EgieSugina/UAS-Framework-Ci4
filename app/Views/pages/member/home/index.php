<style>
    .owl-carousel {


        background-color: #1c1e21;
        height: 42rem;

    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class=" col-sm-8">
            <div class="row">
                <?php foreach ($data as $row): ?>
                    <?= view('pages/components/cards', ['row' => $row, 'col' => 'col-sm-3']) ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div class="owl-carousel ">
                    <?php foreach ($data as $row): ?>
                        <?= view('pages/components/cards', ['row' => $row, 'col' => 'col-sm-12 p-0']) ?>
                    <?php endforeach; ?>
                    
                </div>

            </div>
        </div>

    </div>


</div>