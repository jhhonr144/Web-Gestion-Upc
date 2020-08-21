<?php  
include_once ('./../../Controlador/Variable/General.php');
$bdDato='*'; 
$bdTabla='convocatoria';
$bdCondicion='where Estado="A"';
include ($bd.'ConsultaGeneral.php'); 
foreach ($Consulta as $fila) { //<?php echo  $fila['Nombre']; 
    ?> 

    <div class="col-md-4 mb ">
        <!-- WHITE PANEL - TOP USER -->
        <div class="white-panel pn">
            <div class="white-header">
                <h5><?php echo $fila['Nombre']; ?></h5>
            </div>
            <?php if ($fila['Foto'] != "") { ?>
                <p><img src="<?php echo $foto . $fila['Foto']; ?>"   class="img-thumbnail" width="200"></p>
            <?php } ?>
            <p><b><?php echo $fila['Texto']; ?></b></p>
            <div class="row">
                <div class="col-md-6">
                    <p class="small mt">Hoy: <?php                       
                        echo date("d - m - Y");
                        ?></p>
                    <p class="small mt">Inicio: <?php echo $fila['FInicio']; ?> </p>
                    <p class="small mt">Fin   : <?php $fin = $fila['FFinal'];
                    echo $fin; ?></p>
                </div>
                <div class="col-md-6">
                    <p class="small mt"><?php
                        include ($cone . 'Fecha.php');
                        if ($Activo) {
                            echo 'Activo';
                        } else {
                            echo 'Inactivo';
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
