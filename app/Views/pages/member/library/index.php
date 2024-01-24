<div class="container-fluid">
    <div class="row">
        <div class=" col-sm-12">
            <div class="row">
                <?php foreach ($data as $index => $row): ?>
                    <?= view('pages/components/cards', ['row' => $row, 'col' => 'col-sm-3', 'index' => $index]) ?>
                <?php endforeach; ?>
            </div>
        </div>


    </div>


</div>