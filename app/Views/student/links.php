<div class="row">
    <div class="col-xs-6 col-md-3">
        <a href="<?= base_url('user/profile/' . $stu['id']) ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h6 class="text-muted"><?= lang('app.profile') ?></h6>
                                <h3><b><?= lang('app.profile') ?></b></h3>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-user teal font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <?php if ($class['link'] != null) : ?>
        <div class="col-xs-6 col-md-3">
            <a href="<?= $class['link'] ?>" target="_blank">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted"><?= lang('app.doroosLink') ?></h6>
                                    <h3><b><?= lang('app.doroosLink') ?></b></h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="la la-link info font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php endif ?>
    <div class="col-xs-6 col-md-3">
        <a href="<?= base_url('attendance/student/' . $stu['id']) ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h6 class="text-muted"><?= lang('app.attendances') ?></h6>
                                <h3><b><?= lang('app.attendances') ?></b></h3>
                            </div>
                            <div class="align-self-center">
                                <i class="ft-check-circle amber font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xs-6 col-md-3">
        <a href="<?= base_url('student/id/' . $stu['id']) ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h6 class="text-muted"><?= lang('app.id') ?></h6>
                                <h3><b><?= lang('app.id') ?></b></h3>
                            </div>
                            <div class="align-self-center">
                                <i class="ft-user primary font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- <div class="col-xs-6 col-md-3">
        <a href="<?= base_url('fee/student/' . $stu['id']) ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h6 class="text-muted"><?= lang('app.fees') ?></h6>
                                <h3><b><?= lang('app.fees') ?></b></h3>
                            </div>
                            <div class="align-self-center">
                                <i class="la la-credit-card danger font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div> -->
    <div class="col-xs-6 col-md-3">
        <a href="<?= base_url('result/student/' . $stu['id']) ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h6 class="text-muted"><?= lang('app.results') ?></h6>
                                <h3><b><?= lang('app.results') ?></b></h3>
                            </div>
                            <div class="align-self-center">
                                <i class="ft-bar-chart-2 purple font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <?php if ($rooms) : ?>
        <?php foreach ($rooms as $rm) :  ?>
            <div class="col-xs-6 col-md-3">
                <a href="<?= $rm['link'] ?>" target="_blank">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h6 class="text-muted"><?= lang('app.room') ?></h6>
                                        <h3><b><?= lang('app.room') ?> | <?= $rm['value'] ?></b></h3>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="ft-airplay pink font-large-2 float-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach ?>
    <?php endif ?>
    <div class="col-xl-3 col-md-6 col-12">
        <a href="<?= base_url('docs') ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h6 class="text-muted"><?= lang('app.' . session('role')) ?></h6>
                                <h3><b><?= lang('app.documentation') ?></b></h3>
                            </div>
                            <div class="align-self-center">
                                <i class="ft-play-circle pink font-large-3 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<hr>