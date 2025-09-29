<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo SITENAME; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= URLROOT; ?>/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= URLROOT; ?>/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= URLROOT; ?>/img/favicon-16x16.png">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo URLROOT; ?>/theme/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo URLROOT; ?>/theme/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"> -->

    <!-- Template Main CSS File -->
    <link href="<?php echo URLROOT; ?>/theme/css/style.css" rel="stylesheet">
</head>

<body>
    <?php flash('msg'); ?>