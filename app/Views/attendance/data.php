<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3><b><?= lang('app.absentsAndRuksa') ?></b></h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped custom-table table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th>6</th>
                                <th>7</th>
                                <th>8</th>
                                <th>9</th>
                                <th>10</th>
                                <th>11</th>
                                <th>12</th>
                                <th>13</th>
                                <th>14</th>
                                <th>15</th>
                                <th>16</th>
                                <th>17</th>
                                <th>18</th>
                                <th>19</th>
                                <th>20</th>
                                <th>22</th>
                                <th>23</th>
                                <th>24</th>
                                <th>25</th>
                                <th>26</th>
                                <th>27</th>
                                <th>28</th>
                                <th>29</th>
                                <th>30</th>
                                <th>31</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $key => $st) : ?>
                                <tr>
                                    <td>
                                        <a href="#" class="btn btn-sm round btn-outline-black">
                                            <?= $st['username'] ?>
                                        </a>
                                        <?php if (session('lang') != 'ar') : ?>
                                            <?= $st['name'] ?>
                                            <?= $st['mname'] ?>
                                            <?= $st['lname'] ?>
                                        <?php else : ?>
                                            <?= $st['name_ar'] ?>
                                            <?= $st['mname_ar'] ?>
                                            <?= $st['lname_ar'] ?>
                                        <?php endif ?>
                                    </td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-x-square danger font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-alert-circle dark font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-alert-triangle dark font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-external-link warning font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="ft-check-square success font-large-1"></i></a></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->include('layouts/table') ?>