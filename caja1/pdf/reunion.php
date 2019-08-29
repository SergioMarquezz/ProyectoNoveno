<?php
require_once('../conexion/conector.php');
require_once("../tools/funciones.php");
require_once('fpdf.php');
date_default_timezone_set('America/Mexico_City');
//$id = $_POST['id'];
$id = "5434";
class PDF extends FPDF
{
	// Cabecera de página
	function Header()
	{
		// Logo
		$this->Image('../img/logo_utec.png',12,22,60);
		// Arial bold 15
		$this->SetFont('Arial','B',14);
		// Movernos a la derecha
		$this->Cell(70);
		// Salto de línea
		$this->Ln(30);
	}
	
	// Pie de página
	function Footer()
	{
		// Posición: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Número de página
		$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
	}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(5);
$pdf->SetFont('Times','B',15);
$pdf->Cell(190,10,"C I T A T O R I O",0,0,'C');
$pdf->Ln(15);
$pdf->SetFont('Times','B',13);
$pdf->Cell(120,10,"C. MADRE/PADRE DE FAMILIA O TUTOR",0,0,'L');
$pdf->Ln(7);
$pdf->Cell(120,5,"PRESENTE",0,0,'L');
$pdf->Ln(10);
$pdf->SetFont('Times','',13);
$pdf->Cell(120,10,utf8_decode("Por medio del presente me permito hacerle la más cordial invitación, para que el día sábado 12"),0,0,'L');
$pdf->Ln(5);
$pdf->Cell(120,10,utf8_decode("de agosto del año en curso, a las 9:00 a.m., para que asista usted a este plantel educativo, en la"),0,0,'L');
$pdf->Ln(5);
$pdf->Cell(120,10,utf8_decode("explanada de rectoría del edificio A, a una reunión con la finalidad de darles a conocer todos los "),0,0,'L');
$pdf->Ln(5);
$pdf->Cell(120,10,utf8_decode("servicios de apoyo con lo que cuenta su hijo(a) para su formación integral."),0,0,'L');
$pdf->Ln(15);
$pdf->Cell(120,10,utf8_decode("Agradeciendo de antemano su puntual asistencia, me es grato enviarle un afectuoso saludo."),0,0,'L');
$pdf->Ln(10);
$pdf->Cell(120,10,utf8_decode("A t e n t a m e n t e"),0,0,'L');
$pdf->Ln(15);
$pdf->Cell(120,10,utf8_decode("Dr. Julio Marquez Rodriguez"),0,0,'L');
$pdf->Ln(5);
$pdf->Cell(120,10,utf8_decode("Rector"),0,0,'L');





$pdf->Output();
?>