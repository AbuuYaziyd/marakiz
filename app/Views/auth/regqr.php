<!DOCTYPE html>
<html class="loading" lang="<?= session('lang') ?>" data-textdirection="<?= session('lang') != 'ar' ? 'ltr' : 'rtl' ?>">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="<?= session('lang') != 'ar' ? session('markaz')['value'] : session('markaz')['value_ar'] ?> | <?= session('lang') != 'ar' ? session('location')['value'] : session('location')['value_ar'] ?>">
    <meta name="keywords" content="<?= session('lang') != 'ar' ? session('markaz')['value'] : session('markaz')['value_ar'] ?> | <?= session('lang') != 'ar' ? session('location')['value'] : session('location')['value_ar'] ?>">
    <meta name="author" content="Abou Yaziyd">
    <link rel="manifest" href="<?= base_url('manifest') ?>" />
    <meta name="theme-color" content="<?= session('colour')['value'] ?>">
    <title><?= $title ?> | <?= session('lang') != 'ar' ? session('markaz')['value'] : session('markaz')['value_ar'] ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" href="<?= base_url(session('logo')) ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(session('logo')) ?>">
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
            margin-bottom: 5px;
            border-bottom: 3px solid <?= session('colour')['value'] ?>;
            /* Dark Green Border */
            padding-bottom: 5px;
        }

        .institution-details {
            text-align: right;
        }

        .logo-box {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: <?= session('colour')['value'] ?>;
        }

        .student-info {
            margin-bottom: 5px;
            background-color: <?= session('colour')['link'] ?>;
            /* Light Green Tint */
            padding: 15px;
            border-right: 5px solid <?= session('colour')['value'] ?>;
            border-left: 5px solid <?= session('colour')['value'] ?>;
            border-radius: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
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
            background-color: <?= session('colour')['value'] ?>;
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
            margin-top: 10px;
            display: flex;
            justify-content: space-around;
            text-align: center;
        }

        .signature-line {
            margin-top: 5px;
            border-top: 1px solid #333;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
        }

        .qr-wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px 0;
        }
    </style>
</head>

<body>
    <div id="printArea" style="direction: <?= service('request')->getLocale() != 'ar' ? 'ltr' : 'rtl' ?>; width: 100%;">
        <div class="header-container">
            <div class="institution-details">
                <h4 style="color: <?= session('colour')['value'] ?>;"><?= session('markaz')['value_ar'] ?><br>
                    <span><?= session('postabox')['value_ar'] ?></span>
                    <span><?= session('location')['value_ar'] ?></span>
                </h4>
            </div>
            <div class="logo-box">
                <img alt="apple-touch-icon" src="<?= base_url(session('logo')) ?>" height="60px">
            </div>
            <div class="contact-info" dir="ltr">
                <h4 style="color: <?= session('colour')['value'] ?>;"><?= session('markaz')['value'] ?><br>
                    <span><?= session('postabox')['value'] ?></span>
                    <span><?= session('location')['value'] ?></span>
                </h4>
            </div>
        </div>
        <div class="student-info" style="text-align: center;">
            <strong>
                <?= $title ?>
            </strong>
        </div>
        <div class="qr-wrapper">
            <a href="<?= base_url('eregister') ?>">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=500x500&data=<?= urlencode(base_url('eregister')) ?>" title="<?= $title ?>" />
            </a>
        </div>
    </div>
</body>
<script>
    window.print()
</script>

</html>