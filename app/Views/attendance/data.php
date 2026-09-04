<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3><b><?= lang('app.absentsAndRuksa') ?></b></h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped custom-table table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th><?= lang('app.fullname') ?></th>
                                <?php for ($j = 1; $j <= date('t'); $j++) : ?>
                                    <th><?= $j ?></th>
                                <?php endfor ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $key => $st) : ?>
                                <tr>
                                    <td>
                                        <a href="<?= base_url('student/page/' . $st['id']) ?>" class="btn btn-sm round btn-outline-black">
                                            <?= $st['username'] ?>
                                        </a>
                                        <?php if (session('lang') != 'ar') : ?>
                                            <?= $st['name'] ?>
                                            <?= $st['mname'] ?>
                                            <?= $st['lname'] ?>
                                        <?php else : ?>
                                            <?= $st['name_ar'] ?>
                                            <?= $st['mname_ar'] ?>
                                            <?= $st['lname_ar'] ?>
                                        <?php endif ?>
                                    </td>
                                    <?php for ($i = 1; $i <= date('t'); $i++) : ?>
                                        <?php $attend = $att->status((date('Y-m-d', strtotime('-' . ($i - date('d')) . ' day'))), $st['id'], $st['level']) ?>
                                        <td>
                                            <?php if (date('D', strtotime($i . '-' . $month . '-' . date('Y'))) == $weekend['value'] || date('D', strtotime($i . '-' . $month . '-' . date('Y'))) == $weekend['value_ar']) : ?>
                                                <span class="weekend"><i class="ft-info purple font-large-1"></i></span>
                                            <?php elseif ($i > date('d')) : ?>
                                                <i class="ft-sun danger spinner font-large-1"></i>
                                            <?php else : ?>
                                                <?php if ($attend) : ?>
                                                    <?php if ($attend['status'] == 0) : ?>
                                                        <a href="<?= base_url('attendance/appeal/' . $attend['id']) ?>" class="absent"><i class="ft-x-square danger font-large-1"></i></a>
                                                    <?php elseif ($attend['status'] == 2) : ?>
                                                        <a href="<?= base_url('attendance/appeal/' . $attend['id']) ?>" class="ruksa"><i class="ft-external-link warning font-large-1"></i></a>
                                                    <?php endif ?>
                                                <?php elseif ($i < date('d')) : ?>
                                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info<?= $i ?>"><i class="ft-check-square success font-large-1"></i></a>
                                                <?php else : ?>
                                                    <i class="ft-check-square success font-large-1"></i>
                                                <?php endif ?>
                                            <?php endif ?>
                                        </td>
                                    <?php endfor ?>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.weekend').on('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: "<?= lang('app.weekend') ?>",
            icon: "info",
            showConfirmButton: false,
            timer: 3000,
        });
    });
</script>
<script>
    $('.ruksa').on('click', function(e) {
        e.preventDefault();
        url = $(this).attr('href');
        Swal.fire({
            title: '<?= lang('app.ruksa') ?>',
            icon: 'info',
            showCancelButton: false,
            confirmButtonText: '<?= lang('app.edit') ?>',
        }).then(function(result) {
            if (result.value) {
                window.location.href = url;
            }
        })
    });
</script>
<script>
    $('.absent').on('click', function(e) {
        e.preventDefault();
        url = $(this).attr('href');
        Swal.fire({
            title: '<?= lang('app.absent') ?>',
            icon: 'info',
            showCancelButton: false,
            confirmButtonColor: '#d33',
            confirmButtonText: '<?= lang('app.edit') ?>',
        }).then(function(result) {
            if (result.value) {
                window.location.href = url;
            }
        })
    });
</script>
<?= $this->endSection() ?>
<?= $this->include('layouts/table') ?>