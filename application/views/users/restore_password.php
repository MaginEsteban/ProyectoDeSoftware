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

<body>
    <div class="page-wrap d-flex flex-row align-items-center">
        <div class="container">
            <div class="row">

                <div class="col-md-6 mx-auto">
                    <h2 class="font-weight-light">Forgot your password?</h2>
                    Not to worry. Just enter your email address below and we'll send you an instruction email for
                    recovery.
                    <form target="_blank" action="https://www.totoprayogo.com" class="mt-3">

                        <div class="form-group">
                            <label for="input_email">Email</label>
                            <input id="input_email" class="form-control" type="email"
                                placeholder="Ingresa tu email..." />
                            <small id="emailHelp" class="form-text text-muted">El email ingresado lo utilizaremos para
                                validar tu cuenta...</small>
                        </div>

                        <!-- Contraseña Actual -->
                        <div class="form-group">
                            <label for="pass_act">Contraseña Actual</label>
                            <input type="password" class="form-control" name="" id="pass_act"
                                placeholder="Ingrese su contraseña actual...">
                        </div>

                        <!-- Contraseña Nueva -->
                        <div class="form-group">
                            <label for="pass_new">Contraseña nueva</label>
                            <input type="password" class="form-control" name="" id="pass_new"
                                placeholder="Ingrese su contraseña nueva...">
                        </div>

                        <div class="form-group">
                            <label for="">Confirmar Contraseña nueva</label>
                            <input type="password" class="form-control" name="" id=""
                                placeholder="Ingrese su contraseña nueva...">
                        </div>

                        <div class="text-right my-3">
                            <button type="submit" class="btn btn-lg btn-success">Reset Password</button>
                        </div>
                    </form>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>