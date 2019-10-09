<?php   
    $this->load->view('dashboard/header');
    $this->load->database();  
?>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-10 mx-auto">
                <table class="table">
                    <thead class="">
                        <tr class="bg-info">
                            <th scope="col">Nro Legajo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Email</th>
                            <th scope="col">Acciones</th>

                        </tr>
                    </thead>

                    <?php foreach ($this->('SELECT p.id_persona , p.numero_legajo ,p.nombre, p.apellido, u.nombre, u.email
                    FROM persona p JOIN usuario u ON u.id_persona = p.id_persona') as $row){?> 
                    <tr>
	                    <td><?php echo $row['numero_legajo']?></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['apellido'] ?></td>
                        <td><?php echo $row['nombre_usuario'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                        <td>
                                <a href="" role="button" class="btn btn-primary m-1">
                                    <i class="fa fa-pencil-square-o"></i> 
                                </a>

                                <a href="" role="button" class="btn btn-danger m-1">
                                    <i class="fa fa-remove"></i>
                                </a>
                        </td>
                </table>

            </div>

        </div>
    </section>
<?php   
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>