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

            <div class="row">
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Title Game</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="judul_game">
                    </div>
                </div>
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="harga">
                    </div>
                </div>
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Release Date </label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="tanggal_rilis">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Publisher</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="publisher">
                    </div>
                </div>
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Platform</label>
                        <select class="custom-select" data-placeholder="Select a State" style="width: 100%;"
                            name="platform">
                            <option>Windows</option>
                            <option>Linux</option>
                            <option>Mac</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Genre</label>
                        <select class="select2" multiple="multiple" data-placeholder="Select a State"
                            data-dropdown-css-class="select2-purple" style="width: 100%;" name="genre">
                            style="width: 100%;">
                            <option>Adventure </option>
                            <option>Action </option>
                            <option>Sports </option>
                            <option>Simulation </option>
                            <option>Platformer </option>
                            <option>RPG </option>
                            <option>First-person shooter </option>
                            <option>Action-adventure </option>
                            <option>Fighting </option>
                            <option>Real-time strategy </option>
                            <option>Racing </option>
                            <option>Shooter </option>
                            <option>Puzzle </option>
                            <option>Casual </option>
                            <option>Strategy game </option>
                            <option>Massively multiplayer online role-playing </option>
                            <option>Stealth </option>
                            <option>Party </option>
                            <option>Action RPG </option>
                            <option>Tactical role-playing </option>
                            <option>Survival </option>
                            <option>Battle Royale </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Rating</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="rating">
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
                                    Describe the game.
                                    <br>
                                    <br>
                                    <br>
                                    Type here...
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
                                    <img height="200" width="240" id="selectedImageCover" src="//placehold.it/200x240"
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
                                    <img height="200" width="240" id="selectedImage" src="//placehold.it/200x240"
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