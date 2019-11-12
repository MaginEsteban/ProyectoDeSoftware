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
                <table class="table table-striped" id="myTable"> Aqui se encuentran todos los usuarios disponibles 
                    <thead>
                        <tr class="bg-info">
                            <th scope="col">Legajo</th>
                            <th scope="col">Nombre de Usuario</th>
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
                                <a href="<?= base_url('user/edit/').$usuario->id_usuario; ?>" data-toggle="tooltip" title="Modificar Usuario" role="button" class="btn btn-primary m-1">
                                    <i class="fa fa-pencil-square-o"></i> 
                                </a>
                                <!-- eliminar usuario -->
                                <a onClick="confirmDelete()" data-toggle="tooltip" title="Eliminar Usuario" role="button" class="btn btn-danger m-1">
                                    <i class="fa fa-remove"></i>
                                </a>
                                <!-- Sancionar usuario -->
                                <a href="<?= base_url('sancion/add/').$usuario->id_usuario; ?>" data-toggle="tooltip" title="Sancionar Usuario" role="button" class="btn btn-primary m-1">
                                    <i class="fa fa-exclamation-circle"></i> 
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                   </tbody>
                </table>

            </div>

        </div>
    </section>
    <script>
        function confirmDelete(){
        event.preventDefault();
            Swal.fire({
                title: 'Estas seguro?',
                text: "Usted esta a punto de eliminar este usuario!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                    url: "http://localhost/proyectodesoftware/user/delete/<?php echo $usuario->id_usuario ?>",
                    success: function() {
                        location.href = "http://localhost/proyectodesoftware/user/listing";
                    }
                })
                }
            })
    }
    </script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        } );
    </script>
    
<?php   
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>