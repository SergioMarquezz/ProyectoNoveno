<?php
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
session_start();
require_once("../include/class/panel.php");
$obj = new Panel();

require_once('fpdf.php');
date_default_timezone_set('America/Mexico_City');

class PDF extends FPDF
{
	var $B=0;
    var $I=0;
    var $U=0;
    var $HREF='';
    var $ALIGN='';
	// Cabecera de página
	function Header()
	{
		// Logo
		$this->Image('../img/constancia.jpg',10,5,195);
		//$this->Image('../img/logo-bbva.jpg',140,22,50);
		// Arial bold 15
		$this->SetFont('Arial','B',14);
		// Movernos a la derecha
		$this->Cell(70);
		// Salto de línea
		$this->Ln(40);

	}

	// Pie de página
	function Footer()
	{
		// Posición: a 1,5 cm del final
		$this->SetY(-15.5);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Número de página
		$this->Cell(0,5,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
	}
	function WriteHTML($html)
    {
        //HTML parser
        $html=str_replace("\n",' ',$html);
        $a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
        foreach($a as $i=>$e)
        {
            if($i%2==0)
            {
                //Text
                if($this->HREF)
                    $this->PutLink($this->HREF,$e);
                elseif($this->ALIGN=='center')
                    $this->Cell(0,5,$e,0,1,'C');
                else
                    $this->Write(5,$e);
            }
            else
            {
                //Tag
                if($e[0]=='/')
                    $this->CloseTag(strtoupper(substr($e,1)));
                else
                {
                    //Extract properties
                    $a2=explode(' ',$e);
                    $tag=strtoupper(array_shift($a2));
                    $prop=array();
                    foreach($a2 as $v)
                    {
                        if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                            $prop[strtoupper($a3[1])]=$a3[2];
                    }
                    $this->OpenTag($tag,$prop);
                }
            }
        }
    }
		function OpenTag($tag,$prop)
    {
        //Opening tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,true);
        if($tag=='A')
            $this->HREF=$prop['HREF'];
        if($tag=='BR')
            $this->Ln(5);
        if($tag=='P')
            $this->ALIGN=$prop['ALIGN'];
        if($tag=='HR')
        {
            if( !empty($prop['WIDTH']) )
                $Width = $prop['WIDTH'];
            else
                $Width = $this->w - $this->lMargin-$this->rMargin;
            $this->Ln(2);
            $x = $this->GetX();
            $y = $this->GetY();
            $this->SetLineWidth(0.4);
            $this->Line($x,$y,$x+$Width,$y);
            $this->SetLineWidth(0.2);
            $this->Ln(2);
        }
    }

    function CloseTag($tag)
    {
        //Closing tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,false);
        if($tag=='A')
            $this->HREF='';
        if($tag=='P')
            $this->ALIGN='';
    }
		function SetStyle($tag,$enable)
    {
        //Modify style and select corresponding font
        $this->$tag+=($enable ? 1 : -1);
        $style='';
        foreach(array('B','I','U') as $s)
            if($this->$s>0)
                $style.=$s;
        $this->SetFont('',$style);
    }

    function PutLink($URL,$txt)
    {
        //Put a hyperlink
        $this->SetTextColor(0,0,255);
        $this->SetStyle('U',true);
        $this->Write(5,$txt,$URL);
        $this->SetStyle('U',false);
        $this->SetTextColor(0);
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
	$nombre = utf8_encode($datos['apellido_pat']).' '.utf8_encode($datos['apellido_mat']).' '.utf8_encode($datos['n_alumno']);
	$carrera=utf8_decode(utf8_encode($datos['nombre']));
	$cve_grupo=$datos['cve_grupo'];
	$cve_grado=$datos['grado'];
	$cve_periodo =$datos['cve_periodo_actual'];
}
$periodo_actual_final = $obj->getPeriodoActualId();
$consulta2=$obj->getPeriodosAlumno($matricula,$periodo_actual_final);
$pc = 0;
$cf = 0;
$tm = 0;
$v = 0;
foreach($consulta2 as $datos2)
{
	$v++;
	$grado = $datos2['grado'];
	$periodo_actual= $datos2['cve_periodo'];
	$periodo = $obj->getPeriodoNombre($periodo_actual);
	$consulta3=$obj->getHistorialPeriodo($matricula,$periodo_actual);
	$pc = 0;
	$nm = 0;
	foreach($consulta3 as $datos3)
	{
		$nm = count($consulta3);
		$pc = $pc + $datos3['cf'];

		$ca = round($pc/$nm,1);
	}
	$tm = $tm + $nm ;
	$periodo_final= $datos2['cve_periodo'];
	$cf = $cf + $ca;
}
$pc1 = 0;
$ca1 = 0;
$consulta4=$obj->getHistorialPeriodo($matricula,$periodo_final);
foreach($consulta4 as $datos4)
{
	$nm1 = count($consulta4);
	$pc1 = $pc1 + $datos4['cf'];
	$ca1 = round($pc1/$nm1,1);
}
$periodo_nombre = $obj->getPeriodoNombre($cve_periodo);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
//$pdf->SetAuthor('Gregorio CT.',1);
/*
$pdf->SetFont('Arial','',10);
$pdf->SetXY(57,34.5);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(93,5,utf8_decode($nombre),0,0,'L');

$pdf->SetXY(172,34.5);
$pdf->Cell(30,5,$matricula,0,0,'L');

$pdf->SetXY(145,23.5);
$pdf->Cell(34,5,date('d'). " / ". $mes ." / ".date('Y'),0,0,'L');

$pdf->SetXY(32,42);
$pdf->Cell(165,5,$carrera,0,0,'L');
$pdf->Ln(10);

*/
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(141,5,"Asunto:",0,0,'R');
$pdf->SetFont('Arial','',13);
$pdf->Cell(40,5,"Constancia de Estudios",0,0,'L');
$pdf->Ln(30);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,5,"A QUIEN CORRESPONDA.",0,0,'L');
$pdf->Ln(5);
$pdf->Cell(0,5,"Promedio General: ".round($cf/$v,1),0,0,'R');
$pdf->Ln(5);
$pdf->Cell(0,5,"Promedio Cuatrimestre Anterior: ".$ca1,0,0,'R');

$pdf->Ln(20);
$pdf->SetFont('Arial','',13);
//$pdf->writeHTML('Por medio de la presente, se hace constar que el (la) <b>C. Nombre</b> con número de matrícula xxxxxx, se encuentra regularmente inscrito en el cuatrimestre en la carrera de:');
$html = utf8_decode('Por medio de la presente, se hace constar que el (la) <b>C. '.$nombre.'</b> con número de matrícula <b>'.$matricula.'</b>, se encuentra regularmente inscrito(a) en el <b>'.$cve_grado.'</b> cuatrimestre en la carrera de:');
$pdf->writeHTML($html, true, 0, true, true);
$pdf->Ln(15);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,5,utf8_decode(utf8_encode($carrera)).'.',0,0,'C');
$pdf->Ln(15);
$pdf->SetFont('Arial','',13);
$pdf->MultiCell(0,5,utf8_decode("en el periodo ".$periodo_nombre.". Y teniendo como clave de registro esta institución 13EUT0002Y."),0,'FJ');
$pdf->Ln(10);
$pdf->MultiCell(0,5,utf8_decode("Se extiende la presente a petición del interesado para los usos legales que le convengan, con fecha ".date('d'). " de ". $mes ." del ".date('Y')." en la ciudad de Tulancingo, Hgo."),0,'FJ');
$pdf->Ln(10);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,5,'A T E N T A M E N T E',0,0,'C');
$pdf->Ln(15);
$pdf->Cell(0,5,utf8_decode('M. en E. DAVID HERNÁNDEZ HERNÁNDEZ'),0,0,'C');
$pdf->Ln(5);
$pdf->Cell(0,5,utf8_decode('JEFE DE SERVICIOS ESCOLARES'),0,0,'C');




$link_qr = utf8_encode("http://200.79.176.155:90/consulta/pdf/constancia.php?m=".$matricula);
$pdf->Image("https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=$link_qr",170,190,30,30,'PNG');

$pdf->Output('',$matricula.'.pdf',true);
?>
