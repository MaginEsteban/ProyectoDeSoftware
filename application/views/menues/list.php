<?php   
    $this->load->view('dashboard/header');  
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
        <div class="col mx-auto table-responsive-xl">
            <table class="table table-striped" id="myTable"> Aqui se encuentran todos los menues disponibles
                <thead class="">
                    <tr class="bg-info">
                        <th scope="col">Nro Menu</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Tipo de Menu</th>

                        <th scope="col" width="100px">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menues as $menu): ?>
                    <tr>
                        <td scope="row"><?php echo $menu->id_menu; ?></th>
                        <td scope="row"><?php echo $menu->nombre; ?></th>
                        <td scope="row"><?php echo $menu->descripcion; ?></th>
                        <td scope="row"><?php echo $menu->precio; ?></th>
                        <td scope="row"><?php echo $menu->nombre_tipo_menu; ?></th>

                        <td>
                            <a href="<?= base_url('menu/edit/').$menu->id_menu; ?>" role="button"
                                class="btn btn-primary" data-toggle="tooltip" title="Actualizar">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                            <a onClick="confirmDelete()" role="button" class="btn btn-danger" data-toggle="tooltip"
                                title="Borrar">
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
function confirmDelete() {
    event.preventDefault();
    Swal.fire({
        title: 'Estas seguro?',
        text: "Usted esta a punto de eliminar este menu!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?=base_url('/menu/delete/' . $menu->id_menu);?>",
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
                        title: 'Menu eliminado...'
                    })

                    location.href = "<?= base_url('/menu/listing'); ?>";
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