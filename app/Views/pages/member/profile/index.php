<style>
    body {
        margin: 0;
        color: #2e323c;
        background: #f5f6fa;
        position: relative;
        height: 100%;
    }

    .account-settings .user-profile {
        margin: 0 0 1rem 0;
        padding-bottom: 1rem;
        text-align: center;
    }

    .account-settings .user-profile .user-avatar {
        margin: 0 0 1rem 0;
    }

    .account-settings .user-profile .user-avatar img {
        width: 90px;
        height: 90px;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 100px;
    }

    .account-settings .user-profile h5.user-name {
        margin: 0 0 0.5rem 0;
    }

    .account-settings .user-profile h6.user-email {
        margin: 0;
        font-size: 0.8rem;
        font-weight: 400;
        color: #9fa8b9;
    }

    .account-settings .about {
        margin: 2rem 0 0 0;
        text-align: center;
    }

    .account-settings .about h5 {
        margin: 0 0 15px 0;
        color: #007ae1;
    }

    .account-settings .about p {
        font-size: 0.825rem;
    }

    .form-control {
        border: 1px solid #cfd1d8;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        font-size: .825rem;
        background: #ffffff;
        color: #2e323c;
    }

    .card {
        background: #ffffff;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        border: 0;
        margin-bottom: 1rem;
    }
</style>
<div class="container">
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100" style="background-color: #2c2f33  !important;">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img id="selectedImageCover"
                                    src="<?= isset($data_user['img']) && !empty($data_user['img']) ? 'data:image/png;base64,' . $data_user['img'] : '//placehold.it/240x200'; ?>"
                                    alt="<?= isset($data_user) ? $data_user['fullname'] : '' ?>">
                            </div>
                            <h5 class="user-name">
                                <?= isset($data_user) ? $data_user['fullname'] : '' ?>
                            </h5>
                            <h6 class="user-email">
                                <?= isset($data_user) ? $data_user['email'] : '' ?>
                            </h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100" style="background-color: #2c2f33  !important;">
                <?= view('pages/components/alerts') ?>

                <?= form_open('/member/profile/update', ['enctype' => 'multipart/form-data']) ?>
                <input value="<?= isset($data_user) ? $data_user['user_id'] : '' ?>" name="user_id" hidden>

                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-2 text-primary">Personal Details</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="Enter ..."
                                    value="<?= isset($data_user) ? $data_user['username'] : '' ?>" name="username">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Fullname</label>
                                <input type="text" class="form-control" placeholder="Enter ..."
                                    value="<?= isset($data_user) ? $data_user['fullname'] : '' ?>" name="fullname">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Enter ..."
                                    value="<?= isset($data_user) ? $data_user['email'] : '' ?>" name="email">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="customFileCover">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFileCover" name="image"
                                        onchange="displayImageCover()">
                                    <label class="custom-file-label" for="customFileCover">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Enter ..." name="password"
                                    id="password" oninput="validatePassword()">
                            </div>

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                            <div class="form-group">
                                <label>Retype Password</label>
                                <input type="password" class="form-control" placeholder="Enter ..."
                                    name="confirm_password" id="confirm_password" oninput="validatePassword()">
                                <span id="exampleInputPassword1-error" class="error invalid-feedback">Passwords do not
                                    match</span>
                            </div>
                        </div>
                    </div>

                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                                <a href="<?= previous_url() ?>" id="submit" name="submit"
                                    class="btn btn-secondary">Cancel</a>
                                <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>

            </div>
        </div>
    </div>
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