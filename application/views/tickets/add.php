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
                    <!--  -->
                    <div class="form-group">
                        <label for="exampleInputEmail1"> </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Ingrese el ..." name="">
                        
                    </div>
                    
                    <!--  -->
                    <div class="form-group">
                        <label for="exampleInputEmail1"> </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Ingrese el ..." name="">  
                    </div>

                    <!-- Select 1 -->
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">""</label>
                        <select class="form-control" id="" name=""  required>
                            <option value="0">Seleccione ... </option>
                            <option value="1">...</option>
                            <option value="3">...</option>
                        </select>   
                    </div>
                    <!-- Select 2-->
                    <div class="form-group" id="">
                        <label for="tickets_list">""" </label>
                        <select class="form-control" name="" required>
                            <option value="0">... </option>
                            <?php foreach ($comedores as $comedor): ?>
                            <option value="<?php echo $comedor->id_comedor;?>"><?php echo $comedor->nombre_comedor;?></option>
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