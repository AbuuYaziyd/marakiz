<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="content-body">
    <div class="row">
        <div id="recent-sales" class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        <b><?= $title ?></b>
                        <a href="<?= base_url('regqr') ?>" class="btn btn-outline-pink round pull-right"><?= lang('app.regQR') ?></a>
                    </h3>
                </div>
                <div class="card-content mt-1 m-2">
                    <div class="table-responsive">
                        <table class="table table-hover dtTable">
                            <thead>
                                <tr>
                                    <th><?= lang('app.fullName_ar') ?></th>
                                    <th><?= lang('app.fullName') ?></th>
                                    <th><?= lang('app.contacts') ?></th>
                                    <th><?= lang('app.class') ?></th>
                                    <th><?= lang('app.show') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $key => $dt) : ?>
                                    <?php $course = $crs->find($dt['level']) ?>
                                    <?php $school = $crs->school($course['school_id']) ?>
                                    <?php $name = strtoupper($dt['name']) . ' ' . strtoupper($dt['mname']) . ' ' . strtoupper($dt['lname']) ?>
                                    <?php $name_ar = strtoupper($dt['name_ar']) . ' ' . strtoupper($dt['mname_ar']) . ' ' . strtoupper($dt['lname_ar']) ?>
                                    <tr>
                                        <td><?= $name_ar ?></td>
                                        <td><?= $name ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="tel:<?= $dt['phone'] ?>" class="btn btn-sm btn-primary" target="_blank"><i class="icon-screen-smartphone"></i></a>
                                                <a href="https://wa.me/<?= $dt['phone'] ?>" class="btn btn-sm btn-success" target="_blank"><i class="la la-whatsapp"></i></a>
                                                <a href="mailto:<?= $dt['email'] ?>" class="btn btn-sm btn-purple" target="_blank"><i class="icon-envelope"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="btn btn-sm btn-info round">
                                                <?php if (session('lang') != 'ar') : ?>
                                                    <?= $school['name'] ?> - <?= $course['name'] ?>
                                                <?php else : ?>
                                                    <?= $school['name_ar'] ?> - <?= $course['name_ar'] ?>
                                                <?php endif ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/show-registered/' . $dt['id']) ?>" class="btn btn-sm btn-outline-warning round"><?= lang('app.show') ?></a>
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
</div>
<?= $this->endSection() ?>
<?= $this->include('layouts/table') ?>