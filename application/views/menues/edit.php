<?php
    $this->load->view('dashboard/header');  
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Menues
        <small>Modificar Menu</small>
    </h1>

</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-10 col-md-6 mx-auto card">
            <?php echo validation_errors();?>

            <form method="POST" class="m-2" id="form">

                <!-- Identificador -->
                <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id"
                    value="<?php echo $menu->id_menu; ?>">

                <!-- Nombre -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="" name="nombre" value="<?php echo $menu->nombre; ?>">
                </div>

                <!-- Descripcion -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Descripcion </label>
                    <textarea class="form-control" id="exampleInputEmail1" rows="3"
                        placeholder="Ingrese una descripcion..."
                        name="descripcion"><?php echo $menu->descripcion; ?> </textarea>
                </div>

                <!-- Precio nuevo-->
                <div class="form-group">
                    <label for="exampleInputEmail1">Precio $ </label>

                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Ingrese el precio del menu..." name="precio_new"
                        value="<?php echo $menu->precio; ?>">

                </div>

                <!-- Precio viejo-->
                <div class="form-group">
                    <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Ingrese el precio del menu..." name="precio_old"
                        value="<?php echo $menu->precio; ?>">

                </div>

                <!-- Tipo De Menu -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Tipo De Menu</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="tiposdemenues">

                        <?php foreach ($tiposdemenu as $tpm): ?>
                        <option value="<?php echo $tpm->id_tipo_menu; ?>"
                            <?php if ($tpm->id_tipo_menu == $menu->id_tipo_menu) echo "selected"; ?>>

                            <?php echo $tpm->nombre; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Comedor -->
                <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="comedores" value="<?php echo $comedor->id_comedor; ?>">

                    <a onClick="confirmUpdate()" role="button" class="btn btn-primary" >Modificar </a>                      
                                
                <!-- <button type="submit" class="btn btn-primary" onClick="confirmUpdate()">Modificar</button> -->
            </form>

        </div>

    </div>


</section>
<script>
    function confirmUpdate() {
        
        event.preventDefault();

        Swal.fire({
            title: '¿Estas seguro?',
            text: "Usted esta a punto de actualizar este menu!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, actualizar!',
            cancelButtonText: 'Cancelar'
        })
        .then((result) => {
            if (result.value) {
                console.log('ok...')
            
                $.ajax({
                    type:'POST',
                    data: $( "#form" ).serialize(),
                    url: "<?= base_url('menu/modificarMenu'); ?>",
                    success: function() {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )

                        location.href = "<?= base_url('menu/listing'); ?>";
                    },
                   error: function( jqXHR, textStatus, errorThrown ) {
                        console.log(textStatus);
                    }
                })
                
            } 
            else if (    result.dismiss === Swal.DismissReason.cancel    ) {    
            
                Swal.fire(
                    'Cancelado',
                    'No se actualizo nada :)',
                    'Advertencia'
                )
            }
        });
    }
</script>

<?php   
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>