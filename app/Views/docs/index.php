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
                <a href="https://youtu.be/dP-PPdkRoJ4" class="btn btn-primary mb-1" target="_blank">Kuingia, Kutoka na Kubadili Lugha</a>
                <a href="https://youtu.be/vyjjoOqIwvY" class="btn btn-primary mb-1" target="_blank">Ukurasa wa mwanzo</a>
                <a href="https://youtube.com/shorts/mxd_pl9V__w" class="btn btn-primary mb-1" target="_blank">Umesahau Password</a>
                <span class="btn btn-outline-primary mb-1">...</span>
            </div>
            <?php if (session('isLoggedIn')) : ?>
                <div class="card-body">
                    <p><b>Ukurasa wa Mwanafunzi</b> <span class="badge badge-danger">3</span></p>
                    <a href="https://youtube.com/shorts/Rt6mEs4weXs" class="btn btn-warning mb-1" target="_blank">Mwanzo</a>
                    <a href="https://youtu.be/BdVLrxR886w" class="btn btn-warning mb-1" target="_blank">Kuhariri Data na Maelezo ya Mtumiaji</a>
                    <a href="https://youtu.be/wEpAlGHEhDg" class="btn btn-warning mb-1" target="_blank">Mahudhurio na Bitwaka</a>
                    <a href="https://youtu.be/EAZ_DXmAcI0" class="btn btn-warning mb-1" target="_blank">Matokeo</a>
                    <a href="https://youtu.be/kP8NbmassHs" class="btn btn-warning mb-1" target="_blank">Mengineyo</a>
                    <span class="btn btn-outline-warning mb-1">...</span>
                </div>
            <?php endif ?>
            <?php if (session('role') == 'teacher' || session('role') == 'admin') : ?>
                <div class="card-body">
                    <p><b>Ukurasa wa Mwanafunzi</b> <span class="badge badge-danger">3</span></p>
                    <a href="https://youtube.com/shorts/Rt6mEs4weXs" class="btn btn-teal mb-1" target="_blank">Mwanzo</a>
                    <a href="https://youtu.be/BdVLrxR886w" class="btn btn-teal mb-1" target="_blank">Kuhariri Data na Maelezo ya Mtumiaji</a>
                    <a href="https://youtu.be/wEpAlGHEhDg" class="btn btn-teal mb-1" target="_blank">Mahudhurio na Bitwaka</a>
                    <a href="https://youtu.be/EAZ_DXmAcI0" class="btn btn-teal mb-1" target="_blank">Matokeo</a>
                    <a href="https://youtu.be/kP8NbmassHs" class="btn btn-teal mb-1" target="_blank">Mengineyo</a>
                    <span class="btn btn-outline-teal mb-1">...</span>
                </div>
            <?php endif ?>
            <?php if (session('role') == 'admin') : ?>
                <div class="card-body">
                    <p><b>Ukurasa wa Mwanafunzi</b> <span class="badge badge-danger">3</span></p>
                    <a href="https://youtube.com/shorts/Rt6mEs4weXs" class="btn btn-danger mb-1" target="_blank">Mwanzo</a>
                    <a href="https://youtu.be/BdVLrxR886w" class="btn btn-danger mb-1" target="_blank">Kuhariri Data na Maelezo ya Mtumiaji</a>
                    <a href="https://youtu.be/wEpAlGHEhDg" class="btn btn-danger mb-1" target="_blank">Mahudhurio na Bitwaka</a>
                    <a href="https://youtu.be/EAZ_DXmAcI0" class="btn btn-danger mb-1" target="_blank">Matokeo</a>
                    <a href="https://youtu.be/kP8NbmassHs" class="btn btn-danger mb-1" target="_blank">Mengineyo</a>
                    <span class="btn btn-outline-danger mb-1">...</span>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>