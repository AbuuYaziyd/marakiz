<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>
<div class="content-body">
    <section class="row flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-0">
                        <div class="card-title text-center">
                            <div>
                                <a href="<?= base_url() ?>"><img src="<?= base_url('app-assets/images/logo/logo.png') ?>" alt="logo" height="250px"></a>
                            </div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span> <i class="la la-certificate"></i> <?= lang('app.certVerification') ?> <i class="la la-certificate"></i> </span>
                        </h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <?php $validation = \Config\Services::validation() ?>
                            <?= form_open('certificate/verification') ?>
                            <label class="text-bold-600"><?= lang('app.certNo') ?></label>
                            <?php if ($validation->getError('certificate_no')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('certificate_no') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control" name="certificate_no" placeholder="<?= lang('app.certNo') ?>">
                                <div class="form-control-position">
                                    <i class="la la-certificate"></i>
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-danger btn-lg btn-block"><i class="ft-search"></i> <?= lang('app.search') ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br><br>
</div>
<?= $this->endSection() ?>