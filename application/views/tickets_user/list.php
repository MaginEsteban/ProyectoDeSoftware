<?php   
    $this->load->view('dashboard/header');
?>
    <section class="content-header">
        <h1>
            Tickets
            <small>Lista de Tickets </small>
        </h1>

    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-10 mx-auto">
                <table class="table table-striped"> Aqui se encuentran todos sus tickets                    <thead class="">
                        <tr class="bg-info">
                            <th scope="col">Codigo</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($tickets as $ticket): ?>
                        <tr>
                            <td scope="row"><?php echo $ticket->codigo; ?></th>
                            <td scope="row"><?php if($ticket->id_estado_pago == 1){echo "PENDIENTE DE PAGO";}else{echo "PAGADO";} ?></th>
                            <td scope="row"><?php echo $ticket->nombre; ?></th>
                            <td>
                                <!-- modificar ticket -->
                                <a href="<?= base_url('ticket/edit/').$ticket->id_ticket; ?>" role="button" class="btn btn-primary m-1">
                                    <i class="fa fa-pencil-square-o"></i> 
                                </a>
                                <!-- eliminar ticket -->
                                <a href="<?= base_url('ticket/delete/').$ticket->id_ticket; ?>" role="button" class="btn btn-danger m-1">
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
<?php   
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>