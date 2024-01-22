<style>
    #loadingIndicatorCover {
        display: none;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1;
    }

    #selectedImageCover {
        width: 200px;
        height: 240px;
    }

    #loadingIndicator {
        display: none;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1;
    }

    #selectedImage {
        width: 200px;
        height: 240px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #da5a11 !important;

    }
</style>
<div class="card card-orange">
    <div class="card-header">
        <h3 class="card-title text-white">
            <?= $title ?>
        </h3>
    </div>
    <?= view('pages/components/alerts') ?>
    <?= form_open($role . '/games' . $act, ['enctype' => 'multipart/form-data']) ?>
    <div class="card-body">
        <div class="card-body">
            <input value="<?= isset($game_product) ? $game_product['game_id'] : '' ?>" name="game_id" hidden>
            <div class="row">
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Title Game</label>
                        <input type="text" class="form-control" placeholder="Enter ..."
                            value="<?= isset($game_product) ? $game_product['judul_game'] : '' ?>" name="judul_game">
                    </div>
                </div>
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" placeholder="Enter ..."
                            value="<?= isset($game_product) ? $game_product['harga'] : '' ?>" name="harga">
                    </div>
                </div>
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Release Date </label>
                        <input type="text" class="form-control" placeholder="Enter ..."
                            value="<?= isset($game_product) ? $game_product['tanggal_rilis'] : '' ?>"
                            name="tanggal_rilis">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Publisher</label>
                        <input type="text" class="form-control" placeholder="Enter ..."
                            value="<?= isset($game_product) ? $game_product['publisher'] : '' ?>" name="publisher">
                    </div>
                </div>
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Platform</label>
                        <select class="custom-select" data-placeholder="Select a State" style="width: 100%;"
                            name="platform">
                            <option value="Windows" <?= isset($game_product) ? ($game_product['platform'] == 'Windows') ? 'selected' : '' : ''; ?>>Windows</option>
                            <option value="Linux" <?= isset($game_product) ? ($game_product['platform'] == 'Linux') ? 'selected' : '' : ''; ?>>Linux</option>
                            <option value="Mac" <?= isset($game_product) ? ($game_product['platform'] == 'Mac') ? 'selected' : '' : ''; ?>>Mac</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <!-- text input -->
                    <?php
                    $selectedGenres = isset($game_product) ? explode(',', $game_product['genre']) : [];
                    ?>
                    <div class="form-group">
                        <label>Genre</label>
                        <select class="select2" multiple="multiple" data-placeholder="Select a State"
                            data-dropdown-css-class="select2-purple" style="width: 100%;" name="genre[]"
                            style="width: 100%;">
                            <option value="Adventure" <?= in_array('Adventure', $selectedGenres) ? 'selected' : ''; ?>>
                                Adventure</option>
                            <option value="Action" <?= in_array('Action', $selectedGenres) ? 'selected' : ''; ?>>Action
                            </option>
                            <option value="Sports" <?= in_array('Sports', $selectedGenres) ? 'selected' : ''; ?>>Sports
                            </option>
                            <option value="Simulation" <?= in_array('Simulation', $selectedGenres) ? 'selected' : ''; ?>>
                                Simulation</option>
                            <option value="Platformer" <?= in_array('Platformer', $selectedGenres) ? 'selected' : ''; ?>>
                                Platformer</option>
                            <option value="RPG" <?= in_array('RPG', $selectedGenres) ? 'selected' : ''; ?>>RPG</option>
                            <option value="First-person" <?= in_array('First-person', $selectedGenres) ? 'selected' : ''; ?>>First-person</option>
                            <option value="Action-adventure" <?= in_array('Action-adventure', $selectedGenres) ? 'selected' : ''; ?>>Action-adventure</option>
                            <option value="Fighting" <?= in_array('Fighting', $selectedGenres) ? 'selected' : ''; ?>>
                                Fighting</option>
                            <option value="Real-time" <?= in_array('Real-time', $selectedGenres) ? 'selected' : ''; ?>>
                                Real-time</option>
                            <option value="Racing" <?= in_array('Racing', $selectedGenres) ? 'selected' : ''; ?>>Racing
                            </option>
                            <option value="Shooter" <?= in_array('Shooter', $selectedGenres) ? 'selected' : ''; ?>>
                                Shooter</option>
                            <option value="Puzzle" <?= in_array('Puzzle', $selectedGenres) ? 'selected' : ''; ?>>Puzzle
                            </option>
                            <option value="Casual" <?= in_array('Casual', $selectedGenres) ? 'selected' : ''; ?>>Casual
                            </option>
                            <option value="Strategy game" <?= in_array('Strategy game', $selectedGenres) ? 'selected' : ''; ?>>Strategy game</option>
                            <option value="Massively multiplayer online role-playing" <?= in_array('Massively multiplayer online role-playing', $selectedGenres) ? 'selected' : ''; ?>>Massively multiplayer
                                online role-playing</option>
                            <option value="Stealth" <?= in_array('Stealth', $selectedGenres) ? 'selected' : ''; ?>>
                                Stealth</option>
                            <option value="Party" <?= in_array('Party', $selectedGenres) ? 'selected' : ''; ?>>Party
                            </option>
                            <option value="Action RPG " <?= in_array('Action RPG ', $selectedGenres) ? 'selected' : ''; ?>>Action RPG </option>
                            <option value="Tactical" <?= in_array('Tactical', $selectedGenres) ? 'selected' : ''; ?>>
                                Tactical</option>
                            <option value="Survival" <?= in_array('Survival', $selectedGenres) ? 'selected' : ''; ?>>
                                Survival</option>
                            <option value="Battle Royale" <?= in_array('Battle Royale', $selectedGenres) ? 'selected' : ''; ?>>Battle Royale</option>

                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Rating</label>
                        <input type="text" class="form-control" placeholder="Enter ..."
                            value="<?= isset($game_product) ? $game_product['rating'] : '' ?>" name="rating">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="customFileCover">Cover</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFileCover" name="cover"
                                onchange="displayImageCover()">
                            <label class="custom-file-label" for="customFileCover">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="customFile">Back Cover</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="backcover"
                                onchange="displayImage()">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea id="summernote" rows="500" name="deskripsi">

                        <?= isset($game_product) ? $game_product['deskripsi'] : 'Describe the game.
                                    <br>
                                    <br>
                                    <br>
                                    Type here...' ?>
                                    
                                </textarea>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="customFileCover">Cover</label>
                                <div class=" text-center d-flex justify-content-center align-items-center">
                                    <img height="200" width="240" id="selectedImageCover"
                                        src="<?= isset($game_product['cover']) && !empty($game_product['cover']) ? 'data:image/png;base64,' . $game_product['cover'] : '//placehold.it/200x240'; ?>"
                                        alt="..." class="img-thumbnail rounded" />
                                    <img id="loadingIndicatorCover" src="<?= base_url('assets/loading.svg') ?>"
                                        height="60" width="60" class="img-thumbnail rounded" />
                                    <div id="loadingIndicatorCover">Loading...</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="customFile">Back Cover</label>
                                <div class=" text-center d-flex justify-content-center align-items-center">
                                    <img height="200" width="240" id="selectedImage"
                                        src="<?= isset($game_product['backcover']) && !empty($game_product['backcover']) ? 'data:image/png;base64,' . $game_product['backcover'] : '//placehold.it/200x240'; ?>"
                                        alt="..." class="img-thumbnail rounded" />
                                    <img id="loadingIndicator" src="<?= base_url('assets/loading.svg') ?>" height="60"
                                        width="60" class="img-thumbnail rounded" />
                                    <div id="loadingIndicator">Loading...</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">



                    </div>

                </div>

            </div>




        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-info">Save</button>
        <a type="submit" href="<?= previous_url() ?>" class="btn btn-danger float-right">Cancel</a>
    </div>
    <!-- /.card-footer -->
    <?= form_close() ?>
</div>

<script defer>
    function displayImage() {
        const fileInput = document.getElementById('customFile');
        const selectedImage = document.getElementById('selectedImage');
        const loadingIndicator = document.getElementById('loadingIndicator');

        const file = fileInput.files[0];

        if (file) {
            loadingIndicator.style.display = 'block';

            const reader = new FileReader();
            reader.onloadend = function () {
                const img = new Image();
                img.onload = function () {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');

                    canvas.width = 200;
                    canvas.height = 250;

                    ctx.drawImage(img, 0, 0, 200, 250);

                    selectedImage.src = canvas.toDataURL('image/png');

                    loadingIndicator.style.display = 'none';
                };
                img.src = reader.result;
            };
            reader.readAsDataURL(file);
        }
    }
    function displayImageCover() {
        const fileInput = document.getElementById('customFileCover');
        const selectedImageCover = document.getElementById('selectedImageCover');
        const loadingIndicatorCover = document.getElementById('loadingIndicatorCover');

        const file = fileInput.files[0];

        if (file) {
            loadingIndicatorCover.style.display = 'block';

            const reader = new FileReader();
            reader.onloadend = function () {
                const img = new Image();
                img.onload = function () {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');

                    canvas.width = 200;
                    canvas.height = 250;

                    ctx.drawImage(img, 0, 0, 200, 250);

                    selectedImageCover.src = canvas.toDataURL('image/png');

                    loadingIndicatorCover.style.display = 'none';
                };
                img.src = reader.result;
            };
            reader.readAsDataURL(file);
        }
    }

</script>