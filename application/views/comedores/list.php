<?php   
    $this->load->view('dashboard/header');  
?>
    <!-- Main content -->

    <section class="content-header">
        <h1>
            Comedores
            <small>Lista Comedores</small>
        </h1>

    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-10 mx-auto">
                <table class="table table-striped"> Aqui se encuentran todos los comedores disponibles
                    <thead class="">
                        <tr class="bg-info">
                            <th scope="col">Nro Comedor</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($comedores as $comedor): ?>
                        <tr>
                            <td scope="row"><?php echo $comedor->id_comedor; ?></th>
                            <td scope="row"><?php echo $comedor->nombre_comedor; ?></th>
                            <td scope="row"><?php echo $comedor->nombre; ?></th>
                            <td>
                                <!-- modificar comedor -->
                                <a href="<?= base_url('comedor/edit/').$comedor->id_comedor; ?>" role="button" class="btn btn-primary m-1">
                                    <i class="fa fa-pencil-square-o"></i> 
                                </a>
                                <!-- eliminar comedor -->
                                <!-- <a href="<?= base_url('comedor/delete/').$comedor->id_comedor; ?>" role="button" class="btn btn-danger m-1">
                                    <i class="fa fa-remove"></i>
                                </a> -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

        </div>
    </section>
<?php   
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>