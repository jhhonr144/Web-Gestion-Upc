<form action="">
    <?php
    if (isset($_GET['tipo'])) {
        $id = filter_input(INPUT_GET, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
        if ($id == 2) {
            ?>
            <div class="col-md-11 mb ">
                <input style="visibility: hidden;" id="variable" type="text" >
                <center><div  id="cambio">Nueva Actividad</diV></center>
                <!-- WHITE PANEL - TOP USER -->
                <div class="white-panel pn">
                    <div class="close">
                        <input  value="A" readonly="" style="width: 20px;">
                    </div>
                    <div class="white-header">
                        <label>Titulo: </label>
                        <input type="text" onkeypress="return letra(event)"                            
                               width="80%" style="width: 80%"
                               id="nombrex" required=""
                               min="3" max="100" >                         
                    </div>

                    <select required="" onchange="NFotoE(this.value);" id="selecFoto">                         
                        <option value="./../assets/img/General/NO.png">Actual</option>
                        <?php
                        $ruta = "C:/xampp/htdocs/Gestion/Vista/assets/img/General/";
                        $directorio = opendir($ruta); //ruta actual
                        while ($archivo = readdir($directorio)) { //obtenemos un archivo y luego otro sucesivamente
                            if (!is_dir($archivo)) { //http://mialtoweb.es/leer-archivos-de-un-directorio-con-php/
                                if ((strpos($archivo, '.jpg') !== false) or ( strpos($archivo, '.png') !== false)) {
                                    if (strpos($archivo, 'NO.png') === false) {
                                        ?> 
                                        <option value="./../assets/img/General/<?php echo $archivo; ?>" > <?php echo $archivo; ?> </option>
                                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                    </select>
                    <p  align="center" id="nuevaImg">
                        <img src="./../assets/img/General/NO.png" class="img-thumbnail" width="200"  style="max-height: 100px">
                    </p>  
                    <div id="cargarfoto" >

                        <img src="../assets/img/Admin/mas.jpg" alt="" align="center" width="40"  />
                        <center>Nueva Foto<input name="fichero" type="file" onchange="CargarFoto(this.value)"></center>


                    </div>
                    <!--###########################-->
                    <br><br>
                    <div style="background-color: #c6c6c6;">
                        <textarea  clear="right" id="informacion" minlength="3" maxlength="1000"  
                                   onblur=""   style="width: 60%;max-width: 77%;max-height: 200px;" ></textarea> 
                    </div>
                    <!--###########################--> 
                    <div class="row">
                        <div class="col-md-6">

                            <p class="small mt" id="inicioD">Inicio: <?php echo date('d-m-Y'); ?> </p>
                        </div>

                    </div>
                    <!----estado--titulo-foto-texto---->
                    <button id="REtor" type="button" class="btn btn-round btn-success" onclick="GuardarActividad('A', document.getElementById('nombrex').value,
                                            document.getElementById('selecFoto').value,
                                            document.getElementById('informacion').value, '<?php echo date('d-m-Y'); ?>')">Guardar</button>
                    <button type="button" class="btn btn-round btn-default" onclick="Inicio();">Cerrar</button>

                </div>
            </div><!-- /col-md-4 -->
            <?php
        }
        if ($id == 1) {
            ?>
            <div class="col-md-11 mb ">
                <input style="visibility: hidden;" id="variable" type="text" >
                <center><div  id="cambio">Nueva Convocatoria</diV></center>
                <div class="white-panel pn">
                    <div class="close"><input  id="Estadox1" value="A" readonly="" style="width: 20px;"></div>
                    <div class="white-header">
                        <label>Titulo: </label>
                        <input type="text" onkeypress="return letra(event)"                        
                               onblur=""  width="80%" style="width: 60%"
                               id="Nombrex1"
                               min="3" max="100" value="">
                    </div>
                    <select onchange="NFotoE(this.value);" id="selecFotox1"> 
                        <option value="./../assets/img/General/NO.png">Actual</option>
                        <?php
                        $ruta = "C:/xampp/htdocs/Gestion/Vista/assets/img/General/";
                        $directorio = opendir($ruta); //ruta actual
                        while ($archivo = readdir($directorio)) { //obtenemos un archivo y luego otro sucesivamente
                            if (!is_dir($archivo)) { //http://mialtoweb.es/leer-archivos-de-un-directorio-con-php/
                                if ((strpos($archivo, '.jpg') !== false) or ( strpos($archivo, '.png') !== false)) {
                                    if (strpos($archivo, 'NO.png') === false) {
                                        ?>
                                        <option value="./../assets/img/General/<?php echo $archivo; ?>" >
                                            <?php echo $archivo; ?>
                                        </option>
                                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                    </select>
                    <p  align="center" id="nuevaImg">
                        <img src="./../assets/img/General/NO.png" class="img-thumbnail" width="200"  style="max-height: 100px">
                    </p>  
                    <div id="cargarfoto" >                        
                        <img src="../assets/img/Admin/mas.jpg" alt="" align="center" width="40"  />
                        <center>Nueva Foto<input name="fichero" type="file" onchange="CargarFoto(this.value)"></center>
                    </div>
                    <br><br>
                    <div style="background-color: #c6c6c6;">
                        <textarea  clear="right" id="textox1" minlength="3" maxlength="1000"   
                                   onblur=""   style="width: 60%;max-width: 77%;max-height: 200px;"> 
                        </textarea> 
                    </div>
                    <div class="row">
                        <div class="col-md-6">

                            <p class="small mt">
                                Inicio:<input type="date" id="iniciox1" value="<?php echo date("Y-m-d"); ?>" readonly="">
                            </p>
                            <div> 
                                <p class="small mt">Fin   :
                                    <input type="date" id="FFinalx1" name="party" min="<?php
                                    echo date("Y-m-d");
                                    ?>" max="<?php
                                           echo $fecha_fin_semestre;
                                           ?>" >
                                </p> 
                                <select id="parax1">
                                    <option value="AP">Ayuda Padrino</option>
                                    
                                </select>
                            </div>

                        </div>

                    </div>
                    <button type="button" class="btn btn-round btn-success" onclick="GuardarConvocatoria('A', document.getElementById('Nombrex1').value,
                                                                                                        document.getElementById('selecFotox1').value,
                                                                                                        document.getElementById('textox1').value, '<?php echo date('d-m-Y'); ?>',
                                                                                                        document.getElementById('FFinalx1').value,document.getElementById('parax1').value)">Guardar</button>
                    <button type="button" class="btn btn-round btn-default" onclick="Inicio();">Cerrar</button>
                </div>
            </div><!-- /col-md-4 -->  

            <?php
        }
        if ($id >= 3 || $id <= 0) {
            ?>
            <ul>
                <li><a onclick="NActividad('2')">Actividad</a></li>
                <li><a onclick="NActividad('1')">Convocatoria</a></li>
                <li ><a onclick="Inicio()">Atras</a></li>
            </ul>
            <?php
        }
    } else {
        ?>
        <ul>
            <li><a onclick="NActividad('2')">Actividad</a></li>
            <li><a onclick="NActividad('1')">Convocatoria</a></li>
            <li ><a onclick="Inicio()">Atras</a></li>
        </ul>
        <?php
    }
    ?>
</form>