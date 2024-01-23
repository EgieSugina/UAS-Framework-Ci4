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
    <?= form_open($role . '/users' . $act, ['enctype' => 'multipart/form-data']) ?>
    <div class="card-body">
        <div class="card-body">
            <input value="<?= isset($data) ? $data['user_id'] : '' ?>" name="user_id" hidden>
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="Enter ..."
                                    value="<?= isset($data) ? $data['username'] : '' ?>" name="username">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Fullname</label>
                                <input type="text" class="form-control" placeholder="Enter ..."
                                    value="<?= isset($data) ? $data['fullname'] : '' ?>" name="fullname">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Enter ..."
                                    value="<?= isset($data) ? $data['email'] : '' ?>" name="email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="customFileCover">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFileCover" name="image"
                                        onchange="displayImageCover()">
                                    <label class="custom-file-label" for="customFileCover">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Enter ..." name="password"
                                    id="password" oninput="validatePassword()">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Retype Password</label>
                                <input type="password" class="form-control" placeholder="Enter ..."
                                    name="confirm_password" id="confirm_password" oninput="validatePassword()">
                                <span id="exampleInputPassword1-error" class="error invalid-feedback">Passwords do not
                                    match</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row col-sm-6">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="customFileCover"></label>
                            <div class=" text-center d-flex justify-content-center align-items-center">
                                <img height="240" width="200" id="selectedImageCover"
                                    src="<?= isset($data['img']) && !empty($data['img']) ? 'data:image/png;base64,' . $data['img'] : '//placehold.it/240x200'; ?>"
                                    alt="..." class="img-thumbnail rounded" />
                                <img id="loadingIndicatorCover" src="<?= base_url('assets/loading.svg') ?>" height="60"
                                    width="60" class="img-thumbnail rounded" />
                                <div id="loadingIndicatorCover">Loading...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" id="submitBtn" class="btn btn-primary ">Save</button>
        <a type="submit" href="<?= previous_url() ?>" class="btn btn-danger float-right">Cancel</a>
    </div>
    <!-- /.card-footer -->
    <?= form_close() ?>
</div>
<script defer>
    function validatePassword() {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;
        // const passwordError = document.getElementById('passwordError');
        const submitBtn = document.getElementById('submitBtn');
        if (password !== confirmPassword) {
            document.getElementById('confirm_password').classList.add('is-invalid');
            document.getElementById('password').classList.add('is-invalid');
            document.getElementById('passspan1').classList.add('text-danger');
            document.getElementById('passspan2').classList.add('text-danger');
            submitBtn.disabled = true;
        } else {
            document.getElementById('confirm_password').classList.remove('is-invalid');
            document.getElementById('password').classList.remove('is-invalid');
            document.getElementById('passspan1').classList.remove('text-danger');
            document.getElementById('passspan2').classList.remove('text-danger');
            submitBtn.disabled = false;
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