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
    //echo 'la firma es valida y los datos son confiables';
	} else {
    //echo 'la firma es invalida y/o los datos fueron alterados';
	}

	//$res=openssl_pkey_new();

	// Get private key
	openssl_pkey_export($resourceNewKeyPair, $privateKeyPem, NULL, $configArgs );
	$details = openssl_pkey_get_details($resourceNewKeyPair);

	// Get public key
	$pubkey=openssl_pkey_get_details($resourceNewKeyPair);
	$pubkey=$pubkey['key'];
	//var_dump($privkey);
	//var_dump($pubkey);

	// Create the keypair
	//$res2=openssl_pkey_new();

	// Get private key
	openssl_pkey_export($resourceNewKeyPair, $privateKeyPem, NULL, $configArgs );
	$publicKeyPem = $details['key'];
	// Get public key
	//$pubkey2=openssl_pkey_get_details($resourceNewKeyPair);
	//$pubkey2=$pubkey2["key"];
	//var_dump($privateKeyPem);
	//var_dump($publicKeyPem);

	//$data = "Only I know the purple fox. Trala la !";
Header("Content-Type: text/plain");

openssl_seal($datos, $sealed, $ekeys, array($pubkey, $publicKeyPem));

//var_dump("sealed");
//base64_encode($sealed);
//var_dump(base64_encode($sealed));
//var_dump(base64_encode($ekeys[0]));
//var_dump(base64_encode($ekeys[1]));

// decrypt the data and store it in $open
if (openssl_open($sealed, $open, $ekeys[1], openssl_pkey_get_private  ($privateKeyPem  ,'sha256WithRSAEncryption' ) ) ) {
    return base64_encode($open);
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
require_once("../include/class/panel.php");
$obj = new Panel();

require_once('fpdf.php');
date_default_timezone_set('America/Mexico_City');

class PDF extends FPDF
{
	// Cabecera de página
	function Header()
	{
		// Logo
		$this->Image('../img/boleta.png',10,10,195);
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
$mes = "";
$aa=date('m');
$mes= mes($aa);
if(!isset($_GET['m'])){
	$matricula=$_SESSION['UTECC_idmat'];
	$nombre=$_SESSION['UTECC_usuno'];
	$liga = 0;
}else{
	$matricula= $_GET['m'];
	$nombre = '';
	$liga = 1;
}


$consulta=$obj->getDatosAlumno($matricula);
foreach($consulta as $datos)
{
	$nombre = utf8_encode($datos['n_alumno']).' '.utf8_encode($datos['apellido_pat']).' '.utf8_encode($datos['apellido_mat']);
	$carrera=utf8_decode(utf8_encode($datos['nombre']));
	//$grupo=$datos['grado'].'-'.$datos['id_grupo'];
	$cve_grupo=$datos['cve_grupo'];
	$cve_grado=$datos['grado'];
	if($liga==0){
		$cve_periodo=$datos['cve_periodo_actual'];
	}else {
			$cve_periodo=$_GET['pe'];
	}
	if(isset($_POST['pe'])){
		$cve_periodo--;
	}
	$periodo = $obj->getPeriodoNombre($cve_periodo);
}
$consulta2=$obj->getHistorialPeriodo($matricula,$cve_periodo);
$grupo = $obj->getNombreGrado($matricula,$cve_periodo);

$pc = 0;
$nm = 0;

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTextColor(100,100,100);
$pdf->SetFont('Arial','',12);
$pdf->SetXY(42,42.5);
$pdf->Cell(70,5,$periodo,0,0,'L');

$pdf->SetXY(161,42.5);
$pdf->Cell(40,5,date('d'). " / ". $mes ." / ".date('Y'),0,0,'L');

$pdf->SetFont('Arial','',10);
$pdf->SetXY(57,52);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(93,5,utf8_decode($nombre),0,0,'L');

$pdf->SetXY(172,52);
$pdf->Cell(30,5,$matricula,0,0,'L');

$pdf->SetXY(172,61);
$pdf->Cell(30,5,$grupo,0,0,'L');

$pdf->SetXY(32,61);
$pdf->Cell(100,5,$carrera,0,0,'L');

$pdf->Ln(18);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Times','',13);
$num = 85;
$salto = 8;
foreach($consulta2 as $datos2)
{
  $nm = count($consulta2);
  $pc = $pc + $datos2['cf'];
  $pdf->Cell(135,5,utf8_decode(utf8_encode($datos2['materia'])),0,0,'L');
  $pdf->Cell(20,5,round($datos2['cf'],1),0,0,'C');
	$pdf->Cell(40,5,NumLetra($datos2['cf']),0,0,'C');
	$pdf->line(11,$num,200,$num);
	$num = $num + $salto;
  $pdf->Ln($salto);
}
$pdf->Ln(8);
$pdf->SetFont('Times','B',13);
$pdf->Cell(135,5,'PROMEDIO CUATRIMESTRAL',0,0,'R');
$promedio = round($pc/$nm,1);
$pdf->Cell(20,5,$promedio,0,0,'C');
$pdf->Cell(40,5,NumLetra($promedio.'.0'),0,0,'C');

$link_qr = utf8_encode("http://200.79.176.155:90/consulta/pdf/boleta.php?m=".$matricula."%26pe=".$cve_periodo);
$pdf->Image("https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=$link_qr",20,170,50,50,'PNG');

$pdf->SetFont('Arial','',6);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(80,4,utf8_decode('MTRO. DAVID HERNÁNDEZ HERNÁNDEZ'),0,0,'L');
$pdf->MultiCell(162,4,getFirma(),0,'L');

$pdf->Output('',$matricula.'.pdf',true);
?>
