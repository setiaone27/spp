<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?= base_url('assets/admin/img/logo/litetekno.png'); ?>" rel="icon">
  <title>SPPQu - Login Siswa</title>
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
                  </div>
                  <button id="error" class="btn btn-danger btn-block"></button>
                  <button id="redirect" class="btn btn-info btn-block "><i class="fa fa-check"></i> Login Sukses. Mengalihkan ....</button><br>
                  <?php
                  $msg=$this->session->userdata('message');
                  if($msg){
                    echo "<button id='flash' class='btn btn-info btn-block'><i class='fa fa-thumbs-up'></i> ".$msg."</button></br>";
                    $this->session->unset_userdata('message');
                  }
                  ?>
                  <form class="user" method="POST" id="login">                    
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="form-group">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" name="nis" class="form-control" id="exampleInputUser" aria-describedby="emailHelp" placeholder="NIS" required="required">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group mb-3" id="show_hide_password">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password" required="required">
                        <div class="input-group-append">
                          <span class="input-group-text"><a href="" style="color: #169859;"><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                        </div>
                      </div>
                    </div><br>
                    <!-- <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Ingat Saya</label>
                      </div>
                    </div> -->
                     <div class="form-group">
                      <input type="submit" id="sign" class="btn btn-primary btn-block" value="Login">
                      <button id="auth" class="btn btn-block">Mengautentikasi <i class='fa fa-spinner'></i></button>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="javascript:alert('Silahkan Hubungi Administrator!');">Lupa Password?</a>
                  </div>
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
  <script type="text/javascript">
    $(document).ready(function() {
      $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass( "fa-eye-slash" );
          $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass( "fa-eye-slash" );
          $('#show_hide_password i').addClass( "fa-eye" );
        }
      });
    });
  </script>
  <script>
    $('#auth').hide();
    $('#redirect').hide();
    $('#error').hide();
    $('#flash').delay(3000).fadeOut();

    $(document).bind("ajaxStart", function () {
        $('#sign').hide();
        $('#auth').show();

    });
    $(document).on('ajaxError', function () {
        $('#sign').show();
        $('#auth').hide();
        $('#error').delay(5000).fadeOut();
        $(document).trigger('reset');

    });

    $(document).on('success', function () {
        $('#sign').show();
        $('#auth').hide();
        $('#redirect').show();

    });

    $(document).ready(function () {
        $('#login').on('submit', function (e) {
            e.preventDefault();
            var url = window.location.protocol + '//' + window.location.host + '/spp/';
            var data = $(this).serialize();
            $.ajax({
                url: url+'login_siswa/check_login',
                type: 'post',
                data: data,
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'error') {
                        $('#error').show().html('<i class="fa fa-warning"></i> ' +response.message);
                        $(document).trigger('ajaxError');
                    }
                    else {
                        $(document).trigger('success');
                        window.location.href = "<?php echo site_url('vendor/dashboard'); ?>";
                    }
                }
            });
        });
    });

</script>
</body>

</html>