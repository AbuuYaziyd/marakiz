<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<div class="row">
    <?php foreach ($school as $key => $dt) : ?>
        <div class="col-md-<?= count($school) == 3 ? 4 : 6 ?>">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4><b><?= lang('app.attendances') ?> | <?= session('lang') != 'ar' ? $dt['name'] : $dt['name_ar'] ?></b></h4>
                    </div>
                    <?php foreach ($c->courses($dt['id']) as $cr) : ?>
                        <?php if (session('lang') != 'ar') : ?>
                            <?php $class = $cr['name'] ?>
                        <?php else : ?>
                            <?php $class = $cr['name_ar'] ?>
                        <?php endif ?>
                        <li class="list-group-item">
                            <span class="btn btn-sm round btn-danger float-right" id="att<?= $cr['id'] ?>"><?= lang('app.attendance') ?></span>
                            <?= $class ?>
                        </li>
                        <script>
                            $('#att<?= $cr['id'] ?>').on('click', function(e) {
                                e.preventDefault();
                                urlM = '<?= base_url('attendance/course/M/' . $cr['id']) ?>';
                                urlF = '<?= base_url('attendance/course/F/' . $cr['id']) ?>';
                                Swal.fire({
                                    title: '<?= lang('app.attendances') ?>',
                                    // text: '<?= lang('app.afterDeleteItsGone') ?>',
                                    icon: 'question',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: '<?= lang('app.males') ?>',
                                    cancelButtonText: '<?= lang('app.females') ?>',
                                }).then(function(result) {
                                    if (result.value) {
                                        window.location.href = urlM;
                                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                                        window.location.href = urlF;
                                    }
                                })
                            });
                        </script>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?php if (session('role') == 'admin') :  ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3><b><?= lang('app.absentsAndRuksa') ?></b></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered dtTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?= lang('app.student') ?></th>
                                    <th><?= lang('app.status') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($attendance as $key => $dt) : ?>
                                    <?php $stu = $att->stu($dt['student_id']) ?>
                                    <?php $attendance = $att->attendance($dt['student_id']) ?>
                                    <tr>
                                        <td>

                                            <a href="<?= base_url('attendance/appeal/' . $dt['id']) ?>" class="btn btn-sm btn-small btn-outline-<?= $stu['sex'] != 'M' ? 'pink' : 'info' ?> round"><?= $stu['username'] ?></a>
                                        </td>
                                        <td>
                                            <?php if (session('lang') != 'ar') : ?>
                                                <?= $stu['name'] ?> <?= $stu['mname'] ?> <?= $stu['lname'] ?>
                                            <?php else : ?>
                                                <?= $stu['name_ar'] ?> <?= $stu['mname_ar'] ?> <?= $stu['lname_ar'] ?>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <span class="btn btn-sm btn-warning round"><?= lang('app.ruksa') ?> - <?= count($attendance['ruksa']) ?></span>
                                                <span class="btn btn-sm btn-danger round"><?= lang('app.absent') ?> - <?= count($attendance['absent']) ?></span>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif  ?>
<?= $this->endSection() ?>
<?= $this->include('layouts/table') ?>