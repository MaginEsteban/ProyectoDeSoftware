<?php   
    $this->load->view('dashboard/header');  
?>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-10 mx-auto">
                <table class="table">
                    <thead class="">
                        <tr class="bg-info">
                            <th scope="col">Nro Comedor</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>
                                <a href="" role="button" class="btn btn-primary m-1">
                                    <i class="fa fa-pencil-square-o"></i> 
                                </a>

                                <a href="" role="button" class="btn btn-danger m-1">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>

            </div>

        </div>
    </section>
    </div>
<?php   
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>