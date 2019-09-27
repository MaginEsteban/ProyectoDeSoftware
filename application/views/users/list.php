<?php   $this->load->view('dashboard/header');  ?>

<!--------------------------
     | Your Page Content Here |
     -------------------------->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Usuario
            <small>listado usuarios</small>
        </h1>

    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-10 mx-auto">
                <table>
                    <!-- Titulos -->
                    <tr>
                        <th>Nro Legajo</th>
                        <th>Email</th>
                        <th>Apellido</th>
                        <th>Rol</th>
                    </tr>
                    <!-- Datos
                    <?php //if (isset( $data ): ?>
                        <?php //foreach ($data as $row): ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php //endforeach; ?>
                    <?php //endif; ?> -->
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