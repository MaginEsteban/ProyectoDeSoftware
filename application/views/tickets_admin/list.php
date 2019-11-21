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
            <div class="col mx-auto">
                <table class="table table-striped" id="myTable"> Aqui se encuentran todos los tickets                   
                <thead class="">
                        <tr class="bg-info">
                            <th scope="col">Codigo</th>
                            <th scope="col">Estado de Pago</th>
                            <th scope="col">Estado de Ticket</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Fecha de Retiro</th>
                            <th scope="col">Turno</th>
                            <th scope="col">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tickets as $ticket): ?>
                        <tr>
                            <td scope="row"><?php echo $ticket->codigo; ?></td>
                            <td scope="row"><?php if($ticket->id_estado_pago == 1){echo "PENDIENTE DE PAGO";}else{echo "PAGADO";} ?></th>
                            <td scope="row"><?php echo $ticket->nombre_estado; ?></td>
                            <td scope="row"><?php echo $ticket->nombre_menu; ?></td>
                            <td scope="row"><?php echo $ticket->fecha_retiro_ticket; ?></td>
                            <td scope="row"><?php echo $ticket->nombre_turno; ?></td>
                            <td>
                            <?php if($ticket->nombre_estado != "CANCELADO" && $ticket->nombre_estado != "ENTREGADO"){ ?>
                                <!-- cambiar estado ticket -->
                                <a href="<?= base_url('ticket/change/').$ticket->id_ticket; ?>" data-toggle="tooltip" title="Cambiar Estado Ticket " role="button" class="btn btn-primary m-1">
                                    <i class="fa fa-share"></i>
                                </a>
                            
                            <?php if($ticket->nombre_estado != "CANCELADO" && $ticket->nombre_estado != "ENTREGADO" && !isset($ticket->fecha_fin)){ ?>
                                <!-- eliminar ticket -->
                                <a href="<?= base_url('ticket/delete/').$ticket->id_ticket; ?>" data-toggle="tooltip" title="Cancelar Ticket" role="button" class="btn btn-danger m-1">
                                    <i class="fa fa-times"></i>
                                </a>
                            <?php } ?>
                            <!-- cobrar ticket -->
                            <a href="<?= base_url('ticket/cobrar_ticket/').$ticket->id_ticket; ?>" data-toggle="tooltip" title="Cobrar ticket " role="button" class="btn btn-primary m-1">
                                    <i class="fa fa-usd"></i>
                                </a>                            
                            <?php } ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                   </tbody>
                </table>

            </div>

        </div>
    </section>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        } );
    </script>
<?php   
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>