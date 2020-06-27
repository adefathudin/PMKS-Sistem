<!DOCTYPE html>
<html>

    <head>
        <title>Login - <?= APP_TITLE ?></title>
        <link rel="icon" href="<?php echo base_url('assets/img/favicon.png') ?>" type="image/x-icon">
        <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
        <style>
            body,
            html {
                margin: 0;
                padding: 0;
                height: 100%;
                background-image: url("<?= base_url() ?>assets/img/background.jpg");
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
            .user_card {
                height: 400px;
                width: 350px;
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
                color: black;
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
                            <img src="<?php echo base_url('assets/img/logo.jpeg') ?>" class="brand_logo" alt="Logo">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center form_container">
                        <form method="POST" action="<?php echo base_url('auth/cek_login') ?>">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="email" id="email" class="form-control input_user" required placeholder="e.g mail@falaq.my.id">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control input_pass" required placeholder="password">
                            </div>
                            <div class="form-group">
                                <?php
                                // Cek apakah terdapat session nama message
                                if ($this->session->flashdata('message')) { // Jika ada
                                    echo "
                            <div class='alert alert-danger alert-dismissible'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"
                                    . $this->session->flashdata('message') . "</div>";
                                }
                                ?>
                                <?php
                                // Cek apakah terdapat session nama message
                                echo $this->session->flashdata('akses');
                                ?>
                            </div>
                    </div>
                    <div class="justify-content-center mt-3 login_container">
                        <button type="submit" name="button" id="btn-login" class="btn btn-light login_btn">Login <i class="fas fa-fw fa-sign-in-alt"></i></button>
                    </div>
                    </form> 
                    <div class="mt-4">
                        <div class="d-flex justify-content-center links">
                            Don't have an account? <a href="<?php echo base_url('auth/registrasi') ?>" class="ml-2">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('assets/vendor/qrcode/js/main.js') ?>"></script>
        <script>
            var JS = {
                init: function () {

                    $('form').submit(function () {
                        var $submit = $('#btn-login');
                        $submit.find('i').removeClass('fa-sign-in-alt').addClass('fa-circle-notch fa-spin');
                        $submit.attr('disabled', 'true');
                    });
                }
            };

            $(document).ready(function () {
                JS.init();
            });
        </script>
    </body>
</html>