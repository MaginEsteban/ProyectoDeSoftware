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
                    <!-- Nombre -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Ingrese su nombre..." name="nombre">
                        
                    </div>

                    <!-- Apellido -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Apellido </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Ingrese su apellido...">
                       
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email </label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Ingrese su email...">  
                    </div>

                    
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Rol en la Universidad</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>NO-DOCENTE</option>
                            <option>DOCENTE</option>
                            <option>ESTUDIANTE</option>
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