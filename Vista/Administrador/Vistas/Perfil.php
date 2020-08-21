<?php 
if(!isset($_GET['cc']))echo "ww ";
$cedula = filter_input(INPUT_GET, 'cc', FILTER_SANITIZE_SPECIAL_CHARS);
$bdDato = "* ";
$bdTabla = "estudiante ";
$bdCondicion = 'where cc=' . $cedula;
$cone = "./../../../Modelo/";
include './../../../Controlador/BD/ConsultaGeneral.php';
foreach ($Consulta as $fila) {
?> 

<section class="Registro"> 
    <form action="#" method="POST">  
        <div id="cerrar" class="close"><a style="width: 20px;"  onclick="PerfilE('X')">X</a></div>
        <h3><i class="fa fa-angle-right"></i> Datos del Estudiante <?php echo $fila['nombre']; ?> </h3>
        <input style="visibility: hidden" id="variable" type="text" >
        <center><div  id="cambio"></diV></center>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class=""><i class="fa fa-angle-right"></i> Llenese con datos validos.</h4>
                    <form class="form-horizontal style-form" method="get"> 
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label"  >Nombre:</label>
                            <div class="col-sm-4">
                                <input  value="<?php echo $fila['nombre']; ?>"                          
                                    onclick="document.getElementById('variable').value = this.value;document.getElementById('cambio').innerHTML = ' '"
                                    onblur="confirmar(this.value, document.getElementById('variable').value, 'nombre')"
                                    id="nombre" placeholder="Nombre" type="text" min="3" max="100" maxlength="100" minlength="3"
                                    class="form-control" onkeypress="return letra(event)" >
                                <span class="help-block">Ingrese sus nombre.</span>
                                <div id="rnombre"></div>
                            </div> 
                            <label class="col-sm-2 col-sm-2 control-label">Apellido:</label>
                            <div class="col-sm-4">
                                <input value="<?php echo $fila['apellido']; ?>"
                                    onclick="document.getElementById('variable').value = this.value;document.getElementById('cambio').innerHTML = ' '"
                                    onblur="confirmar(this.value, document.getElementById('variable').value, 'apellido')"
                                    id="apellido" placeholder="Apellido" type="text" min="3" max="100" maxlength="100" minlength="3"  class="form-control" onkeypress="return letra(event)">
                                <span class="help-block">Ingrese sus Apellidos.</span>
                                <div id="rapellido"></div>
                            </div>
                        </div>
                        <!--correo-->
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Correo:</label>
                            <div class="col-sm-4">
                                <input   type="email" class="form-control" autocomplete="off" 
                                         id="mail" placeholder="@unicesar.edu.co" value="<?php echo $fila['correo']; ?>"
                                         required="" 
                                         pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}"	
                                         onclick="document.getElementById('variable').value = this.value;document.getElementById('cambio').innerHTML = ' '"
                                         onblur="confirmar(this.value, document.getElementById('variable').value, 'apellido')">
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">Cedula:</label>
                            <div class="col-sm-4">
                                <input   type="number" class="form-control" id="cc"  
                                         readonly  value="<?php echo $fila['cc']; ?>">
                                <span class="help-block"></span>
                            </div> 
                        </div>
                        <!--clave-->                    
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Clave:</label>
                            <div class="col-sm-4">
                                <input  value="<?php echo $fila['clave']; ?>"
                                    onclick="document.getElementById('variable').value = this.value;document.getElementById('cambio').innerHTML = ' '"
                                    onblur="confirmar(this.value, document.getElementById('variable').value, 'clave')"
                                    autocomplete="off" type="password" class="form-control" id="clave" placeholder="Clave" >
                                <span class="help-block">Ingrese su clave.</span>
                                <div id="rclave"></div>
                            </div> 

                            <label class="col-sm-2 control-label">Celular:</label>
                            <div class="col-sm-4">
                                <input value="<?php echo $fila['celular']; ?>"
                                    onclick="document.getElementById('variable').value = this.value;document.getElementById('cambio').innerHTML = ' '"
                                    onblur="confirmar(this.value, document.getElementById('variable').value, 'celular')"
                                    onkeypress="return numero(event)" type="number" min="10000000" max="9999999999"
                                    class="form-control mb-3" id="celular" placeholder="Documento indentida" value="">
                                <span class="help-block">Ingrese su numero de celular.</span>
                                <div id="rcelular"></div>
                            </div>

                        </div>
                        <!--carrera-->
                        <div class="form-group">

                            <label class="col-sm-2 control-label">genero:</label>
                            <div class="col-sm-6">
                                <select id="Genero"  value="<?php echo $fila['Genero']; ?>"
                                        onclick="document.getElementById('variable').value = this.value;document.getElementById('cambio').innerHTML = ' '"
                                        onchange="confirmar(this.value, document.getElementById('variable').value, 'Genero')"
                                        >
                                    <option value="D">Escoger</option>
                                    <option value="M">Hombre</option>
                                    <option value="F">Mujer</option>
                                </select>
                                <span class="help-block">Ingrese su Genero.</span>
                                <div id="rcedula"></div>
                            </div>  

                        </div>
                    </form> 
                    <div id="rboton">
                        <input type="button" value="Regístrate" style="visibility: hidden"   class="btn amado-btn w-100">
                    </div>

                </div>
            </div><!-- col-lg-12-->      	
        </div><!-- /row -->
        <script type="text/javascript">
            function letra(e) { // 1
                tecla = (document.all) ? e.keyCode : e.which; // 2
                if (tecla == 8)
                    return true; // 3
                patron = /[A-Za-z\s]/; // 4
                te = String.fromCharCode(tecla); // 5
                return patron.test(te); // 6
            }
            function numeros(e) { // 1
                tecla = (document.all) ? e.keyCode : e.which; // 2
                if (tecla == 8)
                    return true; // 3
                ppatron = /\d/; // Solo acepta números// 4
                te = String.fromCharCode(tecla); // 5
                return patron.test(te); // 6
            }
            function confirmar(a, b, c) {//cambiar directo a estudiante
                //a es el dato igresado
                //b el que estaba
                //c el atributo
                if (a != b) {
                    if (confirm("Desea que se actualise el dato cambiado")) {
                        Modificar(document.getElementById('cc').value, a, c);
                    } else {
                        document.getElementById(c).value = b;
                        document.getElementById("variable").value = b;
                    }
                }
            }
        </script>
    </form>
</section>
<?php } ?>