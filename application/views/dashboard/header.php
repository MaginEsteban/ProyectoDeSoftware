<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Sistema Comedor Universitario</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    
    <link rel="stylesheet" href="<?= base_url('recursos')?>/css/util.css">

    <link rel="stylesheet" href="<?= base_url('recursos')?>/css/main.css">

    <link rel="stylesheet"
        href="<?= base_url('recursos/adminlte/')?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="<?= base_url('recursos/adminlte/')?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('recursos/adminlte/')?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('recursos/adminlte/')?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="<?= base_url('recursos/adminlte/')?>dist/css/skins/skin-blue.min.css">

    <link rel="stylesheet" href="http://weareoutman.github.io/clockpicker/dist/bootstrap-clockpicker.min.css">

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <!-- jquery -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.0.js"
        integrity="sha256-TFWSuDJt6kS+huV+vVlyV1jM3dwGdeNWqezhTxXB/X8=" crossorigin="anonymous"></script> -->
        <!-- jQuery 3 -->
<script src="<?= base_url("recursos/adminlte/")?>bower_components/jquery/dist/jquery.min.js"></script>

</head>

<body class="hold-transition skin-blue sidebar-mini">
    
<?php $user = $this->session->userdata('user'); ?>

    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?= base_url("dashboard")?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><img src="<?= base_url('recursos')?>/img/unrn.png" alt="" height="40px"
                        style="color:white"></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Comedor - </b>UNRN</span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?= base_url("user/edit_my_user/").$user->id_usuario; ?>" class="fa fa-cogs"></a>
                        </li>
                        <li>
                            <a onClick="close_session()" class="fa fa-sign-out"></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Contenido dinamico -->
        <div id="content" class="content-wrapper">
            <script>
            function close_session() {
                event.preventDefault();
                Swal.fire({
                    title: 'Estas seguro?',
                    text: "Usted esta a punto de cerrar su sesion!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, salir!',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                        url: "http://localhost/proyectodesoftware/login/cerrar_sesion",
                        success: function() {
                            location.href = "http://localhost/proyectodesoftware/login";
                        }
                    })
                    }
                })
            }
            </script>