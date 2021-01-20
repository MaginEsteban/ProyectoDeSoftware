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
        <div class="col mx-auto">
            <table class="table table-striped" id="myTable"> Aqui se encuentran todos los turnos disponibles
                <thead class="">
                    <tr class="bg-info">
                        <th scope="col">Nro Turno</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Hora inicio</th>
                        <th scope="col">Hora fin</th>
                        <th scope="col">Comedor</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($turnos as $turno): ?>

                    <tr id="turno-<?php echo $turno->id_turno; ?>">
                        <td scope="row"><?php echo $turno->id_turno; ?></td>
                        <td scope="row"><?php echo $turno->nombre; ?></td>
                        <td scope="row"><?php echo $turno->hora_inicio; ?></td>
                        <td scope="row"><?php echo $turno->hora_fin; ?></td>
                        <td scope="row"><?php echo $turno->nombre_comedor; ?></td>
                        <td scope="row"><?php echo $turno->nombre_ciudad; ?></td>
                        <td>
                            <a href="<?= base_url('turno/edit/').$turno->id_turno; ?>" role="button"
                                class="btn btn-primary m-1">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>

                            <a onClick="confirmDelete(<?php echo $turno->id_turno; ?>)" role="button"
                                class="btn btn-danger m-1">
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
function confirmDelete(turno) {

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
                url: "<?= base_url('turno/delete/') . $turno->id_turno ; ?>",
                success: function() {


                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        type: 'success',
                        title: 'Turno eliminado...'
                    })

                    $("#turno-" + turno).fadeOut(1000);
                }
            })
        }
    })
}
</script>
<script>
$(document).ready(function() {
    $('#myTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });
});
</script>

<?php   
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>