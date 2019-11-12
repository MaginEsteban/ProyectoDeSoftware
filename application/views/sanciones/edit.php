<?php
    $this->load->view('dashboard/header');  
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Sanciones
            <small>Editar Sancion</small>
        </h1>

    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-6 mx-auto card">

                <form action="<?= base_url('sancion/modificarSancion'); ?>" method="POST" class="m-2">
                    

                        <input type="hidden" name="id_sancion" value= "<?php echo $sancion->id_sancion ?>"/>
                        
                        <input type="hidden" name="id_persona" value= "<?php echo $sancion->id_persona ?>"/>

                    <!-- Fecha -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fecha </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly="readonly"
                            placeholder="<?php echo $sancion->fecha ?>" name="fecha" value="<?php echo $sancion->fecha ?>">
                    </div>

                    <!-- Hora -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hora </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly="readonly"
                            placeholder="<?php echo $sancion->hora ?>" name="hora" value="<?php echo $sancion->hora ?>">
                    </div>

                     <!-- Descripcion -->
                     <div class="form-group">
                        <label for="exampleInputEmail1">Descripcion </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                            placeholder="<?php echo $sancion->descripcion ?>" name="descripcion" value="<?php echo $sancion->descripcion ?>" >
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