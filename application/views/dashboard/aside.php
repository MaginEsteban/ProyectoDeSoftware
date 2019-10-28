
<?php $user = $this->session->userdata('user'); ?>

</div> <!-- cierro el div abierto en el header-->

<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url("recursos")?>/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user->nombre; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">ACCIONES DISPONIBLES</li>
        <!-- Optionally, you can add icons to the links -->
         <li class="treeview">
          <a href="#"><i class="fa fa-user-circle-o"></i> <span>Usuarios</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a class="user-menu" href="<?= base_url("user/add"); ?>"><i class="fa fa-plus"></i> <span>Agregar Usuario</span></a></li>
            <li class="active"><a class="user-menu" href="<?= base_url("user/listing"); ?>"><i class="fa fa-list-ul"></i> <span>Listado Usuarios</span></a></li>
            
          </ul>

          <a href="#"><i class="fa fa-home"></i> <span>Comedores</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a class="user-menu" href="<?= base_url("comedor/add"); ?>"><i class="fa fa-plus"></i> <span>Agregar Comedor</span></a></li>
            <li class="active"><a class="user-menu" href="<?= base_url("comedor/listing"); ?>"><i class="fa fa-list-ul"></i> <span>Listado Comedores</span></a></li>
          </ul>

          <a href="#"><i class="fa fa-list-ol"></i> <span>Menues</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a class="user-menu" href="<?= base_url("menu/add"); ?>"><i class="fa fa-plus"></i> <span>Agregar Menu</span></a></li>
            <li class="active"><a class="user-menu" href="<?= base_url("menu/listing"); ?>"><i class="fa fa-list-ul"></i> <span>Listado Menues</span></a></li>
          </ul>

          <a href="#"><i class="fa fa-calendar"></i> <span>Turnos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a class="user-menu" href="<?= base_url("turno/add"); ?>"><i class="fa fa-plus"></i> <span>Agregar Turno</span></a></li>
            <li class="active"><a class="user-menu" href="<?= base_url("turno/listing"); ?>"><i class="fa fa-list-ul"></i> <span>Listado Turnos</span></a></li>
          </ul>
          
        </li>

        <li ><a href="<?= base_url('user/restore_password');?>"><i class="fa fa-key"></i> <span>Reestablecer Contraseña</span></a></li>
        <li ><a href="<?= base_url('programacion/');?>"><i class="fa fa-tasks"></i> <span>Programacion</span></a></li>
       
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

