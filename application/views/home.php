<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistema de Tickets</title>

  <!-- Font Icons -->
  <link rel="icon" href="<?= base_url('recursos')?>/img/icons/favicon.ico"/>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('recursos')?>/vendor/fontawesome-free/css/all.min.css" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="<?= base_url('recursos')?>/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="<?= base_url('recursos')?>/css/creative.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="<?= base_url('recursos')?>/img/492px-Unrn-logo.svg.png" alt="" height="60px"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Acerca de</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?= base_url('detalle_comedores')?>">Conoce Comedores y Menus</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">Sistema de Gestion de Tickets para los Comedores de la UNRN</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">Sistema de gestion de tickets, comedores, menús, turnos, programaciones y todo lo relacionado con la administracion de los comedores universiarios de la UNRN (Universidad Nacional de Rio Negro)</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="<?= base_url('login')?>">Ingresar</a>
        </div>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section class="page-section bg-primary" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="text-white mt-0">Ya está aqui!</h2>
          <hr class="divider light my-4">
          <p class="text-white-50 mb-4">El sistema que todos los estudiantes, docente y no docentes de la Universidad Nacional de Rio Negro estaban esperando!</p>
          <a class="btn btn-light btn-xl js-scroll-trigger" href="<?= base_url('register')?>">Registrarse!</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="page-section" id="services">
    <div class="container">
      <h2 class="text-center mt-0">A tu servicio</h2>
      <hr class="divider my-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-gem text-primary mb-4"></i>
            <h3 class="h4 mb-2">Para todos</h3>
            <p class="text-muted mb-0">Disponible para estudiantes, docentes y no docentes!</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
            <h3 class="h4 mb-2">Innovador</h3>
            <p class="text-muted mb-0">Poder gestionar tickets, ver menús, turnos de comidas, horarios y demás!</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
            <h3 class="h4 mb-2">Listo para su uso</h3>
            <p class="text-muted mb-0">Puedes utilizar la aplicacion desde cualquier Sede de la UNRN!</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
            <h3 class="h4 mb-2">Hecho con amor</h3>
            <p class="text-muted mb-0">Sistema totalmente hecho por estudiantes para toda la comunidad universitaria</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Contactanos!</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">Puedes intentar contactarnos y te ayudaremos lo antes posible, estamos para ayudarte!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>+54 (2920) 555-01490</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <a class="d-block" href="mailto:contact@yourwebsite.com">contactocomedor@unrn.edu.ar</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-light py-5">
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

</body>

</html>
