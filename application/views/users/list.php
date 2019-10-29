<?php   
    $this->load->view('dashboard/header');
?>
    <section class="content-header">
        <h1>
            Usuarios
            <small>Lista Usuarios </small>
        </h1>

    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col mx-auto">
                <table class="table table-striped"> Aqui se encuentran todos los usuarios disponibles
                    <thead class="">
                        <tr class="bg-info">
                            <th scope="col">Legajo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Tipo de Usuario</th>
                            <th scope="col">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td scope="row"><?php echo $usuario->numero_legajo; ?></th>
                            <td scope="row"><?php echo $usuario->nombre; ?></th>
                            <td scope="row"><?php echo $usuario->email; ?></th>
                            <td scope="row"><?php echo $usuario->tipo; ?></th>
                            <td>
                                <!-- modificar usuario -->
                                <a href="<?= base_url('user/edit/').$usuario->id_usuario; ?>" role="button" class="btn btn-primary m-1">
                                    <i class="fa fa-pencil-square-o"></i> 
                                </a>
                                <!-- eliminar usuario -->
                                <a href="<?= base_url('user/delete/').$usuario->id_usuario; ?>" role="button" class="btn btn-danger m-1">
                                    <i class="fa fa-remove"></i>
                                </a>
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