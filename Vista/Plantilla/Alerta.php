<!--$tituloA="as";$textoA="qw";$imagenA="";-->
<script type="text/javascript">
   
    function alerta () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: '<?php echo $tituloA;?>',
            // (string | mandatory) the text inside the notification
            text: '<?php echo $textoA;?>',
            // (string | optional) the image to display on the left
            image: '<?php echo $imagenA;?>',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '10s',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });
        return false;
    }
    alerta(1);
</script>