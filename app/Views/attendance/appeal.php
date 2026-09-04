<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="card att-statistics">
            <div class="card-body">
                <h3>
                    <b><?= lang('app.addReason') ?></b> -
                    <?php if ($day['status'] == 2) : ?>
                        <span class="badge badge-pill badge-warning"><?= lang('app.ruksa') ?></span>
                    <?php else : ?>
                        <span class="badge badge-pill badge-danger"><?= lang('app.absent') ?></span>
                    <?php endif ?>
                </h3>
                <hr>
                <?php $validation = \Config\Services::validation() ?>
                <?= form_open_multipart('attendance/submit-appeal') ?>
                <div class="col-12">
                    <label for=""><?= lang('app.addReason') ?> <span class="danger">*</span></label>
                    <?php if ($validation->getError('reason')) : ?>
                        <span class="badge badge-danger"> <?= $errors = $validation->getError('reason') ?></span>
                    <?php endif ?>
                    <input type="text" class="form-control" name="reason"><br>
                    <label for=""><?= lang('app.addMalaf') ?> <span class="danger">*</span></label>
                    <?php if ($validation->getError('file')) : ?>
                        <span class="badge badge-danger"> <?= $errors = $validation->getError('file') ?></span>
                    <?php endif ?>
                    <input type="file" name="file" class="form-control">
                    <input type="hidden" name="id" value="<?= $day['id'] ?>">
                    <button type="submit" class="btn btn-lg btn-primary btn-block btn-lg my-2"><?= lang('app.submit') ?></button>
                </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <h6>
                            <b><?= lang('app.attendanceTime') ?></b> - 
                            <?php if (service('request')->getLocale() != 'ar') : ?>
                                <?= date('d-m-Y H:m', strtotime($day['created_at'])) ?>
                            <?php else : ?>
                                <?= date('H:m d-m-Y', strtotime($day['created_at'])) ?>
                            <?php endif ?>
                        </h6>
                    </div>
                    <div class="col-md-6 text-center">
                        <h6>
                            <b><?= lang('app.teacher') ?></b> -
                            <?php $teacher = $att->stu($day['teacher_id']) ?>
                            <?php if (session('lang') != 'ar') : ?>
                                <?= $teacher['name'] ?>
                                <?= $teacher['mname'] ?>
                                <?= $teacher['lname'] ?>
                            <?php else : ?>
                                <?= $teacher['name_ar'] ?>
                                <?= $teacher['mname_ar'] ?>
                                <?= $teacher['lname_ar'] ?>
                            <?php endif ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>