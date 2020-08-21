<div class="col-lg-3 ds" style="margin-top: 50px;">
    <!--COMPLETED ACTIONS DONUTS CHART-->
    <h3>NOTIFICATIONES</h3>
    <?php
    $bdDato = 'Nombre,FFinal';
    $bdTabla = 'convocatoria';
    $bdCondicion = 'where estado="A"';
    include ($bd . 'ConsultaGeneral.php');
    foreach ($Consulta as $value) {
        $mostrar = utf8_encode($value['Nombre']);
        $fin=$value['FFinal'];
        include ($cone . 'Fecha.php');
        if($resta>=0){
        ?>

    <div class="desc">
        <div class="thumb">
            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
        </div>
        <div class="details">
            <p style=""><muted>Falta =  <?php echo $resta; ?> Dias</muted><br/>
            <?php echo $mostrar; ?><br/>
            </p>
        </div>
    </div>
    <?php
    }
    }
    ?>

</div>



</div><!-- /col-lg-3 -->