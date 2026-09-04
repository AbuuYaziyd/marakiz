<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<div class="row">
    <?php if (session('role') != 'admin') : ?>
        <div class="col-md-6">
            <div class="card att-statistics">
                <div class="card-body">
                    <h3>
                        <b><?= lang('app.addReason') ?></b> -
                        <?php if ($day['status'] == 2) : ?>
                            <span class="badge badge-pill badge-warning"><?= lang('app.ruksa') ?></span>
                        <?php else : ?>
                            <span class="badge badge-pill badge-danger"><?= lang('app.absent') ?></span>
                        <?php endif ?>

                        <span class="badge badge-pill badge-success pull-right">
                            <?php if (session('lang') != 'ar') : ?>
                                <?= date('d-m-Y H:m', strtotime($day['created_at'])) ?>
                            <?php else : ?>
                                <?= date('H:m d-m-Y', strtotime($day['created_at'])) ?>
                            <?php endif ?>
                        </span>
                    </h3>
                    <hr>
                    <?php $validation = \Config\Services::validation() ?>
                    <?= form_open_multipart('attendance/appeal') ?>
                    <div class="col-12">
                        <label for=""><?= lang('app.addReason') ?> <span class="danger">*</span></label>
                        <?php if ($validation->getError('reason')) : ?>
                            <span class="badge badge-danger"> <?= $errors = $validation->getError('reason') ?></span>
                        <?php endif ?>
                        <input type="text" class="form-control" name="reason"><br>
                        <label for="picha"><?= lang('app.addMalaf') ?> <span class="danger">*</span></label>
                        <?php if ($validation->getError('file')) : ?>
                            <span class="badge badge-danger"> <?= $errors = $validation->getError('file') ?></span>
                        <?php endif ?>
                        <input type="file" name="file" class="form-control" accept=".jpg, .jpeg, .png" onchange="readURL(this)">
                        <input type="hidden" name="id" value="<?= $day['id'] ?>">
                        <button type="submit" class="btn btn-lg btn-primary btn-block btn-lg my-2"><?= lang('app.submit') ?></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 box-shadow-0">
                <div class="card-content">
                    <img class="card-img img-fluid" id="img" src="<?= file_exists($day['file']) ? base_url($day['file']) : base_url('app-assets/images/no-image.jpg') ?>" alt="img">
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="col-md-6">
            <div class="card border-0 box-shadow-0">
                <div class="card-header">
                    <h3>
                        <b><?= lang('app.reason') ?></b> - <span class="btn btn-warning round"><?= $day['reason'] ?></span>

                        <span class="badge badge-pill badge-success pull-right">
                            <?php if (session('lang') != 'ar') : ?>
                                <?= date('d-m-Y H:m', strtotime($day['created_at'])) ?>
                            <?php else : ?>
                                <?= date('H:m d-m-Y', strtotime($day['created_at'])) ?>
                            <?php endif ?>
                        </span>
                    </h3>
                </div>
                <div class="card-content">
                    <img class="card-img img-fluid" id="img" src="<?= file_exists($day['file']) ? base_url($day['file']) : base_url('app-assets/images/no-image.jpg') ?>" alt="img">
                </div>
                <div class="card-footer">
                    <div class="row">
                        <?php if ($day['file'] != NULL) : ?>
                            <div class="col-md-6">
                                <a href="<?= base_url('attendance/delete/' . $day['id']) ?>" class="btn btn-danger btn-lg btn-block mb-1"><?= lang('app.delete') ?></a>
                            </div>
                        <?php else : ?>
                            <div class="col-md-6">
                                <span class="btn btn-outline-danger btn-lg btn-block mb-1"><?= lang('app.delete') ?></span>
                            </div>
                        <?php endif ?>
                        <div class="col-md-6">
                            <a href="<?= base_url('attendance/dismiss/' . $day['id']) ?>" class="btn btn-warning btn-lg btn-block mb-1"><?= lang('app.dismiss') ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
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
<?= $this->endSection() ?>