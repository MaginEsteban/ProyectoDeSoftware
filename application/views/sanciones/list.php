<?php   
    $this->load->view('dashboard/header');  
    $user = $this->session->userdata('user')
?>
    <!-- Main content -->

    <section class="content-header">
        <h1>
            Sanciones
            <small>Lista Sanciones</small>
        </h1>

    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col mx-auto table-responsive-xl">
                <table class="table table-striped" id="myTable"> Aqui se encuentran todos las sanciones hechas
                    <thead class="">
                        <tr class="bg-info">
                            <th scope="col">Nro Sancion</th>
                            <th scope="col" style="width:100px">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Nombre persona</th>
                            <th scope="col">Apellido persona</th>
                            <?php if($user->id_tipo_usuario == 3): ?>
                                <th scope="col" style="width:150px">Acciones</th>
                            <?php endif; ?>    
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($sanciones as $sancion): ?>
                        <tr>
                            <td scope="row"><?php echo $sancion->id_sancion; ?></th>
                            <td scope="row"><?php echo $sancion->fecha; ?></th>
                            <td scope="row"><?php echo $sancion->hora; ?></th>
                            <td scope="row"><?php echo $sancion->descripcion; ?></th>
                            <td scope="row"><?php echo $sancion->nombre; ?></th>
                            <td scope="row"><?php echo $sancion->apellido; ?></th>
                            <?php if($user->id_tipo_usuario == 3): ?>
                            <td scope="row">
                                <!-- modificar sancion -->
                                <a href="<?= base_url('sancion/edit/') . $sancion->id_sancion; ?>" role="button" class="btn btn-primary m-1">
                                    <i class="fa fa-pencil-square-o"></i> 
                                </a>
                                <a onClick="confirmDelete(<?= $sancion->id_sancion; ?>)" role="button" class="btn btn-danger m-1">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                            <?php endif; ?>  
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

        </div>
    </section>
    <script>
        function confirmDelete(sancion){
        event.preventDefault();
            Swal.fire({
                title: 'Estas seguro?',
                text: "Usted esta a punto de eliminar esta sancion!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                    url: "<?= base_url('/sancion/delete/'); ?>"+sancion,
                    success: function() {
                        location.href = "<?= base_url('/sancion/listing'); ?>";
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