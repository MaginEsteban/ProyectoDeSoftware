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
        <tr>
            <td class="bg-olive">
                <p class="h4 text-center text-white">Desayuno</p>
                <a href="" role="button" data-toggle="tooltip" data-placement="right" title="Tooltip on right"
                    class="btn mt-4 mb-n2 btn-app bg-purple">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    <p class="text-white">Agregar Menu</p>
                </a>



            </td>
            <td class="">
                <div class="row m-1 shadow-lg">

                    <!-- Informacion de menu -->
                    <div class="col-9">
                        Menu 2
                    </div>

                    <!-- acciones del menu -->
                    <div class="col-3">
                        <button type="button" class="btn m-n1" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-times text-danger" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

                <div class="row m-1 shadow-lg">

                    <!-- Informacion de menu -->
                    <div class="col-9">
                        Menu 2
                    </div>

                    <!-- acciones del menu -->
                    <div class="col-3">
                        <button type="button" class="btn m-n1" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-times text-danger" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

            </td>
            <td class="">
            
              
                <div class="row m-1 shadow-lg">

                    <!-- Informacion de menu -->
                    <div class="col-9">
                        Menu 2
                    </div>

                    <!-- acciones del menu -->
                    <div class="col-3">
                        <button type="button" class="btn m-n1" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-times text-danger" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

            </td>
            <td class="">
                <div class="row m-1 shadow-lg">

                    <!-- Informacion de menu -->
                    <div class="col-9">
                        Menu 2
                    </div>

                    <!-- acciones del menu -->
                    <div class="col-3">
                        <button type="button" class="btn m-n1" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-times text-danger" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

                <div class="row m-1 shadow-lg">

                    <!-- Informacion de menu -->
                    <div class="col-9">
                        Menu 2
                    </div>

                    <!-- acciones del menu -->
                    <div class="col-3">
                        <button type="button" class="btn m-n1" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-times text-danger" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

            </td>
            <td class="">
                <div class="row m-1 shadow-lg">

                    <!-- Informacion de menu -->
                    <div class="col-9">
                        Menu 2
                    </div>

                    <!-- acciones del menu -->
                    <div class="col-3">
                        <button type="button" class="btn m-n1" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-times text-danger" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

                <div class="row m-1 shadow-lg">

                    <!-- Informacion de menu -->
                    <div class="col-9">
                        Menu 2
                    </div>

                    <!-- acciones del menu -->
                    <div class="col-3">
                        <button type="button" class="btn m-n1" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-times text-danger" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

            </td>
            <td class="">
                <div class="row m-1 shadow-lg">

                    <!-- Informacion de menu -->
                    <div class="col-9">
                        Menu 2
                    </div>

                    <!-- acciones del menu -->
                    <div class="col-3">
                        <button type="button" class="btn m-n1" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-times text-danger" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

                <div class="row m-1 shadow-lg">

                    <!-- Informacion de menu -->
                    <div class="col-9">
                        Menu 2
                    </div>

                    <!-- acciones del menu -->
                    <div class="col-3">
                        <button type="button" class="btn m-n1" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-times text-danger" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

            </td>
            <td class="">
                <div class="row m-1 shadow-lg">

                    <!-- Informacion de menu -->
                    <div class="col-9">
                        Menu 2
                    </div>

                    <!-- acciones del menu -->
                    <div class="col-3">
                        <button type="button" class="btn m-n1" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-times text-danger" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

                <div class="row m-1 shadow-lg">

                    <!-- Informacion de menu -->
                    <div class="col-9">
                        Menu 2
                    </div>

                    <!-- acciones del menu -->
                    <div class="col-3">
                        <button type="button" class="btn m-n1" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-times text-danger" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

            </td>
        </tr>
    </table>

</div>


<!-- Modal Para Eliminar un Menu -->
<div class="modal " tabindex="-1" role="dialog" id="modal_delete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¡¡ Estas seguro de sacar ese menu del turno !!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    Si
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fa fa-reply-all" aria-hidden="true"></i>
                    No
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Modal agregar Menu -->
<div class="modal " id="modal_add_menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>

                    <!-- Dia de los turnos -->
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Dia</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Lunes</option>
                            <option>Martes</option>
                            <option>Jueves</option>
                            <option>viernes</option>
                            <option>Sabado</option>
                        </select>
                    </div>

                    <!-- Todo los menus -->
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Menu</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Hamburguesa</option>
                        </select>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Agregar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


<!-- </div> Cierra un tag abierto en el header -->
</div>
<?php
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/footer');
?>