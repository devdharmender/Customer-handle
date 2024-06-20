<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Dashboard</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url().'assets\uploads\img\lappy-favicon.png' ?>">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/adminlte.min.css?v=3.2.0">

    <script src="<?php echo base_url(); ?>assets/adminlte/dist/js/jquery-3.6.0.min.js"></script>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/412c0aa76e.js" crossorigin="anonymous"></script>
    

    <script nonce="b4249883-9a0a-4697-bb14-5b2965c5d0e0">
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
    </script>

    <style>
    .main-sidebar {
        height: inherit;
        min-height: 100vh !important;
        max-height: 100vh !important;
        position: absolute;
        top: 0;
    }

    .main-header {
        position: sticky;
        top: 0px;
    }

    .main-sidebar {
        position: fixed !important;
        top: 0px;
    }

    .action-items {
        display: flex;
        justify-content: space-between;
    }

    /* .action-items i {
        font-size: 20px;
        color: white;
        border: 1px solid gray;
        padding: 5px;
        border-radius: 50%;
        background-color: white;
    } */

    .action-items img {
        color: white;
        /* padding: 9px; */
        width: 35px;
        border-radius: 50%;
        background-color: white;

    }

    /* .action-items .logo-edit {
        color: blue;
    }

    .action-items .logo-dlt {
        color: red;
    }

    .action-items .logo-share {
        color: yellow;
    } */
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">