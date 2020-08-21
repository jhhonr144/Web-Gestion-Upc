<?php
$cone = "./../../Modelo/";
$bdDato = '*';
$bdTabla = 'convocatoria';
$bdCondicion = 'where Estado = "A" and FFinal > NOW()';
include ('./../../Controlador/BD/ConsultaGeneral.php');
foreach ($Consulta as $fila) {
    ?> 
    <div class="" id="TBotun<?php echo $fila['Id'];?>">
        <div class="switch has-switch " >
            <div class="switch-animate switch-on" id="botun<?php echo $fila['Id'];?>" onclick="Obligarcierre('<?php
                echo $fila['Id'];                    
                ?>')">
                <input type="checkbox" checked="" data-toggle="switch" >
                <span class="switch-left">
                    ON
                </span>
                <label>&nbsp;</label>
                <span class="switch-right">
                    OFF
                </span>        
            </div>
        </div>   
    <?php
    echo '<span>tipo: </span>';
    echo $fila['Para'];
    echo '<span>  Fecha inicio: </span>';
    echo $fila['FInicio'];
    echo '<span>  Fecha fin: </span>';
    echo $fila['FFinal'];
    echo '<span>  Nombre: </span>';
    echo $fila['Nombre'];
    echo '</div>';
}
?>
<br><br><br><br><br><br><br>
<h3>Convocatorias Pasadas</h3>
<?php
include './Formulario/Administracion/DConvocatoria.php';

