<?php
    $this->load->view('dashboard/header');  
    
    foreach ($usuario as $user) {
        $personaId = $user->id_persona;
        $tipoUser = $user->id_tipo_usuario;
        $nombre = $user->nombre;
        $email = $user->email;
        $id = $user->id_usuario;
    }
    

    foreach($persona as $per){
        $id_persona = $per->id_persona;
    }
    
    foreach($comedor as $com){
        $comedor_numero = $com->id_comedor;
        $id_user_com = $com->id_usuario_comedor;
    }
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
                    <input type="hidden" name="id_user_com" value= "<?php $id_user_com ?>"/>
                    <input type="hidden" name="numero" value= "<?php $comedor_numero ?>"/>
                    <input type="hidden" name="tipo" value= "<?php $tipoUser ?>"/>
                    <input type="hidden" name="id_persona" value= "<?php $id_persona ?>"/>
                    <!-- Identificador -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Id </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="id" value="<?php echo $id; ?>" readonly="readonly">
                        
                    </div>
                    <!-- Nombre -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="nombre" value="<?php echo $nombre; ?>">
                        
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="email" value="<?php echo $email; ?>">
                        
                    </div>
                    <!-- Tipo de Usuario -->
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de usuario</label>
                        <select class="form-control" id="selectTypeUser" name="tipos" required>
                            <option value="0">Seleccione un tipo de usuario </option>
                            <option value="1">USUARIO</option>
                            <option value="3">ADMINISTRADOR DE COMEDORES</option>
                        </select>
                        
                    </div>
                     <!-- Select comedor-->
                     <div class="form-group" id="comedores_list">
                        <label for="exampleFormControlSelect1">Comedor </label>
                        <select class="form-control" id="exampleFormControlSelect1" name="comedores" required>
                            <option value="0">Seleccione un comedor </option>
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