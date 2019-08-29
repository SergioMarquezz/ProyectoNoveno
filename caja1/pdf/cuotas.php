<?php
session_start();
require_once("../include/class/panel.php");
$obj = new Panel();
function formatMoney($number, $fractional=true) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return '$ '.$number;
}
function getSubString($string, $length=NULL){
    //Si no se especifica la longitud por defecto es 50
    if ($length == NULL)
        $length = 50;
    //Primero eliminamos las etiquetas html y luego cortamos el string
    $stringDisplay = substr(strip_tags($string), 0, $length);
    //Si el texto es mayor que la longitud se agrega puntos suspensivos
    if (strlen(strip_tags($string)) > $length)
        $stringDisplay .= ' ...';
    return $stringDisplay;
}
function fecha (){
	//$dias = array("Lunes","Martes","Miercoles","Jueves","Viernes","Sábado","Domingo");
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

	$fecha = date('d-m-Y');
	$fecha = strtotime('+0 day',strtotime($fecha));
	$fecha = date('d-m-Y',trim($fecha));
	$fecha = trim($fecha);

	$ano = substr($fecha, 6, 4);
	$mes = substr($fecha, 3, 2);
	$dia = substr($fecha, 0, 2);

	//$hoy = $dias[$dia+1]." ".$dia." de ".$meses[$mes-1]. " del ".$ano;
	$hoy = $dia." de ".$meses[$mes-1]. " del ".$ano;
	return $hoy;
}
function referencia ($folio, $pag, $mont){
	$matricula = $folio;
	$pago = $pag;
	if(strlen($pago) < 2){
		$pago = '0'.$pago;
	}
	$var = "2";
	$monto = $mont;
	$suma = $matricula.$pago;

	$fecha = date('d-m-Y');
	$fecha = strtotime('+0 day',strtotime($fecha));
	$fecha = date('d-m-Y',trim($fecha));
	$fecha = trim($fecha);

	$ano = substr($fecha, 6, 4);
	$mes = substr($fecha, 3, 2);
	$dia = substr($fecha, 0, 2);

	$fecha_hoy = date('d-m-Y');
	$ano_hoy = substr($fecha_hoy, 6, 4);
	$mes_hoy = substr($fecha_hoy, 3, 2);
	$dia_hoy = substr($fecha_hoy, 0, 2);

	$anio_menos = ($ano - 2014 ) * 372;
	$mes_menos = ($mes - 1) * 31;
	$dia_menos = $dia - 1;

    $fecha_con = $anio_menos + $mes_menos + $dia_menos;
	$fecha_largo = strlen($fecha_con);
	while($fecha_largo < 4){
		$fecha_con = '0'.$fecha_con;
		$fecha_largo = strlen($fecha_con);
	}

	$final = 0;
	$res = 0;
	$array = array();
	$valores = array('7','3','1');
	$res = array();
	$largo = strlen($monto)-1;
	$y = 0;
	for ($x = $largo; $x >= 0; $x--)
	{
		if($y > 2){
			$y = 0;
		}
		$array[$x] = substr($monto, $x, 1);
		$res[$x] = $array[$x] * $valores[$y];
		$y++;
		$final = $final + $res[$x];
	}
	$res = ($final % 10);
	$referencia = $suma.$fecha_con.$res.$var;


	$final1 = 0;
	$res1 = 0;
	$array1 = array();
	$valores1 = array('11','13','17','19','23');
	$res1 = array();
	$largo1 = strlen($referencia)-1;
	$y1 = 0;
	for ($x1 = $largo1; $x1 >= 0; $x1--)
	{
		if($y1 > 4){
			$y1 = 0;
		}
		$array1[$x1] = substr($referencia, $x1, 1);
		$res1[$x] = $array1[$x1] * $valores1[$y1];
		$y1++;
		$final1 = $final1 + $res1[$x];
	}
	$c_verificador = ($final1 % 97);
   	$c_verificador = $c_verificador+1;
	$largo2 = strlen($c_verificador);
	if($largo2 < 2){
		$c_verificador = '0'.$c_verificador;
	}

	$referencia_final  = $referencia.''.$c_verificador;
	return  $referencia_final;
}

require_once('fpdf.php');
date_default_timezone_set('America/Mexico_City');

class PDF extends FPDF
{
	// Cabecera de página
	function Header()
	{
		// Logo
		$this->Image('../img/logo_utec.png',12,22,60);
		$this->Image('../img/logo-bbva.jpg',140,22,50);
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
$matricula=$_SESSION['UTECC_idmat'];
$consulta=$obj->getDatosAlumno($matricula);
foreach($consulta as $datos)
{
	$carrera=utf8_encode($datos['nombre']);
	$grupo=$datos['grado']."-".$datos['id_grupo'];
	$cve_grupo=$datos['cve_grupo'];
	$cve_grado=$datos['grado'];
}
$conId = $_POST['c_pago'];
$consulta1=$obj->getConceptosPagoId($conId);
foreach($consulta1 as $datos1)
{
	$conc_des = utf8_decode(utf8_encode($datos1['descripcion']));
	$conc_cos = $datos1['costo_unitario'];
	$monto_total = str_replace('.', '', $conc_cos);
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Times','B',10);
$pdf->Cell(120,5,"Nombre:",1,0,'L');
$pdf->Cell(65,5,"N. Control:",1,0,'L');
$pdf->Ln(5);
$pdf->SetFont('Times','',13);
$pdf->Cell(120,10,getSubString($_SESSION['UTECC_usuno'], 50),1,0,'L');
$pdf->Cell(65,10,$matricula,1,0,'C');
$pdf->Ln(10);
$pdf->SetFont('Times','B',10);
$pdf->Cell(120,5,"Carrera:",1,0,'L');
$pdf->Cell(65,5,"Convenio CIE:",1,0,'L');
$pdf->Ln(5);
$pdf->SetFont('Times','',13);
$pdf->Cell(120,10,getSubString(utf8_decode($carrera), 45),1,0,'L');
$pdf->Cell(65,10,"001364332",1,0,'C');
$pdf->Ln(10);
$pdf->SetFont('Times','B',10);
$pdf->Cell(120,5,"Concepto:",1,0,'L');
$pdf->Cell(65,5,"Referencia:",1,0,'L');
$pdf->Ln(5);
$pdf->SetFont('Times','',13);
$pdf->Cell(120,10,getSubString($conc_des, 40),1,0,'L');
$pdf->SetTextColor(255, 0, 0);
$pdf->Cell(65,10,referencia($matricula,$conId,$monto_total),1,0,'C');
$pdf->Ln(10);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Times','B',10);
$pdf->Cell(120,5,utf8_decode("Válido hasta:"),1,0,'L');
$pdf->Cell(65,5,"Cantidad a pagar:",1,0,'L');
$pdf->Ln(5);
$pdf->SetFont('Times','',13);
$pdf->Cell(120,10,fecha(),1,0,'L');
$pdf->SetTextColor(255, 0, 0);
$pdf->Cell(65,10,formatMoney($conc_cos),1,0,'C');
$pdf->Ln(15);
$pdf->SetFont('Times','B',11);
$pdf->SetTextColor(250, 0, 0);
$pdf->Cell(100,10,utf8_decode("NOTA: Si requiere factura electrónica por el pago correspondiente,  deberá llevar el comprobante de pago "),0,0,'L');
$pdf->Ln(5);
$pdf->Cell(100,10,utf8_decode("bancario (original), credencial institucional y datos fiscales  el mismo día del depósito de lo contrario ya no"),0,0,'L');
$pdf->Ln(5);
$pdf->Cell(100,10,utf8_decode("se podrá expedir un comprobante fiscal."),0,0,'L');

$pdf->Output();
?>
