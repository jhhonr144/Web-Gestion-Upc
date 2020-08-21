<?php
$filtroL = filter_input(INPUT_GET, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
if (!isset($_SESSION)) {
    SESSION_START();
}
include_once('./../../../Modelo/Persona.php');
$p = new Persona();
$p = unserialize($_SESSION['persona']);
if ($filtroL === "AP")
    $titulo = "<center><h2>Ayuda Padrino.</h2></center>";
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
        <script src="../../assets/js/Logica.js" type="text/javascript"></script>  
        <script src="../../assets/js/Vista.js" type="text/javascript"></script>  
    </head>
    <body>        
        <!------CONTENIDO--------------->
        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="green" id="wizardProfile">
                            <form action="#" method="POST">
                                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->
                                <div class="wizard-header">
                                    <samp  class="close"><a href="./../index.php">X</a></samp>
                                    <h3>
                                        <?php echo $titulo; ?>
                                        <br>
                                        <small>Formato de inscripción para las ayudas sociales en Bienestar Institucional.</small>
                                    </h3>
                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#estudiante" data-toggle="tab">DATOS DEL ESTUDIANTE</a></li>
                                        <li><a href="#dimension" data-toggle="tab">DIMENSIÓN ACADÉMICA</a></li>
                                        <li><a href="#familia" data-toggle="tab">DATOS FAMILIARES</a></li>
                                        <li><a href="#socioeconomico" data-toggle="tab">DATOS SOCIECONOMICOS</a></li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <!--DATOS DEL ESTUDIANTE-->
                                    <div class="tab-pane" id="estudiante">
                                        <div class="row">
                                            <h4 class="info-text">DATOS DE IDENTIFICACIÓN DEL ESTUDIANTE</h4>                                                                                       
                                            <div class="col-sm-4 col-sm-offset-1">
                                                <div class="picture-container">
                                                    <div class="picture">
                                                        <img src="./../assets/plugin/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                        <input id="foto"  type="file" >
                                                    </div>
                                                    <h6>Foto</h6>
                                                </div>    
                                            </div>
                                            <div id="datoDE"> 
                                            </div> 

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Nombre:</label>
                                                    <input readonly="readonly" id="nombre" name="Nombres" type="text" 
                                                           minlength="3" maxlength="100" required=""
                                                           class="form-control" placeholder="Nombre..." value="<?php echo $p->getNombre(); ?>">
                                                </div>   
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group col-sm-4">
                                                    <label>Documento</label><br>
                                                    <select id="tcc" name="DocIdentidad" class="form-control" required="">
                                                        <option value="0"> Cédula </option>
                                                        <option value="1"> Tarjeta Identidad </option>
                                                        <option value="2">Tarjeta de Extranjeria </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>No.Identificación*</label>
                                                    <input readonly="readonly" name="NoIdentificación" type="number" class="form-control" id="cc" value="<?php echo $p->getCedula(); ?>">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Fecha Expedición*</label>
                                                    <input id="fcc" name="FechaExpedición" type="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group col-sm-4">
                                                    <label>Departamento de Expedición*</label><br>
                                                    <select id="dcc" name="DepartamentoExpedición" class="form-control">
                                                        <?php
                                                        $cone = "./../../../Modelo/";
                                                        $bdDato = '*';
                                                        $bdTabla = 'departamento';
                                                        $bdCondicion = ' order by nombre';
                                                        include ('./../../../Controlador/BD/ConsultaGeneral.php');
                                                        foreach ($Consulta as $fila) {
                                                            echo '<option value="' . $fila['id'] . '">' . $fila['nombre'] . '</option>';
                                                        }
                                                        ?> 
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Municipio de Expedición*</label><br>
                                                    <select id="mcc" name="MunicipioExpedición" class="form-control">
                                                        <?php
                                                        $cone = "./../../../Modelo/";
                                                        $bdDato = '*';
                                                        $bdTabla = 'municipio';
                                                        $bdCondicion = ' order by nombre';
                                                        include ('./../../../Controlador/BD/ConsultaGeneral.php');
                                                        foreach ($Consulta as $fila) {
                                                            echo '<option value="' . $fila['id'] . '">' . $fila['nombre'] . '</option>';
                                                        }
                                                        ?> 
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Género</label><br>
                                                    <select id="g" name="Género" class="form-control" >
                                                        <option value="0">Seleciones  </option>
                                                        <option value="M">Masculino</option>
                                                        <option value="F">Femenino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group col-sm-4">
                                                    <label>Lugar de Nacimiento*</label><br>
                                                    <select id="ln" name="LugarNacimiento" class="form-control">
                                                        <?php
                                                        $cone = "./../../../Modelo/";
                                                        $bdDato = '*';
                                                        $bdTabla = 'municipio';
                                                        $bdCondicion = ' order by nombre';
                                                        include ('./../../../Controlador/BD/ConsultaGeneral.php');
                                                        foreach ($Consulta as $fila) {
                                                            echo '<option value="' . $fila['id'] . '">' . $fila['nombre'] . '</option>';
                                                        }
                                                        ?> 
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Fecha de Nacimiento*</label>
                                                    <input id="fn" name="FechaNacimiento" type="date" class="form-control">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Email*</label>
                                                    <input readonly="readonly" id="coreo" name="Email" type="email" class="form-control" placeholder="andrew@email.com" value="<?php echo $p->getCorreo(); ?>" >
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group col-sm-4">
                                                    <label>Departamento de Residencia*</label><br>
                                                    <select id="dr" name="DepartamentoResidencia" class="form-control">
                                                        <?php
                                                        $cone = "./../../../Modelo/";
                                                        $bdDato = '*';
                                                        $bdTabla = 'departamento';
                                                        $bdCondicion = ' order by nombre';
                                                        include ('./../../../Controlador/BD/ConsultaGeneral.php');
                                                        foreach ($Consulta as $fila) {
                                                            echo '<option value="' . $fila['id'] . '">' . $fila['nombre'] . '</option>';
                                                        }
                                                        ?> 
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Municipio de Residencia*</label><br>
                                                    <select id="mr" name="MunicipioResidencia" class="form-control">
                                                        <?php
                                                        $cone = "./../../../Modelo/";
                                                        $bdDato = '*';
                                                        $bdTabla = 'municipio';
                                                        $bdCondicion = ' order by nombre';
                                                        include ('./../../../Controlador/BD/ConsultaGeneral.php');
                                                        foreach ($Consulta as $fila) {
                                                            echo '<option value="' . $fila['id'] . '">' . $fila['nombre'] . '</option>';
                                                        }
                                                        ?> 
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4 ">
                                                    <label>Barrio*</label>
                                                    <input id="b" name="Barrio" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group col-sm-4 ">
                                                    <label>Dirección*</label>
                                                    <input id="d" name="Dirección" type="text" class="form-control">
                                                </div>
                                                <div class="form-group col-sm-4 ">
                                                    <label>Telefono Fijo*</label>
                                                    <input id="t" name="Telefono" type="number" onkeypress="return numero(event)" class="form-control">
                                                </div>
                                                <div class="form-group col-sm-4 ">
                                                    <label>Celular*</label>
                                                    <input id="c" name="Celular" type="number" onkeypress="return numero(event)" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wizard-footer height-wizard" >
                                            <div class="pull-right" id="Guardar1">
                                                <!--style.display ='none';-->
                                                <input onclick="VistaFormulario(document.getElementById('foto').value,
                                                                document.getElementById('nombre').value,
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
                                                                document.getElementById('c').value,<?php echo "'" . $filtroL . "'"; ?>)"
                                                       type='button'  value='Guardar Datos ' />
                                            </div>
                                            <div class="clearfix">
                                                <div id="error1"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- DIMENSION ACADEMICA-->
                                    <div class="tab-pane" id="dimension">
                                        <h4 class="info-text"> DIMENSIÓN ACADÉMICA </h4>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group col-sm-4 ">
                                                    <label>Sede*</label><br>
                                                    <select id="sede" name="MunicipioResidencia" class="form-control">
                                                        <option value="Valledupar"> Valledupar </option>
                                                        <option value="Aguachica">Seccional Aguachica</option>
                                                        <option value="CERES">CERES Agustin Codazzi</option>
                                                    </select>
                                                </div>             
                                                <div class="form-group col-sm-4 ">
                                                    <label>Facultad*</label><br>
                                                    <select id="facu" name="MunicipioResidencia" class="form-control">
                                                        <option value="Ingenieria"> Ingenieria y Tecnologicas </option>
                                                        <option value="Administrativa">Administrativa</option>
                                                        <option value="Salud">Salud</option>
                                                        <option value="BellasArtes">Bellas Artes</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4 ">
                                                    <label>Programa Académico*</label><br>
                                                    <select id="proa" name="MunicipioResidencia" class="form-control">
                                                        <option value="Aguachica"> Ingenieria Electronica </option>
                                                        <option value="Aguachica"> Ingenieria Sistema </option>
                                                        <option value="Aguachica"> Ingenieria Agroindustrial </option>
                                                        <option value="Aguachica"> Ingenieria Ambiental </option>
                                                        <option value="Bosconia">Arte y folclor</option>
                                                        <option value="Codazzi">Enfermeria</option>
                                                    </select>

                                                </div>

                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group col-sm-3 ">
                                                    <br>
                                                    <label>Jornada*</label><br>
                                                    <select id="jorn" name="Jornada" class="form-control">
                                                        <option value="HorarioNormal">Horario Normal</option>
                                                        <option value="HorarioEspecial">HorarioEspecial</option>
                                                    </select>
                                                </div>   
                                                <div class="form-group col-sm-2 ">
                                                    <br>
                                                    <label>Semestre*</label><br>
                                                    <select id="seme" name="SemestreCursar" class="form-control">
                                                        <option value="1"> 1 </option>
                                                        <option value="2">2</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-2 ">
                                                    <label>Promedio Periodo*</label>
                                                    <input id="prop" name="PromedioPeriodo" type="text" class="form-control">
                                                </div>
                                                <div class="form-group col-sm-2 ">
                                                    <label>Promedio Acumulado*</label>
                                                    <input id="proc" name="PromedioAcumulado" type="text" class="form-control">
                                                </div>
                                                <div class="form-group col-sm-3 ">
                                                    <br>
                                                    <label>Valor de la Matricula*</label>
                                                    <input id="vama" name="ValorMatricula" type="text" class="form-control">
                                                </div>
                                                <div class="col-sm-12 " >
                                                    <h5 style="align-content: center;" >Beneficios a los cuales aspira.</h5>


                                                    <div class="col-sm-4">
                                                        <div class="choice" id ="padrino-wizard-div" data-toggle="wizard-checkbox">
                                                            <input type="checkbox" id="padrino-wizard-checkbox" name="jobb" class="micheckbox" value="PlanPadrino">
                                                            <div class="icon">
                                                                <i class="fa fa-child"></i>
                                                                <i class="fa fa-book"></i>
                                                            </div>
                                                            <h6>Plan Padrino</h6>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="wizard-footer height-wizard" >
                                                <div class="pull-right" id="Guardar2">
                                                    <!--style.display ='none';-->  
                                                    <input onclick="VitaFormulario2(document.getElementById('sede').value,
                                                                    document.getElementById('facu').value,
                                                                    document.getElementById('proa').value,
                                                                    document.getElementById('jorn').value,
                                                                    document.getElementById('seme').value,
                                                                    document.getElementById('prop').value,
                                                                    document.getElementById('proc').value,
                                                                    document.getElementById('vama').value,
                                                                    document.getElementById('sma').value,
                                                                    document.getElementById('str').value,
                                                                    document.getElementById('sfo').value,
                                                                    document.getElementById('sob').value,
                                                    <?php
                                                    echo "'" . $filtroL . "'";
                                                    echo ",'" . $p->getCedula() . "'";
                                                    ?>)"
                                                           type='button'  value='Guardar Datos ' /> 
                                                </div>
                                                <div class="clearfix">
                                                    <div id="error2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--DATOS FAMILIARES-->
                                    <div class="tab-pane" id="familia">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="info-text">DATOS FAMILIARES</h4>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-1 col-sm-offset-1">
                                                    <div class="form-group">
                                                        <label>Estrato</label><br>
                                                        <select id="estra" name="selectEstrato" class="form-control" style="width: 70px;">
                                                            <option value="1"> 1 </option>
                                                            <option value="2"> 2 </option>
                                                            <option value="3"> 3 </option>
                                                            <option value="4"> 4 </option>
                                                            <option value="5"> 5 </option>
                                                            <option value="6"> 6 </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Numero de hermanos</label>
                                                        <input id="nherm" onkeypress="return numero(event)" type="text" name="NumeroHermanos"class="form-control" placeholder="(incluido Ud.)">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Lugar que ocupa entre sus hermanos</label>
                                                        <input id="lqoeh" type="text" name="lugarHermanos" class="form-control" >
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3 col-sm-offset-1">
                                                    <div class="form-group ">
                                                        <label for="">¿Tiene personas a cargo?</label><br>

                                                        <label class="radio-inline">
                                                            <input  id="tcper" value="1" type="radio" name="optradio" >Si
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input id="tcper" value="2" type="radio" name="optradio">No
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 ">
                                                    <div class="form-group">
                                                        <label>¿Cuantas?</label>
                                                        <input id="cuant" type="number" class="form-control" >
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="col-sm-11 col-sm-offset-1">
                                                <div class="form-group ">
                                                    <label for="">Donde reside su familia de origen?</label><br>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4 col-sm-offset-1">
                                                <label>Departamento</label><br>
                                                <select id="drsdp" name="selectDepartamentoFamilia" class="form-control">
                                                    <?php
                                                    $cone = "./../../../Modelo/";
                                                    $bdDato = '*';
                                                    $bdTabla = 'departamento';
                                                    $bdCondicion = ' order by nombre';
                                                    include ('./../../../Controlador/BD/ConsultaGeneral.php');
                                                    foreach ($Consulta as $fila) {
                                                        echo '<option value="' . $fila['id'] . '">' . $fila['nombre'] . '</option>';
                                                    }
                                                    ?> 
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label>Municipio</label><br>
                                                <select id="drsmc" name="selectMunicipioFamilia" class="form-control">
                                                    <?php
                                                    $cone = "./../../../Modelo/";
                                                    $bdDato = '*';
                                                    $bdTabla = 'municipio';
                                                    $bdCondicion = ' order by nombre';
                                                    include ('./../../../Controlador/BD/ConsultaGeneral.php');
                                                    foreach ($Consulta as $fila) {
                                                        echo '<option value="' . $fila['id'] . '">' . $fila['nombre'] . '</option>';
                                                    }
                                                    ?> 
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4 col-sm-offset-1">
                                                <label>Actualmente vive con</label><br>
                                                <select id="actvc" name="MunicipioFamilia" class="form-control">
                                                    <option value="Familia de origen">Familia de origen  </option>
                                                    <option value="Conyugue">Conyugue</option>
                                                    <option value="Solo">Solo</option>
                                                    <option value="Amigos/Compañeros">Amigos/Compañeros</option>
                                                    <option value="Parientes">Parientes</option>
                                                    <option value="Familia de su conyugue">Familia de su conyugue</option>
                                                    <option value="Pension">Pension</option>

                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4 ">
                                                <label>Pertenece a algun grupo vulnerable</label><br>
                                                <select id="pgvul"  name="selectGrupoVulnerable" class="form-control">
                                                    <option value="No">Sin Pertenecer  </option>
                                                    <option value="Negritudes">Negritudes  </option>
                                                    <option value="Desplazado">Desplazado</option>
                                                    <option value="Indigena">Indigena</option>
                                                    <option value="Desmovilizado">Desmovilizado</option>
                                                    <option value="Persona con condicion de discapacidad">Persona con condicion de discapacidad</option>

                                                </select>
                                            </div>
                                            <div class="wizard-footer height-wizard" >
                                                <div class="pull-right" id="G3">
                                                    <!--style.display ='none';-->
                                                    <input onclick="DP3(document.getElementById('estra').value,
                                                                    document.getElementById('nherm').value,
                                                                    document.getElementById('lqoeh').value,
                                                                    document.getElementById('tcper').value,
                                                                    document.getElementById('cuant').value,
                                                                    document.getElementById('drsdp').value,
                                                                    document.getElementById('drsmc').value,
                                                                    document.getElementById('actvc').value,
                                                                    document.getElementById('pgvul').value,
<?php echo "'" . $p->getCedula() . "'"; ?>)"
                                                           type='button'  value='Guardar Datos ' />
                                                </div>
                                                <div class="clearfix">
                                                    <div id="error3"></div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="panel panel-success">
                                                    <div class="panel-heading text-center">
                                                        <h3 class="panel-title">COMPOSICIÓN FAMILIAR</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <table class="table table-hover table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>N°</th>
                                                                    <th>Nombre y Apellido</th>
                                                                    <th>Parentesco</th>
                                                                    <th>Edad</th>
                                                                    <th>Ocupacion</th> 
                                                                    <th>Telefono</th>
                                                                    <th>Ingreso Mensual</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>
                                                                        <input type="text" onkeypress="return letra(event)" name="" id="df11" class="form-control" value="" required="required" pattern="" title="">
                                                                    </td>
                                                                    <td>
                                                                        <select name="" id="df12" class="form-control" required="required">
                                                                            <option value="papa">Papá</option>
                                                                            <option value="mama">Mamá</option>
                                                                            <option value="hijo">Hijo(a)</option>
                                                                            <option value="hermano">Hermano(a)</option>
                                                                            <option value="tio">Tio(a)</option>
                                                                            <option value="sobrina">Sobrino(a)</option>
                                                                            <option value="primo">Primo(a)</option>
                                                                            <option value="abuelo">Abuelo(a)</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <input  type="text" onkeypress="return numero(event)" name="" id="df13" class="form-control" value="" required="required" pattern="" title="">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" onkeypress="return letra(event)" name="" id="df14" class="form-control" value="" required="required" pattern="" title="">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" onkeypress="return numero(event)" name="" id="df15" class="form-control" value="" required="required" pattern="" title="">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" onkeypress="return numero(event)" name="" id="df16" class="form-control" value="" required="required" pattern="" title="">
                                                                    </td> 
                                                                </tr> 
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>
                                                                        <input type="text" onkeypress="return letra(event)" name="" id="df21" class="form-control" value="" required="required" pattern="" title="">
                                                                    </td>
                                                                    <td>
                                                                        <select name="" id="df22" class="form-control" required="required">
                                                                            <option value="papa">Papá</option>
                                                                            <option value="mama">Mamá</option>
                                                                            <option value="hijo">Hijo(a)</option>
                                                                            <option value="hermano">Hermano(a)</option>
                                                                            <option value="tio">Tio(a)</option>
                                                                            <option value="sobrina">Sobrino(a)</option>
                                                                            <option value="primo">Primo(a)</option>
                                                                            <option value="abuelo">Abuelo(a)</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" onkeypress="return numero(event)" name="" id="df23" class="form-control" value="" required="required" pattern="" title="">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" onkeypress="return letra(event)" name="" id="df24" class="form-control" value="" required="required" pattern="" title="">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" onkeypress="return numero(event)" name="" id="df25" class="form-control" value="" required="required" pattern="" title="">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" onkeypress="return numero(event)" name="" id="df26" class="form-control" value="" required="required" pattern="" title="">
                                                                    </td> 
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>
                                                                        <input type="text" onkeypress="return letra(event)" name="" id="df31" class="form-control" value="" required="required" pattern="" title="">
                                                                    </td>
                                                                    <td>
                                                                        <select name="" id="df32" class="form-control" required="required">
                                                                            <option value="papa">Papá</option>
                                                                            <option value="mama">Mamá</option>
                                                                            <option value="hijo">Hijo(a)</option>
                                                                            <option value="hermano">Hermano(a)</option>
                                                                            <option value="tio">Tio(a)</option>
                                                                            <option value="sobrina">Sobrino(a)</option>
                                                                            <option value="primo">Primo(a)</option>
                                                                            <option value="abuelo">Abuelo(a)</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" onkeypress="return numero(event)" name="" id="df33" class="form-control" value="" required="required" pattern="" title="">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" onkeypress="return letra(event)" name="" id="df34" class="form-control" value="" required="required" pattern="" title="">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" onkeypress="return numero(event)" name="" id="df35" class="form-control" value="" required="required" pattern="" title="">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" onkeypress="return numero(event)" name="" id="df36" class="form-control" value="" required="required" pattern="" title="">
                                                                    </td> 
                                                                </tr> 

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wizard-footer height-wizard" >
                                                <div class="pull-right" id="G32">
                                                    <!--style.display ='none';-->
                                                    <input onclick="DP32(document.getElementById('df11').value,
                                                                    document.getElementById('df12').value,
                                                                    document.getElementById('df13').value,
                                                                    document.getElementById('df14').value,
                                                                    document.getElementById('df15').value,
                                                                    document.getElementById('df16').value,
                                                                    document.getElementById('df21').value,
                                                                    document.getElementById('df22').value,
                                                                    document.getElementById('df23').value,
                                                                    document.getElementById('df24').value,
                                                                    document.getElementById('df25').value,
                                                                    document.getElementById('df26').value,
                                                                    document.getElementById('df31').value,
                                                                    document.getElementById('df32').value,
                                                                    document.getElementById('df33').value,
                                                                    document.getElementById('df34').value,
                                                                    document.getElementById('df35').value,
                                                                    document.getElementById('df36').value,
<?php echo "'" . $p->getCedula() . "'"; ?>)"
                                                           type='button'  value='Guardar Datos ' />
                                                </div>
                                                <div class="clearfix">
                                                    <div id="error32"></div>
                                                </div>
                                            </div>
                                        </div> 


                                    </div>
                                    <div class="tab-pane" id="socioeconomico">
                                        <div class="panel-group" id="accordion">
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">EDUCACIÓN</a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <div class="row">

                                                            <div class="form-group col-sm-6">
                                                                <label>Caracter del colegio de secundaria</label>
                                                                <select name="" id="ccs" class="form-control" required="required">
                                                                    <option value="">Privado</option>
                                                                    <option value="">Oficial</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <label>Jornada</label>
                                                                <select name="" id="j" class="form-control" required="required">
                                                                    <option value="">Nocturna</option>
                                                                    <option value="">Diurna</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-sm-offset-1 ">
                                                            <div class="row">
                                                                <label>¿Ha realizado otros estudios?</label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" id="hroe" name="optionsRadiosInline" value="si">si
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" id="hroe" name="optionsRadiosInline" value="no">no
                                                                </label>
                                                                <label class="radio-inline">

                                                                </label>
                                                                <b>¿Cuales?</b>
                                                                <label class="radio-inline">
                                                                    <input type="text" id="c" class="form-control">
                                                                </label>
                                                            </div> <br>
                                                            <div class="row">
                                                                <label>¿Finalizo?</label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" id="f" name="optionsRadiosInline" value="si">si
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" id="f"  name="optionsRadiosInline" value="no">no
                                                                </label>
                                                                <label class="radio-inline">
                                                                </label>
                                                                <b>¿Por que?</b>
                                                                <label class="radio-inline">
                                                                    <input id="pq" class="form-control">
                                                                </label>
                                                            </div> <br>
                                                            <div class="form-group">
                                                                <label>¿Por que escogio la carrera que cursa en la Universidad Popular del Cesar?</label>
                                                                <textarea name="" id="pqeccupc" class="form-control" rows="3" required="required"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>¿Por que medio se entero de los programas que ofrece Universidad Popular del Cesar?</label>
                                                                <textarea name="" id="pqmspoupc" class="form-control" rows="3" required="required"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="wizard-footer height-wizard" >
                                                            <div class="pull-right" id="G41">
                                                                <!--style.display ='none';-->
                                                                <input onclick="DP4(document.getElementById('ccs').value,
                                                                                document.getElementById('j').value,
                                                                                document.getElementById('hroe').value,
                                                                                document.getElementById('c').value,
                                                                                document.getElementById('pq').value,
                                                                                document.getElementById('pqeccupc').value,
                                                                                document.getElementById('pqmspoupc').value,
<?php echo "'" . $p->getCedula() . "'"; ?>)"
                                                                       type='button'  value='Guardar Datos ' />
                                                            </div>
                                                            <div class="clearfix">
                                                                <div id="error41"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">SALUD</a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <div class="row col-sm-offset-1">
                                                            <label>¿Padece alguna enfermedad?</label>
                                                            <label class="radio-inline">
                                                                <input id="pae" type="radio" name="optionsRadiosInline" value="si">si
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input id="pae" type="radio" name="optionsRadiosInline" value="no">no
                                                            </label>
                                                            <label class="radio-inline">

                                                            </label>
                                                            <b>¿Cuales?</b>
                                                            <label class="radio-inline">
                                                                <input id="cpae" class="form-control">
                                                            </label>
                                                        </div> <br> 
                                                        <div class="row col-sm-offset-1">
                                                            <label>¿Ha estado en consulta psicologica?</label>
                                                            <label class="radio-inline">
                                                                <input id="hecp" type="radio" name="optionsRadiosInline" value="si">si
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input id="hecp" type="radio" name="optionsRadiosInline" value="no">no
                                                            </label>
                                                            <br>
                                                            <label class="radio-inline">

                                                            </label>
                                                            <b>Motivo de consulta</b>
                                                            <label class="radio-inline">
                                                                <input id="mchecp" class="form-control">
                                                            </label>
                                                        </div> <br> 
                                                        <div class="form-group col-sm-8 col-sm-offset-1">
                                                            <label>Presenta alguna dificultad a nivel</label>
                                                            <select name="" id="padn" class="form-control" required="required">
                                                                <option value="No">Ninguna</option>
                                                                <option value="Auditivo">Auditivo</option>
                                                                <option value="Visual">Visual</option>
                                                                <option value="lenguaje">De lenguaje</option>
                                                                <option value="Motriz">Motriz</option>
                                                                <option value="Personal">Relaciones personales</option>
                                                            </select>
                                                        </div>
                                                        <div class="row col-sm-offset-1">
                                                            <label>¿Pertenece al regimen de Seguridad Social en Salud?</label>
                                                            <label class="radio-inline">
                                                                <input id="prsss" type="radio" name="optionsRadiosInline" value="si">si
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input id="prsss" type="radio" name="optionsRadiosInline" value="no">no
                                                            </label>
                                                            <br>
                                                            <label class="radio-inline">

                                                            </label>
                                                            <b>¿Cuál?</b>
                                                            <label class="radio-inline">
                                                                <input id="cprsss" class="form-control">
                                                            </label> <br>
                                                            <div class="row">
                                                                <div class="form-group col-sm-6">
                                                                    <label>En calidad de</label>
                                                                    <select name="" id="c" class="form-control" required="required">
                                                                        <option value="Cotizante">Cotizante</option>
                                                                        <option value="Beneficiario">Beneficiario</option>
                                                                        <option value="Subsidiado">Subsidiado</option>
                                                                    </select>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                        <div class="row">
                                                            <div class="row col-sm-offset-1">
                                                                <label>¿Bebe?</label>
                                                                <label class="radio-inline">
                                                                    <input id="bb" type="radio" name="optionsRadiosInline" value="si">si
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input id="bb" type="radio" name="optionsRadiosInline" value="no">no
                                                                </label>
                                                                <label class="radio-inline">

                                                                </label>
                                                                <b>¿Con qué frecuencia?</b>
                                                                <label class="radio-inline">
                                                                    <input id="bbcqf" class="form-control">
                                                                </label>
                                                            </div> <br>
                                                            <div class="row col-sm-offset-1">
                                                                <label>¿Fuma?</label>
                                                                <label class="radio-inline">
                                                                    <input id="fm" type="radio" name="optionsRadiosInline" value="si">si
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input id="fm" type="radio" name="optionsRadiosInline" value="no">no
                                                                </label>
                                                                <label class="radio-inline">

                                                                </label>
                                                                <b>¿Con qué frecuencia?</b>
                                                                <label class="radio-inline">
                                                                    <input id="cffm" class="form-control">
                                                                </label>
                                                            </div> <br>  
                                                        </div>
                                                        <div class="wizard-footer height-wizard" >
                                                            <div class="pull-right" id="G42">
                                                                <!--style.display ='none';-->
                                                                <input onclick="DP42(document.getElementById('pae').value,
                                                                                document.getElementById('cpae').value,
                                                                                document.getElementById('hroe').value,
                                                                                document.getElementById('hecp').value,
                                                                                document.getElementById('mchecp').value,
                                                                                document.getElementById('padn').value,
                                                                                document.getElementById('prsss').value,
                                                                                document.getElementById('cprsss').value,
                                                                                document.getElementById('c').value,
                                                                                document.getElementById('bb').value,
                                                                                document.getElementById('bbcqf').value,
                                                                                document.getElementById('fm').value,
                                                                                document.getElementById('cffm').value,
<?php echo "'" . $p->getCedula() . "'"; ?>)"
                                                                       type='button'  value='Guardar Datos ' />
                                                            </div>
                                                            <div class="clearfix">
                                                                <div id="error42"></div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">DIMENSIÓN ECONÓMICA</a>
                                                    </h4>
                                                </div>
                                                <div id="collapseThree" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="form-group col-sm-7 col-sm-offset-1">
                                                                <label>Quien provee los recursos para sus estudios y sostenimiento</label>
                                                                <select name="" id="qprpes" class="form-control" required="required">
                                                                    <option value="">Padre</option>
                                                                    <option value="">Madre</option>
                                                                    <option value="">Ambos</option>
                                                                    <option value="">Ingresos Propios</option>
                                                                    <option value="">Ayuda Familiar</option>
                                                                    <option value="">Otro</option>
                                                                </select>
                                                            </div>  
                                                        </div>
                                                        <div class="row col-sm-offset-1">
                                                            <label>¿Usted trabaja?</label>
                                                            <label class="radio-inline">
                                                                <input id="ut" type="radio" name="optionsRadiosInline" value="si">si
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input id="ut" type="radio" name="optionsRadiosInline" value="no">no
                                                            </label><br>
                                                            <b>¿En que horario?</b>
                                                            <label class="radio-inline">
                                                                <input id="ehut" class="form-control">
                                                            </label>
                                                        </div> <br>
                                                        <div class="row">
                                                            <div class="form-group col-sm-6 col-sm-offset-1">
                                                                <label>Ingreso Familiar Mensual</label>
                                                                <select name="" id="ifm" class="form-control" required="required">
                                                                    <option value="">Menos de un salario mínimo</option>
                                                                    <option value="">Entre uno y tres salarios mínimos</option>
                                                                    <option value="">Entre tres y cinco salarios mínimos</option>
                                                                    <option value="">Mas de cinco salarios mínimos</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wizard-footer height-wizard" >
                                                        <div class="pull-right" id="G43">
                                                            <!--style.display ='none';-->
                                                            <input onclick="DP43(document.getElementById('qprpes').value,
                                                                            document.getElementById('ut').value,
                                                                            document.getElementById('ehut').value,
                                                                            document.getElementById('ifm').value,
<?php echo "'" . $p->getCedula() . "'"; ?>)"
                                                                   type='button'  value='Guardar Datos ' />
                                                        </div>
                                                        <div class="clearfix">
                                                            <div id="error43"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">DIMENSIÓN FISICA Y AMBIENTAL</a>
                                                    </h4>
                                                </div>
                                                <div id="collapseFour" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="form-group col-sm-3 col-sm-offset-1">
                                                                <label>Tipo de vivienda</label>
                                                                <select name="" id="tv" class="form-control" required="required">
                                                                    <option value="Casa">Casa</option>
                                                                    <option value="Apartamento">Apartamento</option>
                                                                    <option value="Habitación">Habitación</option>
                                                                    <option value="Casalote">Casalote</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-3 ">
                                                                <label>Tendencia</label>
                                                                <select name="" id="ten" class="form-control" required="required">
                                                                    <option value="Propia">Propia</option>
                                                                    <option value="Familiar">Familiar</option>
                                                                    <option value=Arrendada"">Arrendada</option>
                                                                </select>
                                                            </div> 
                                                        </div>

                                                        <div class="row col-sm-offset-1">
                                                            <label>Número de persona que comparten la vivienda</label>
                                                            <label class="radio-inline">
                                                                <input id="npcv" type="number" class="form-control">
                                                            </label>
                                                        </div> <br>
                                                        <div class="form-group col-sm-offset-1 ">
                                                            <label >Servicios públicos con que cuenta la vivienda</label><br>
                                                            <div>
                                                                <label class="checkbox-inline">
                                                                    <input  type="checkbox" name="optradio" >Agua
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="optradio">Gas
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="optradio">Luz Electrica
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="optradio">Alcantarillado
                                                                </label>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="wizard-footer height-wizard" >
                                                        <div class="pull-right" id="G44">
                                                            <!--style.display ='none';-->
                                                            <input onclick="DP44(document.getElementById('tv').value,
                                                                            document.getElementById('ten').value,
                                                                            document.getElementById('npcv').value,
<?php echo "'" . $p->getCedula() . "'"; ?>)"
                                                                   type='button'  value='Guardar Datos ' />
                                                        </div>
                                                        <div class="clearfix">
                                                            <div id="error44"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">UTILIZACIÓN DEL TIEMPO LIBRE</a>
                                                    </h4>
                                                </div>
                                                <div id="collapseFive" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <div class="row col-sm-offset-1">
                                                            Que actividades realiza en su tiempo libre dentro de  la universidad
                                                            <label class="radio-inline">
                                                                <input id="qartldu" type="text" class="form-control">
                                                            </label>
                                                        </div> <br>
                                                        <div class="row col-sm-offset-1">
                                                            Que actividades realiza fuera de la universidad
                                                            <label class="radio-inline">
                                                                <input id="qarfu" type="text" class="form-control">
                                                            </label>
                                                        </div> <br>
                                                        <div class="row col-sm-offset-1">
                                                            <label> ¿Pertenece a algun grupo de interés dentro o fuera de la universidad?</label>
                                                            <label class="radio-inline">
                                                                <input id="pagidfu" type="radio" name="optionsRadiosInline" value="si">si
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input id="pagidfu" type="radio" name="optionsRadiosInline" value="no">no
                                                            </label>
                                                            <label class="radio-inline">
                                                            </label>
                                                        </div>
                                                        <div class=" col-sm-7 col-sm-offset-1">
                                                            <label>De que tipo</label>
                                                            <select id="dqt" class="form-control " required="required">
                                                                <option value="">Cultural</option>
                                                                <option value="">Deportivo</option>
                                                                <option value="">Politico</option>
                                                                <option value="">De estudio</option>
                                                                <option value="">Ecologico</option>
                                                                <option value="">Otro</option>
                                                            </select><br> 
                                                        </div> 
                                                    </div>
                                                    <div class="wizard-footer height-wizard" >
                                                        <div class="pull-right" id="G45">
                                                            <!--style.display ='none';-->
                                                            <input onclick="DP45(document.getElementById('qartldu').value,
                                                                            document.getElementById('qarfu').value,
                                                                            document.getElementById('pagidfu').value,
                                                                            document.getElementById('dqt').value,
<?php echo "'" . $p->getCedula() . "'"; ?>)"
                                                                   type='button'  value='Guardar Datos ' />
                                                        </div>
                                                        <div class="clearfix">
                                                            <div id="error45"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div> 
                                <div class="wizard-footer height-wizard" >
                                    <div class="pull-right">
                                        <input   type='button' class='btn btn-next btn-fill btn-success btn-wd btn-sm' name='next' value='Sigiente' />
                                        <a type='button' href="./.."  class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish'  >Finalizar</a>
                                    </div>
                                    <div class="pull-left">
                                        <input   type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Anterio' />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div><!-- end row -->
        </div> <!--  big container -->




        <!-- Modal para Prestamo deBici -->  
        <div class="modal fade" id="modalBicicleta">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" style="align-content: center;">Observaciones</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" role="form">
                            <div>
                                <label for="">Explique brevemente porque solicita el prestamo de la bicicleta</label><br>
                                <textarea name="" id="expl" class="form-control" rows="3" required="required" >.</textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar Cambios</button> 
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Alimento-->  
        <div class="modal fade" id="modalAlimentacion">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" style="align-content: center;">Información Nutricional</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" role="form">

                            <div class="form-group ">
                                <label for="">¿Es usted vegetariano?</label><br>
                                <div>
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio" >Si
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio">No
                                    </label>
                                </div>

                            </div>
                            <div class="form-group ">
                                <label for="">¿Es alérgico a algún alimento?</label><br>
                                <div>
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio" >Si
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio">No
                                    </label>  
                                </div>
                            </div>
                            <div>
                                <label for="">¿Cuál(es)?</label><br>

                                <textarea name="" id="input" class="form-control" rows="3" required="required"></textarea>
                            </div>
                            <div class="form-group ">
                                <label for="">¿Cuanto mide actualmente?</label><br>
                                <input type="text" class="form-control" >
                            </div>
                            <div class="form-group ">
                                <label for="">¿Cuanto pesa actualmente?</label><br>
                                <input type="text" class="form-control" >
                            </div>

                            <div class="panel panel-success">
                                <div class="panel-heading text-center">
                                    <h3 class="panel-title ">DISPONIBILIDAD PARA TOMAR EL APOYO ALIMENTARIO</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered table-striped">

                                            <thead>
                                                <tr>
                                                    <th>HORARIO</th>
                                                    <th>LUNES</th>
                                                    <th>MARTES</th>
                                                    <th>MIERCOLES</th>
                                                    <th>JUEVES</th>
                                                    <th>VIERNES</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <td>SOLICITADO</td>
                                                    <td class="text-center">
                                                        <input type="checkbox" name="" value="ON" />
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox" name="" value="ON" />
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox" name="" value="ON" />
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox" name="" value="ON" />
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox" name="" value="ON" />
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar Cambios</button>                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->  
        <div class="modal fade" id="modalPadrino">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" style="align-content: center;">Elección de Beneficios</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" role="form">

                            <div class="form-group ">
                                <label for="">Selecione los beneficios a los cuales aspira</label><br>
                                <div>
                                    <label class="checkbox-inline">
                                        <input id="sma" type="checkbox" name="optradio" >Matricula
                                    </label>
                                    <label class="checkbox-inline">
                                        <input id="str" type="checkbox" name="optradio">Transporte
                                    </label>
                                    <label class="checkbox-inline">
                                        <input id="sfo" type="checkbox" name="optradio">Fotocopia
                                    </label>
                                </div>

                            </div>

                            <div>
                                <label  for="">Observaciones</label><br>
                            </div>
                            <textarea name="" id="sob" class="form-control" rows="3" required="required"></textarea>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar Cambios</button>


                    </div>
                </div>
            </div>
        </div>

        <!--   Core JS Files   -->
        <script src="./../assets/plugin/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="./../assets/plugin/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="./../assets/plugin/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
        <!--  Plugin for the Wizard -->
        <script src="./../assets/plugin/js/gsdk-bootstrap-wizard.js"></script>
        <!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
        <script src="./../assets/plugin/js/jquery.validate.min.js"></script>
        <script>

                                                                var seguirAlimentacion = true;
                                                                var seguirBicicleta = true;
                                                                var seguirPadrino = true;
                                                                $("#alimentacion-wizard-div").click(function (event) {
                                                                    /* Act on the event */
                                                                    if (seguirAlimentacion == true) {
                                                                        $("#modalAlimentacion").modal("show");
                                                                        $("#alimentacion-wizard-checkbox").prop('checked', 'checked');
                                                                        seguirAlimentacion = false;
                                                                    } else {
                                                                        $("#alimentacion-wizard-checkbox").prop('checked', '');
                                                                        seguirAlimentacion = true;
                                                                    }
                                                                });
                                                                $("#bicicleta-wizard-div").click(function (event) {
                                                                    /* Act on the event */
                                                                    if (seguirBicicleta == true) {
                                                                        $("#modalBicicleta").modal("show");
                                                                        $("#bicicleta-wizard-checkbox").prop('checked', 'checked');
                                                                        seguirBicicleta = false;
                                                                    } else {
                                                                        $("#bicicleta-wizard-checkbox").prop('checked', '');
                                                                        seguirBicicleta = true;
                                                                    }

                                                                });
                                                                $("#padrino-wizard-div").click(function (event) {
                                                                    /* Act on the event */
                                                                    if (seguirPadrino == true) {
                                                                        $("#modalPadrino").modal("show");
                                                                        $("#padrino-wizard-checkbox").prop('checked', 'checked');
                                                                        seguirPadrino = false;
                                                                    } else {
                                                                        $("#padrino-wizard-checkbox").prop('checked', '')
                                                                        seguirPadrino = true;
                                                                    }
                                                                });
                                                                $("#hago").click(function (event) {
                                                                    $('.micheckbox:checked').each(function () {
                                                                        alert("El checkbox " + $(this).val() + " esta selecionado")
                                                                    });
                                                                });

        </script>
    </div>
</body>
</html>