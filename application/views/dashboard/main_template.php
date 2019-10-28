<?php  
$this->load->view('dashboard/header');      
?>
<section class="content-header">
    <h2>
        Bienvenido <?php echo $user->nombre; ?> <br>
        <small>Usted es <?php echo $user->tipo; ?></small>
    </h2>
</section>
<section class="content container-fluid">
    
</section>

<!-- </div> Cierra un tag abierto en el header -->
</div>
<?php
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/footer');
?>