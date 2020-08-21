<?php
include_once ('./../../Controlador/Variable/General.php');
?> 
<div id="login-page">
    <div class="container">
        <form class="form-login"  >
            <h2 class="form-login-heading">Iniciar en el Sistema UPC - Ayuda</h2>
            <div class="login-wrap">
                <input   type="email" class="form-control" autocomplete="off"
                         id="correo" placeholder="@unicesar.edu.co" value=""
                         required="" 
                         pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">	
                <span class="help-block">Ingrese sus <b>Correo Institucional</b>.</span>
                <div id="rcorreo"></div>
                <br>
                <input   onfocus="" autocomplete="off" type="password" class="form-control" id="clave" placeholder="Clave" value="">
                <span class="help-block">Ingrese su clave.</span>
                 
                <div id="rclave"></div>
                <!--                <label class="checkbox">
                                    <span class="pull-right">
                                        <a data-toggle="modal" href="login.html#myModal"> Olvido la clave</a>
                                        <br>
                                        <a data-toggle="modal" href="login.html#myModal"> Olvido El Usuario</a>
                                    </span>
                                </label>-->
        </form>	  	
        <br><label class="checkbox">
            <a data-toggle="modal" class="btn btn-theme btn-block" onclick="VerificarInicio(document.getElementById('clave').value,
            document.getElementById('correo').value)" type="submit"><i class="fa fa-lock"></i> Iniciar</a>
            <div id="IError"></div>
        </label>
        <hr>

        <div class="login-social-link centered">
            <p>o Tambien puedes registrarse</p>
            <button class="btn btn-theme btn-block" onclick="Registrarse()" ><i class="fa fa-facebook"></i> Registrate!.</button> 
        </div> 

    </div>

</div></div>
 