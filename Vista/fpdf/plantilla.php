<?php
require 'fpdf.php';
class PDF extends FPDF
	{
		function Header()
		{ 
			$this->Image('./../assets/img/General/logo.png', 5, 5, 30 );//llamanos laimganje donde esta
			//5 es la pocicion x
			//5 y
			//30 tamano de la imagen
			$this->SetFont('Arial','B',15);//tipo letra
			$this->Cell(25);//tamano espacion la imagen e absoluta
			$this->Cell(100,10,'Universidad Popular Del Cesar',0,0,'L');
			$this->Ln(20);//salto de linea
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>
 