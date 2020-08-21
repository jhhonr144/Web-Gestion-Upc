<?php  
include_once ('./../../Controlador/Variable/General.php');
$bdDato='*'; 
$bdTabla='vista';
$bdCondicion='where estado="A" and nombre="Servicio"';
include ($bd.'ConsultaGeneral.php'); 
foreach ($Consulta as $fila) { //<?php echo  $fila['Nombre']; 
    ?> 

    <div class="col-md-12 mb ">
        <!-- WHITE PANEL - TOP USER -->
        <div class="white-panel pn">
            <div class="white-header">
                <h5><?php echo $titulo; ?></h5>
            </div>
            <?php if ($fila['ruta'] != "") { ?>
            <p><img src="<?php echo $foto ."General/". $fila['ruta']; ?>"  class="img-rounded"  width="246" height="80"></p>
            <?php } ?>
                <p><b><?php echo utf8_encode($fila['txt']);  ?></b></p>
            <div class="row">
                <div class="col-md-6">
                    <p class="small mt"> </p>
                </div>
                <div class="col-md-6">
                    <p class="small mt"> </p>
                </div>
            </div>
        </div>
    </div><!-- /col-md-4 -->  

    <?php
}
?>    
