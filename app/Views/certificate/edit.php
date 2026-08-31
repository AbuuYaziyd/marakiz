<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <?php if (session('role') == 'admin') : ?>
        <div class="col-4">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <?php if ($user['image'] != null) : ?>
                                    <a href="<?= base_url('user/delete-image/' . $user['id']) ?>" class="btn btn-block btn-outline-danger mb-1 btn-lg" id="delete"><?= lang('app.delete') ?></a>
                                <?php endif ?>
                                <div class="col-12">
                                    <?= form_open_multipart('user/image') ?>
                                    <div class="media mb-2">
                                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                        <input type="file" name="image" id="picha" onchange="readURL(this)" style="display: none;">
                                        <label class="mr-1" for="picha">
                                            <img src="<?= $user['image'] != null ? base_url($user['image']) : 'https://ui-avatars.com/api/?name=' . ($user['name_ar'] ?? $user['lname'])  . '&background=random&length=1&font-size=1' ?>" alt="avatar" id="img" class="users-avatar-shadow rounded-circle" height="250" width="250">
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-block btn-secondary mt-2"><?= lang('app.send') ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4><b><?= lang('app.certificate') ?></b></h4>
                        </div>
                        <hr>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="col-12">
                                    <?php $validation = \Config\Services::validation() ?>
                                    <?= form_open('certificate/data/' . $user['id']) ?>
                                    <div class="mb-2">
                                        <fieldset>
                                            <label><?= lang('app.certNo') ?></label>
                                            <?php if ($validation->getError('certificate_no')) : ?>
                                                <span class="badge badge-danger"> <?= $errors = $validation->getError('certificate_no') ?></span>
                                            <?php endif ?>
                                            <input type="text" name="certificate_no" class="form-control mb-1" placeholder="1234567890" value="<?= $cert['certificate_no'] ?>">
                                        </fieldset>
                                        <fieldset>
                                            <label><?= lang('app.status') ?></label>
                                            <select name="status" class="custom-select mb-1">
                                                <option <?= $cert['status'] == 0 ? 'selected' : '' ?> value="0"><?= lang('app.waiting') ?></option>
                                                <option <?= $cert['status'] == 1 ? 'selected' : '' ?> value="1"><?= lang('app.taken') ?></option>
                                            </select>
                                        </fieldset>
                                        <fieldset>
                                            <label><?= lang('app.aboutCert') ?></label>
                                            <input type="text" class="form-control mb-1" name="certificate" value="<?= $school['name'] ?>" readonly>
                                        </fieldset>
                                        <fieldset>
                                            <label><?= lang('app.tanbih') ?></label>
                                            <input type="text" class="form-control" name="info" value="<?= $cert['info'] ?>">
                                        </fieldset>
                                    </div>
                                    <input type="hidden" name="cert_id" value="<?= $cert['id'] ?>">
                                    <button type="submit" class="btn btn-lg btn-block btn-secondary mt-2"><?= lang('app.send') ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
    <div class="col-md-8">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row bg-primary bg-lighten-5 rounded mb-2 mx-25 text-center text-lg-left">
                        <div class="col-12 p-2"></div>
                    </div>
                    <div class="col-12">
                        <?= form_open('user/edit/' . $user['id']) ?>
                        <label for=""><?= lang('app.malaf') ?>:</label>
                        <input type="text" class="form-control" value="<?= $user['malaf'] ?>" readonly><br>
                        <label for=""><?= lang('app.name') ?>:</label>
                        <input type="text" class="form-control" name="name" value="<?= $user['name'] ?>"><br>
                        <label for=""><?= lang('app.lastname') ?>:</label>
                        <input type="text" class="form-control" name="lname" value="<?= $user['lname'] ?>"><br>
                        <label for=""><?= lang('app.arabicname') ?>:</label>
                        <input type="text" class="form-control" name="name_ar" value="<?= $user['name_ar'] ?>"><br>
                        <label for=""><?= lang('app.dob') ?>:</label>
                        <input type="date" class="form-control" name="dob" value="<?= $user['dob'] ?>"><br>
                        <label for=""><?= lang('app.city') ?>:</label>
                        <select name="city_id" class="custom-select mb-2">
                            <?php foreach ($city as $dt) : ?>
                                <option value="<?= $dt['id'] ?>" <?= $user['city_id'] == $dt['id'] ? 'selected' : '' ?>><?= $dt['name_ar'] ?> - <?= $dt['name'] ?></option>
                            <?php endforeach ?>
                        </select><br>
                        <label for=""><?= lang('app.phone') ?>:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="phone" value="<?= $user['phone'] ?>">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon1">255+</span>
                            </div>
                        </div><br>
                        <label for=""><?= lang('app.sex') ?>:</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="radio" name="sex" <?= $user['sex'] == 'M' ? 'checked' : '' ?> value="M"><?= lang('app.male') ?>
                            </div>
                            <div class="col-6">
                                <input type="radio" name="sex" <?= $user['sex'] == 'F' ? 'checked' : '' ?> value="F"><?= lang('app.female') ?>
                            </div>
                        </div><br>
                        <label for=""><?= lang('app.email') ?>:</label>
                        <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>"><br>
                        <button type="submit" class="btn btn-lg btn-block btn-secondary mt-2"><?= lang('app.edit') ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector("#img").setAttribute("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
    $('#delete').on('click', function(e) {
        e.preventDefault();
        url = $(this).attr('href');
        Swal.fire({
            title: '<?= lang('app.doYouReallyWantToDelete') ?>',
            text: '<?= lang('app.afterDeleteItsGone') ?>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '<?= lang('app.yes') ?>!',
            cancelButtonText: '<?= lang('app.no') ?>!',
        }).then(function(result) {
            if (result.value) {
                window.location.href = url;
            }
        })
    });
</script>
<?= $this->endSection() ?>