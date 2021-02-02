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
            <table class="table table-striped" id="myTable"> Aqui se encuentran todos los comedores disponibles
                <thead class="">
                    <tr class="bg-info">
                        <!-- <th scope="col">Nro Comedor</th> -->
                        <th scope="col">Nombre</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Sede</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($comedores as $comedor): ?>
                    <tr id="comedor-<?php echo $comedor->id_comedor; ?>">
                        <!-- <td scope="row"><?php echo $comedor->id_comedor; ?></th> -->
                        <td scope="row"><?php echo $comedor->nombre_comedor; ?></th>
                        <td scope="row"><?php echo $comedor->nombre_ciudad; ?></th>
                        <td scope="row"><?php echo $comedor->sede; ?></th>
                        <td scope="row"><?php echo $comedor->direccion; ?></th>
                        <td scope="row">
                            <!-- modificar comedor -->
                            <a href="<?= base_url('comedor/edit/').$comedor->id_comedor; ?>" role="button"
                                class="btn btn-primary m-1">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                            <!-- eliminar comedor -->
                            <a onClick="confirmDelete(<?php echo $comedor->id_comedor; ?>)" role="button"
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
function confirmDelete(comedor) {
    // href=  base_url('comedor/delete/')"

    event.preventDefault();
    Swal.fire({
        title: 'Estas seguro?',
        text: "Usted esta a punto de eliminar este comedor!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url('comedor/delete/')?>" + comedor,
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
                        title: 'Comedor eliminado...'
                    })

                    $("#comedor-" + comedor).fadeOut(1000);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('jqXHR:' + jqXHR.responseText);
                    console.log('textStatus:' + textStatus);
                    console.log('errorThrown:' + errorThrown);

                }

            })
        }
    })
}


$(document).ready(function() {

    $('#myTable').DataTable({
        "columnDefs": [{
            "className": "dt-center",
            "targets": "_all"
        }],
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