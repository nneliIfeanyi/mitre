<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="keywords" content="Discipleship, discipleship works, discipleship labour, discipleship in kaduna state Nigeria, MITRE">
  <meta name="description" content="Ministers Improvement And Training Retreat, MITRE, Threshers Team Ministry, Kaduna">
  <link rel="stylesheet" href="<?= URLROOT; ?>/css/font-awesome.css" />
  <link rel="stylesheet" href="<?= URLROOT; ?>/css/bootstrap.css" />
  <link rel="stylesheet" href="<?= URLROOT; ?>/css/styles.css" />
  <link rel="apple-touch-icon" sizes="180x180" href="<?= URLROOT; ?>/img/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= URLROOT; ?>/img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= URLROOT; ?>/img/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

  <title><?= SITENAME; ?> - Application Portal</title>

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Fullscreen loader */
    #loader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: #fff;
      z-index: 9999;
      display: flex;
      justify-content: center;
      align-items: center;
    }

        /* Parsley Validation Styling */
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

    footer {
      background: #212529;
      color: #adb5bd;
      padding: 30px 0;
    }

    footer a {
      color: #f8f9fa;
      text-decoration: none;
    }
  </style>
</head>
