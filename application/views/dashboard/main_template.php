<?php  
$this->load->view('dashboard/header');      
?>
<section class="content-header">
    <h2>
        Bienvenido <?php echo $user->nombre; ?> <br>
        <small>Usted es <?php echo $user->tipo; ?></small>
    </h2>
</section>
<?php if ($user->id_tipo_usuario == 1): ?>
<section class="content container-fluid">
    <h4>Sus comedores favoritos son:</h4>
    <?php foreach ($comedores as $comedor): ?>
    <div class="row p-3">
        <div class="card p-3 mx-auto">
            <h4><b><?=$comedor->nombre_comedor?></b></h4>
            <small>Ubicado en: <b><?= $comedor->nombre ?></b> </small>
            <small>Foto del comedor o campus: <br><img src="<?= $comedor->imagen ?>" style="width: 600px;"></small> <br>
            <a href="<?= base_url("detalle_comedores")?>" type="button" class="btn btn-dark">Ver Programacion</a>
        </div>
    </div>

    <?php endforeach; ?>
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
<?php
    $this->load->view('dashboard/aside');
    $this->load->view('dashboard/footer');
?>