<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?= base_url('assets/admin/img/logo/litetekno.png'); ?>" rel="icon">
  <title>SPPQu - Login</title>
  <link href="<?= base_url('assets/admin/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/admin/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/admin/css/ruang-admin.min.css'); ?>" rel="stylesheet">
  <style>
    .btn-primary{
      background-color: #1ebc6d;
      border-color: #1ebc6d;
    }
    a{
      color: #169859;
    }
    .btn-primary:hover {
      background-color: #169859;
      border-color: #169859;
    }
    .custom-control-input:checked~.custom-control-label::before {
      border-color: #169859;
      background-color: #169859;
    }
    .input-group-prepend span {
      background-color: #169859;
      border-color: #169859;
    }
    .input-group-append {
      margin-left: -1px;

    }
    .input-group-append span {
      color: #fff;
      background-color: transparent;
      border-color: #d1d3e2;
    }
    .form-control:focus {
      border-color: #169859;
    }
  </style>
</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <img src="<?= base_url('assets/admin/img/logo/sppqu.png'); ?>" alt="LiteTekno" width="100px"><br>
                    <h1 class="h4 text-gray-900">Login SPPQu</h1>
                    <h6 class="text-gray-900 mb-4">(Sistem Pembayaran SPP Online)</h6>
                  </div><br><br>
                  <?php
                  $msg=$this->session->userdata('message');
                  if($msg){
                    echo "<button id='flash' class='btn btn-info btn-block'><i class='fa fa-thumbs-up'></i> ".$msg."</button></br>";
                    $this->session->unset_userdata('message');
                  }
                  ?>
                  <a href="<?= site_url('login_siswa'); ?>" class="btn btn-primary btn-block">Login Siswa</a><br><br>
                  <a href="<?= site_url('login'); ?>" class="btn btn-info btn-block">Login Admin / Petugas</a>
                  <hr>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="<?= base_url('assets/admin/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('assets/admin/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
  <script src="<?= base_url('assets/admin/js/ruang-admin.min.js'); ?>"></script>
  <script>
    $('#auth').hide();
    $('#redirect').hide();
    $('#error').hide();
    $('#flash').delay(3000).fadeOut();
  </script>
</body>

</html>
