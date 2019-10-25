<?php   
    $this->load->view('dashboard/header',$user);  
?>
    <section class="content-header">
        <h1>
            Menues
            <small>Lista Menues</small>
        </h1>

    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-10 mx-auto">
                <table class="table table-striped"> Aqui se encuentran todos los menues disponibles
                    <thead class="">
                        <tr class="bg-info">
                            <th scope="col">Nro Menu</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Tipo de Menu</th>
                            <th scope="col">Comedor</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($menues as $menu): ?>
                        <tr>
                            <td scope="row"><?php echo $menu->id_menu; ?></th>
                            <td scope="row"><?php echo $menu->nombre; ?></th>
                            <td scope="row"><?php echo $menu->descripcion; ?></th>
                            <td scope="row"><?php echo $menu->nombre_tipo_menu; ?></th>
                            <td scope="row"><?php echo $menu->nombre_comedor; ?></th>
                            <td>
                                <a href="<?= base_url('menu/edit/').$menu->id_menu; ?>" role="button" class="btn btn-primary m-1">
                                    <i class="fa fa-pencil-square-o"></i> 
                                </a>

                                <a href="<?= base_url('menu/delete/').$menu->id_menu; ?>" role="button" class="btn btn-danger m-1">
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
    $this->load->view('dashboard/aside',$user);
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>