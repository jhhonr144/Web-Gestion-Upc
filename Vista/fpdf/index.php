
<?php
//echo '<script>titulo();</script>';
require 'plantilla.php';
require './../../Modelo/conecion.php'; 


if(isset($_GET["correcto"])){
    $linea=filter_input(INPUT_GET, 'consulta', FILTER_SANITIZE_SPECIAL_CHARS);
    if(!isset($_GET["ordenar"])){ 
        $ordenar="Apellido";
    } 
    include 'consulta.php';  
    if(isset($_GET["titulo"])){
        $titulo=filter_input(INPUT_GET, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
        if($titulo == "") $titulo="REPORTE de:  ".$lineab;
    }else{
        $titulo="REPORTE de:  ".$lineab;
    }
}  
$pdf = new PDF('L','mm',array(216,356));
$pdf->AliasNbPages();
$pdf->AddPage();

$conexion = new conecion();
try{
$sentencia = $conexion->Guardame()->prepare($linea);
$sentencia->execute(); 
} catch (PDOException $e) {
    $titulo="SE ESCOGION UNA SENTENCIA MAL";    
    $escogio=['cc','tcc','nombre','apellido','correo','carrera'];
    $tamano=[61,10,61,61,71,41]; 
    $tabla="estudiante";
    $pdf->MultiCell(600,10,$linea,1,'L',0);$pdf->AddPage();
   $sentencia = $conexion->Guardame()->prepare('select cc,tcc,nombre,apellido ,correo,carrera  from '.$tabla);
   $sentencia->execute(); 
}

$pdf->Ln(10);
$pdf->SetXY(35,15);
$pdf->SetFillColor(23, 23, 23);//color en RGG
$pdf->Cell(100,10,$titulo,0,1,'L');//creamo celda
$pdf->Ln(10);

$pdf->SetFillColor(232, 232, 232);//color en RGG
$pdf->SetFont('Arial', 'B', 12); 
$il=0;
foreach ( $escogio as $l){
$pdf->Cell($tamano[$il], 6, $l, 1, 0, 'C', 1); 
$il++;
}

$pdf->Ln(6);

$pdf->SetFont('Arial', '', 10); 
foreach ($sentencia as $fila) {
    $il=0;
   foreach ( $escogio as $l){
        $pdf->Cell($tamano[$il], 6, $fila[$l], 1, 0, 'C', 1); 
       // $pdf->MultiCell(30,5,$fila[$l],1,'C',0);
       // $y = $pdf->GetX();
        //$pdf->SetX($y+30);
        $il++;
    } 
    $pdf->Ln(6);
}

/*
  $pdf = new FPDF('L','mm',array(216,356));//array defines el tamano//Letter es carta si no quiero definir taman
  //L horizinta p vertical
  //mm milemetro cm centrimeto etc
  $pdf->AddPage();

  $pdf->SetFont('Arial','B',14);//tipo letre

  $pdf->SetXY(100,5);
  $pdf->Cell(100,10,'IMG?',1,1,'C');//creamo celda
  $y = $pdf->GetY();
  $pdf->SetXY(100,5+$y);
  $pdf->Cell(100,10,'Hola wey',1,1,'C');//creamo celda

  //100=largo de celda en pixele
  //10=alto pixeles
  //contenido
  //1 Borde 0 NO
  //1  lleva salto de linea o NO
  //L C R centrado c

  $pdf->MultiCell(100,5,'Hola mundo esta cadena es muy larga y no sirve con esto',1,'C',0);
  //100 largo de la celda
  //5 alto de la celda
  //1
  //c centrada
  //0
 */
$titulo=str_replace('_', '',$titulo).'.pdf';
$titulo=str_replace(':', '',$titulo);
$titulo=str_replace(" ", '',$titulo);  
$pdf->Output($titulo,"I");
//###
$pdf->Output($titulo,"I"); 
//###
?>