<?php
    $this->load->view('dashboard/header');  
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Turnos
            <small>Agregar Turno</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-6 mx-auto card">
                <form action="<?= base_url('turno/crearTurno'); ?>" method="POST" class="m-2">
                
                    <!-- Nombre -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Ingrese el nombre del turno..." name="nombre">
                        
                    </div>

                    <!-- Comedores -->
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Comedor</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="comedores">
                        <option value="0">...</option>
                            <?php foreach ($comedores as $comedor): ?>
                            <option value="<?php echo $comedor->id_comedor; ?>"><?php echo $comedor->nombre_comedor; ?></option> 
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Hora inicio -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hora de Inicio </label>
                        <div class="input-group clock">
                            <input type="text" class="form-control" value="" placeholder="Ingrese hora de inicio del turno" name="hora_inicio">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Hora fin -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hora de Fin </label>
                        <div class="input-group clock">
                            <input type="text" class="form-control" value="" placeholder="Ingrese hora de fin del turno" name="hora_fin">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
    $( document ).ready(function() {
        $('.clock').clockpicker();
    });
       
</script>