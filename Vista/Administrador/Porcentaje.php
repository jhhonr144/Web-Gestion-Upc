<?php
if (!isset($_SESSION)) {
    SESSION_START();
}

/*
Modero que sea un estudiante que entre aqui
*/
if (isset($_SESSION['persona'])) {
    include_once ('./../../Modelo/Persona.php');
    $p = unserialize($_SESSION['persona']);
    if ($p->getTipo() != 'Administrador') {
        $url = './../';
        echo '<meta http-equiv=refresh content="1; ' . $url . '">';
        die;
    } 
} 
else {
    $url = './../';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';
    die;
}

include_once ('./../../Controlador/Variable/Administrador.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head> 
        <?php include('./../Plantilla/Head.php'); ?>
    </head>

    <body>
        <div id="Respuesta"></div>
        <section id="Inicio" >
            
            <?php $select_2="si";include('./Menu/Menu.php'); ?>      
            <!-- **********************************************************************************************************************************************************
            MAIN CONTENT
            *********************************************************************************************************************************************************** -->
            <!--main content start-->
            <section id="main-content">
                <section class="Medio">
                    <div class="row">
                        <div class="col-lg-11 main-chart">                   

<div class="row mt" style="margin-top: 54px;margin-left: 50px;">    
    <div id="Medio">
<?php
if (!isset($_SESSION)) {
    SESSION_START();
}
if (isset($_SESSION['persona'])) {
    include_once ('./../../Modelo/Persona.php');
    $p = unserialize($_SESSION['persona']);
    if ($p->getTipo() != 'Administrador') {
        $url = './../';
        echo '<meta http-equiv=refresh content="1; ' . $url . '">';
        die;
    }
}
include_once ('./../../Controlador/Variable/Administrador.php');
?> 
<!--//#################-->
<!--circulo 1-->
<div class="row mt"   >
    <div class="col-md-8 mb" onclick="aqui();" >
        <div class="darkblue-panel pn"> 
            <span class="from">
                <h5>Formularios Convocatoria activa</h5>
            </span>
            <canvas id="TerminadoG" height="100%"></canvas>
            <script type="text/javascript">
                function aqui() {
                    var oilCanvas = document.getElementById("TerminadoG");

                    Chart.defaults.global.defaultFontFamily = "Lato";
                    Chart.defaults.global.defaultFontSize = 18;

                    var oilData = {
                        labels: [
                            "Formulario Terminados <?php echo $completo; ?>",
                            "Formularios Empezado  <?php echo $todos - $completo; ?>",
                            "Formularion Cancelado"
                        ],
                        datasets: [
                            {
                                data: [<?php echo $por_completo . "," . $por_terminar; ?>, 0],
                                backgroundColor: [
                                    "#9bbf4c",
                                    "#9DAE6C",
                                    "#7C3224"
                                ]
                            }]
                    };

                    var pieChart = new Chart(oilCanvas, {
                        type: 'pie',
                        data: oilData
                    });


                }
                aqui(1);
            </script> 
            <div class="pull-left">
                <h5><i class="fa fa-hdd-o"></i><?php echo "  " . $todos ?> Formulario Gestionados</h5>
            </div>  
        </div><!-- -- /darkblue panel ---->
    </div>

    <div class="col-md-8 mb">
        <!-- REVENUE PANEL -->
        <div class="darkblue-panel pn" onclick="IniciosEstuiante('0')">
            <span class="from">
                <h5>Inicio al sistema (Estudiante)</h5>
            </span>
            <div class="chart mt"> 
                <canvas id="speedChart"  height="100%"></canvas>
                <script type="text/javascript">
function aqui1(){
                    var speedCanvas = document.getElementById("speedChart");

                    Chart.defaults.global.defaultFontFamily = "Lato";
                    Chart.defaults.global.defaultFontSize = 18;

                    var speedData = {
                        backgroundColor:  "#9bbf4c",
                        labels: ['hoy<?php
foreach ($vec_inicio as $fila) {
    echo "','" . $fila['dia'];
}
?>'],
                        datasets: [{
                                backgroundColor: 
                                    "#9bbf4c",
                                label: "Inicios de Estudiante en el dia",
                                data: [0<?php
$bdDato = "count(*) c,dia";
$bdTabla = "inicioe";
$bdCondicion = 'group by user,dia
                                                        order by dia desc
                                                        limit 10';
include './../../Controlador/BD/ConsultaGeneral.php';
foreach ($Consulta as $fila) {
    echo "," . $fila['c'];
}
?>],
                            }]
                    };

                    var chartOptions = {
                        legend: {
                            display: true,
                            position: 'top',
                            fontColor: "#9bbf4c",
                            labels: {
                                boxWidth: 80,
                                fontColor: "#9bbf4c"
                            }
                        }
                    };

                    var lineChart = new Chart(speedCanvas, {
                        type: 'line',
                        data: speedData,
                        options: chartOptions
                    });
                    }
                    aqui1(1);
                </script>

            </div>
        </div>
    </div>
    <div>
        <?php /*
          <!--<div class="col-md-8 col-sm-8 mb">-->
          <div class="darkblue-panel pn" >
          <!--###############################################-->
          <canvas id="myChart"></canvas>
          <!--<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>-->
          <script type="text/javascript">
          var ctx = document.getElementById('myChart').getContext('2d');
          var chart = new Chart(ctx, {
          // The type of chart we want to create
          type: 'bar',

          // The data for our dataset
          data: {

          labels: ['2018-2','2018-1','2018-2'],
          datasets: [{
          label: 'sistema',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: [45]
          },{
          label: 'eet',
          backgroundColor: 'rgb(255, 199, 132)',
          borderColor: 'rgb(255, 199, 132)',
          data: [145]
          }]
          },

          options: {

          layout: {
          padding: {
          left: 50,
          right: 0,
          top: 0,
          bottom: 0
          }
          },
          scales: {
          xAxes: [{
          stacked: true
          }],
          yAxes: [{
          stacked: true
          }]
          },
          title: {
          display: true,
          text: 'Custom Chart Title'
          }

          }
          });
          </script>

          <!--################################################-->
          </div>
          <!--</div>-->
         */ ?>
    </div>

</div>
<!--//####################-->
<!--barrar 2-->
</div><!-- /row -->
</div>
                             </div><!-- /col-lg-9 END SECTION MIDDLE -->
                        <!-- **********************************************************************************************************************************************************
                        RIGHT SIDEBAR CONTENT
                        *********************************************************************************************************************************************************** -->                  
                        <?php //include_once ('./../Plantilla/Notificaciones/Ariba.php'); ?>

                    </div><! --/row -->
                </section>
            </section>

            <!--main content end-->
            <!--footer start-->
            <footer class="site-footer" style="margin-top: 55px">
                <?php include('./../Plantilla/Fin.php'); ?>
            </footer>
            <!--footer end-->
        </section>
        <?php
        include ('./../Plantilla/Scritp.php'); 
        //include ($puntos . 'Plantilla/Notificaciones/UltimoInicio.php');
        //include ($puntos.'Plantilla/Alerta.php');
        ?>

    </body>
</html>
