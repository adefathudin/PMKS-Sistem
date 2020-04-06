<!DOCTYPE html>
<html>    
<head>
  <title>Login - WarungKoperasi</title>
  <link rel="icon" href="<?php echo base_url('assets/img/favicon.png')?>" type="image/x-icon">
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">

  <style>
      body,
    html {
      margin: 0;
      padding: 0;
      height: 100%;
      background-image: url("<?= base_url('assets/img/background.jpg')?>");
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
    .user_card {
      height: 500px;
      width: 550px;
      margin-top: auto;
      margin-bottom: auto;
      background: #ccfff573;
      position: relative;
      display: flex;
      justify-content: center;
      flex-direction: column;
      padding: 10px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      border-radius: 5px;
    }
    .brand_logo_container {
      position: absolute;
      height: 170px;
      width: 170px;
      top: -75px;
      border-radius: 50%;
      background: #0006;
      padding: 10px;
      text-align: center;
    }
    .brand_logo {
      height: 150px;
      width: 150px;
      border-radius: 50%;
      border: 2px solid white;
    }
    .form_container {
      margin-top: 100px;
    }
    .login_btn {
      width: 100%;
      background: #4d4d4d !important;
      color: white !important;
    }
    .login_btn:focus {
      box-shadow: none !important;
      outline: 0px !important;
    }
    .login_container {
      padding: 0 2rem;
    }
    .input-group-text {
      background: #4d4d4d  !important;
      color: white !important;
      border: 0 !important;
      border-radius: 0.25rem 0 0 0.25rem !important;
    }
    .input_user,
    .input_pass:focus {
      box-shadow: none !important;
      outline: 0px !important;
    }
    .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
      background-color: #4d4d4d !important;
    }
a {
    color: white;
    text-decoration: none;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
</style>
</head>
<body>
  <div class="container h-100">
    <div class="d-flex justify-content-center h-100">
      <div class="user_card">
        <div class="d-flex justify-content-center">
          <div class="brand_logo_container">
            <img src="<?php echo base_url('assets/img/logo.png')?>" class="brand_logo" alt="Logo">
          </div>
        </div>
        <div class="d-flex justify-content-center form_container">
        <form id="FormRegistrasi" action="<?php echo base_url('auth/save_registrasi'); ?>" method="POST" >
                  <div class="form-group">
                    <input type="text" name='nama_lengkap' class="form-control form-control-user" id="nama_lengkap" placeholder="Nama Lengkap" required autofocus max="50">
                  </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user" id="email" placeholder="Email Address (pastikan email belum pernah terdaftar)" required max="50">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password" required >
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="password" class="form-control form-control-user" id="repassword" placeholder="Repeat Password" required >
                  </div>
                </div>  
                <hr>
                <div class="form-group">
                <button type="submit" class="btn btn-light btn-user btn-block" id="btn-submit">
                  Register Account <i class="fas fa-fw fa-sign-in-alt"></i>
                </button>
              </form>      
        <div class="mt-4">
          <div class="d-flex justify-content-center links">
          Already have an account?<a href="<?php echo base_url('auth')?>" class="ml-2"> Login!</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>
  <script type="text/javaScript">
    //UPLOAD FORM DAN KTP
     var password = document.getElementById("password"),
      repassword = document.getElementById("repassword");
      function validatePassword(){
        if(password.value != repassword.value) {
          repassword.setCustomValidity("Password tidak sama");
          } else {
          repassword.setCustomValidity('');
          }
        }
        password.onchange = validatePassword;
        repassword.onkeyup = validatePassword;
</script>
<script>
var JS = {
  init: function(){
    $('form').submit(function(){
      var $submit = $('#btn-submit');
      $submit.find('i').removeClass('fa-sign-in-alt').addClass('fa-circle-notch fa-spin');
      $submit.attr('disabled', 'true');
    });
  }
};
$(document).ready(function(){
  JS.init();
});
</script>
</body>
</html>