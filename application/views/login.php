<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Sistema de Tickets</title>
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
						Ingresar
					</span>
				</div>

				<form class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Email o username requerido">
						<span class="label-input100">Email o Username</span>
						<input class="input100" type="text" name="username" placeholder="Ingrese su email o username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate = "Contraseña requerida">
						<span class="label-input100">Contraseña</span>
						<input class="input100" type="password" name="pass" placeholder="Ingrese su contraseña">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Recordarme
							</label>
						</div>

						<div>
							<a href="" class="txt1">
								Olvido su contraseña?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Ingresar
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