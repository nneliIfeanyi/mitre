<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mitre Administrative Portal</title>

    <!-- Google Font: Source Sans Pro -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= URLROOT; ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= URLROOT; ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= URLROOT; ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= URLROOT; ?>/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= URLROOT; ?>/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= URLROOT; ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= URLROOT; ?>/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= URLROOT; ?>/plugins/summernote/summernote-bs4.min.css">

    <!-- <link rel="stylesheet" href="<?= URLROOT; ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.dataTables.css">
    <!--Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= URLROOT; ?>/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= URLROOT; ?>/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= URLROOT; ?>/img/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <style type="text/css">
        .flash-msg {
            margin: 0;
            position: fixed;
            bottom: 0;
            right: 1vw;
            z-index: 5;
            width: 200px;
            animation-name: fade;
            animation-duration: 3s;
            animation-delay: 6s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
        }

        @keyframes fade {
            from {
                z-index: 100;
                visibility: inherit;
            }

            to {

                visibility: hidden;
                z-index: -1;
            }
        }



        .error {
            color: #D43F3A;
            padding-left: 0;
            margin-top: 5px;
            margin-bottom: 0;
        }

        input.parsley-error,
        select.parsley-error,
        textarea.parsley-error {
            border-color: #D43F3A;
            box-shadow: none;
        }

        input.parsley-error:focus,
        select.parsley-error:focus,
        textarea.parsley-error:focus {
            border-color: #D43F3A;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #FF8F8A;
        }

        input.parsley-success,
        select.parsley-success,
        textarea.parsley-success {
            border-color: #398439;
            box-shadow: none;
        }

        input.parsley-success:focus,
        select.parsley-success:focus,
        textarea.parsley-success:focus {
            border-color: #398439;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #89D489
        }

        .parsley-errors-list {
            list-style-type: none;
            padding-left: 0;
            margin-top: 5px;
            margin-bottom: 0;
        }

        .parsley-errors-list.filled {
            color: #D43F3A;
            opacity: 1;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Response message div -->
        <div id="msg"></div>