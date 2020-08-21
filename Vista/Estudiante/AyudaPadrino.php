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
$bdDato='*'; 
$bdTabla='convocatoria';
$bdCondicion='where estado="A" and (para="AP" or para="Todos")';
include ($bd.'ConsultaGeneral.php'); 
foreach ($Consulta as $fila) { //<?php echo  $fila['Nombre']; 
    ?> 

    <div class="col-md-12 mb ">
        <!-- WHITE PANEL - TOP USER -->
        <div class="white-panel pn">
            <div class="white-header">
                <h5><?php echo $fila['Nombre']; ?></h5>
            </div>
            <?php if ($fila['Foto'] != "") { ?>
            <p><img src="<?php echo $foto . $fila['Foto']; ?>"  class="img-rounded"  width="123" height="50"></p>
            <?php } ?>
                <p><b><?php echo utf8_encode($fila['Texto']);  ?></b></p>
            <div class="row">
                <div class="col-md-6">
                    <p class="small mt">Hoy: <?php                       
                        echo date("d - m - Y");
                        ?></p> 
                    <p class="small mt">Fin   : <?php $fin = $fila['FFinal'];
                    $d = explode("-", $fin);
                    echo $d[2].' - '.$d[1].' - '.$d[0]; ?></p>
                </div>
                <div class="col-md-6">
                    <p class=""><?php
                        include ($cone . 'Fecha.php');
                        if ($Activo) { 
                            echo '<a style="height:30px ; size: 30px " onclick="Formulario('.$p->getCedula().','."'"."AP"."'".')">'
                                    . 'Participar!'
                                    . '</a>';
                        } else {
                            echo 'Inactivo';?>
                    <p>Espere Sigiente Convocatoria.</p>
                                <?php
                        }
                        ?></p> 
                    <p>Dias Restante:<br><?php
                        echo $resta;
                        ?></p>
                </div>
            </div>
        </div>
    </div><!-- /col-md-4 -->  

    <?php
}
?>    
