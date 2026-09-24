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
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            /* Light grey background */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            padding-top: 56px;
            /* Adjust for fixed navbar height */
            text-align: center;
            /* Center all body text by default */
        }

        .navbar-brand {
            font-weight: 700;
        }

        .main-content {
            flex-grow: 1;
            /* Allows content area to expand */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem 0;
            /* Add padding for content */
        }

        .id-card-container {
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            /* text-align: center; - This is now applied to body, but can stay for specificity */
            border: 2px solid #0d6efd;
            /* Bootstrap primary blue */
        }

        .student-photo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #0d6efd;
            /* Bootstrap primary blue */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .qr-code {
            width: 120px;
            height: 120px;
            object-fit: contain;
        }

        /* Override Bootstrap's text-start if present in specific elements that should be centered */
        .id-card-container .text-start {
            text-align: center !important;
        }
    </style>
</head>

<body>
    <div class="main-content">
        <div class="id-card-container">
            <div class="flex justify-center mb-4">
                <!-- <img src="<?= base_url(session('logo')) ?>" height="70px" alt="logo" class="h-12 w-auto object-contain"> -->
            </div>
            <h1 class="h3 fw-bold text-dark mb-4"><?= $title ?></h1>

            <div class="mb-4">
                <img src="<?= base_url('app-assets/images/avatar/av' . ($user['sex'] == 'F' ? 'f' : '') . '.png') ?>" alt="Student Photo"
                    class="student-photo mx-auto mb-3">
                <p class="h6 fw-bold text-primary mb-1"><?= strtoupper($user['name'] . ' ' . $user['mname']) ?></p>
                <p class="h3 fw-bold text-primary mb-1"><?= strtoupper($user['lname']) ?></p>
                <p class="text-secondary small mb-0"><b><?= ucfirst(lang('app.' . $user['role'])) ?></b></p>
                <p class="text-secondary mb-0"><b><?= $user['username'] ?></b></p>
            </div>

            <!-- Removed text-start class to allow centering from parent -->
            <div class="mb-4">
                <p class="mb-1"><span class="fw-semibold"><?= lang('app.course') ?>:</span> <b><?= strtoupper($level) ?></b></p>
                <?php $date = $user['created_at'] ?>
                <p class="mb-1"><span class="fw-semibold"><?= lang('app.registration') ?>:</span> <?= date('Y', strtotime($date)) ?> - <?= date('Y', strtotime($date . '+3 years')) ?></p>
            </div>

            <div class="d-flex justify-content-center mb-4">
                <a href="<?= base_url('student/page/' . $user['id']) ?>" target="_blank"><img src="https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=<?= base_url('student/page/' . $user['id']) ?>" alt="QR Code" class="qr-code"></a> 
            </div>

            <p class="text-muted small mt-3"><?= session('lang') != 'ar' ? session('markaz')['value'] : session('markaz')['value_ar'] ?> | <?= session('lang') != 'ar' ? session('location')['value'] : session('location')['value_ar'] ?></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>