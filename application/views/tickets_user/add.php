<?php   
    $this->load->view('dashboard/header');  
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ticket
            <small>Agregar Ticket</small>
        </h1>

    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-6 mx-auto card">
                <form action="<?= base_url('ticket/store'); ?>" method="POST" class="m-2">
                    <!-- Select menu-->
                    <div class="form-group" id="">
                        <label for="menues_list">Menues </label>
                        <select class="form-control" name="menues" required>
                            <option value="0">Seleccione un menu </option>
                            <?php foreach ($menues as $menu): ?>
                            <option value="<?php echo $menu->id_menu;?>"><?php echo $menu->nombre; if($menu->id_tipo_menu == 1){echo " | TIPO PEQUEÑO";}else{if($menu->id_tipo_menu == 2){echo " | TIPO MEDIANO";}else{echo " | TIPO GRANDE";}} ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                         <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>


    </section>

<?php   
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>