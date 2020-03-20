<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?= base_url('assets/admin/img/logo/litetekno.png'); ?>" rel="icon">
  <title>SPPQu - <?= $title; ?></title>
  <link href="<?= base_url('assets/admin/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/admin/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/admin/css/ruang-admin.min.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/sweetalert2/dist/sweetalert2.min.css'); ?>">  
  <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/gijgo/css/gijgo.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/select2/css/select2.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/dropify/dist/css/dropify.min.css'); ?>">
  <style>
    .btn-primary{
      background-color: #58ccef;
      border-color: #58ccef;
    }
    a{
      color: #169859;
    }
    .btn-primary:hover {
      background-color: #169859;
      border-color: #169859;
    }
    .swal2-popup {
      width: 20%;
      font-size: 10px;
    }
    .select2-container .select2-selection--single {      
      height: calc(1.5em + .75rem + 7px);
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
      line-height: 40px;
      color: #6e707e;
    }
    .dropify-wrapper {
      width: 30%;
    }
  </style>
</head>

<body id="page-top">
  <div id="wrapper">