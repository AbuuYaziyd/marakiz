<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<?= $this->include('khirrij/info') ?>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <a href="<?= base_url('user/profile/' . $stu['id']) ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h2 class="teal"><b><?= $stu['username'] ?></b></h2>
                                <h6><?= lang('app.profile') ?></h6>
                            </div>
                            <div>
                                <i class="icon-user teal font-large-3 float-righ"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6">
        <a href="<?= base_url('attendance/student/' . $stu['id']) ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info"><b><?= lang('app.attendance') ?></b></h3>
                                <h6></h6>
                            </div>
                            <div>
                                <i class="icon-calendar info font-large-3 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6">
        <a href="<?= base_url('result/student/' . $stu['id']) ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="danger"><b><?= lang('app.results') ?></b></h3>
                            </div>
                            <div>
                                <i class="icon-bulb danger font-large-3 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6">
        <a href="<?= base_url('certificate/show/' . $stu['id']) ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="teal"><b><?= lang('app.certificate') ?></b></h3>
                            </div>
                            <div>
                                <i class="la la-certificate teal font-large-3 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<script>
    $('.sure').on('click', function(e) {
        e.preventDefault();
        url = $(this).attr('href');
        Swal.fire({
            text: '<?= lang('app.surePass') ?> <?= $stu['name_ar'] ?? $stu['name'] . ' ' . $stu['lname'] ?>',
            title: '<?= lang('app.passchange') ?>',
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