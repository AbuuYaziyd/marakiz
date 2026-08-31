<?php $muadala = 0;
$masomo = 0;
$alama = 0; ?>
<!DOCTYPE html>
<html class="loading" lang="<?= session('lang') ?>" data-textdirection="<?= session('lang') != 'ar' ? 'ltr' : 'rtl' ?>">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="<?= session('lang') != 'ar' ? $markaz['value'] : $markaz['value_ar'] ?> | <?= session('lang') != 'ar' ? $location['value'] : $location['value_ar'] ?>">
    <meta name="keywords" content="<?= session('lang') != 'ar' ? $markaz['value'] : $markaz['value_ar'] ?> | <?= session('lang') != 'ar' ? $location['value'] : $location['value_ar'] ?>">
    <meta name="author" content="Abou Yaziyd">
    <link rel="manifest" href="<?= base_url('manifest') ?>" />
    <meta name="theme-color" content="<?= $colour['value'] ?>">
    <title><?= $title ?> | <?= session('lang') != 'ar' ? $markaz['value'] : $markaz['value_ar'] ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" href="<?= base_url($logo['link']) ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url($logo['link']) ?>">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            padding: 5px;
            color: #333;
            line-height: 1.6;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            border-bottom: 3px solid <?= $colour['value'] ?>;
            /* Dark Green Border */
            padding-bottom: 10px;
        }

        .institution-details {
            text-align: right;
        }

        .logo-box {
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: <?= $colour['value'] ?>;
        }

        .student-info {
            margin-bottom: 5px;
            background-color: <?= $colour['link'] ?>;
            /* Light Green Tint */
            padding: 15px;
            border-right: 5px solid <?= $colour['value'] ?>;
            border-left: 5px solid <?= $colour['value'] ?>;
            border-radius: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 2px;
            text-align: center;
        }

        /* Dark Green Header Styling */
        th {
            background-color: <?= $colour['value'] ?>;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .fail {
            background-color: #ffebee;
            color: #c62828;
            font-weight: bold;
        }

        .summary-section {
            margin-top: 30px;
        }

        .footer {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
            text-align: center;
        }

        .signature-line {
            margin-top: 10px;
            border-top: 1px solid #333;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <?php foreach ($gpas as $gpkey => $gp) : ?>
        <?php $student = $gpa->user($gp['student_id']) ?>
        <?php $class = $gpa->class($gp['course_id']) ?>
        <?php $results = $gpa->results($student['id'], $gp['course_id']) ?>
        <div id="printArea" style="direction: <?= service('request')->getLocale() != 'ar' ? 'ltr' : 'rtl' ?>; width: 100%;">
            <div class="header-container">
                <div class="institution-details">
                    <h4 style="color: <?= $colour['value'] ?>;"><?= $markaz['value_ar'] ?><br>
                        <span><?= $postabox['value_ar'] ?></span>
                        <span><?= $location['value_ar'] ?></span>
                    </h4>
                </div>
                <div class="logo-box">
                    <img alt="logo" src="<?= base_url($logo['link']) ?>" height="90px">
                </div>
                <div class="contact-info" dir="ltr">
                    <h4 style="color: <?= $colour['value'] ?>;"><?= $markaz['value'] ?><br>
                        <span><?= $postabox['value'] ?></span>
                        <span><?= $location['value'] ?></span>
                    </h4>
                </div>
            </div>
            <div class="student-info" style="text-align: center;">
                <strong>
                    <?php if (session('lang') != 'ar') : ?>
                        <?= $student['name'] ?> <?= $student['mname'] ?> <?= $student['lname'] ?>
                    <?php else : ?>
                        <?= $student['name_ar'] ?> <?= $student['mname_ar'] ?> <?= $student['lname_ar'] ?>
                    <?php endif ?> |
                    <span style="color: <?= $colour['value'] ?>; text-align: right">
                        <?= lang('app.academicProgress') ?>:
                        <?php if (session('lang') != 'ar') : ?>
                            <?= $class['name'] ?>
                        <?php else : ?>
                            <?= $class['name_ar'] ?>
                        <?php endif ?>
                    </span>
                </strong>
            </div>

            <table>
                <thead>
                    <tr>
                        <?php if (session('lang') != 'ar') : ?>
                            <th><?= lang('app.taqdir') ?></th>
                            <th><?= lang('app.grade') ?></th>
                            <th><?= lang('app.result') ?></th>
                            <th><?= lang('app.subject') ?></th>
                        <?php else : ?>
                            <th><?= lang('app.subject') ?></th>
                            <th><?= lang('app.result') ?></th>
                            <th><?= lang('app.grade') ?></th>
                            <th><?= lang('app.taqdir') ?></th>
                        <?php endif ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $key => $rs) : ?>
                        <?php $mark = $rs['course'] + $rs['final'] ?>
                        <?php $grade = $gpa->grade($mark) ?>
                        <tr>
                            <?php if (session('lang') != 'ar') : ?>
                                <td><?= $grade['name'] ?></td>
                                <td><?= $grade['ramz'] ?></td>
                                <td><?= $mark ?></td>
                                <td><?= $gpa->subject($rs['subject_id'])['name'] ?></td>
                            <?php else : ?>
                                <td><?= $gpa->subject($rs['subject_id'])['name_ar'] ?></td>
                                <td><?= $mark ?></td>
                                <td><?= $grade['ramz_ar'] ?></td>
                                <td><?= $grade['name_ar'] ?></td>
                            <?php endif ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <div class="summary-section">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th><?= lang('app.subjects') ?></th>
                            <th><?= lang('app.allMarks') ?></th>
                            <th><?= lang('app.hisposition') ?></th>
                            <th><?= lang('app.studentCount') ?></th>
                            <th><?= lang('app.muadala') ?></th>
                            <th><?= lang('app.taqdir') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background: 	#E5E4E2;">فصلي</td>
                            <td><?= $gp['subjects'] ?></td>
                            <td><?= round($gp['marks']) ?></td>
                            <td><?= $gp['position'] ?></td>
                            <td><?= $gp['number_of_students'] ?></td>
                            <td><?= round($gp['gpa']) ?></td>
                            <?php if (session('lang') != 'ar') : ?>
                                <td><?= $gpa->grade(round($gp['gpa']))['name'] ?></td>
                            <?php else : ?>
                                <td><?= $gpa->grade(round($gp['gpa']))['name_ar'] ?></td>
                            <?php endif ?>
                        </tr>
                        <?php
                        $masomo = $masomo + $gp['subjects'];
                        $alama = $alama + round($gp['marks']);
                        $muadala = $muadala + round($gp['gpa']);
                        ?>
                        <tr>
                            <td style="background: 	#E5E4E2;">تراكمي</td>
                            <td><?= $masomo ?></td>
                            <td><?= $alama ?></td>
                            <td><?= $gp['position'] ?></td>
                            <td><?= $gp['number_of_students'] ?></td>
                            <td><?= ($muadala / ($gpkey + 1)) ?></td>
                            <?php if (session('lang') != 'ar') : ?>
                                <td><?= $gpa->grade(round($muadala / ($gpkey + 1)))['name'] ?></td>
                            <?php else : ?>
                                <td><?= $gpa->grade(round($muadala / ($gpkey + 1)))['name_ar'] ?></td>
                            <?php endif ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="footer">
                <div>
                    <?php if (session('lang') != 'ar') : ?>
                        <p><?= $mudir['extra'] ?></p>
                        <img src="<?= base_url($mudir['link'] ?? 'app-assets/images/signature.png') ?>" height="50px" alt="sign" />
                        <div class="signature-line"></div>
                        <p><?= $mudir['value'] ?><br><?= date('d-m-Y') ?></p>
                    <?php else : ?>
                        <p><?= $mudir['extra_ar'] ?></p>
                        <img src="<?= base_url($mudir['link'] ?? 'app-assets/images/signature.png') ?>" height="50px" alt="sign" />
                        <div class="signature-line"></div>
                        <p><?= $mudir['value_ar'] ?><br><?= date('d-m-Y') ?></p>
                    <?php endif ?>
                </div>
                <div>
                    <a href="<?= base_url('gpa/search/' . $gp['link']) ?>">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?= urlencode(base_url('gpa/search/' . $gp['link'])) ?>" title="<?= $student['username'] ?>" class="float-right m-3" />
                    </a>

                </div>
                <div>
                    <?php if (session('lang') != 'ar') : ?>
                        <p><?= $taalim['extra'] ?></p>
                        <img src="<?= base_url($taalim['link'] ?? 'app-assets/images/signature.png') ?>" height="50px" alt="sign" />
                        <div class="signature-line"></div>
                        <p><?= $taalim['value'] ?><br><?= date('d-m-Y') ?></p>
                    <?php else : ?>
                        <p><?= $taalim['extra_ar'] ?></p>
                        <img src="<?= base_url($taalim['link'] ?? 'app-assets/images/signature.png') ?>" height="50px" alt="sign" />
                        <div class="signature-line"></div>
                        <p><?= $taalim['value_ar'] ?><br><?= date('d-m-Y') ?></p>
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</body>
<script>
    window.print()
</script>

</html>