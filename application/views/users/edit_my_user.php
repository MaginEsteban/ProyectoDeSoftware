<?php
    $this->load->view('dashboard/header');  
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Usuarios
            <small>Modificar Usuario</small>
        </h1>

    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-6 mx-auto card">

                <form action="<?= base_url('user/modificarMiUsuario'); ?>" method="POST" class="m-2">
                    <input type="hidden" name="id_persona" value= "<?php $usuario->id_persona ?>"/>
                    <!-- Identificador -->
                    <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="id" value="<?php echo $usuario->id_usuario; ?>">
                     <!-- Nombre de la persona-->
                     <div class="form-group">
                        <label for="exampleInputEmail1">Su nombre</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="su_nombre" value="<?php echo $persona->nombre; ?>">
                    </div>
                     <!-- Apellido de la persona-->
                     <div class="form-group">
                        <label for="exampleInputEmail1">Su apellido</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="su_apellido" value="<?php echo $persona->apellido; ?>">
                    </div>
                    <!-- Nombre de Usuario-->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="nombre" value="<?php echo $usuario->nombre; ?>">
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="email" value="<?php echo $usuario->email; ?>">
                    </div>
                    <!-- Contraseña -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contraseña</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="contraseña" value="<?php echo $usuario->contraseña; ?>">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>


    </section>

    </div>

<?php   
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>