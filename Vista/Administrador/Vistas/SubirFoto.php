<?php
 
 $S = filter_input(INPUT_GET, 'variable', FILTER_SANITIZE_SPECIAL_CHARS); 
 $ruta="C:\\xampp\\htdocs\\Gestion\\Vista\\assets\\img\\General\\"; 
 $uploadfile_temporal="C:\\Users\\wjpoz\\Desktop\\fondos\\".$S; 
 opendir($ruta);
 $carpetaDestino = $ruta.$S;//S->cambia
 if(copy($uploadfile_temporal, $carpetaDestino)){
     echo "<h5>Subida</h5>";
     echo '<a onclick="NActividad('."'0'".')">Actualizar</a>';
 }else{
     echo "<h5>No Subida</h5>";
 }
 