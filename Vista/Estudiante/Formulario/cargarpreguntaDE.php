
<?php
        
$cone = './../../../Modelo/';
$bdDato='*'; 
$bdTabla='pregunta';
$bdCondicion='order by Id';
include_once('./../../../Controlador/BD/ConsultaGeneral.php');
foreach ($Consulta as $fila) {
    switch ($fila['Id']) {
        case 1:
            $p1 = $fila['pregunta'];
            switch ($fila['tipo']) {
                case 0:$t1 = 'text';
                    break;
                case 1:$t1 = 'number';
                    break;
                case 2:$t1 = 'number';
                    break;
                case 3:$t1 = 'file';
                    break;
                case 4:$t1 = 'image';
                    break;
                case 5:$t1 = 'select';
                    break;
                case 6:$t1 = 'mail';
                    break;
                case 7:$t1 = 'checkbox';
                    break;
                case 8:$t1 = 'textarea';
                    break;
            }
            break;
        case 2:
            $p2 = $fila['pregunta'];
            switch ($fila['tipo']) {
                case 0:$t2 = 'text';
                    break;
                case 1:$t2 = 'number';
                    break;
                case 2:$t2 = 'number';
                    break;
                case 3:$t2 = 'file';
                    break;
                case 4:$t2 = 'image';
                    break;
                case 5:$t2 = 'select';
                    break;
                case 6:$t2 = 'mail';
                    break;
                case 7:$t2 = 'checkbox';
                    break;
                case 8:$t2 = 'textarea';
                    break;
            }
            break;
        case 3:
            $p3 = $fila['pregunta'];
            switch ($fila['tipo']) {
                case 0:$t3 = 'text';
                    break;
                case 1:$t3 = 'number';
                    break;
                case 2:$t3 = 'number';
                    break;
                case 3:$t3 = 'file';
                    break;
                case 4:$t3 = 'image';
                    break;
                case 5:$t3 = 'select';
                    break;
                case 6:$t3 = 'mail';
                    break;
                case 7:$t3 = 'checkbox';
                    break;
                case 8:$t3 = 'textarea';
                    break;
            }
            break;
        case 4:
            $p4 = $fila['pregunta'];
            switch ($fila['tipo']) {
                case 0:$t4 = 'text';
                    break;
                case 1:$t4 = 'number';
                    break;
                case 2:$t4 = 'number';
                    break;
                case 3:$t4 = 'file';
                    break;
                case 4:$t4 = 'image';
                    break;
                case 5:$t4 = 'select';
                    break;
                case 6:$t4 = 'mail';
                    break;
                case 7:$t4 = 'checkbox';
                    break;
                case 8:$t4 = 'textarea';
                    break;
            }
            break;
        case 5:
            $p5 = $fila['pregunta'];
            switch ($fila['tipo']) {
                case 0:$t5 = 'text';
                    break;
                case 1:$t5 = 'number';
                    break;
                case 2:$t5 = 'number';
                    break;
                case 3:$t5 = 'file';
                    break;
                case 4:$t5 = 'image';
                    break;
                case 5:$t5 = 'select';
                    break;
                case 6:$t5 = 'mail';
                    break;
                case 7:$t5 = 'checkbox';
                    break;
                case 8:$t5 = 'textarea';
                    break;
            }
            break;
        case 6:
            $p6 = $fila['pregunta'];
            switch ($fila['tipo']) {
                case 0:$t6 = 'text';
                    break;
                case 1:$t6 = 'number';
                    break;
                case 2:$t6 = 'number';
                    break;
                case 3:$t6 = 'file';
                    break;
                case 4:$t6 = 'image';
                    break;
                case 5:$t6 = 'select';
                    break;
                case 6:$t6 = 'mail';
                    break;
                case 7:$t6 = 'checkbox';
                    break;
                case 8:$t6 = 'textarea';
                    break;
            }
            break;
        case 7:
            $p7 = $fila['pregunta'];
            switch ($fila['tipo']) {
                case 0:$t7 = 'text';
                    break;
                case 1:$t7 = 'number';
                    break;
                case 2:$t7 = 'number';
                    break;
                case 3:$t7 = 'file';
                    break;
                case 4:$t7 = 'image';
                    break;
                case 5:$t7 = 'select';
                    break;
                case 6:$t7 = 'mail';
                    break;
                case 7:$t7 = 'checkbox';
                    break;
                case 8:$t7 = 'textarea';
                    break;
            }
            break;
    }
}
?>