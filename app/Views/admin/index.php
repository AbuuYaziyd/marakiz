<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<?= $this->include('admin/info') ?>
<?= $this->include('admin/links') ?>

<!-- <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Emails</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body pt-0">
                    <p>Open rate <span class="float-right text-bold-600">89%</span></p>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-1">
                        <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="pt-1">Sent <span class="float-right"><span class="text-bold-600">310</span>/500</span>
                    </p>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-1">
                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Top Products</h4>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a href="#">Show all</a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row" class="border-top-0">iPhone X</th>
                                    <td class="border-top-0 text-right">2245</td>
                                </tr>
                                <tr>
                                    <th scope="row">One Plus</th>
                                    <td class="text-right">1850</td>
                                </tr>
                                <tr>
                                    <th scope="row">Samsung S7</th>
                                    <td class="text-right">1550</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Average Deal Size</h4>
            </div>
            <div class="card-content collapse show">
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-md-6 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                            <h6 class="danger text-bold-600">-30%</h6>
                            <h4 class="font-large-2 text-bold-400">$12,536</h4>
                            <p class="blue-grey lighten-2 mb-0">Per rep</p>
                        </div>
                        <div class="col-md-6 col-12 text-center">
                            <h6 class="success text-bold-600">12%</h6>
                            <h4 class="font-large-2 text-bold-400">$18,548</h4>
                            <p class="blue-grey lighten-2 mb-0">Per team</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<?= $this->endSection() ?>