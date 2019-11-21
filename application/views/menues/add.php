<?php
    $this->load->view('dashboard/header');  
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Menues
            <small>Agregar Menu</small>
        </h1>

    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-6 mx-auto card">

                <form action="<?= base_url('menu/crearMenu'); ?>" method="POST" class="m-2">
                    <!-- Nombre -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Ingrese el nombre del menu..." name="nombre">
                        
                    </div>

                    <!-- Descripcion -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Descripcion </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Ingrese la Descripcion del Menu..." name="descripcion">
                        
                    </div>

                    <!-- Tipo De Menu -->
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo De Menu</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="tiposdemenues">
                        <option value="0">...</option>
                            <?php foreach ($tiposdemenu as $tpm): ?>
                            <option value="<?php echo $tpm->id_tipo_menu; ?>"><?php echo $tpm->nombre_tipo_menu; ?></option> 
                            <?php endforeach; ?>
                        </select>
                    </div>

                        <!-- Comedor -->
                      <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="comedores" value="<?php echo $comedor->id_comedor; ?>">


                    
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