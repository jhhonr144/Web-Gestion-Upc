<?php  
if (!isset($_SESSION)) {
    SESSION_START();
}
if (isset($_SESSION['persona'])) {
    include_once ('./../../Modelo/Persona.php');
    $p = unserialize($_SESSION['persona']);
    if ($p->getTipo() != 'Administrador') {
        $url = './../';
        echo '<meta http-equiv=refresh content="1; ' . $url . '">';
        die;
    } 
}  
include_once ('./../../Controlador/Variable/Administrador.php');
//###############################################################
include ("./Vistas/EditarInicio.php"); 
//###############################################################
$bdDato = '*';
$bdTabla = 'convocatoria';
if (isset($id)) {
    $bdCondicion = 'where Id!="' . $id . '"';
} else {
    $bdCondicion = '';
}

include ($bd . 'ConsultaGeneral.php');
foreach ($Consulta as $fila) {
    ?> 
    <div class="col-md-4 mb ">
        <!-- WHITE PANEL - TOP USER -->
        <div class="white-panel pn">
            <div class="white-header">
                <h5><?php echo $fila['Nombre']; ?></h5>
            </div>
            <?php if ($fila['Foto'] != "") { ?>
                <p><img src="<?php echo $foto . $fila['Foto']; ?>"  class="img-thumbnail" width="200" ></p>
            <?php } ?>
            <p><b><?php echo $fila['Texto']; ?></b></p>
            <div class="row">
                <div class="col-md-6">
                    <p class="small mt">Hoy: <?php
                        echo date("d - m - Y");
                        ?></p>
                    <p class="small mt">Inicio: <?php echo $fila['FInicio']; ?> </p>
                    <p class="small mt">Fin   : <?php
                        $fin = $fila['FFinal'];
                        echo $fin;
                        ?></p>
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

            <a  class="logout" onclick="EditarAP(<?php echo $fila['Id']; ?>);">
                Editar!</a>
        </div>
        <a href="#Inicio" class="go-top">
        <i class="fa fa-angle-up"></i>
    </a>
    </div><!-- /col-md-4 -->  

    <?php
}
?>    
   
