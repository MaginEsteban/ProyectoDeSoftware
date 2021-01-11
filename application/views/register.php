<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registro Sistema de Tickets</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="icon" href="<?= base_url('recursos')?>/img/icons/favicon (2).ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" href="<?= base_url('recursos')?>/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="<?= base_url('recursos/libs')?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="<?= base_url('recursos/libs')?>/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="<?= base_url('recursos')?>/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" href="<?= base_url('recursos')?>/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="<?= base_url('recursos')?>/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="<?= base_url('recursos')?>/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" href="<?= base_url('recursos')?>/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="<?= base_url('recursos')?>/css/util.css">
	<link rel="stylesheet" href="<?= base_url('recursos')?>/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(<?= base_url('recursos')?>/img/bannerlogin.jpg);">
					<span class="login100-form-title-1">
						Registro
					</span>
				</div>
				<?= validation_errors(); ?>
 
				 <?php 
				
					if($this->session->flashdata('error')){
						echo 'hola muno';
						echo '<p class="text-center text-danger">' . $this->session->flashdata('error') . '</p>';
					}
				?> 

				<form class="login100-form validate-form" action="<?php echo base_url('register/post_register') ?>" method="post" >


					
					<!-- <div style="width:100%;">
						<p class="lead m-2 text-center">Datos personales</p>
                    </div>
                    -->
				    <div class="wrap-input100 validate-input m-b-26" data-validate="Legajo requerido">
						<span class="label-input100">Legajo</span>
						<input class="input100" type="text" name="legajo" placeholder="Ingrese su legajo">
						<span class="focus-input100"></span>
                    </div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Email requerido">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Ingrese su email">
						<span class="focus-input100"></span>
                    </div>

                    <!-- <div style="width:100%;">
						<p class="lead m-2 text-center">Datos del usuario</p>
                    </div> -->
					<!-- Datos del usuario -->

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username requerido">
						<span class="label-input100">Nombre de Usuario</span>
						<input class="input100" type="text" name="username" placeholder="Ingrese su nombre de usuario">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate = "Contraseña requerida">
						<span class="label-input100">Contraseña</span>
						<input class="input100" type="password" name="pass" placeholder="Ingrese su contraseña">
						<span class="focus-input100"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input m-b-26" data-validate = "Contraseña requerida">
						<span class="label-input100">Confirmar contraseña</span>
						<input class="input100" type="password" name="cpass" placeholder="Ingrese su contraseña">
						<span class="focus-input100"></span>
                    </div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Registrar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="<?= base_url('recursos')?>/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('recursos')?>/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('recursos')?>/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url('recursos')?>/vendor/bootstrap/js/bootstrap.min (2).js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('recursos')?>/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('recursos')?>/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url('recursos')?>/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('recursos')?>/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('recursos')?>/js/main.js"></script>

</body>
</html>