<?php   
    $this->load->view('dashboard/header',$user);    

?>
<!-- Contenido de la pagina -->
<section class="content container-fluid">
    <h1>Error 403</h1>
    <small>Usted no tiene permisos para visitar esta pagina</small>
</section>

<?php
    $this->load->view('dashboard/aside',$user);
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/footer');
?>