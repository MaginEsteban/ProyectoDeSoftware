<?php
    $this->load->view('dashboard/header');  

?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Comedores
            <small>Modificar Comedor</small>
        </h1>

    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-10 col-md-6 mx-auto card">
            <?php echo validation_errors(); ?>

                <form action="<?= base_url('comedor/modificarComedor'); ?>" method="POST" class="m-2">
                    
                    <!-- Identificador -->
                        <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="id" value="<?php echo $comedor->id_comedor; ?>" readonly="readonly">
                        
                    
                    <!-- Nombre -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="nombre" value="<?php echo $comedor->nombre_comedor; ?>">
                        
                    </div>
                    <!-- Nombre OLD-->
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="nombre_old" value="<?php echo $comedor->nombre_comedor; ?>">
                        
                    </div>

                    <!-- Ciudad -->
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Ciudad</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="ciudades">
                            <?php foreach ($ciudades as $ciudad): ?>
                                <option value="<?php echo $ciudad->id_ciudad; ?>" <?php if ($ciudad->id_ciudad == $comedor->id_ciudad)
                                    echo "selected"; ?> ><?php echo $ciudad->nombre; ?></option> 
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Direccion -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Direccion </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Ingrese la direccion del comedor..." name="direccion"  value="<?php echo $comedor->direccion; ?>">
                        
                    </div>
                    
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="ciudad_old" value="<?php echo $comedor->id_ciudad; ?>">
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>

            </div>

        </div>


    </section>


<?php   
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>