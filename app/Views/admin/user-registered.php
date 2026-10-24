<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<?php
$date = new DateTime($user['dob']);
$now = new DateTime();
$age = $now->diff($date);
?>
<div class="content-body">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <b><?= lang('app.userInfo') ?></b>
                        <span class="pull-right"><b><?= date('d-m-Y', strtotime($user['updated_at'])) ?></b></span>
                    </h4>
                </div>
                <div class="card-content mt-1">
                    <div class="table-responsive">
                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                            <tbody>
                                <tr>
                                    <td><?= lang('app.fullName_ar') ?></td>
                                    <td><b><?= $user['name_ar'] ?> <?= $user['mname_ar'] ?> <?= $user['lname_ar'] ?></b></td>
                                </tr>
                                <tr>
                                    <td><?= lang('app.fullName') ?></td>
                                    <td><b><?= $user['name'] ?> <?= $user['mname'] ?> <?= $user['lname'] ?></b></td>
                                </tr>
                                <tr>
                                    <td><?= lang('app.dob') ?></td>
                                    <td><b><?= $user['dob'] ?> - (<?= $hjr->strToHijri(strtotime($user['dob']), "d F Y", session('lang')) ?>)</b></td>
                                </tr>
                                <tr>
                                    <td><?= lang('app.course') ?></td>
                                    <td>
                                        <span class="btn btn-sm btn-info round">
                                            <?php if (session('lang') != 'ar') : ?>
                                                <?= $school['name'] ?> - <?= $course['name'] ?>
                                            <?php else : ?>
                                                <?= $school['name_ar'] ?> - <?= $course['name_ar'] ?>
                                            <?php endif ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= lang('app.sex') ?></td>
                                    <td><b><?= lang('app.' . $user['sex']) ?> - (<?= $age->y ?>)</b></td>
                                </tr>
                                <tr>
                                    <td><?= lang('app.nationality') ?></td>
                                    <td><b><i class="flag-icon flag-icon-<?= strtolower($user['nationality']) ?>"></i></b></td>
                                </tr>
                                <tr>
                                    <td><?= lang('app.city') ?></td>
                                    <td>
                                        <span class="btn btn-sm btn-pink round">
                                            <?php if (session('lang') != 'ar') : ?>
                                                <?= $city['name'] ?>
                                            <?php else : ?>
                                                <?= $city['name_ar'] ?>
                                            <?php endif ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= lang('app.address') ?></td>
                                    <td><b><?= $user['address'] ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-footer">
                    <div class="btn-group btn-block text-center mr-3">
                        <a href="tel:<?= $user['phone'] ?>" class="btn btn-lg btn-primary" target="_blank"><i class="ft-phone"></i></a>
                        <a href="https://wa.me/<?= $user['phone'] ?>" class="btn btn-lg btn-success" target="_blank"><i class="la la-whatsapp"></i></a>
                        <a href="mailto:<?= $user['email'] ?>" class="btn btn-lg btn-purple" target="_blank"><i class="icon-envelope"></i></a>
                        <a href="sms:<?= $user['phone'] ?>" class="btn btn-lg btn-info" target="_blank"><i class="la la-comments"></i></a>
                    </div>
                </div>
                <hr>
                <div class="card-content">
                    <div class="card-body">
                        <span class="btn btn-block btn-lg btn-primary" id="admit"><?= lang('app.admitStudent') ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= form_open('admin/admit', ['id' => 'admitForm']) ?>
<input type="hidden" name="id" value="<?= $user['id'] ?>">
</form>


<script>
    $('#admit').on('click', function(e) {
        e.preventDefault();
        url = $(this).attr('href');
        Swal.fire({
            title: '<?= lang('app.sure') ?>',
            text: '<?= lang('app.admitStudent') ?>',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '<?= lang('app.yes') ?>',
            cancelButtonText: '<?= lang('app.no') ?>',
        }).then(function(result) {
            if (result.value) {
                document.getElementById('admitForm').submit();
            }
        })
    });
    $('.delete').on('click', function(e) {
        e.preventDefault();
        url = $(this).attr('href');
        Swal.fire({
            title: '<?= lang('app.sure') ?>',
            text: '<?= lang('app.afterDeleteItsGone') ?>',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '<?= lang('app.yes') ?>',
            cancelButtonText: '<?= lang('app.no') ?>',
        }).then(function(result) {
            if (result.value) {
                window.location.href = url;
            }
        })
    });
</script>
<?= $this->endSection() ?>