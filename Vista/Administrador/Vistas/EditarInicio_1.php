<?php
if (isset($_GET['id1'])) {
    $id = filter_input(INPUT_GET, 'id1', FILTER_SANITIZE_SPECIAL_CHARS);
    $bdDato = '*';
    $bdTabla = 'actividades';
    $bdCondicion = 'where Id="' . $id . '"';
    include ($bd . 'ConsultaGeneral.php');
    echo '<form action="">';
    foreach ($Consulta as $fila) {
        ?>

        <div class="col-md-11 mb ">
            <input style="visibility: hidden;" id="variable" type="text" >
            <center><div  id="cambio"></diV></center>
            <!-- WHITE PANEL - TOP USER -->
            <div class="white-panel pn">
                <div class="close"><input  id="Estadox" onclick=";Avilitar1(this.value,'estado', '<?php echo $fila['Id']; ?>')"
                                           value="<?php echo $fila['estado']; ?>" readonly="" style="width: 20px;"></div>
                <div class="white-header">
                    <label>Titulo: </label>
                    <input type="text" onkeypress="return letra(event)"                            
                           onclick="document.getElementById('variable').value = this.value;
                                           document.getElementById('cambio').innerHTML = ' '"
                           onblur=""  width="80%" style="width: 60%"
                           id="nombre"
                           min="3" max="100" value="<?php echo $fila['nombre']; ?>">
                    <a id="GuardarCambio" class="btn btn-success btn-xs" onclick="Actualizar1(document.getElementById('nombre').value,
                                            document.getElementById('variable').value, 'nombre', '<?php echo $fila['Id']; ?>')">
                        <i class="fa fa-check"></i>
                    </a>
                    <a id="BorrarCambio" class="btn btn-danger btn-xs" onclick="Desavilitar1('Estado', '<?php echo $fila['Id']; ?>')">
                        <i class="fa fa-trash-o "></i>
                    </a>
                </div>

                <select onchange="NFotoE(this.value);" id="selecFoto"> 
                    <option value="<?php
                    if (isset($fila['Foto'])) {
                        echo $NFotoE = './../assets/img/' . $fila['Foto'];
                    } else {
                        echo "NO";
                    }
                    ?>">Actual</option>
                    <option value="./../assets/img/General/NO.png">sin Imagen</option>

                    <?php
                    $ruta = "C:/xampp/htdocs/Gestion/Vista/assets/img/General/";

                    $directorio = opendir($ruta); //ruta actual
                    while ($archivo = readdir($directorio)) { //obtenemos un archivo y luego otro sucesivamente
                        if (!is_dir($archivo)) { //http://mialtoweb.es/leer-archivos-de-un-directorio-con-php/
                            if ((strpos($archivo, '.jpg') !== false) or ( strpos($archivo, '.png') !== false)) {
                                if (strpos($archivo, 'NO.png') === false) {
                                    ?> 
                                    <option value="./../assets/img/General/<?php echo $archivo; ?>" > <?php echo $archivo; ?>   </option>

                                    <?php
                                }
                            }
                        }
                    }
                    ?>
                </select>
                <p  align="center" id="nuevaImg"><img src="<?php echo $NFotoE; ?>" 
                                                      class="img-thumbnail" width="200" ></p>
                <a id="GuardarCambio" class="btn btn-success btn-xs" onclick="ActualizarF1(document.getElementById('selecFoto').value,
                                        document.getElementById('variable').value, 'Foto', '<?php echo $fila['Id']; ?>')">
                    <i class="fa fa-check"></i>
                </a>
                <a id="BorrarCambio" class="btn btn-danger btn-xs" onclick="DesavilitarF('Foto', '<?php echo $fila['Id']; ?>')">
                    <i class="fa fa-trash-o "></i>
                </a>
                <!--###########################-->
                <br><br>
                <div style="background-color: #c6c6c6;">
                    <textarea  clear="right" id="informacion" minlength="3" maxlength="1000"  
                               onclick="document.getElementById('variable').value = this.value;
                                               document.getElementById('cambio').innerHTML = ' '"
                               onblur=""   style="width: 60%;max-width: 77%;max-height: 200px;"><?php echo $fila['informacion']; ?></textarea>
                    <a id="GuardarCambio" class="btn btn-success btn-xs" onclick="Actualizar(document.getElementById('informacion').value,
                                            document.getElementById('variable').value, 'informacion', '<?php echo $fila['Id']; ?>')">
                        <i class="fa fa-check"></i>
                    </a> 
                </div>
                <!--###########################--> 
                <div class="row">
                    <div class="col-md-6">

                        <p class="small mt">Inicio: <?php echo $fila['dia'];?> </p>
                         
                        
                    </div>

                </div>

                <a  class="logout" onclick="Inicio();">
                    Cerrar</a>
            </div>
        </div><!-- /col-md-4 --> 
        <?php
        $datos = '12-20-15-13';
        $color = 'rgba(255, 0, 0, 0.5)-rgba(100, 255, 0, 0.5)-rgba(200, 50, 255, 0.5)-rgba(0, 100, 255, 0.5)';
        ?>

<!--        <div class="col-md-4 mb " onclick="Visitasa()"><div class="white-panel pn">
                <canvas id="birdsChart" width="600" height="400"></canvas>
                    <?php include "./Vistas/Visitas.php"; ?>
            </div>

        </div>-->
        <?php
    }
    echo "</form>";
}
?>