<?php   
    $this->load->view('dashboard/header');  

    $mysqli = new mysqli("localhost","root","","sistema_ticket"); 
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}

    $query = "SELECT * FROM ciudad";
	$resultado=$mysqli->query($query);
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Comedores
            <small>Agregar Comedor</small>
        </h1>

    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-6 mx-auto card">

                <form action="<?= base_url('comedores/add'); ?>" method="POST" class="m-2">
                    <!-- Nombre -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Ingrese el nombre de la ciudad..." name="nombre">
                        
                    </div>

                    <!-- Ciudad -->
                    <div>Selecciona Ciudad: <select name="cbx_ciudad" id="cbx_ciudad">
				        <option value="0">Seleccionar Ciudad</option>
				        <?php while($row = $resultado->fetch_assoc()) { ?>
					    <option value="<?php echo $row['id_ciudad']; ?>"><?php echo $row['ciudad']; ?></option>
				        <?php } ?>
			        </select></div>
                   
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