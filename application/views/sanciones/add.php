<?php
    $this->load->view('dashboard/header');  
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Sanciones
            <small>Agregar Sancion</small>
        </h1>

    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-10 col-sm-6 mx-auto card">
            <?php echo validation_errors();?>

                <form action="<?= base_url('sancion/crearSancion'); ?>" method="POST" class="m-2">
                    <!-- Fecha -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fecha </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly="readonly"
                            placeholder="<?php echo date("Y/m/d") ?>" name="fecha" value="<?php echo date("Y/m/d") ?>">
                    </div>

                    <!-- Hora -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hora </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly="readonly"
                            placeholder="<?php echo date("h:i:s", time())?>" name="hora" value="<?php echo date("h:i:s", time()) ?>">
                    </div>

                     <!-- Descripcion -->
                     <div class="form-group">
                        <label for="exampleInputEmail1">Descripcion </label>
                        <textarea class="form-control" id="descripcion" rows="3"  placeholder="Ingrese la razon de la sancion..." name="descripcion" ></textarea>
                           
                    </div>

                    <?php if ($persona->id_persona != null): ?>
                        <input type="hidden" name="id_persona" value= "<?php echo $persona->id_persona ?>"/>
                    <?php endif; ?>
                   
                    
                    
                    <button type="submit" class="btn btn-primary">Sancionar</button>
                </form>
            </div>

        </div>


    </section>
   


<?php   
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>