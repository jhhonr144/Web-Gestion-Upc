<?php
if (!isset($_SESSION)) {
    SESSION_START();
}
if (isset($_SESSION['persona'])) {
    include_once ('./../../Modelo/Persona.php');
    $p = unserialize($_SESSION['persona']);
    if ($p->getTipo() != 'Estudiante') {
        $url = './../';
        echo '<meta http-equiv=refresh content="1; ' . $url . '">';
        die;
    }
}
include_once ('./../../Controlador/Variable/Estudiante.php');
?> 

<div class="row mt">
    <aside class="col-lg-2">   
                <h4><i class="fa fa-angle-right"></i> Mensaje</h4>
                <h3><a class="btn btn-success" onclick="Mensaje()" >Enviar   </a></h3>                
                <h3><a class="btn btn-success" onclick="MLeer()" >Leer     </a></h3>     
                <h3><a class="btn btn-success"  onclick="MEnviado()"  >Mi envios</a></h3> 
    </aside>
    <aside class="col-lg-9 mt">
        <section class="panel">
            <div class="panel-body" id="MensajeV">
                <!--####-->
                <?php include './Mensaje/Enviar.php'; ?>
                <!--####-->
            </div>
        </section>
    </aside>
</div>