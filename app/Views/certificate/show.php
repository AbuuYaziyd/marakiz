<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>
<div class="content-body">
    <section class="row flexbox-container">

        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-lg-6 col-md-8 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-0">
                        <div class="card-title text-center">
                            <div>
                                <img src="<?= $stu['avatar'] != null ? base_url($stu['avatar']) : 'https://ui-avatars.com/api/?name=' . ($stu['name_ar'] ?? $stu['lname'])  . '&background=random&length=1&font-size=1' ?>" alt="avatar" height="250px">
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <table class="table">
                                <thead class="text-center border-bottom-teal">
                                    <tr>
                                        <th colspan="2">
                                            <h4><b class="<?= ($cert['status'] != 1 ? 'danger' : 'success') ?>"><?= lang('app.certifiedCertificate') ?></b></h4>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td><?= lang('app.certNo') ?>:</td>
                                        <td class="users-view-name"><b><?= ($cert['certificate_no'] ?? lang('app.notFound')) ?></b></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.arabicname') ?>:</td>
                                        <td class="users-view-name"><b><?= $stu['name_ar'] ?> <?= $stu['mname_ar'] ?> <?= $stu['lname_ar'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.name') ?>:</td>
                                        <td class="users-view-name"><b><?= $stu['name'] ?> <?= $stu['mname'] ?> <?= $stu['lname'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.username') ?>:</td>
                                        <td class="users-view-name"><b><?= $stu['username'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.email') ?>:</td>
                                        <td><a href="mailto:<?= $stu['email'] ?>" class="btn btn-outline-blue btn-sm round"><b><?= $stu['email'] ?></b></a></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.phone') ?>:</td>
                                        <td><a href="tel:+255<?= $stu['phone'] ?>" class="btn btn-outline-primary btn-sm round"><b><?= '0' . $stu['phone'] ?></b></a></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.aboutCert') ?>:</td>
                                        <td><b><?= $cert['info'] ?? lang('app.notFound') ?></b></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.status') ?>:</td>
                                        <td><b><?= $cert['status'] == 0 ? lang('app.notFound') : '' ?></b></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.level') ?>:</td>
                                        <td><b><?= lang('app.graduate') ?></b></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.dob') ?>:</td>
                                        <td><b><?= $stu['dob'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.sex') ?>:</td>
                                        <td><b><?= $stu['sex'] == 'M' ? lang('app.male') : lang('app.female') ?></b></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.nationality') ?>:</td>
                                        <td><b><?= lang('app.Tanzania') ?></b></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.city') ?>:</td>
                                        <td><b><?= $usr->city($stu['city_id'])['name_ar'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <?php if (session('role') != 'admin') : ?>
                                            <td><?= lang('app.subCount') ?>:</td>
                                            <td><b><?= 4 ?></b></td>
                                        <?php endif ?>
                                    </tr>
                                    <tr>
                                        <?php if (session('fn') == 'student') : ?>
                                            <td><?= lang('app.shift') ?>:</td>
                                            <td><b><?= $shift['name'] ?></b></td>
                                        <?php endif ?>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="<?= base_url('certificate/edit/' . $stu['id']) ?>" class="btn btn-lg btn-block btn-primary mt-2"><?= lang('app.edit') ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br><br>
</div>
<script>
    <?php if ($toast != null) : ?>
        $(document).ready(function() {
            Swal.fire({
                title: "<?= $toast ?>",
                text: "<?= $text ?>",
                icon: "<?= $icon ?>",
                showConfirmButton: true,
                confirmButtonText: '<?= lang('app.ok') ?>',
            });
        });
    <?php endif ?>
</script>
<?= $this->endSection() ?>