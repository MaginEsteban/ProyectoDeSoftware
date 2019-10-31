<?php  $this->load->view('dashboard/header');      ?>
<style>
i {
    color: white;
}

.name-turno {
    color: white;
    font-size: 18px;
}

.modal-backdrop {
    opacity: 0.3 !important;
}

.menu {
    margin: -1px -3px 5px -3px;
    padding: 1px;
    -webkit-box-shadow: 0px 0px 6px -1px rgba(0,0,0,0.67);
-moz-box-shadow: 0px 0px 6px -1px rgba(0,0,0,0.67);
box-shadow: 0px 0px 6px -1px rgba(0,0,0,0.67);
}

</style>


<section class="content-header">
    <h1> </h1>
</section>
<!-- Cuadro de informacion de tickets -->
<div class="row p-2">
    <div class="col-lg-3 col-xs-3 mx-auto">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-3  mx-auto">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-3 mx-auto">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- ./col -->

    <div class="col-lg-3 col-xs-3 mx-auto">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>



<!-- Cuadro de programacion -->
<div class="row m-3">
    <table class="table table-bordered">
        <tr>
            <th scope="col" class="bg-maroon">Turno</th>
            <th scope="col" class="bg-maroon">Lunes</th>
            <th scope="col" class="bg-maroon">Martes</th>
            <th scope="col" class="bg-maroon">Miercoles</th>
            <th scope="col" class="bg-maroon">Jueves</th>
            <th scope="col" class="bg-maroon">Viernes</th>
            <th scope="col" class="bg-maroon">Sabado</th>

        </tr>

        <!-- Datos -->
       
       <!-- Recorre todo los turnos -->
       <?php foreach($turnos as $turno ): ?> 
        <tr>
           
           <!-- Turno -->
            <td class="bg-info" id="turno">
                <p class="h4 text-center text-white text-capitalize"><?= $turno->nombre; ?> </p>
                <a href="" role="button" class="btn rounded-circle bg-secondary">
                    <i class="fa fa-plus m-auto" onclick="agregarMenu(<?= $comedor->id_comedor;  ?>,<?= $turno->id_turno;  ?>)" aria-hidden="true"></i>
                </a>
            </td>
            
            <!-- Lunes -->
            <td id="turno_<?= $turno->id_turno;?>_dia_1">
            </td>
            
            <!-- Martes -->
            <td id="turno_<?= $turno->id_turno;?>_dia_2">
            </td>
            
            <!-- Miercoles -->
            <td id="turno_<?= $turno->id_turno;?>_dia_3">  
            </td>
            
            <!-- Jueves -->
            <td id="turno_<?= $turno->id_turno;?>_dia_4">
            </td>
            
            <!-- Viernes -->
            <td id="turno_<?= $turno->id_turno;?>_dia_5">  
            </td>

            <!-- Sabado -->
            <td id="turno_<?= $turno->id_turno;?>_dia_6">  
            </td>
            
        </tr>
        <?php endforeach; ?>
    </table>

</div>
</div>

<div class="spinner-grow text-danger" role="status" id="loading">
  <span class="sr-only">Loading...</span>
</div>


<script>
    var idComedor = <?= $comedor->id_comedor;?>;

    $(document).ready( function() {
        // llamar a la funcion para actualizar la table
         actualizarDashboard(idComedor);
    });
</script>
<?php
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/footer');
?>