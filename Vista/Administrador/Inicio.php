<?php
include_once ('./../../Controlador/Variable/Administrador.php');
//###############################################################
include ("./Vistas/EditarInicio.php");
include ("./Vistas/EditarInicio_1.php");
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

            <a  class="logout" onclick="EditarInicio(<?php echo $fila['Id']; ?>);">
                Editar!</a>
        </div>
    </div><!-- /col-md-4 -->  

    <?php
}
?>    

<?php
include_once ('./../../Controlador/Variable/General.php');
$bdDato = '*';
$bdTabla = 'actividades';
$bdCondicion = '';
include ($bd . 'ConsultaGeneral.php');
foreach ($Consulta as $fila) { //<?php echo  $fila['Nombre']; 
    ?> 
    <div class="col-md-4 mb ">
        <!-- WHITE PANEL - TOP USER -->
        <div class="white-panel pn">
            <div class="white-header">
                <h5><?php echo $fila['nombre']; ?></h5>
            </div> 
            <img src="./../assets/img/<?php echo $fila['Foto'];?>"  class="img-thumbnail" width="200" >
            <p><b><?php echo $fila['informacion']; ?></b></p>
            <div class="row">

                <p class="small mt">Publicado: <?php echo $fila['dia']; ?> </p> 

            </div> 
            <a  class="logout" onclick="EditarInicio1(<?php echo $fila['Id']; ?>);">
                Editar!</a>
        </div>        
    </div><!-- /col-md-4 -->  

    <?php
}
?>    
<div class="col-md-3 mb ">
        <!-- WHITE PANEL - TOP USER -->
        <div class="white-panel pn">
            <img src="../assets/img/Admin/mas.jpg" alt="" align="left" width="40" />
            <ul class="sidebar">
            <li>
                <ul class="sub"><a onclick="NActividad('2')">Actividad</a></ul> 
                <ul class="sub"><a onclick="NActividad('1')">Convocatoria</a></ul>
            </li>
            </ul>
        </div>
</div>