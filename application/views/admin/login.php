<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lappymaker - Login</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url().'assets\uploads\img\lappy-favicon.png' ?>">
    
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/adminlte.min.css?v=3.2.0">


    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/412c0aa76e.js" crossorigin="anonymous"></script>

    <!-- <script nonce="2b801d04-a8bd-4db6-b8d5-a4df219f6601">
    (function(w, d) {
        ! function(a, e, t, r) {
            a.zarazData = a.zarazData || {}, a.zarazData.executed = [], a.zaraz = {
                deferred: []
            }, a.zaraz.q = [], a.zaraz._f = function(e) {
                return function() {
                    var t = Array.prototype.slice.call(arguments);
                    a.zaraz.q.push({
                        m: e,
                        a: t
                    })
                }
            };
            for (const e of ["track", "set", "ecommerce", "debug"]) a.zaraz[e] = a.zaraz._f(e);
            a.addEventListener("DOMContentLoaded", (() => {
                var t = e.getElementsByTagName(r)[0],
                    z = e.createElement(r),
                    n = e.getElementsByTagName("title")[0];
                for (n && (a.zarazData.t = e.getElementsByTagName("title")[0].text), a.zarazData.w = a
                    .screen.width, a.zarazData.h = a.screen.height, a.zarazData.j = a.innerHeight, a
                    .zarazData.e = a.innerWidth, a.zarazData.l = a.location.href, a.zarazData.r = e
                    .referrer, a.zarazData.k = a.screen.colorDepth, a.zarazData.n = e.characterSet, a
                    .zarazData.o = (new Date).getTimezoneOffset(), a.zarazData.q = []; a.zaraz.q.length;
                ) {
                    const e = a.zaraz.q.shift();
                    a.zarazData.q.push(e)
                }
                z.defer = !0, z.referrerPolicy = "origin", z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(
                    encodeURIComponent(JSON.stringify(a.zarazData))), t.parentNode.insertBefore(z,
                    t)
            }))
        }(w, d, 0, "script");
    })(window, document);
    </script> -->

    <style>
    :root {
        --blue: #2394d1;
        --orange: #f68e36;
    }

    .login-box,
    .register-box {
        width: 490px;
    }

    .admin-logo{
        color: var(--blue);
    }
    .admin-logo span{
        color: var(--orange);
    }
    /* .register{
        background-color: var(--orange);
    }
    .register:hover{
        background-color: var(--orange);
        
    } */
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <?php
            if(!empty($this->session->flashdata('msg'))){ ?>
                    <div class="alert alert-danger text-center mb-2" style="background-color: #d42f2f;color:#fff;">
                        <?php echo  $this->session->flashdata('msg'); ?>
                    </div>
                    <?php
                }               
            ?>
        <div class="card p-3">
            <div class="login-logo">
                <!-- <a href="../../index2.html"><b>Admin</b>LTE</a> -->
                <img src="<?php echo base_url(); ?>assets/uploads/img/lappy-maker-logo.png" width="100%"
                    alt="Logo Error" class="logo-img">
            </div>
            <h4 class="text-center text-primary pb-0 admin-logo">ADMIN <span>LOGIN</span></h4>
            <div class="card-body login-card-body">
                <!-- <p class="login-box-msg">Sign in to start your session</p> -->
                <form action="<?= base_url(); ?>admin/login/authenticate" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="text-danger">
                        <?= form_error('email') ?>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="text-danger">
                        <?= form_error('password') ?>
                    </div>
                    <div class="row">
                        <!-- <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div> -->

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Log In</button>
                        </div>

                    </div>
                </form>
                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        I forgot my password
                        <!-- <i class="fa-solid fa-key"></i>  -->
                        <!-- <i class="fab fa-facebook mr-2"></i> Sign in using Facebook -->
                    </a>
                    <!--<a href="#" class="btn btn-block btn-danger register" style="background-color: #ed5909;color:#fff;">-->
                    <!--    Register a new membership-->
                        <!-- <i class="fab fa-google-plus mr-2"></i> Sign in using Google+ -->
                    <!--</a>-->
                </div>

                <!-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> -->
            </div>

        </div>
    </div>


    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/adminlte/dist/js/adminlte.min.js?v=3.2.0"></script>

</body>

</html>