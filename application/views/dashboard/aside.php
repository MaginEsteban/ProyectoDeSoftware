<?php $user = $this->session->userdata('user');?>

</div> <!-- cierro el div abierto en el header-->

<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel" style="padding-bottom: 20px;">
            <div class="pull-left image">
                <img src="<?= base_url("recursos")?>/img/circle-512.png" class="img-circle" alt="User Image"></img>
            </div>
            <div class="pull-left info">
                <p><?php echo $user->nombre; ?></p>

                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">ACCIONES DISPONIBLES</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="treeview">
                    <?php if ($user->id_tipo_usuario == 4 || $user->id_tipo_usuario == 3) : ?>
                    <a href="#"><i class="fa fa-user-circle-o"></i> <span>Usuarios</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a class="user-menu" href="<?= base_url("user/add"); ?>"><i
                                    class="fa fa-plus"></i> <span>Agregar Usuario</span></a></li>
                        <li class="active"><a class="user-menu" href="<?= base_url("user/listing"); ?>"><i
                                    class="fa fa-list-ul"></i> <span>Listado Usuarios</span></a></li>
                    </ul>
                    <?php endif; ?>

                    <?php if ($user->id_tipo_usuario == 4 ) : ?>
                    <a href="#"><i class="fa fa-home"></i> <span>Comedores</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a class="user-menu" href="<?= base_url("comedor/add"); ?>"><i
                                    class="fa fa-plus"></i> <span>Agregar Comedor</span></a></li>
                        <li class="active"><a class="user-menu" href="<?= base_url("comedor/listing"); ?>"><i
                                    class="fa fa-list-ul"></i> <span>Listado Comedores</span></a></li>
                    </ul>
                    <?php endif; ?>

                    <?php if ($user->id_tipo_usuario == 3) : ?>
                    <a href="#"><i class="fa fa-cutlery"></i> <span>Menues</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <li class="active"><a class="user-menu" href="<?= base_url("menu/add"); ?>"><i
                                    class="fa fa-plus"></i> <span>Agregar Menu</span></a></li>

                        <li class="active"><a class="user-menu" href="<?= base_url("menu/listing"); ?>"><i
                                    class="fa fa-list-ul"></i> <span>Listado Menues</span></a></li>
                    </ul>
                    <?php endif; ?>

                    <?php if ($user->id_tipo_usuario == 4 || $user->id_tipo_usuario == 3) : ?>
                    <a href="#"><i class="fa fa-calendar"></i> <span>Turnos</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <li class="active"><a class="user-menu" href="<?= base_url("turno/add"); ?>"><i
                                    class="fa fa-plus"></i> <span>Agregar Turno</span></a></li>

                        <li class="active"><a class="user-menu" href="<?= base_url("turno/listing"); ?>"><i
                                    class="fa fa-list-ul"></i> <span>Listado Turnos</span></a></li>
                    </ul>
                    <?php endif; ?>


                    <!--Tickets Cliente-->
                    <?php if ($user->id_tipo_usuario == 1 ) : ?>

                    <a href="#"><i class="fa fa-ticket"></i> <span>Tickets</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a class="user-menu" href="<?= base_url("detalle_comedores/"); ?>"><i
                                    class="fa fa-plus"></i> <span>Comprar Ticket</span></a></li>
                        <li class="active"><a class="user-menu" href="<?= base_url("ticket/listing_client"); ?>"><i
                                    class="fa fa-list-ul"></i> <span>Mis Tickets</span></a></li>
                    </ul>
                    <?php endif; ?>


                    <?php if ($user->id_tipo_usuario == 3 ) : ?>
                    <a href="#"><i class="fa fa-ticket"></i> <span>Tickets</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a class="user-menu" href="<?= base_url("ticket/listing_admin"); ?>"><i
                                    class="fa fa-list-ul"></i> <span>Listado Tickets</span></a></li>
                    </ul>
                    <?php endif; ?>

                    <a href="#"><i class="fa fa-exclamation-triangle"></i> <span>Sanciones</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if ($user->id_tipo_usuario == 3 || $user->id_tipo_usuario == 4 ) : ?>
                        <li class="active"><a class="user-menu" href="<?= base_url("sancion/listing"); ?>"><i
                                    class="fa fa-list-ul"></i> <span>Listado Sanciones</span></a></li>
                        <?php endif; ?>
                        <?php if ($user->id_tipo_usuario == 1) : ?>
                        <li class="active"><a class="user-menu" href="<?= base_url("sancion/listing_client"); ?>"><i
                                    class="fa fa-list-ul"></i> <span>Mis Sanciones</span></a></li>
                        <?php endif; ?>
                    </ul>


                </li>
                <li><a href="<?= base_url('user/restore_password');?>"><i class="fa fa-key"></i> <span>Reestablecer Contraseña</span></a></li>
                <?php if ($user->id_tipo_usuario == 3) : ?>
                <li><a href="<?= base_url('programacion/');?>"><i class="fa fa-tasks"></i> <span>Programacion</span></a>
                </li>
                <?php endif; ?>
            </ul>
            <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>