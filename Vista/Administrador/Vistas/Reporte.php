<div class="CInicio">
    <a onclick="Inicio()">Inicio</a>
    <i class="fa fa-angle-right"></i>
    <p>    </p>
    <form  method="GET" action="./../fpdf/index.php" target="_blank">
        <input name="correcto" value="si" style="visibility: hidden">
        <div >
            <label >Titulo: 
                <input style="margin-left: 0px;min-width: 250px;" class="form-control " id="titulo" name="titulo" type="text" width="250px">            
            </label>
        </div>

        <div>
            <label>Consulta Estudiante: 
                <select class="form-control" name="consulta" onchange="bottonpdf(this.value);">
                    <option value="0"><b>Slecionar</b> Consulta</option>
                    <option value="1">Mostrar <b>Estudiantes</b> En el Sistema De Ayuda</option>
<!--                    <option value="2">Mostrar todo los <b>Estudiantes</b> En el Sistema De Ayuda</option>
                    <option value="3">Mostrar <b>Estudiantes</b> de la carrera</option>
                    <option value="4">Mostrar <b>Estudiantes</b> de la faculta</option>
                    <option value="5">Mostrar <b>Estudiantes</b> con formulario sin terminar</option>
                    <option value="6">Mostrar <b>Estudiantes</b> con formulario Calificado</option>
                    <option value="7">Mostrar inicio de sessiones </option>-->
                </select>
            </label>
        </div>
        <br>
        <div id="demas"></div>
        <br>
        <div id="botton">

        </div>
    </form>


</div>
<br><br>