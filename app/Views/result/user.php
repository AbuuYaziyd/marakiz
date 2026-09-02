<?php
if (session('lang') != 'ar') {
    $name = $user['name'] . ' ' . $user['mname'] . ' ' . $user['lname'];
} else {
    $name = $user['name_ar'] . ' ' . $user['mname_ar'] . ' ' . $user['lname_ar'];
}
?>
<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-pills nav-fill nav-topline justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" id="base-fasl" data-toggle="tab" aria-controls="fasl" href="#fasl" aria-expanded="false"><?= lang('app.acYear') ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="base-fasl1" data-toggle="tab" aria-controls="fasl1" href="#fasl1" aria-expanded="true"><?= lang('app.fasli1') ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-fasl2" data-toggle="tab" aria-controls="fasl2" href="#fasl2" aria-expanded="false"><?= lang('app.fasli2') ?></a>
                </li>
            </ul>
            <div class="tab-content pt-1 border-grey border-lighten-2 border-0-top">
                <?= $this->include('result/course') ?>
                <?= $this->include('result/final') ?>
                <?= $this->include('result/full') ?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->include('layouts/table') ?>