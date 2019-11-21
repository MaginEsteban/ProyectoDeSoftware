<?php  
$this->load->view('dashboard/header');      
?>
<section class="content-header">
    <h3>
        Bienvenido <?php echo $user->nombre; ?> <br>
        <small>Usted es <?php echo $user->tipo; ?></small>
    </h3>
</section>
<?php if ($user->id_tipo_usuario == 1): ?>
<section class="content container-fluid">
    <h6>Aqui se mostrarán algunos datos de su usuario:</h6>
    <div class="row p-3">
        <?php foreach ($comedores as $comedor): ?>
        <div class="card p-3 ">
            <h6><b><?=$comedor->nombre_comedor?></b></h6>
            <small>Ubicado en: <b><?= $comedor->nombre ?></b> </small>
            <small>Foto del comedor o campus: <br><br><img class="row mx-auto" src="<?= $comedor->imagen ?>"
                    style="width: 250px;"></small> <br>
            <a href="<?= base_url("detalle_comedores")?>" type="button" class="btn btn-dark">Ver Programacion</a>
        </div>
        <?php endforeach; ?>
        <div class="card p-3 ">
            <h5><b>Tus Sanciones:</b></h5>
            <table class="table table-striped" id="myTable">
                <thead class="">
                    <tr class="bg-info">
                        <th scope="col" style="width:100px">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sanciones as $sancion): ?>
                    <tr>
                        <td scope="row"><?php echo $sancion->fecha; ?></th>
                        <td scope="row"><?php echo $sancion->hora; ?></th>
                        <td scope="row"><?php echo $sancion->descripcion; ?></th>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="<?= base_url("sancion/listing")?>" type="button" class="btn btn-dark">Ver Detalles</a>
        </div>
    </div>
    <div class="card p-3 ">
        <h5><b>Tus tickets:</b></h5>
        <table class="table table-striped" id="myTable2">
            <thead class="">
                <tr class="bg-info">
                    <th scope="col">Estado de Pago</th>
                    <th scope="col">Estado de Ticket</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Fecha de Retiro</th>
                    <th scope="col">Turno</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($tickets as $ticket): ?>
                <tr>
                    <td scope="row"><?php if($ticket->id_estado_pago == 1){echo "PENDIENTE DE PAGO";}else{echo "PAGADO";} ?></th>
                    <td scope="row"><?php echo $ticket->nombre_estado; ?></th>
                    <td scope="row"><?php echo $ticket->nombre_menu; ?></th>
                    <td scope="row"><?php echo $ticket->fecha_retiro_ticket; ?></th>
                    <td scope="row"><?php echo $ticket->nombre_turno; ?></th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= base_url("ticket/listing_client")?>" type="button" class="btn btn-dark">Ver Detalles</a>
    </div>

</section>
<?php endif; ?>

<?php if ($user->id_tipo_usuario == 3): ?>
<section class="content container-fluid">
    <h4>El comedor que usted administra es:</h4>
    <div class="row p-3">
        <div class="card p-3 mx-auto">
            <h4><b><?=$comedor->nombre_comedor?></b></h4>
            <small>Ubicado en: <b><?= $comedor->nombre ?></b> </small>
            <small>Foto del comedor o campus: <br><img src="<?= $comedor->imagen ?>" style="width: 600px;"></small> <br>
            <a href="<?= base_url("detalle_comedores")?>" type="button" class="btn btn-dark">Ver Programacion</a>
        </div>
    </div>

</section>
<?php endif; ?>

<!-- </div> Cierra un tag abierto en el header -->
</div>
<script>
$(document).ready(function() {
    $('#myTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });
    $('#myTable2').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });
});
</script>

<?php
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/footer');
?>