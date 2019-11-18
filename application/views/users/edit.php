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

                <form action="<?= base_url('user/modificarUsuario'); ?>" method="POST" class="m-2">
                    
                    <input type="hidden" name="id_usuario" value= "<?php echo $usuario->id_usuario; ?>"/>
                    <input type="hidden" name="id_comedor" value= "<?php if(isset($comedor)){echo $comedor->id_comedor;}else{echo "-1";} ?>"/> 
                    <input type="hidden" name="contraseña" value= "<?php echo $usuario->contraseña; ?>"/>
                    <input type="hidden" name="id_persona" value= "<?php echo $persona->id_persona; ?>"/> 
                    <!-- Nombre -->
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
                    <!-- Tipo de Usuario -->
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de usuario</label>
                        <select class="form-control" id="selectTypeUser" name="tipo_seleccionado" required>
                            <option value="1">USUARIO</option>
                            <option value="3">ADMINISTRADOR DE COMEDORES</option>
                        </select>
                        
                    </div>
                     <!-- Select comedor-->
                     <div class="form-group" id="comedores_list">
                        <label for="exampleFormControlSelect1">Comedor </label>
                        <select class="form-control" id="exampleFormControlSelect1" name="numero_comedor_seleccionado" required>
                            <?php foreach ($comedores as $comedor): ?>
                            <option value="<?php echo $comedor->id_comedor;?>"><?php echo $comedor->nombre_comedor;?></option>
                            <?php endforeach; ?>
                        </select>
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