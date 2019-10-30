<?php   
    $this->load->view('dashboard/header');  
?>
    <section class="content-header">
        <h1>
            Turnos
            <small>Lista Turnos </small>
        </h1>

    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-10 mx-auto">
            <table class="table table-striped"> Aqui se encuentran todos los turnos disponibles
                    <thead class="">
                        <tr class="bg-info">
                            <th scope="col">Nro Turno</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Hora inicio</th>
                            <th scope="col">Hora fin</th>
                            <th scope="col">Comedor</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($turnos as $turno): ?>
                        <tr>
                            <td scope="row"><?php echo $turno->id_turno; ?></td>
                            <td scope="row"><?php echo $turno->nombre; ?></td>
                            <td scope="row"><?php echo $turno->hora_inicio; ?></td>
                            <td scope="row"><?php echo $turno->hora_fin; ?></td>
                            <td scope="row"><?php echo $turno->nombre_comedor; ?></td>
                            <td>
                                <a href="<?= base_url('turno/edit/').$turno->id_turno; ?>" role="button" class="btn btn-primary m-1">
                                    <i class="fa fa-pencil-square-o"></i> 
                                </a>

                                <a onClick="confirmDelete()" role="button" class="btn btn-danger m-1">
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
    <script>
        function confirmDelete(){
        event.preventDefault();
            Swal.fire({
                title: 'Estas seguro?',
                text: "Usted esta a punto de eliminar este turno!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                    url: "http://localhost/proyectodesoftware/turno/delete/<?php echo $turno->id_turno ?>",
                    success: function() {
                        location.href = "http://localhost/proyectodesoftware/turno/listing";
                    }
                })
                }
            })
    }
    </script>
     
<?php   
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>