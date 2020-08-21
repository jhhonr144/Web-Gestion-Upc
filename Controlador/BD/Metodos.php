<?php

if (!isset($_session)) {
    session_start();
}
$a = filter_input(INPUT_GET, 'a', FILTER_SANITIZE_SPECIAL_CHARS);
$ip = $_SERVER['REMOTE_ADDR'];
//persona 0
//admin 1     
switch ($a) {
    case 0:
        include 'conecion.php';
        include 'Perso.php';
        $conexion = new conecion();
        $sentencia = $conexion->Guardame()->prepare('Select correo from estudiante where cc="000"');
        $sentencia->execute();
        $correo = filter_input(INPUT_GET, 'b', FILTER_SANITIZE_SPECIAL_CHARS);
        $clave = filter_input(INPUT_GET, 'c', FILTER_SANITIZE_SPECIAL_CHARS);
        foreach ($sentencia as $fila) {
            if ($correo == $fila['correo']) {
                //inicio admin  
                $conexion = new conecion();
                $sentencia = $conexion->Guardame()->prepare('Select count(*) from estudiante where correo="' . $correo . '" and clave="' . $clave . '"');
                $sentencia->execute();
                foreach ($sentencia as $fila) {
                    if ($fila['count(*)'] == 0) {
                        echo '<p style="background-color: red;
            color: #ffffff">Error:<em> USER/PAAS .1</em></p>';
                    } else {
                        $p = new Perso();
                        $p->setCorreo($correo);
                        $p->setClave($clave);
                        $conexion = new conecion();
                        $sentencia = $conexion->Guardame()->prepare('SELECT * FROM estudiante where correo="' . $correo . '" and clave="' . $clave . '"');
                        $sentencia->execute();
                        $re = "22";
                        foreach ($sentencia as $fila) {
                            $p->setNombre($fila['nombre']);
                            $p->setCedula($fila['cc']);
                            $p->setCelular($fila['celular']);
                            $p->setMensaje("Ya Inicio");
                            $p->setCorreo($correo);
                            $p->setClave($clave);
                            $p->setEstado($fila['estado']);
                        }
                        if ($p->getEstado() != 'A') {
                            echo '<p style="background-color: red ;color: #ffffff">Error:<em> Cuenta inactiva</em></p>';
                        } else {
                            $_SESSION['persona'] = serialize($p);

                            $conexion = new conecion();
                            $sentencia = $conexion->Guardame()->prepare('Select count(*) from inicioa');
                            $sentencia->execute();
                            $id;
                            //$fecha=curdate()."-".curtime();
                            foreach ($sentencia as $fila) {
                                $id = $fila['count(*)'];
                            }
                            $conexion = new conecion();
                            $s = $conexion->Guardame()->exec("INSERT INTO inicioa (Id,Fecha,Hora,Ip) VALUES ('" . $id . "',curdate(),curtime(),'" . $ip . "')");
                            include 'paAdmin.php';
                        }
                    }
                }
            } else {
                $correo = filter_input(INPUT_GET, 'b', FILTER_SANITIZE_SPECIAL_CHARS);
                $clave = filter_input(INPUT_GET, 'c', FILTER_SANITIZE_SPECIAL_CHARS);
                $conexion = new conecion();
                $sentencia = $conexion->Guardame()->prepare('Select count(*) from estudiante where correo="' . $correo . '" and clave="' . $clave . '"');
                $sentencia->execute();
                foreach ($sentencia as $fila) {
                    if ($fila['count(*)'] == 0) {
                        echo '<p style="background-color: red ;color: #ffffff">Error:<em> USER/PASS .11</em></p>';
                    } else {
                        $p = new Perso();
                        $p->setCorreo($correo);
                        $p->setClave($clave);
                        $conexion = new conecion();
                        $sentencia = $conexion->Guardame()->prepare('SELECT * FROM estudiante where correo="' . $correo . '" and clave="' . $clave . '"');
                        $sentencia->execute();
                        $re = "22";
                        foreach ($sentencia as $fila) {
                            $p->setNombre($fila['nombre'] . ' ' . $fila['apellido']);
                            $p->setn1($fila['nombre']);
                            $p->setn2($fila['apellido']);
                            $p->setCedula($fila['cc']);
                            $p->setCelular($fila['celular']);
                            $p->setMensaje("Ya Inicio");
                            $p->setCorreo($correo);
                            $p->setClave($clave);
                            $p->setEstado($fila['estado']);
                        }
                        if ($p->getEstado() != 'A') {
                            echo '<p style="background-color: red ;color: #ffffff">Error:<em> Cuenta inactiva</em></p>';
                        } else {
                            $conexion->Guardame()->exec("INSERT INTO inicioe  "
                                    . "(  dia, ip, hora, user)"
                                    . " VALUES ( curdate(),'" . $ip . "',curtime() ,'" . $p->getCedula() . "')");
                            $_SESSION['persona'] = serialize($p);
                            include 'paEstudiante.php';
                        }
                    }
                }
            }
            break;
        }
        break;
    case 1:
        include 'conecion.php'; 
        $conexion = new conecion();
        $p1 = filter_input(INPUT_GET, 'a1', FILTER_SANITIZE_SPECIAL_CHARS);
        $p2 = filter_input(INPUT_GET, 'a2', FILTER_SANITIZE_SPECIAL_CHARS);
        $p3 = filter_input(INPUT_GET, 'a3', FILTER_SANITIZE_SPECIAL_CHARS);
        $p4 = filter_input(INPUT_GET, 'a4', FILTER_SANITIZE_SPECIAL_CHARS);
        $p5 = filter_input(INPUT_GET, 'a5', FILTER_SANITIZE_SPECIAL_CHARS);
        $p6 = filter_input(INPUT_GET, 'a6', FILTER_SANITIZE_SPECIAL_CHARS);
        $p7 = filter_input(INPUT_GET, 'a7', FILTER_SANITIZE_SPECIAL_CHARS);
        $p8 = filter_input(INPUT_GET, 'a8', FILTER_SANITIZE_SPECIAL_CHARS);
        $p9 = filter_input(INPUT_GET, 'a9', FILTER_SANITIZE_SPECIAL_CHARS);
        $p0 = filter_input(INPUT_GET, 'a0', FILTER_SANITIZE_SPECIAL_CHARS);
        $b1 = filter_input(INPUT_GET, 'b1', FILTER_SANITIZE_SPECIAL_CHARS);
        $b2 = filter_input(INPUT_GET, 'b2', FILTER_SANITIZE_SPECIAL_CHARS);
        $b3 = filter_input(INPUT_GET, 'b3', FILTER_SANITIZE_SPECIAL_CHARS);
        $b4 = filter_input(INPUT_GET, 'b4', FILTER_SANITIZE_SPECIAL_CHARS);
        $b5 = filter_input(INPUT_GET, 'b5', FILTER_SANITIZE_SPECIAL_CHARS);
        $b6 = filter_input(INPUT_GET, 'b6', FILTER_SANITIZE_SPECIAL_CHARS);
        $b7 = filter_input(INPUT_GET, 'b7', FILTER_SANITIZE_SPECIAL_CHARS);
        $conexion->Guardame()->exec("INSERT INTO mformulario  "
                . "(cc,tipo,fecha,ip,estado)"
                . " VALUES ('". $p4 . "','AP',curdate(),'" . $ip . "','proceso')");     
        $conexin = new conecion();
        $f = explode("fakepath", $p1);  
        $p1="foto/".$f[1];
        move_uploaded_file ( $p1 , "/foto/".$f[1] ) ;
         $conexin->Guardame()->exec("INSERT INTO dformulario  "
                    . "(user,formu,p1,p2,p3,p4,p5,p6,p7,p8,p9,p0,b1,b2,b3,b4,b5,b6,b7)"
                    . " VALUES ('".$p4."','1','".$p1."','".$p2."','".$p3."','".$p4."','"
                    .$p5."','".$p6."','".$p7."','".$p8."','".$p9."','".$p0."','".$b1."','"
                    .$b2."','".$b3."','".$b4."', '".$b5."','".$b6."','".$b7."')");
         $cer="style.display='none'";
         $conexin->Guardame()->exec("INSERT INTO calificaciones (cc)  values('".$p4."')");
         echo "<div class=".'"wizard-footer height-wizard"'."><p    class='btn btn-next btn-fill btn-success btn-wd btn-sm'  />Guardado!</p></div>";
    
        break;
    case 2://registtrar usuario
        //  rnombre=" + a + "&rcc=" + b + "&rtel=" + c + "&rcor=" + d + "&rcar=" + f + "&rcla=" + g, true);//case
        $nombre = filter_input(INPUT_GET, 'rnombre', FILTER_SANITIZE_SPECIAL_CHARS);
        $cedu = filter_input(INPUT_GET, 'rcc', FILTER_SANITIZE_SPECIAL_CHARS);
        $tele = filter_input(INPUT_GET, 'rtel', FILTER_SANITIZE_SPECIAL_CHARS);
        $corre = filter_input(INPUT_GET, 'rcor', FILTER_SANITIZE_SPECIAL_CHARS);
        $carre = filter_input(INPUT_GET, 'rcar', FILTER_SANITIZE_SPECIAL_CHARS);
        $clave = filter_input(INPUT_GET, 'rcla', FILTER_SANITIZE_SPECIAL_CHARS);
        $ape = filter_input(INPUT_GET, 'rape', FILTER_SANITIZE_SPECIAL_CHARS);
        include 'conecion.php';
        include 'Perso.php';
        $conexion = new conecion();
        $text = "";
        $int = 0;
        $sentencia = $conexion->Guardame()->prepare('Select count(*) from estudiante where correo="' . $corre . '"');
        $sentencia->execute();
        foreach ($sentencia as $fila) {
            if ($fila['count(*)'] == 0) {
                $int = 0;
            } else {
                $text = "Usted Ya esta Registrado<br>si no recuerda la clave <a>precione aqui</a> ";
                $int++;
                break;
            }
        }
        if ($int == 0) {
            $conexion->Guardame()->exec("INSERT INTO estudiante  "
                    . "(estado,nombre,apellido,cc,celular,carrera,correo,clave)"
                    . " VALUES ('A','" . $nombre . "','" . $ape . "', '" . $cedu . "', '"
                    . $tele . "', '" . $carre . "', '" . $corre . "', '" . $clave . "')");
            $n = $nombre . " " . $ape;
            $conexi = new conecion();
            $conexi->Guardame()->exec("INSERT INTO d_r_estudiante  "
                    . "( Dia, ip,cc,nombres,carrera)"
                    . " VALUES ( curdate(),'" . $ip . "', '" . $cedu . "', '"
                    . $n . "', '" . $carre . "')");
            $p = new Perso();
            $p->setNombre($n);
            $p->setCedula($cedu);
            $p->setCelular($tele);
            $p->setMensaje("Ya Inicio");
            $p->setCorreo($corre);
            $p->setClave($clave);
            $p->setEstado("A");
            $_SESSION['persona'] = serialize($p);
            $conexin = new conecion();
            $conexin->Guardame()->exec("INSERT INTO inicioe  "
                    . "(  dia, ip, hora, user)"
                    . " VALUES ( curdate(),'" . $ip . "',curtime() ,'" . $cedu . "')");
            $conexi = new conecion(); 
           $sentencia = $conexion->Guardame()->prepare('Select max(id) n from mformulario');
            $sentencia->execute();
            foreach ($sentencia as $fila) { 
                $int = $fila['n'];
            } $int++;
            $conexin->Guardame()->exec("INSERT INTO mformulario  "
                    . "(  id,cc,tipo,fecha,ip,estado)"
                    . " VALUES ('".$int."','".$cedu."','RE',curdate(),'".$ip."','A')");
            $conexin->Guardame()->exec("INSERT INTO dformulario  " 
                     . "(mf,user,formu,p2,p3,p4,p5,b2,b8)"
                    . " VALUES ('".$int."','".$cedu."','RE','".$nombre."','".$ape."','0','".$cedu."','".$corre."','".$tele."')");           
            $text = "REGISTRADO";
//            $url = 'vista/Estudiante/index.php';
        }
        echo $text;
//        echo '<meta http-equiv=refresh content="3; ' . $url . '">';
        die;
        break;
    case 3://actualizar clave
        include 'conecion.php';
        $conexion = new conecion();
        $vcorreo = filter_input(INPUT_GET, 'b', FILTER_SANITIZE_SPECIAL_CHARS);
        $nclave = filter_input(INPUT_GET, 'c', FILTER_SANITIZE_SPECIAL_CHARS);
        $sentencia = $conexion->Guardame()->prepare('UPDATE estudiante  SET clave ="' . $nclave . '" where    correo="' . $vcorreo . '"');
        //     $sentencia = $conexion->Guardame()->prepare('UPDATE  buscador  SET nombre ="' . $nombre . '" where nombre="h"');
        $sentencia->execute();
        break;    
    case 4:
        include 'conecion.php'; 
        $conexion = new conecion(); 
        $cc = filter_input(INPUT_GET, 'cc', FILTER_SANITIZE_SPECIAL_CHARS);
        $ti = filter_input(INPUT_GET, 'ti', FILTER_SANITIZE_SPECIAL_CHARS);
        $p1 = filter_input(INPUT_GET, 'a1', FILTER_SANITIZE_SPECIAL_CHARS);
        $p2 = filter_input(INPUT_GET, 'a2', FILTER_SANITIZE_SPECIAL_CHARS);
        $p3 = filter_input(INPUT_GET, 'a3', FILTER_SANITIZE_SPECIAL_CHARS);
        $p4 = filter_input(INPUT_GET, 'a4', FILTER_SANITIZE_SPECIAL_CHARS);
        $p5 = filter_input(INPUT_GET, 'a5', FILTER_SANITIZE_SPECIAL_CHARS);
        $p6 = filter_input(INPUT_GET, 'a6', FILTER_SANITIZE_SPECIAL_CHARS);
        $p7 = filter_input(INPUT_GET, 'a7', FILTER_SANITIZE_SPECIAL_CHARS);
        $p8 = filter_input(INPUT_GET, 'a8', FILTER_SANITIZE_SPECIAL_CHARS);
        $p9 = filter_input(INPUT_GET, 'a9', FILTER_SANITIZE_SPECIAL_CHARS);
        $p0 = filter_input(INPUT_GET, 'a0', FILTER_SANITIZE_SPECIAL_CHARS); 
        $b1 = filter_input(INPUT_GET, 'b1', FILTER_SANITIZE_SPECIAL_CHARS); 
        $b2 = filter_input(INPUT_GET, 'b2', FILTER_SANITIZE_SPECIAL_CHARS); 
        $b3 = filter_input(INPUT_GET, 'b3', FILTER_SANITIZE_SPECIAL_CHARS); 
        $conexion = new conecion();
        $sentencia = $conexion->Guardame()->prepare('Select id from mformulario where cc="'.$cc.'" and estado="A"');
        $sentencia->execute(); 
        $mf=0;
        foreach ($sentencia as $fila) {
            $mf=$fila['id'];
        }
        $conexion = new conecion(); 
        $sentencia = $conexion->Guardame()->prepare('UPDATE mformulario  SET estado="DESACTIVADO" where id="'.$mf.'" ');       
        $sentencia->execute(); 
        $conexion->Guardame()->exec("INSERT INTO mformulario  "
                . "(id,cc,tipo,fecha,ip,estado,N)"
                . " VALUES ('".$mf ."','". $cc . "','".$ti."',curdate(),'" . $ip . "','A','2')");     
        $conexi = new conecion();
         $conexi->Guardame()->exec("INSERT INTO dformulario  "
                    . "(user,mf,formu,p1,p2,p3,p4,p5,p6,p7,p8,p9,p0,b1,b2,b3)"
                    . " VALUES ('".$cc."','".$mf. "','2','".$p1."','".$p2."','".$p3."','".$p4."','"
                    .$p5."','".$p6."','".$p7."','".$p8."','".$p9."','".$p0."','".$b1."','".$b2."','".$b3 ."')");
         $cer="style.display='none'";
         echo "<div class=".'"wizard-footer height-wizard"'."><p    class='btn btn-next btn-fill btn-success btn-wd btn-sm'  />Guardado!</p></div>";
    
        break;
    case 5:
        include 'conecion.php'; 
        $conexion = new conecion();
        $cc = filter_input(INPUT_GET, 'cc', FILTER_SANITIZE_SPECIAL_CHARS); 
        $ti = filter_input(INPUT_GET, 'ti', FILTER_SANITIZE_SPECIAL_CHARS); 
        $p1 = filter_input(INPUT_GET, 'a1', FILTER_SANITIZE_SPECIAL_CHARS);
        $p2 = filter_input(INPUT_GET, 'a2', FILTER_SANITIZE_SPECIAL_CHARS);
        $p3 = filter_input(INPUT_GET, 'a3', FILTER_SANITIZE_SPECIAL_CHARS);
        $p4 = filter_input(INPUT_GET, 'a4', FILTER_SANITIZE_SPECIAL_CHARS);
        $p5 = filter_input(INPUT_GET, 'a5', FILTER_SANITIZE_SPECIAL_CHARS);
        $p6 = filter_input(INPUT_GET, 'a6', FILTER_SANITIZE_SPECIAL_CHARS);
        $p7 = filter_input(INPUT_GET, 'a7', FILTER_SANITIZE_SPECIAL_CHARS);
        $p8 = filter_input(INPUT_GET, 'a8', FILTER_SANITIZE_SPECIAL_CHARS);
        $p9 = filter_input(INPUT_GET, 'a9', FILTER_SANITIZE_SPECIAL_CHARS);
        $p0 = filter_input(INPUT_GET, 'a0', FILTER_SANITIZE_SPECIAL_CHARS); 
        $b1 = filter_input(INPUT_GET, 'b1', FILTER_SANITIZE_SPECIAL_CHARS); 
        $b2 = filter_input(INPUT_GET, 'b2', FILTER_SANITIZE_SPECIAL_CHARS); 
        $b3 = filter_input(INPUT_GET, 'b3', FILTER_SANITIZE_SPECIAL_CHARS); 
        $b4 = filter_input(INPUT_GET, 'b4', FILTER_SANITIZE_SPECIAL_CHARS); 
        $b5 = filter_input(INPUT_GET, 'b5', FILTER_SANITIZE_SPECIAL_CHARS); 
        $b6 = filter_input(INPUT_GET, 'b6', FILTER_SANITIZE_SPECIAL_CHARS); 
        $conexion->Guardame()->exec("INSERT INTO mformulario  "
                . "(cc,tipo,fecha,ip,estado,N)"
                . " VALUES ('". $cc . "','".$ti."',curdate(),'" . $ip . "','proceso','3')");     
        $conexi = new conecion();
         $conexi->Guardame()->exec("INSERT INTO dformulario  "
                    . "(user,formu,p1,p2,p3,p4,p5,p6,p7,p8,p9,p0,b1,b2,b3,b4,b5,b6)"
                    . " VALUES ('".$cc."','3','".$p1."','".$p2."','".$p3."','".$p4."','"
                    .$p5."','".$p6."','".$p7."','".$p8."','".$p9."','".$p0."','".$b1."','".$b2."','".$b3."','".$b4."','".$b5."','".$b6 ."')");
         $cer="style.display='none'";
         echo "<div class=".'"wizard-footer height-wizard"'."><p    class='btn btn-next btn-fill btn-success btn-wd btn-sm'  />Guardado!</p></div>";
    
        break;
    case 6:
        include 'conecion.php'; 
        include './Perso.php';
    if (!isset($_SESSION)) session_start();
    if(isset($_SESSION['persona']))$p= unserialize($_SESSION['persona']);
        $conexion = new conecion();
        $mensajem = filter_input(INPUT_GET, 'm', FILTER_SANITIZE_SPECIAL_CHARS);
        $asuntom = filter_input(INPUT_GET, 'as', FILTER_SANITIZE_SPECIAL_CHARS);
         $conexion->Guardame()->exec("INSERT INTO mensaje  "
                    . "(enviado,recibido,mensaje,Nenviado,Nrecibido,asunto,fecha)"
                    . " VALUES ('".$p->getCedula()."','000' ,'".$mensajem."','".$p->getNombre()."','ADMIN','".$asuntom."',sysdate())");
       echo 'enviado';
         break;
    case 7://actualizar clave
        include 'conecion.php';
        include './Perso.php';
        if (!isset($_SESSION)) session_start();
        if(isset($_SESSION['persona']))$p= unserialize($_SESSION['persona']);
        $conexion = new conecion();
        $nuevo = filter_input(INPUT_GET, 'nuevo', FILTER_SANITIZE_SPECIAL_CHARS);
        $dato = filter_input(INPUT_GET, 'c', FILTER_SANITIZE_SPECIAL_CHARS);
        $sentencia = $conexion->Guardame()->prepare('UPDATE estudiante  SET '.$dato."='" . $nuevo ."'".' where    cc="' . $p->getCedula() . '"');
        //     $sentencia = $conexion->Guardame()->prepare('UPDATE  buscador  SET nombre ="' . $nombre . '" where nombre="h"');
        $sentencia->execute();
        echo '<p style="color:green">Dato Guardado</p>';
        break;
    case 8:
        include 'conecion.php'; 
        $conexion = new conecion();
        $p1 = filter_input(INPUT_GET, 'a1', FILTER_SANITIZE_SPECIAL_CHARS);
        $p2 = filter_input(INPUT_GET, 'a2', FILTER_SANITIZE_SPECIAL_CHARS);
        $p3 = filter_input(INPUT_GET, 'a3', FILTER_SANITIZE_SPECIAL_CHARS);
        $p4 = filter_input(INPUT_GET, 'a4', FILTER_SANITIZE_SPECIAL_CHARS);
        $p5 = filter_input(INPUT_GET, 'a5', FILTER_SANITIZE_SPECIAL_CHARS);
        $p6 = filter_input(INPUT_GET, 'a6', FILTER_SANITIZE_SPECIAL_CHARS);
        $p7 = filter_input(INPUT_GET, 'a7', FILTER_SANITIZE_SPECIAL_CHARS);
        $p8 = filter_input(INPUT_GET, 'a8', FILTER_SANITIZE_SPECIAL_CHARS);
        $p9 = filter_input(INPUT_GET, 'a9', FILTER_SANITIZE_SPECIAL_CHARS);
        $p0 = filter_input(INPUT_GET, 'a0', FILTER_SANITIZE_SPECIAL_CHARS);
        $b1 = filter_input(INPUT_GET, 'b1', FILTER_SANITIZE_SPECIAL_CHARS);
        $b2 = filter_input(INPUT_GET, 'b2', FILTER_SANITIZE_SPECIAL_CHARS);
        $b3 = filter_input(INPUT_GET, 'b3', FILTER_SANITIZE_SPECIAL_CHARS);
        $b4 = filter_input(INPUT_GET, 'b4', FILTER_SANITIZE_SPECIAL_CHARS);
        $b5 = filter_input(INPUT_GET, 'b5', FILTER_SANITIZE_SPECIAL_CHARS);
        $b6 = filter_input(INPUT_GET, 'b6', FILTER_SANITIZE_SPECIAL_CHARS);
        $b7 = filter_input(INPUT_GET, 'b7', FILTER_SANITIZE_SPECIAL_CHARS); 
        $re = filter_input(INPUT_GET, 're', FILTER_SANITIZE_SPECIAL_CHARS);
        $ne = filter_input(INPUT_GET, 'n', FILTER_SANITIZE_SPECIAL_CHARS);
        $conexion = new conecion(); 
        $sentencia = $conexion->Guardame()->prepare('UPDATE mformulario  SET estado="DESACTIVADO" where cc='.$p4.' and tipo="'.$re.'" ');       
        $sentencia->execute();   
         $conexion = new conecion();
        $sentencia = $conexion->Guardame()->prepare('Select max(id) x from mformulario ');
        $sentencia->execute(); 
        $m=0;
        foreach ($sentencia as $fila) {
            $m=$fila['x'];
        }$m++;
        $conexion = new conecion();
        $conexion->Guardame()->exec("INSERT INTO mformulario  "
                . "(id,cc,tipo,fecha,ip,estado,N)"
                . " VALUES ('".$m ."','". $p4 . "','".$re."',curdate(),'" . $ip . "','A','1')");  
        $conexion = new conecion();
        $sentencia = $conexion->Guardame()->prepare('Select id from mformulario where cc="'.$p4.'" and estado="A"');
        $sentencia->execute(); 
        $mf=0;
        foreach ($sentencia as $fila) {
            $mf=$fila['id'];
        }
        $conexin = new conecion();
        $f = explode("fakepath", $p1);  
        $p1="foto/".$f[1];
        move_uploaded_file ( $p1 , "/foto/".$f[1] ) ;
         $conexin->Guardame()->exec("INSERT INTO dformulario  "
                    . "(mf,user,formu,p1,p2,p3,p4,p5,p6,p7,p8,p9,p0,b1,b2,b3,b4,b5,b6,b7)"
                    . " VALUES ('".$mf."','".$p4."','".$ne."','".$p1."','".$p2."','".$p3."','".$p4."','"
                    .$p5."','".$p6."','".$p7."','".$p8."','".$p9."','".$p0."','".$b1."','"
                    .$b2."','".$b3."','".$b4."', '".$b5."','".$b6."','".$b7."')");
         $cer="style.display='none'"; 
         echo "<div class=".'"wizard-footer height-wizard"'."><p    class='btn btn-next btn-fill btn-success btn-wd btn-sm'  />Guardado!</p></div>";
    
        break;
        case 9:
        include 'conecion.php'; 
        $conexion = new conecion();
        $p1 = filter_input(INPUT_GET, 'a1', FILTER_SANITIZE_SPECIAL_CHARS);
        $p2 = filter_input(INPUT_GET, 'a2', FILTER_SANITIZE_SPECIAL_CHARS);
        $p3 = filter_input(INPUT_GET, 'a3', FILTER_SANITIZE_SPECIAL_CHARS);
        $p4 = filter_input(INPUT_GET, 'a4', FILTER_SANITIZE_SPECIAL_CHARS);
        $p5 = filter_input(INPUT_GET, 'a5', FILTER_SANITIZE_SPECIAL_CHARS);
        $p6 = filter_input(INPUT_GET, 'a6', FILTER_SANITIZE_SPECIAL_CHARS);
        $p7 = filter_input(INPUT_GET, 'a7', FILTER_SANITIZE_SPECIAL_CHARS);
        $p8 = filter_input(INPUT_GET, 'a8', FILTER_SANITIZE_SPECIAL_CHARS);
        $p9 = filter_input(INPUT_GET, 'a9', FILTER_SANITIZE_SPECIAL_CHARS);
        $p0 = filter_input(INPUT_GET, 'a0', FILTER_SANITIZE_SPECIAL_CHARS);
        $b1 = filter_input(INPUT_GET, 'b1', FILTER_SANITIZE_SPECIAL_CHARS);
        $b2 = filter_input(INPUT_GET, 'b2', FILTER_SANITIZE_SPECIAL_CHARS);
        $b3 = filter_input(INPUT_GET, 'b3', FILTER_SANITIZE_SPECIAL_CHARS);
        $b4 = filter_input(INPUT_GET, 'b4', FILTER_SANITIZE_SPECIAL_CHARS);
        $b5 = filter_input(INPUT_GET, 'b5', FILTER_SANITIZE_SPECIAL_CHARS);
        $b6 = filter_input(INPUT_GET, 'b6', FILTER_SANITIZE_SPECIAL_CHARS);
        $b7 = filter_input(INPUT_GET, 'b7', FILTER_SANITIZE_SPECIAL_CHARS); 
        $re = filter_input(INPUT_GET, 're', FILTER_SANITIZE_SPECIAL_CHARS);
        $ne = filter_input(INPUT_GET, 'n', FILTER_SANITIZE_SPECIAL_CHARS);                    
         $conexion = new conecion();
        $sentencia = $conexion->Guardame()->prepare('Select id from mformulario where cc="'.$p4.'" and estado="A" and tipo="AP"');
        $sentencia->execute(); 
        $mf=0;
        foreach ($sentencia as $fila) {
            $mf=$fila['id'];
        }
        $conexion = new conecion(); 
        $sentencia = $conexion->Guardame()->prepare('UPDATE mformulario  SET estado="DESACTIVADO" where id='.$mf);       
        $sentencia->execute();
        $conexion = new conecion(); 
        $sentencia = $conexion->Guardame()->prepare('delete from dformulario where mf='.$mf.' and formu=1');       
        $sentencia->execute(); 
        $conexion = new conecion();
        $conexion->Guardame()->exec("INSERT INTO mformulario  "
                . "(id,cc,tipo,fecha,ip,estado,N)"
                . " VALUES ('".$mf ."','". $p4 . "','".$re."',curdate(),'" . $ip . "','A','1')");   
        $conexin = new conecion();
        $f = explode("fakepath", $p1);  
        $p1="foto/".$f[1];
        move_uploaded_file ( $p1 , "/foto/".$f[1] ) ;
         $conexin->Guardame()->exec("INSERT INTO dformulario  "
                    . "(mf,user,formu,p1,p2,p3,p4,p5,p6,p7,p8,p9,p0,b1,b2,b3,b4,b5,b6,b7)"
                    . " VALUES ('".$mf."','".$p4."','".$ne."','".$p1."','".$p2."','".$p3."','".$p4."','"
                    .$p5."','".$p6."','".$p7."','".$p8."','".$p9."','".$p0."','".$b1."','"
                    .$b2."','".$b3."','".$b4."', '".$b5."','".$b6."','".$b7."')");
         $cer="style.display='none'"; 
         echo "<div class=".'"wizard-footer height-wizard"'."><p    class='btn btn-next btn-fill btn-success btn-wd btn-sm'  />Guardado!</p></div>";
    
        break;
        case 10:
        include 'conecion.php'; 
        $conexion = new conecion(); 
        $cc = filter_input(INPUT_GET, 'cc', FILTER_SANITIZE_SPECIAL_CHARS);
        $ti = filter_input(INPUT_GET, 'ti', FILTER_SANITIZE_SPECIAL_CHARS);
        $p1 = filter_input(INPUT_GET, 'a1', FILTER_SANITIZE_SPECIAL_CHARS);
        $p2 = filter_input(INPUT_GET, 'a2', FILTER_SANITIZE_SPECIAL_CHARS);
        $p3 = filter_input(INPUT_GET, 'a3', FILTER_SANITIZE_SPECIAL_CHARS);
        $p4 = filter_input(INPUT_GET, 'a4', FILTER_SANITIZE_SPECIAL_CHARS);
        $p5 = filter_input(INPUT_GET, 'a5', FILTER_SANITIZE_SPECIAL_CHARS);
        $p6 = filter_input(INPUT_GET, 'a6', FILTER_SANITIZE_SPECIAL_CHARS);
        $p7 = filter_input(INPUT_GET, 'a7', FILTER_SANITIZE_SPECIAL_CHARS);
        $p8 = filter_input(INPUT_GET, 'a8', FILTER_SANITIZE_SPECIAL_CHARS);
        $p9 = filter_input(INPUT_GET, 'a9', FILTER_SANITIZE_SPECIAL_CHARS);
        $p0 = filter_input(INPUT_GET, 'a0', FILTER_SANITIZE_SPECIAL_CHARS); 
        $b1 = filter_input(INPUT_GET, 'b1', FILTER_SANITIZE_SPECIAL_CHARS); 
        $b2 = filter_input(INPUT_GET, 'b2', FILTER_SANITIZE_SPECIAL_CHARS); 
        $b3 = filter_input(INPUT_GET, 'b3', FILTER_SANITIZE_SPECIAL_CHARS); 
        $conexion = new conecion();
        $sentencia = $conexion->Guardame()->prepare('Select id from mformulario where cc="'.$cc.'" and tipo="'.$ti.'" and estado="A"');
        $sentencia->execute(); 
        $mf=0;
        foreach ($sentencia as $fila) {
            $mf=$fila['id'];
        }
        $coneion = new conecion(); 
        $sentenca = $coneion->Guardame()->prepare('delete from dformulario where mf='.$mf.' and formu="2"');       
        $sentenca->execute(); 
        $conexion = new conecion(); 
        $sentencia = $conexion->Guardame()->prepare('UPDATE mformulario  SET estado="DESACTIVADO" where id="'.$mf.'" ');       
        $sentencia->execute(); 
        $conexion->Guardame()->exec("INSERT INTO mformulario  "
                . "(id,cc,tipo,fecha,ip,estado,N)"
                . " VALUES ('".$mf ."','". $cc . "','".$ti."',curdate(),'" . $ip . "','A','2')"); 
        $conexi = new conecion();
         $conexi->Guardame()->exec("INSERT INTO dformulario  "
                    . "(user,mf,formu,p1,p2,p3,p4,p5,p6,p7,p8,p9,p0,b1,b2,b3)"
                    . " VALUES ('".$cc."','".$mf. "','2','".$p1."','".$p2."','".$p3."','".$p4."','"
                    .$p5."','".$p6."','".$p7."','".$p8."','".$p9."','".$p0."','".$b1."','".$b2."','".$b3 ."')");
         $cer="style.display='none'";
         echo "<div class=".'"wizard-footer height-wizard"'."><p    class='btn btn-next btn-fill btn-success btn-wd btn-sm'  />Guardado!</p></div>";
    
        break;
}       
?>