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
            <a class="nav-link js-scroll-trigger" href="<?= base_url('register')?>">Registro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?= base_url('login')?>">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<?php foreach ($comedores as $comedor): ?>
    <!-- Masthead -->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="text-uppercase text-white font-weight-bold"><?php echo $comedor->nombre_comedor; ?></h1>
                    <p class="text-white-75 font-weight-light mb-5">Ubicado en: <?php echo $comedor->nombre; ?></p>
                    <hr class="divider my-4">
                </div>
            </div>
        </div>
    </header>
<?php endforeach; ?>
 

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
