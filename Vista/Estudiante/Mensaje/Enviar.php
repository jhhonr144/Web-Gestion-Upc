<div id="login-page">
    <form>
    <h2 class="form-login-heading">Enviar Mensaje</h2> 
    <label><br>Asunto</br></label>
    <input  class="form-control" id="MAsunto" type="text" class="form-control" > 
    <br>
    <label><br>Texto</br></label>
    <textarea class="form-control" id="MTexto" placeholder="Texto" value="" style="height: 100px;max-width: 100%;
              max-height: 400px;min-height: 50px"> </textarea> 
    <div class="clear"><br>
        <div id="respuesta"></div>
        <input class="" value="Limpiar"  type="reset">      
        <input class="" onclick="MensajeE(document.getElementById('MAsunto').value,document.getElementById('MTexto').value,<?php echo "'".$p->getCedula()."'" ?>)" value="Enviar" type="button">
    </div>  
    </form>
</div>
