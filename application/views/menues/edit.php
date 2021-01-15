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

            <form action="<?= base_url('menu/modificarMenu'); ?>" method="POST" class="m-2">

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
                        <textarea class="form-control" id="exampleInputEmail1" rows="3" placeholder="Ingrese una descripcion..." name="descripcion"><?php echo $menu->descripcion; ?> </textarea>
                </div>
               

                <!-- Tipo De Menu -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Tipo De Menu</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="tiposdemenues">
                      
                        <?php foreach ($tiposdemenu as $tpm): ?>
                            <option 
                                value="<?php echo $tpm->id_tipo_menu; ?>"
                                <?php if ($tpm->id_tipo_menu == $menu->id_tipo_menu) echo "selected"; ?>>

                                    <?php echo $tpm->nombre; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Comedor -->
                <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="comedores" value="<?php echo $comedor->id_comedor; ?>">


                <button type="submit" class="btn btn-primary">Modificar</button>
            </form>

        </div>

    </div>


</section>


<?php   
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>