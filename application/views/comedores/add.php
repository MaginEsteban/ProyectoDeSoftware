<?php   
    $this->load->view('dashboard/header');  
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Comedores
            <small>Agregar Comedor</small>
        </h1>

    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-6 mx-auto card">

                <form action="<?= base_url('comedor/add'); ?>" method="POST" class="m-2">
                    <!-- Nombre -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Ingrese el nombre del comedor..." name="nombre">
                        
                    </div>

                    <!-- Ciudad -->
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Ciudad</label>
                       
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php foreach ($cuidades as $cuidad): ?>
                    <?php echo $cuidad->nombre; ?>
                <?php endforeach; ?>
            </div>

        </div>


    </section>

    </div>

<?php   
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>