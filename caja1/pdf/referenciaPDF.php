<?php

require_once('fpdf.php');
date_default_timezone_set('America/Mexico_City');

$concepto = $_POST['concepto'];
$date = $_POST['fecha-emision'];
$validity = $_POST['valida'];
$name = $_POST['name-completo'];
$control = $_POST['num-control'];
$carrera = $_POST['carrera'];
$convenio = $_POST['num-convenio'];
$referencia = $_POST['referencia'];
$pago = $_POST['cantidad'];

class PDF extends FPDF
{
	// Cabecera de página
	function Header()
	{
		// Logo
		$this->Image('../views/img/REFERENCIA BANCARIA alumno.png',5,5,203);
		//$this->Image('../img/logo-bbva.jpg',140,22,50);
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
		$this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
	}
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->SetXY(48,40.5);
$pdf->Cell(70,5,$date,0,0,'L');

$pdf->SetXY(153,41);
$pdf->Cell(70,5,$validity,0,0,'L');

$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(55,50.2);
$pdf->Cell(70,5,utf8_decode($name),0,0,'L');

$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(170,50.2);
$pdf->Cell(70,5,$control,0,0,'L');

$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(28,59.2);
$pdf->Cell(70,5,utf8_decode($carrera),0,0,'L');

$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(175,59.2);
$pdf->Cell(70,5,$convenio,0,0,'L');

$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(34,68.2);
$pdf->Cell(70,5,utf8_decode($concepto),0,0,'L');

$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(148,68.2);
$pdf->Cell(70,5,$referencia,0,0,'L');

$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(46,77);
$pdf->Cell(70,5,$pago,0,0,'L');

$pdf->Output('','referencia de pago-'.$control	.'.pdf',true);

?>
