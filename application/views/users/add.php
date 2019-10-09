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
        <div class="row">
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
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>USUARIO</option>
                            <option>ADMINISTRADOR DE COMEDORES</option>
                        </select>
                    </div>
                   <!--Aca utilizar json para hacer la peticion en caso 
                   de seleccionar ADMINISTRADOR DE COMEDORES
                   -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>


    </section>

    </div>
<?php   
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>