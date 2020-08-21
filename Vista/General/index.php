<?php
include_once ('./../../Controlador/Variable/General.php');
if (!isset($_SESSION)) {
    SESSION_START();
}
if (isset($_SESSION['persona'])) {
    include './../../Modelo/Persona.php';
    $p=new Persona();
    $p = unserialize($_SESSION['persona']);
    if ($p->getTipo() != '_') {
        $url = './../';
        echo '<meta http-equiv=refresh content="1; ' . $url . '">';
        die;
    }
}  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('./../Plantilla/Head.php'); ?>
    </head>

    <body>

        <section id="Inicio" >
            <?php include('./../Plantilla/Menu/Menu.php'); ?>      
            <!-- **********************************************************************************************************************************************************
            MAIN CONTENT
            *********************************************************************************************************************************************************** -->
            <!--main content start-->
            <section id="main-content">
                <section class="Medio">
                    <div class="row">
                        <div class="col-lg-9 main-chart">                   
<?php include_once ('./../Plantilla/Medio.php'); ?>
                        </div><!-- /col-lg-9 END SECTION MIDDLE -->
                        <!-- **********************************************************************************************************************************************************
                        RIGHT SIDEBAR CONTENT
                        *********************************************************************************************************************************************************** -->                  
<?php include_once ('./../Plantilla/Notificaciones/Ariba.php'); ?>

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
//include ($puntos . 'Plantilla/Scritp.php');
//include ($puntos.'Plantilla/Alerta.php');
?>

    </body>
</html>
