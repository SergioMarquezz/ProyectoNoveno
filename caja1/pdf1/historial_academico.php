<?php
function getFirma(){
	Header("Content-Type: text/plain");
	$datos = 'David Hernandez Hernandez, Jefe del Departamento de Servicios Escolares, Dirección de Planeación y Evaluación, Universidad Tecnológica de Tulancingo';
	//Se deben crear dos claves aparejadas, una clave pÃºblica y otra privada
	//A continuaciÃ³n el array de configuraciÃ³n para la creaciÃ³n del juego de claves
	$configArgs = array(
    'config' => 'C:\xampp\php\extras\openssl\openssl.cnf', //<-- esta ruta es necesaria si trabajas con XAMPP
    'private_key_bits' => 2048,
    'private_key_type' => OPENSSL_KEYTYPE_RSA
	);
	$resourceNewKeyPair = openssl_pkey_new($configArgs);
	if (!$resourceNewKeyPair) {
    echo 'Puede que tengas problemas con la ruta indicada en el array de configuraciÃ³n "$configArgs" ';
    echo openssl_error_string(); //en el caso que la funciÃ³n anterior de openssl arrojarÃ¡ algun error, este serÃ­a visualizado gracias a esta lÃ­nea
    exit;
	}

	//obtengo del recurso $resourceNewKeyPair la clave publica como un string
	$details = openssl_pkey_get_details($resourceNewKeyPair);
 	$publicKeyPem = $details['key'];

	//obtengo la clave privada como string dentro de la variable $privateKeyPem (la cual es pasada por referencia)
	if (!openssl_pkey_export($resourceNewKeyPair, $privateKeyPem, NULL, $configArgs)) {
    echo openssl_error_string(); //en el caso que la funciÃ³n anterior de openssl arrojarÃ¡ algun error, este serÃ­a visualizado gracias a esta lÃ­nea
    exit;
	}

	//guardo la clave publica y privada en disco:
	file_put_contents('private_key.pem', $privateKeyPem);
	file_put_contents('public_key.pem', $publicKeyPem);

	//si bien ya tengo cargado el string de la clave privada, lo voy a buscar a disco para verificar que el archivo private_key.pem haya sido correctamente generado:
	$privateKeyPem = file_get_contents('private_key.pem');

	//obtengo la clave privada como resource desde el string
	$resourcePrivateKey = openssl_get_privatekey($privateKeyPem);

	//crear la firma dentro de la variable $firma (la cual es pasada por referencia)
	if (!openssl_sign($datos, $firma, $resourcePrivateKey, OPENSSL_ALGO_SHA256)) {
    echo openssl_error_string(); //en el caso que la funciÃ³n anterior de openssl arrojarÃ¡ algun error, este serÃ­a visualizado gracias a esta lÃ­nea
    exit;
	}

	// guardar la firma en disco:
	file_put_contents('signature.dat', $firma);

	// comprobar la firma
	if (openssl_verify($datos, $firma, $publicKeyPem, 'sha256WithRSAEncryption') === 1) {
  	return base64_encode($firma);
	} else {
    return 0;
	}

}

function mes($m){
	$a = "";
	switch ($m) {
		case 1:
			$a= "Enero";
			break;
		case 2:
			$a= "Febrero";
			break;
		case 3:
			$a= "Marzo";
			break;
		case 4:
			$a= "Abril";
			break;
		case 5:
			$a= "Mayo";
			break;
		case 6:
			$a= "Junio";
			break;
		case 7:
			$a= "Julio";
			break;
		case 8:
			$a= "Agosto";
			break;
		case 9:
			$a= "Septiembre";
			break;
		case 10:
			$a= "Octubre";
			break;
		case 11:
			$aa1= "Noviembre";
			break;
		case 12:
			$a= "Diciembre";
			break;

	}
	return $a;
}
function NumLetra($cantidad)
{
		$punto = strpos($cantidad,'.');
		$punto++;
		$largo = strlen($cantidad);
		$rest = substr($cantidad,$punto);

		$unidad = mb_substr($cantidad,0,$punto-1);
		$decimal = mb_substr($cantidad,$punto,1);

		$Numeros[0] = "";
		$Numeros[1] = "uno";
		$Numeros[2] = "dos";
		$Numeros[3] = "tres";
		$Numeros[4] = "cuatro";
		$Numeros[5] = "cinco";
		$Numeros[6] = "seis";
		$Numeros[7] = "siete";
		$Numeros[8] = "ocho";
		$Numeros[9] = "nueve";
		$Numeros[10] = "diez";
		if($cantidad == 10){
			$letra = $Numeros[$unidad].'.'.$Numeros[$decimal];
		}else {
			$letra = $Numeros[$unidad].'.'.$Numeros[$decimal];
		}
		return $letra;
}
session_start();
require_once("../consulta/include/class/panel.php");
$obj = new Panel();

require_once('fpdf.php');
date_default_timezone_set('America/Mexico_City');

class PDF extends FPDF
{
	// Cabecera de página
	function Header()
	{
		// Logo
		$this->Image('../img/historial_academico.png',10,5,197);
		//$this->Image('../img/logo-bbva.jpg',140,22,50);
		// Arial bold 15
		$this->SetFont('Arial','B',14);
		// Movernos a la derecha
		$this->Cell(60);
		// Salto de línea
		$this->Ln(20);

	}

	// Pie de página
	function Footer()
	{
		// Posición: a 1,5 cm del final
		$this->SetY(-8);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Número de página
		$this->Cell(0,5,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'R');
	}
}
$mes = "";
$aa=date('m');
$mes= mes($aa);
if(!isset($_GET['m'])){
	$matricula=$_SESSION['UTECC_idmat'];
	$nombre=$_SESSION['UTECC_usuno'];
}else{
	$matricula= $_GET['m'];
	$nombre = '';
}


$consulta=$obj->getDatosAlumno($matricula);
foreach($consulta as $datos)
{
	$nombre = utf8_encode($datos['n_alumno']).' '.utf8_encode($datos['apellido_pat']).' '.utf8_encode($datos['apellido_mat']);
	$carrera=utf8_decode(utf8_encode($datos['nombre']));
	$cve_grupo=$datos['cve_grupo'];
	$cve_grado=$datos['grado'];
}
$periodo_actual_final = $obj->getPeriodoActualId();
$consulta2=$obj->getPeriodosAlumno($matricula,$periodo_actual_final);

$pc = 0;
$nm = 0;

$pdf = new PDF('P','mm','Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAuthor('Gregorio CT.',1);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(57,31);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(93,5,utf8_decode($nombre),0,0,'L');

$pdf->SetXY(177,31.2);
$pdf->Cell(30,5,$matricula,0,0,'L');

$pdf->SetXY(96,21);
$pdf->Cell(100,5,date('d'). " / ". $mes ." / ".date('Y'),0,0,'C');

$pdf->SetXY(32,38.2);
$pdf->Cell(165,5,$carrera,0,0,'L');

$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Times','',12);
$num = 85;
$salto = 8;

$v = 0;
$cf = 0;
$s = 4;
$c = 4;
$p = 11;
$tm = 0;
foreach($consulta2 as $datos2)
{
	if($s > 175){
		$p = 110;
		$s = 4;
		$c = 4;
	}
	$v++;
	$grado = $datos2['grado'];
	$periodo_actual= $datos2['cve_periodo'];
	$periodo = $obj->getPeriodoNombre($periodo_actual);
	$consulta2=$obj->getHistorialPeriodo($matricula,$periodo_actual);

	$pdf->SetFont('Arial','',6);
	$pdf->SetFillColor(11,26,83);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetXY($p,45+$s);
	$pdf->Cell(75,4,$grado.' Cuatrimestre',0,0,'L',true);
	$pdf->SetXY($p+75,45+$s);
	$pdf->Cell(15,4,utf8_decode('calificación'),1,0,'C',true);
	$pdf->SetTextColor(0,0,0);
	$s = $s + 4;
	$pdf->Ln($s);
	$pc = 0;
	foreach($consulta2 as $datos2)
	{
		$nm = count($consulta2);
		$pc = $pc + $datos2['cf'];

		$pdf->SetXY($p,49+$c);
		$pdf->Cell(75,4,utf8_decode(utf8_encode($datos2['materia'])),1,0,'L');
		$pdf->SetXY($p+75,49+$c);
		$pdf->Cell(15,4,utf8_encode($datos2['cf']),1,0,'C');
		$c = $c + 4;
		$s = $s + 4;
		$pdf->Ln($c);
		$ca = round($pc/$nm,1);
	}
	$tm = $tm + $nm ;
	$c = $c + 8;
	$s = $s + 4;
	$cf = $cf + $ca;
	$pdf->Ln($s);
}
$pdf->SetFillColor(0,151,40);
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','B',8);
$pdf->SetXY($p,49+$c);
$pdf->Cell(75,4,'Total de asignaturas cursadas:',1,0,'L',true);
$pdf->SetXY($p+75,49+$c);
$pdf->Cell(15,4,$tm,1,0,'C',true);
$c = $c + 4;
$pdf->SetXY($p,49+$c);
$pdf->Cell(75,4,'Promedio general:',1,0,'L',true);
$pdf->SetXY($p+75,49+$c);
$pdf->Cell(15,4,round($cf/$v,1),1,0,'C',true);

$link_qr = utf8_encode("http://200.79.176.152/consulta/pdf/historial_academico.php?m=".$matricula);
$pdf->Image("https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=$link_qr",175,240,30,30,'PNG');

$pdf->SetFont('Arial','',6);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(11,239);
$pdf->Cell(80,4,utf8_decode('MTRO. DAVID HERNÁNDEZ HERNÁNDEZ'),0,0,'L');
$pdf->SetXY(11,243);
$pdf->MultiCell(162,3,getFirma(),0,'L');




$pdf->Output('',$matricula.'.pdf',true);
?>
