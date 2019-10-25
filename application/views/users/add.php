<?php   
    $this->load->view('dashboard/header');  
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Usuario
            <small>Agregar Usuario</small>
        </h1>

    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row align-items-center">
            <div class="col-6 mx-auto card">
                <form action="<?= base_url('user/store'); ?>" method="POST" class="m-2">
                    <!-- Legajo -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Legajo </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Ingrese el legajo..." name="legajo">
                        
                    </div>
                    
                    <!-- Email -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email </label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Ingrese el email..." name="email">  
                    </div>

                    <!-- Select tipo usuario -->
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de usuario</label>
                        <select class="form-control" id="selectTypeUser" name="tipos"  required>
                            <option value="0">Seleccione un tipo de usuario </option>
                            <option value="1">USUARIO</option>
                            <option value="3">ADMINISTRADOR DE COMEDORES</option>
                        </select>   
                    </div>
                    <!-- Select comedor-->
                    <div class="form-group" id="comedores_list">
                        <label for="comedores_list">Comedor </label>
                        <select class="form-control"   name="comedores" required>
                            <option value="0">Seleccione un comedor </option>
                            <?php foreach ($comedores as $comedor): ?>
                            <option value="<?php echo $comedor->id_comedor;?>"><?php echo $comedor->nombre_comedor;?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                         <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>


    </section>

<?php   
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>