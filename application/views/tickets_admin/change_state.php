<?php   
    $this->load->view('dashboard/header');  
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ticket
            <small>Cambiar Estado Ticket</small>
        </h1>

    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-6 mx-auto card">
                <form action="<?= base_url('ticket/change_state'); ?>" method="POST" class="m-2">
                    <input type="hidden" name="id_ticket" value= "<?php echo $id_ticket; ?>"/>
                    <!-- Select estado-->
                    <div class="form-group" id="">
                        <label for="estados_list">Estados </label>
                        <select class="form-control" name="estados" required>
                            <?php foreach ($estados as $estado){ print_r($estado); print_r($estado_anterior); ?>
                            <?php if($estado->id_estado > $estado_anterior->maximo && $estado->id_estado != 6){  ?>
                            <option value="<?php echo $estado->id_estado; ?>"><?php echo $estado->nombre; ?></option>
                            <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                         <button type="submit" class="btn btn-primary">Submit</button>
                         <input type="button" onclick=" location.href="<?php redirect(base_url('ticket/listing_admin')); ?>"" value="Cancel" name="boton" /> 
                </form>

            </div>

        </div>


    </section>

<?php   
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>