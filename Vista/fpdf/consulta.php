<?php

switch ($linea) {
    case 1:
        $linea = "select e.Nombre Nombre, e.apellido Apellido,e.cc Cedula,c.nombre Carrera,c.faculta Faculta,e.celular Celular,e.correo  Correo from estudiante e
            inner join carrera c
            on e.carrera=c.id
            where cc!=000 and estado='A' order by " . $ordenar . "; ";
        $escogio = ['Nombre', 'Apellido',  'Cedula', 'Carrera', 'Faculta', 'Celular', 'Correo'];
        $tamano = [35, 35,  40, 30, 30, 30, 80];
        $lineab = "Todo los estudiante activo";
        break;
    case 2:
        $linea = "select e.estado Estado, e.Nombre Nombre, e.apellido Apellido,d.nombre Tipo,e.cc Cedula,c.nombre Carrera,c.faculta Faculta,e.celular Celular,e.correo  Correo from estudiante e
            inner join documento d
            on e.tcc=d.id
            inner join carrera c
            on e.carrera=c.id
            where cc!=000  order by " . $ordenar . "; ";
        $escogio = ['Estado', 'Nombre', 'Apellido', 'Tipo', 'Cedula', 'Carrera', 'Faculta', 'Celular', 'Correo'];
        $tamano = [20,35, 35, 30, 40, 30, 30, 30, 80];
        $lineab = "Todo los estudiantes";
        break;
    case 3:
        $carrera=filter_input(INPUT_GET, 'carrera', FILTER_SANITIZE_SPECIAL_CHARS);
        $linea = "select e.estado Estado, e.Nombre Nombre, e.apellido Apellido,d.nombre Tipo,e.cc Cedula,c.nombre Carrera,c.faculta Faculta,e.celular Celular,e.correo  Correo from estudiante e
            inner join documento d
            on e.tcc=d.id
            inner join carrera c
            on e.carrera=c.id
            where cc!=000 and
            c.nombre='".$carrera. "' 
            order by e.apellido; ";
        $escogio = ['Estado', 'Nombre', 'Apellido', 'Tipo', 'Cedula', 'Carrera', 'Faculta', 'Celular', 'Correo'];
        $tamano = [20,35, 35, 30, 40, 30, 30, 30, 80];
        $lineab = "Todo los estudiantes activo de ".$carrera;
        break;
      case 4:
        $carrera=filter_input(INPUT_GET, 'carrera', FILTER_SANITIZE_SPECIAL_CHARS);
        $linea = "select e.estado Estado, e.Nombre Nombre, e.apellido Apellido,d.nombre Tipo,e.cc Cedula,c.nombre Carrera,c.faculta Faculta,e.celular Celular,e.correo  Correo from estudiante e
            inner join documento d
            on e.tcc=d.id
            inner join carrera c
            on e.carrera=c.id
            where cc!=000 and
            c.faculta='".$carrera. "' 
            order by e.apellido; ";
        $escogio = ['Estado', 'Nombre', 'Apellido', 'Tipo', 'Cedula', 'Carrera', 'Faculta', 'Celular', 'Correo'];
        $tamano = [20,35, 35, 30, 40, 30, 30, 30, 80];
        $lineab = "Todo los estudiantes activo de ".$carrera;
        break;
    case 5: //aqui
        $linea = "select e.estado Estado, e.Nombre Nombre, e.apellido Apellido,d.nombre Tipo,e.cc Cedula,c.nombre Carrera,c.faculta Faculta,e.celular Celular,e.correo  Correo from estudiante e
            inner join documento d
            on e.tcc=d.id
            inner join carrera c
            on e.carrera=c.id
            where cc!=000 and
            c.faculta='".$carrera. "' 
            order by e.apellido; ";
        $escogio = ['Estado', 'Nombre', 'Apellido', 'Tipo', 'Cedula', 'Carrera', 'Faculta', 'Celular', 'Correo'];
        $tamano = [20,35, 35, 30, 40, 30, 30, 30, 80];
        $lineab = "Estudiantes aspirando alguna ayuda en este semestre";
        break;
    case 6:
        $pizza=filter_input(INPUT_GET, 'carrera', FILTER_SANITIZE_SPECIAL_CHARS);
        if($pizza != "X"){
            $xx=explode("X", $pizza);               
        $x=$xx[0]."'".$xx[1]."'";
        }else {$x =" ";$xx[1]="Todos";}
        $linea = "	select e.Nombre Nombre, e.apellido Apellido,e.cc Cedula,mf.tipo Tipo,sum(c.v) Calificacion
 from estudiante e 
            inner join calificaciones c
            on e.cc=c.cc
						inner join mformulario mf
						on mf.cc=e.cc						
            where e.cc!=000 ". $x."
						group by e.Nombre , e.apellido ,e.cc ,mf.tipo 
            order by Tipo,Calificacion desc;";
        $escogio = [ 'Nombre', 'Apellido', 'Cedula', 'Tipo', 'Calificacion'];
        $tamano = [35, 35, 30, 10, 30];
        $lineab = "Estudiantes aspirando ".$xx[1];
        break;
        case 7: //aqui
        $linea = "select i.dia Dia,e.nombre Nombre,e.apellido Apellido,c.nombre Carrera,e.cc
                    from inicioe i 
                    inner join estudiante e
                    on i.user=e.cc
                    inner join carrera c
                    on c.id=e.carrera
                    where e.cc!=000
                    order by e.cc,i.dia desc";
        $escogio = ['Dia', 'Nombre', 'Apellido',  'Carrera'];
        $tamano = [20,35, 35, 30];
        $lineab = "Estudiantes aspirando alguna ayuda en este semestre";
        break;
        default:
        $linea = "Select * from estudiante";
        break;
}
