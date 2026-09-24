<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="content-body">
    <div class="card">
        <div class="card-header">
            <h3><b><?= $title ?></b></h3>
        </div>
        <div class="card-content collapse show" aria-expanded="true">
            <div class="card-body">
                <p><b>Jumla Jamala</b> <span class="badge badge-danger">3</span></p>
                <a href="https://youtu.be/dP-PPdkRoJ4" class="btn btn-primary mb-1" target="_blank">001. Kuingia, Kutoka na Kubadili Lugha</a>
                <a href="https://youtu.be/vyjjoOqIwvY" class="btn btn-primary mb-1" target="_blank">002. Ukurasa wa mwanzo</a>
                <a href="https://youtube.com/shorts/mxd_pl9V__w" class="btn btn-primary mb-1" target="_blank">003. Kama umesahau Password</a>
                <span class="btn btn-outline-primary mb-1">...</span>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>