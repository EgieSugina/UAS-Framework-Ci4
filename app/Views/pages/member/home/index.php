<style>
    .owl-carousel {


        background-color: #1c1e21;
        height: 40.9rem;

    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class=" col-sm-8">
            <div class="row">
                <?php foreach ($data as $index => $row): ?>
                    <?= view('pages/components/cards', ['row' => $row, 'col' => 'col-sm-3', 'index' => $index . 'normal']) ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div class="owl-carousel ">
                    <?php
                    $c = 0;
                    foreach ($data as $index => $row):
                        $c++;
                        $time = hrtime();
                        ?>
                        <?= view('pages/components/cards', ['row' => $row, 'col' => 'col-sm-12 p-0', 'index' => $index + $c + $time[0] * 1e9 + $time[1] . 'carousel']) ?>
                    <?php endforeach; ?>

                </div>

            </div>
        </div>

    </div>


</div>