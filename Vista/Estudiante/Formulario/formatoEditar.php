<?php
//$filtroL = filter_input(INPUT_GET, 'para', FILTER_SANITIZE_SPECIAL_CHARS);
include './listaInclude.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <!--link href="../../assets/img/favicon-32x32.png" rel="shortcut icon"-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <!--     Fonts and icons     -->
        <link href="./../assets/plugin/css/font-awesome.css" rel="stylesheet">
        <link href="./../assets/plugin/css/material-icons.css" rel="stylesheet">
        <!-- CSS Files -->
        <link href="./../assets/plugin/css/bootstrap.min.css" rel="stylesheet" />
        <link href="./../assets/plugin/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="./../assets/plugin/css/demo.css" rel="stylesheet" />
        <script src="../js/logica.js" type="text/javascript"></script>  
    </head>
    <body>        
        <!------CONTENIDO--------------->
        <!--   Big container   -->
        <div class="container">
            <div style="position: fixed;left: -100px;">
                <img style="margin: 10px;" src="../img/genera/Logo-upc.png" alt=""/>
                <img style="margin: 10px;left: 0px" src="../img/genera/Logo-upc.png" alt=""/>
                <img style="margin: 10px;" src="../img/genera/Logo-upc.png" alt=""/>
                <img style="margin: 10px;left: 0px" src="../img/genera/Logo-upc.png" alt=""/>
                <img style="margin: 10px;" src="../img/genera/Logo-upc.png" alt=""/>
                <img style="margin: 10px;left: 0px" src="../img/genera/Logo-upc.png" alt=""/>
            </div>
            <!--CARGA DE LA BD--> 
            <div>
                <?php
                $conexio = new conecion();
                $sentenci = $conexio->Guardame()->prepare("select id from mformulario where cc='" . $p->getCedula() . "' and tipo='RE' and estado='A'");
                $sentenci->execute();
                $id = -1;
                foreach ($sentenci as $fila) {
                    $id = $fila['id'];
                }
                if ($id >= 0) {
                    $conexion = new conecion();
                    $sentencia = $conexion->Guardame()->prepare("select * from dformulario where formu='RE' and mf='".$id."' and  user='" . $p->getCedula() . "'  limit 1");
                    $sentencia->execute();
                    foreach ($sentencia as $fila) { 
                        $p1 = $fila['p1'];
                        $p2 = $fila['p2'];
                        $p3 = $fila['p3'];
                        $p4 = $fila['p4'];
                        $p5 = $fila['p5'];
                        $p6 = $fila['p6'];
                        $p7 = $fila['p7'];
                        $p8 = $fila['p8'];
                        $p9 = $fila['p9'];
                        $p0 = $fila['p0'];
                        $b1 = $fila['b1'];
                        $b2 = $fila['b2'];
                        $b3 = $fila['b3'];
                        $b4 = $fila['b4'];
                        $b5 = $fila['b5'];
                        $b6 = $fila['b6'];
                        $b7 = $fila['b7'];
                        $b8 = $fila['b8'];
                        $b9 = $fila['b9'];
                        $b0 = $fila['b0'];                        
                        break;
                    }
                }else{
                    include './pades.php';
                }
                ?>    
            </div>            
            <!--FIN DB-->
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="green" id="wizardProfile">
                            <form action="#" method="POST">                              
                                <div class="wizard-header">
                                    <samp  class="close"><a href="../estudiante/index.php">X</a></samp>
                                    <h3>  
                                        <small>Datos personales  <b>Bienestar Institucional.</b></small>
                                    </h3>
                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#estudiante" style="cursor:   move" data-toggle="tab">DATOS DEL ESTUDIANTE</a></li> 
                                    </ul>                                   
                                </div>
                                <div class="tab-content">
                                    <!--DATOS DEL ESTUDIANTE-->
                                    <div class="tab-pane" id="estudiante">
                                        <div class="row">
                                            <h4 class="info-text">DATOS DEL ESTUDIANTE</h4>
                                            <input style="visibility: hidden;" id="variable" type="text" >
                                            <center><div  id="cambio"></diV></center>
                                            <div class="col-sm-4 col-sm-offset-1"  id="tipol">
                                                <div class="picture-container">
                                                    <div class="picture" >                                                        
                                                        <img src="<?php echo $p1; ?>"  class="picture-src" id="wizardPicturePreview"  title=""/>
                                                        <input id="foto"   type="file" >
                                                    </div>
                                                    <h6>Foto</h6>
                                                </div>    
                                            </div> 
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Nombres :</label>
                                                    <input  onclick="document.getElementById('variable').value = this.value;document.getElementById('cambio').innerHTML = ' '"
                                                            onblur="confirmar(this.value, document.getElementById('variable').value, 'nombre')" id="nombre" name="Nombres" type="text" class="form-control" placeholder="Nombre..."
                                                            value="<?php echo $p2; ?>">
                                                    <br>                                                    
                                                    <label>Apellido :</label>
                                                    <input onclick="document.getElementById('variable').value = this.value;document.getElementById('cambio').innerHTML = ' '"
                                                           onblur="confirmar(this.value, document.getElementById('variable').value, 'nombres')" 
                                                           id="nombres" name="Nombres" type="text" class="form-control" placeholder="Nombre..." 
                                                           value="<?php echo $p3; ?>">
                                                </div>   
                                            </div>                                           
                                            <div class="col-sm-12">
                                                <div class="form-group col-sm-4">
                                                    <label>Doc.Identidad</label><br>
                                                    <select onclick="(document.getElementById('variable').value = this.value);document.getElementById('cambio').innerHTML = ' '" 
                                                            onchange="confirmar(this.value, document.getElementById('variable').value, 'tcc')" 
                                                            id="tcc" name="DocIdentidad" class="form-control">
                                                        <option value="0" <?php if($p4=='0')echo ' selected'; ?> > Cédula </option>
                                                        <option value="1" <?php if($p4=='1')echo ' selected'; ?>> Tarjeta Identidad </option>
                                                        <option value="2" <?php if($p4=='2')echo ' selected'; ?>>Tarjeta de Extranjeria </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>No.Identificación*</label>
                                                    <input  onclick="document.getElementById('variable').value = this.value;document.getElementById('cambio').innerHTML = ' '"
                                                            onblur="confirmar(this.value, document.getElementById('variable').value, 'cc')" id="cc" name="NoIdentificación" type="text" 
                                                            class="form-control"  value="<?php echo $p5; ?>">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Fecha Expedición*</label>
                                                    <input  onclick="document.getElementById('variable').value = this.value;document.getElementById('cambio').innerHTML = ' '"
                                                            onblur="confirmar(this.value, document.getElementById('variable').value, 'fcc')" id="fcc"
                                                            name="FechaExpedición" type="date" value="<?php echo $p6; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group col-sm-4">
                                                    <label>Departamento de Expedición*</label><br>                                                    
                                                    <select onclick="(document.getElementById('variable').value = this.value);document.getElementById('cambio').innerHTML = ' '" 
                                                            onchange="confirmar(this.value, document.getElementById('variable').value, 'dcc')"  id="dcc" name="DepartamentoExpedición" class="form-control">
                                                         <?php $conexio = new conecion();$j='';
                                                          $sentenci = $conexio->Guardame()->prepare("select * from departamento");
                                                            $sentenci->execute(); 
                                                            foreach ($sentenci as $fila) {
                                                                if($p7==$fila['id']){$j='selected';}
                                                                echo '<option value="'.$fila['id'].'"  '.$j.'>'.$fila['nombre'].'</option>';$j='';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Municipio de Expedición*</label><br>
                                                    <select  onclick="(document.getElementById('variable').value = this.value);document.getElementById('cambio').innerHTML = ' '" 
                                                             onchange="confirmar(this.value, document.getElementById('variable').value, 'mcc')" id="mcc" name="MunicipioExpedición" class="form-control">
                                                        <?php $conexio = new conecion();$j='';
                                                          $sentenci = $conexio->Guardame()->prepare("select * from municipio");
                                                            $sentenci->execute(); 
                                                            foreach ($sentenci as $fila) {
                                                                if($p8==$fila['id']){$j='selected';}
                                                                echo '<option value="'.$fila['id'].'"  '.$j.'>'.$fila['nombre'].'</option>';$j='';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Género</label><br>
                                                    <select  onclick="(document.getElementById('variable').value = this.value);document.getElementById('cambio').innerHTML = ' '" 
                                                             onchange="confirmar(this.value, document.getElementById('variable').value, 'g')" id="g" name="Género" class="form-control"  >                                                         
                                                        <?php
                                                        if ($p9=='0') {
                                                            echo ' <option value="0" selected>Seleciones  </option>
                                                                    <option  value="M">Masculino</option>
                                                                <option value="F">Femenino</option> ';
                                                        } else {
                                                            if ($p9=='M') {
                                                                echo ' <option value="0">Seleciones  </option>
                                                        <option selected value="M">Masculino</option>
                                                        <option value="F">Femenino</option> ';
                                                            } else {
                                                                echo ' <option value="0">Seleciones  </option>
                                                        <option  value="M">Masculino</option>
                                                        <option  selected value="F">Femenino</option> ';
                                                            }
                                                        } 
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group col-sm-4">
                                                    <label>Lugar de Nacimiento*</label><br>
                                                    <select onclick="(document.getElementById('variable').value = this.value);document.getElementById('cambio').innerHTML = ' '" 
                                                            onchange="confirmar(this.value, document.getElementById('variable').value, 'ln')" id="ln" name="LugarNacimiento" class="form-control">
                                                        <?php $conexio = new conecion();$j='';
                                                          $sentenci = $conexio->Guardame()->prepare("select * from municipio");
                                                            $sentenci->execute(); 
                                                            foreach ($sentenci as $fila) {
                                                                if($p0==$fila['id']){$j='selected';}
                                                                echo '<option value="'.$fila['id'].'"  '.$j.'>'.$fila['nombre'].'</option>';$j='';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Fecha de Nacimiento*</label>
                                                    <input onclick="document.getElementById('variable').value = this.value;document.getElementById('cambio').innerHTML = ' '"
                                                           onblur="confirmar(this.value, document.getElementById('variable').value, 'fn')" id="fn" 
                                                           name="FechaNacimiento" value="<?php echo $b1; ?>"  type="date" class="form-control">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Email*</label>
                                                    <input  onclick="document.getElementById('variable').value = this.value;document.getElementById('cambio').innerHTML = ' '"
                                                            onblur="confirmar(this.value, document.getElementById('variable').value, 'coreo')" 
                                                            id="coreo" name="Email" type="email" class="form-control" 
                                                            placeholder="andrew@email.com" value="<?php echo $b2; ?>" >
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group col-sm-4">
                                                    <label>Departamento de Residencia*</label><br>
                                                    <select  onclick="(document.getElementById('variable').value = this.value);document.getElementById('cambio').innerHTML = ' '"
                                                             onchange="confirmar(this.value, document.getElementById('variable').value, 'dr')" id="dr" name="DepartamentoResidencia" class="form-control">
                                                         <?php $conexio = new conecion();$j='';
                                                          $sentenci = $conexio->Guardame()->prepare("select * from departamento");
                                                            $sentenci->execute(); 
                                                            foreach ($sentenci as $fila) {
                                                                if($b3==$fila['id']){$j='selected';}
                                                                echo '<option value="'.$fila['id'].'"  '.$j.'>'.$fila['nombre'].'</option>';$j='';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Municipio de Residencia*</label><br>
                                                    <select  onclick="(document.getElementById('variable').value = this.value);document.getElementById('cambio').innerHTML = ' '"
                                                             onchange="confirmar(this.value, document.getElementById('variable').value, 'mr')" id="mr" name="MunicipioResidencia" class="form-control">
                                                         <?php $conexio = new conecion();$j='';
                                                          $sentenci = $conexio->Guardame()->prepare("select * from municipio");
                                                            $sentenci->execute(); 
                                                            foreach ($sentenci as $fila) {
                                                                if($b4==$fila['id']){$j='selected';}
                                                                echo '<option value="'.$fila['id'].'"  '.$j.'>'.$fila['nombre'].'</option>';$j='';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4 ">
                                                    <label>Barrio*</label>
                                                    <input onclick="document.getElementById('variable').value = this.value;
                                                            document.getElementById('cambio').innerHTML = ' '"
                                                           onblur="confirmar(this.value, document.getElementById('variable').value, 'b')" id="b" 
                                                           name="Barrio" value="<?php echo $b5; ?>" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group col-sm-4 ">
                                                    <label>Dirección*</label>
                                                    <input onclick="document.getElementById('variable').value = this.value;document.getElementById('cambio').innerHTML = ' '"
                                                           onblur="confirmar(this.value, document.getElementById('variable').value, 'd')" id="d" 
                                                           name="Dirección" value="<?php echo $b6; ?>" type="text" class="form-control">
                                                </div>
                                                <div class="form-group col-sm-4 ">
                                                    <label>Telefono Fijo*</label>
                                                    <input onclick="document.getElementById('variable').value = this.value;
                                                            document.getElementById('cambio').innerHTML = ' '"
                                                           onblur="confirmar(this.value, document.getElementById('variable').value, 't')"
                                                           id="t" name="Telefono" value="<?php echo $b7; ?>" type="text" class="form-control">
                                                </div>
                                                <div class="form-group col-sm-4 ">
                                                    <label>Celular*</label>
                                                    <input onclick="document.getElementById('variable').value = this.value;document.getElementById('cambio').innerHTML = ' '"
                                                           onblur="confirmar(this.value, document.getElementById('variable').value, 'c')"
                                                           id="c" name="Celular" value="<?php echo $b8; ?>" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group col-sm-4 ">
                                                    <label>Sede*</label><br>
                                                    <select  onclick="(document.getElementById('variable').value = this.value);document.getElementById('cambio').innerHTML = ' '" 
                                                             onchange="confirmar(this.value, document.getElementById('variable').value, 'sede')" id="sede" name="MunicipioResidencia" class="form-control">
                                                         <?php $conexio = new conecion();$j='';
                                                          $sentenci = $conexio->Guardame()->prepare("select * from sede");
                                                            $sentenci->execute(); 
                                                            foreach ($sentenci as $fila) {
                                                                if($b9==$fila['id']){$j='selected';}
                                                                echo '<option value="'.$fila['id'].'"  '.$j.'>'.$fila['nombre'].'</option>';$j='';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>             
                                                <div class="form-group col-sm-8 ">
                                                    <label>Programa Académico*</label><br>
                                                    <select  onclick="(document.getElementById('variable').value = this.value);document.getElementById('cambio').innerHTML = ' '"
                                                             onchange="confirmar(this.value, document.getElementById('variable').value, 'facu')" id="facu" name="MunicipioResidencia" class="form-control">
                                                        <?php $conexio = new conecion();$j='';
                                                          $sentenci = $conexio->Guardame()->prepare("select * from carrera");
                                                            $sentenci->execute(); 
                                                            foreach ($sentenci as $fila) {
                                                                if($b0==$fila['id']){$j='selected';}
                                                                echo '<option value="'.$fila['id'].'"  '.$j.'>'.$fila['nombre'].'</option>';$j='';
                                                            }
                                                        ?>
                                                    </select>
                                                </div> 

                                            </div> 
                                        </div>
                                    </div>  
                                </div> 
                                <div class="wizard-footer height-wizard" >
                                    <div class="pull-right" id="G1">
                                        <input  onclick="DPR(document.getElementById('foto').value,
                                                        document.getElementById('nombre').value,
                                                        document.getElementById('nombres').value,
                                                        document.getElementById('tcc').value,
                                                        document.getElementById('cc').value,
                                                        document.getElementById('fcc').value,
                                                        document.getElementById('dcc').value,
                                                        document.getElementById('mcc').value,
                                                        document.getElementById('g').value,
                                                        document.getElementById('ln').value,
                                                        document.getElementById('fn').value,
                                                        document.getElementById('coreo').value,
                                                        document.getElementById('dr').value,
                                                        document.getElementById('mr').value,
                                                        document.getElementById('b').value,
                                                        document.getElementById('d').value,
                                                        document.getElementById('t').value,
                                                        document.getElementById('c').value,
                                                        document.getElementById('sede').value,
                                                        document.getElementById('facu').value ,  'RE')"
                                                type='button'  value='Guardar Datos ' />
                                        <div id="error1"></div> 
                                    </div>  
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div><!-- end row -->
        </div> <!--  big container -->
        <!--   Core JS Files   -->
        <script src="./../assets/plugin/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="./../assets/plugin/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="./../assets/plugin/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
        <!--  Plugin for the Wizard -->
        <script src="./../assets/plugin/js/gsdk-bootstrap-wizard.js"></script>
        <!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
        <script src="./../assets/plugin/js/jquery.validate.min.js"></script>         
    </div>
</body>
</html>