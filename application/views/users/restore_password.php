<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reestablecimiento de Contraseña</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>

<body  style="background-image: url(<?= base_url('recursos')?>/img/tabla-madera-sobremesa-vacia-fondo-borroso_1253-1584.jpg);">
    <div class="page-wrap d-flex flex-row align-items-center">
        <div class="container">
            <div class="row h-100 justify-content-center align-items-center" style="padding-top: 100px;">

                <div class="col-md-6 mx-auto card">
                    <h2 class="font-weight-light">Reestablecer Contraseña</h2>
                
                    <form  action="<?=base_url('user/check_password'); ?>" class="mt-3" method="POST">

                        <!-- Legajo del alumno -->
                        <div class="form-group">
                        <label for="">Legajo</label>
                        <input type="text" name="nro_legajo" id="" class="form-control" placeholder="Ingrese el legajo...">
                        </div>
                        
                        <div class="form-group">
                            <label for="input_email">Email</label>
                            <input id="input_email" class="form-control" type="email"
                                placeholder="Ingresa tu email..." name="email" />
                            <small id="emailHelp" class="form-text text-muted">El email ingresado lo utilizaremos para
                                validar tu cuenta...</small>
                        </div>

                        <!-- Contraseña Nueva -->
                        <div class="form-group">
                            <label for="pass_new">Contraseña nueva</label>
                            <input type="password" class="form-control" name="pass_act" id="pass_new"
                                placeholder="Ingrese su contraseña nueva...">
                        </div>

                        <div class="form-group">
                            <label for="">Confirmar Contraseña nueva</label>
                            <input type="password" class="form-control" name="pass_act2" id=""
                                placeholder="Ingrese su contraseña nueva...">
                        </div>

                        <div class="text-right my-3">
                            <button type="submit" class="btn btn-lg btn-success">Cambiar Contraseña</button>
                        </div>
                    </form>
                    <?php if(isset($mensaje)): ?>
                        <div class="alert <?=  $class; ?> alert-dismissible fade show" role="alert">
                            <p> <?= $mensaje; ?></p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>