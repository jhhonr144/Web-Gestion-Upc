<?php
include_once ('./../../Controlador/Variable/General.php');
?> 


<section class="Registro">
    <h3><i class="fa fa-angle-right"></i> Registrarse.</h3>
    <!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class=""><i class="fa fa-angle-right"></i> Llenese con datos validos.</h4>
                <form class="form-horizontal style-form" method="get"> 
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nombres:</label>
                        <div class="col-sm-4">
                            <input id="nombre" placeholder="Nombre" type="text" min="3" 
                                   max="100" maxlength="100" minlength="3"  class="form-control" onkeypress="return letra(event)">
                            <span class="help-block">Ingrese sus nombre.</span>
                            <div id="rnombre"></div>
                        </div> 
                        <label class="col-sm-2 col-sm-2 control-label">Apellido:</label>
                        <div class="col-sm-4">
                            <input id="apellido" placeholder="Apellido" type="text" min="3" max="100" maxlength="100" minlength="3"  class="form-control" onkeypress="return letra(event)">
                            <span class="help-block">Ingrese sus Apellidos.</span>
                            <div id="rapellido"></div>
                        </div>
                    </div>
                    <!--correo-->
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Correo:</label>
                        <div class="col-sm-10">
                            <input   type="email" class="form-control" autocomplete="off"
                                     id="mail" placeholder="@unicesar.edu.co" value=""
                                     required="" 
                            pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">	
                            <span class="help-block">Ingrese sus <b>Correo Institucional</b>.</span>
                            <div id="rcorreo"></div>
                        </div>
                    </div>
                    <!--clave-->                    
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Clave:</label>
                        <div class="col-sm-4">
                            <input   autocomplete="off" type="password" class="form-control" id="clave" placeholder="Clave" value="">
                            <span class="help-block">Ingrese su clave.</span>
                            <div id="rclave"></div>
                        </div> 
                        <label class="col-sm-2 col-sm-2 control-label">Repetir clave:</label>
                        <div class="col-sm-4">
                            <input   autocomplete="off" type="password" class="form-control" id="clave2" placeholder="Clave" value="">
                            <span class="help-block">Ingrese otravez su clave.</span>
                            <div id="rclave2"></div>
                        </div>
                    </div>
                    <!--carrera-->
                    <div class="form-group">
                        <label class="col-sm-1 control-label">Carrera:</label>
                        <div class="col-sm-3">
                            <select class="w-100" id="car" style="" >                                
                                <option value="-1">Escoger Carrera:</option> 
                                <?php
                                $bdDato = '*';
                                $bdTabla = 'carrera';
                                $bdCondicion = 'where id > 0';
                                include ($bd . 'ConsultaGeneral.php'); 
                                foreach ($Consulta as $fila) {
                                    echo '<option value="' . $fila['id'] . '">' . $fila['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                            <span class="help-block">Selecione su carrera.</span>
                            <div id="rcarrera"></div>
                        </div> 
                        <label class="col-sm-1 control-label">Documento:</label>
                        <div class="col-sm-3">
                            <input onkeypress="return numero(event)" type="number" min="10000000" max="9999999999" 
                                   class="form-control mb-3" id="cc" placeholder="Documento indentida" value="">
                            <span class="help-block">Ingrese su documento de indentificacion.</span>
                            <div id="rcedula"></div>
                        </div> 
                        <label class="col-sm-1 control-label">Celular:</label>
                        <div class="col-sm-3">
                            <input onkeypress="return numero(event)" type="number" min="10000000" max="9999999999"
                                   class="form-control mb-3" id="cel" placeholder="Documento indentida" value="">
                            <span class="help-block">Ingrese su numero de celular.</span>
                            <div id="rcelular"></div>
                        </div>
                    </div>
                </form> 
                <div id="rboton">
                    <input type="button" value="Regístrate" onclick="VerificarRegistro(document.getElementById('nombre').value,
                        document.getElementById('apellido').value,document.getElementById('mail').value,
                        document.getElementById('clave').value,document.getElementById('cc').value,
                        document.getElementById('clave2').value,
                        document.getElementById('cel').value,document.getElementById('car').value);" 
                    class="btn amado-btn w-100">
                </div>
<!--                <diV>x
                <input type="button" value="Regístrate" onclick="Registrar(document.getElementById('nombre').value,
                        document.getElementById('apellido').value,document.getElementById('mail').value,
                        document.getElementById('clave').value,document.getElementById('cc').value,
                        document.getElementById('clave2').value,
                        document.getElementById('cel').value,document.getElementById('car').value);" 
                    class="btn amado-btn w-100">
                </div>-->
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
        function numeros(nu) { // 1
            tecla = (document.all) ? e.keyCode : e.which; // 2
            if (tecla == 8)
                return true; // 3
            ppatron = /\d/; // Solo acepta números// 4
            te = String.fromCharCode(tecla); // 5
            return patron.test(te); // 6
        }
    </script>

</section>