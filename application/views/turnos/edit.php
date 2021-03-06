<?php
    $this->load->view('dashboard/header');  
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Turno
        <small>Modificar Turno</small>
    </h1>

</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-10 col-md-6 mx-auto card">
        <?php echo validation_errors();?>
            <form id="form" action="<?= base_url('turno/modificarTurno'); ?>" method="POST" class="m-2">

                <!-- Identificador -->
                <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id_turno"
                    value="<?php echo $turno->id_turno; ?>">
                
                <div class="form-group">

                    <input type="hidden" id="update" name="update" value="FALSE">

                </div>
                <!-- Nombre -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre </label>
                    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp"
                        placeholder="Ingrese el nombre del turno..." name="nombre"
                        value="<?php echo $turno->nombre_turno; ?>">

                </div>

                <!-- Comedores -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Comedor</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="comedores">
                        <?php foreach ($comedores as $comedor): ?>
                        <option value="<?php echo $comedor->id_comedor; ?>" 
                        <?php if ($comedor->id_comedor == $turno->id_comedor)
                                echo "selected"; ?>>
                            <?php echo $comedor->nombre_comedor.' - '; echo  $comedor->nombre_ciudad?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Hora inicio -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Hora de Inicio </label>
                    <div class="input-group clock">
                        <input type="text" class="form-control" value="<?php echo $turno->hora_inicio; ?>"
                            placeholder="Ingrese hora de inicio del turno" name="hora_inicio">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                </div>

                <!-- Hora fin -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Hora de Fin </label>
                    <div class="input-group clock">
                        <input type="text" class="form-control" value="<?php echo $turno->hora_fin; ?>"
                            placeholder="Ingrese hora de fin del turno" name="hora_fin">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                </div>

                <button type="submit" id="submit" class="btn btn-primary">Actualizar</button>
            </form>

        </div>

    </div>


</section>


<?php   
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>

<script src="<?= base_url('recursos')?>/vendor/bootstrap/js/bootstrap-clockpicker.min.js"></script>
<script>
$(document).ready(function() {
    $('.clock').clockpicker();

    var form_original_data = $("#form").serialize();
    
    $("form").submit(function(event) {

        //event.preventDefault();

        if ($("#form").serialize() != form_original_data) {
            // Something changed
            $("#update").val('TRUE');
            
        }
    });

});
</script>