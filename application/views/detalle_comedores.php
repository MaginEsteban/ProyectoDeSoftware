<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de Tickets</title>

    <!-- Font Icons -->
    <link rel="icon" href="<?= base_url('recursos')?>/img/icons/favicon.ico" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('recursos')?>/vendor/fontawesome-free/css/all.min.css" type="text/css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic'
        rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="<?= base_url('recursos')?>/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS - Includes Bootstrap -->
    <link href="<?= base_url('recursos')?>/css/creative.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">

    <style>
    .menu-item-car {
        background-color: white;
        width: 150px !important;
        margin: 10px;
    }
    .menu-car{
        height:350 !important;
    }
    </style>
</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 shadow-lg" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <img src="<?= base_url('recursos')?>/img/492px-Unrn-logo.svg.png" alt="" height="60px"></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item text-black">
                        <a class="nav-link js-scroll-trigger" href="<?= base_url('register')?>">
                            <span class=""> Registro</span>
                        </a>
                    </li>
                    <li class="nav-item text-black">
                        <a class="nav-link js-scroll-trigger" href="<?= base_url('login')?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Masthead -->
    <header class="masthead">

        <div class="container h-100 mt-5">
            <div class="row menu-car">
                <div class="col">
                    <div class="slider-nav">
                         <?php foreach ($comedores as $comedor): ?>
                            <div class="menu-item-car"><?=$comedor->nombre_comedor ?></div>
                         <?php endforeach;?>
                    </div>
                </div>
            </div>


            <div class="slider-for">

                <?php foreach ($comedores as $comedor): ?>

                <div class="row">

                    <div class="col mx-auto">


                        <table class="table table-bordered comedor" id="<?php echo $comedor->id_comedor?>">
                            <tr>
                                <th scope="col" class="bg-secondary text-white">Turno</th>
                                <th scope="col" class="bg-secondary text-white">Lunes</th>
                                <th scope="col" class="bg-secondary text-white">Martes</th>
                                <th scope="col" class="bg-secondary text-white">Miercoles</th>
                                <th scope="col" class="bg-secondary text-white">Jueves</th>
                                <th scope="col" class="bg-secondary text-white">Viernes</th>
                                <th scope="col" class="bg-secondary text-white">Sabado</th>

                            </tr>
                            <?php foreach($comedor->turnos as $turno ): ?>
                            <tr>

                                <!-- Turno -->
                                <td class="bg-dark" id="turno">
                                    <p class="h4 text-center text-white text-capitalize text-justify">
                                        <?= $turno->nombre; ?> </p>
                                    <p class="h6 text-center text-white text-capitalize text-justify">
                                        <?= $turno->hora_inicio; ?>- <?= $turno->hora_fin; ?></p>
                                </td>

                                <!-- Lunes -->
                                <td id="turno_<?= $turno->id_turno;?>_dia_1"></td>

                                <!-- Martes -->
                                <td id="turno_<?= $turno->id_turno;?>_dia_2"></td>

                                <!-- Miercoles -->
                                <td id="turno_<?= $turno->id_turno;?>_dia_3"></td>

                                <!-- Jueves -->
                                <td id="turno_<?= $turno->id_turno;?>_dia_4"></td>

                                <!-- Viernes -->
                                <td id="turno_<?= $turno->id_turno;?>_dia_5">
                                </td>

                                <!-- Sabado -->
                                <td id="turno_<?= $turno->id_turno;?>_dia_6"></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <div class="row h-100 align-items-center justify-content-center text-center">
                            <div class="col-lg-10 align-self-end">
                                <h1 class="text-uppercase text-black font-weight-bold d-inline">
                                    <?php echo $comedor->nombre_comedor; ?>

                                </h1>
                                <p class="text-black-75 font-weight-light mb-5">Ubicado en:
                                    <?php echo $comedor->nombre; ?></p>
                                <hr class="divider my-4">
                            </div>
                            <div class="col-2">
                                <i class="fa fa-star text-black" aria-hidden="true"></i>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        </div>

        </div>
    </header>


    <!-- Footer -->
    <footer class="bg-light py-5 shadow-sm">
        <div class="container">
            <div class="small text-center text-muted">Copyright &copy; 2019 - Proyecto de Software</div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url('recursos')?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('recursos')?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?= base_url('recursos')?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('recursos')?>/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?= base_url('recursos')?>/js/creative.min.js"></script>
    <script src="<?= base_url('recursos')?>/js/programacion_detalle.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


</body>

</html>