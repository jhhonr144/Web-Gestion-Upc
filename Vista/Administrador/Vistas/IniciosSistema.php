<ol class="breadcrumb  CInicio">
    <li class="breadcrumb-item">
        <a onclick="Inicio()">
            Inicio
        </a>
        <i class="fa fa-angle-right"> 
            Estudiante
        </i>
        <p> 

        <div id="VerEstudiante">
            <a style="animation: none;cursor: alias"> 
                <h3  >Perfil Del Estudiante</h3>
            </a>
            <div class="w3layouts-left"  style="min-width: 280px">
                <!--search-box-->
                <div class="w3-search-box">
                    <form action="#" method="post">
                        <input type="text" id="cc" name="cc" placeholder="Cedula a Buscar" required="">	
                        <a class="btn btn-success btn-xs" onclick="VerEstudiante(document.getElementById('cc').value)"><i class="fa fa-check"></i> Buscar</a>					
                    </form>
                </div><!--//end-search-box-->
                <div class="clearfix"> </div>
                <div id="verEstudiante"  ></div>
            </div>
 
        </div>
        <div id="" >
                <a style="animation: none;cursor: alias"> 
                    <h3 onclick="EstudianteInico('A')" >Inicios en el sistema</h3> 
                </a>
            <div id="tablaIES"></div>
            </div>                                   
            <div id="" >
                 <a style="animation: none;cursor: alias"><h3 onclick="EstudianteCarrera('A')">Por Carreras</h3></a> 
                 <div id="EstudianteCarrera"></div>
            </div>
        </p>
    </li>
</ol>