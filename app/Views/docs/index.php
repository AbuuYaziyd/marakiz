<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<section id="video-grid" class="card">
    <div class="card-header">
        <h3><b><?= $title ?></b></h3>
    </div>
    <div class="card-content collapse show">
        <div class="card-body">
            <div class="card-deck-wrapper">
                <div class="card-deck collapse show">
                    <div class="card border-grey border-lighten-2">
                        <div class="card-img-top embed-responsive embed-responsive-item embed-responsive-16by9">
                            <iframe class="gallery-thumbnail" src="https://www.youtube.com/embed/EXm0sbyYUmw"></iframe>
                        </div>
                        <div class="card-body px-0">
                            <h4><b>Head</b> - <small class="badge badge-glow badge-info badge-pill">Last updated 3 mins ago</small></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="content-body">
    <div class="card">
        <div class="card-header">
            <h4><b><?= $title ?> - <?= session('lang') != 'ar' ? session('markaz')['value'] : session('markaz')['value_ar'] ?></b></h4>
        </div>
        <div class="card-content collapse show" aria-expanded="true">
            <div class="card-body">
                <p class="card-text">Thank you for purchasing Modern admin template. If you have any queries that are beyond the scope of this help file, please feel free to create a support ticket on our support portal :<a href="https://pixinvent.ticksy.com/">https://pixinvent.ticksy.com/</a></p>
                <p><strong>Created:</strong> 08/03/2018 - V1.0</p>
                <p><strong>Updated:</strong> 27/12/2019 - V4.0</p>
                <p><strong>By:</strong> PIXINVENT Team</p>
                <p><strong>Support Portal:</strong> <a href="https://pixinvent.ticksy.com/">https://pixinvent.ticksy.com/</a></p>
                <p class="card-text">Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap admin template with unlimited possibilities. It includes 7 pre-built templates with organized folder structure, clean &amp; commented code, 1500+ pages, 1000+ components, 100+ charts, 50+ advance cards (widgets) and many more.</p>
                <p>Modern admin provides RTL support, searchable navigation, unique menu layouts, advance cards and incredible support. Modern admin can be used for any type of web applications: Project Management, eCommerce backends, CRM, Analytics, Fitness or any custom admin panels.</p>
                <p>It comes with 3 niche dashboards. Modern admin template is powered with HTML 5, SASS &amp; Twitter Bootstrap 4 which looks great on Desktops, Tablets, and Mobile Devices. Modern bootstrap admin template comes with starter kit which will help developers to get started quickly.</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>