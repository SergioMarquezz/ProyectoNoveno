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
  require_once("../include/docente/class/reportes.php");

  $obj = new Reportes();

  require_once('fpdf.php');
  date_default_timezone_set('America/Mexico_City');

class PDF extends FPDF {
  	// Cabecera de página
  	function Header()
  	{
  		// Logo
      //$this->Image('img/hidalgo_armas.png',30,30,50);
  	  //$this->Image('pdf/img/hidalgo_armas.png',10,10,195);
      //$this->Image('img/acta.png' , 80 ,22, 35 , 38,'PNG');
  		//$this->Image('../img/logo-bbva.jpg',140,22,50);
  		// Arial bold 15
  		//$this->SetFont('Arial','B',14);
  		// Movernos a la derecha
  		//$this->Cell(100);
  		// Salto de línea
  		//$this->Ln(30);
  	}

  	// Pie de página
  	function Footer()
  	{
  		// Posición: a 1,5 cm del final
  		$this->SetY(10);
  		// Arial italic 8
  		$this->SetFont('Arial','I',8);
  		// Número de página
  		$this->Cell(10,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
  	}
  }
  $gru= $_POST['go'];
	$mat = $_POST['ma'];
	$per= $obj->getPeriodoActualId();
	$alu= $_SESSION['SICE_idusu'];

  $consulta=$obj->getGruposAlumnosNivelacionActual($gru,$per,$mat);
	$consultagrupo=$obj->getGruposDatos($gru,$mat,$per,$alu);
  $n_docente=$obj->getNobrePersona($alu);
  $periodo=$obj->getPeriodoNombre($per);

  $mes = "";
  $aa=date('m');
  $mes= mes($aa);

  //$pdf = new PDF();
  $pdf = new FPDF('L','mm','Letter');
  $pdf->SetTitle('Acta Final');
  $pdf->AliasNbPages();
  $pdf->SetTopMargin(25);
  $pdf->AddPage();
  $pdf->Image('img/acta.png',10,10,0,20,'PNG');

  //$pdf->Image('img/hidalgo_armas.png' , 80 ,22, 35 , 38,'PNG');
  foreach($consultagrupo as $materia)
  {
    $pdf->SetTextColor(70,70,70);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,5,utf8_decode('Fecha de impresión: ').date('d'). " / ". $mes ." / ".date('Y'),0,1,'R');
    $pdf->Cell(25,5,"Grado: ".$materia['grado'],'T',0,'L');
    $pdf->Cell(25,5,"Grupo: ".$materia['id_grupo'],'T',0,'L');
    $pdf->Cell(0,5,"Periodo: ".utf8_encode($periodo),'T',1,'R');
    $pdf->SetTextColor(40,40,40);
    $pdf->Cell(130,5,"Docente: ".$n_docente,0,0,'L');
    $pdf->Cell(0,5,"Asignatura: ".utf8_decode(utf8_encode($materia['materia'])),0,1,'R');
    $pdf->Cell(180,5,"Carrera: ".utf8_decode(utf8_encode($materia['nombre'])),'B',0,'L');
    $pdf->Cell(0,5,utf8_decode("Unidad académica: ").utf8_encode($materia['unidad_academica']),'B',1,'R');
  }
  $pdf->Ln(5);
  $unidad=0;
	$no=1;
  $matricula_temp='0';
  $pdf->SetTextColor(0,0,0);
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(8,5,'#',1,0,'C');
  $pdf->Cell(30,5,utf8_decode('Matrícula'),1,0,'C');
  $pdf->Cell(92,5,'Nombre',1,0,'C');
  $pdf->Cell(30,5,'Total de Clases ',1,0,'C');
  $pdf->Cell(30,5,'Inasistencias',1,0,'C');
  $pdf->Cell(70,5,'Promedio Final',1,1,'C');
  $repro=0;
  foreach($consulta as $dat)
  {
    $pdf->SetTextColor(70,70,70);
    if($matricula_temp<>utf8_encode($dat['matricula']))
    {
      $matricula_temp = utf8_encode($dat['matricula']);
      $nombre = trim($dat['apellido_pat']).' '.trim($dat['apellido_mat']).' '.trim($dat['nombre']);
      $pdf->SetFont('Arial','B',11);
      $pdf->Cell(8,5,$no,1,0,'C');
      $pdf->SetFont('Arial','',11);
      $pdf->Cell(30,5,utf8_encode($dat['matricula']),1,0,'C');
      $pdf->SetFont('Arial','',10);
      $pdf->Cell(92,5,$nombre,1,0,'L');
      $pdf->SetFont('Arial','',11);
      $promedio = round($dat['cal_materia'],2);

      $estado='';
      if(!is_null($dat['estado_cal']))
      {
        if($dat['estado_cal']==0)
        {
          $estado='NP';
        }
        if($dat['estado_cal']==2)
        {
          $estado='E';
        }
        if($dat['estado_cal']==3)
        {
          $estado='';
        }
      }
      //echo "<td $color>".round($dat['cal_materia'],2)."</td>";
      //echo "</tr>";
      $pdf->Cell(30,5,$dat['asistencias'],1,0,'C');
      $pdf->Cell(30,5,$dat['inasistencias'],1,0,'C');
      $pdf->Cell(20,5,bcdiv($promedio,'1',1),1,0,'C');
      $pdf->Cell(40,5,NumLetra($promedio.'.0'),1,0,'C');
      $pdf->Cell(10,5,$estado,1,1,'C');
      $no++;
      if($promedio<8){
        $repro++;
      }
    }

  }
  $apro = $no-1 - $repro;
  $pdf->SetFont('Arial','B',11);
  $pdf->Cell(8,5,'',0,0);
  $pdf->Cell(30,5,'',0,0,'R');
  $pdf->Cell(92,5,'APROBADOS:',1,0,'R');
  $pdf->Cell(30,5,$apro,1,1,'C');

  $pdf->Cell(8,5,'',0,0);
  $pdf->Cell(30,5,'',0,0,'R');
  $pdf->Cell(92,5,'NO APROBADOS:',1,0,'R');
  $pdf->Cell(30,5,$repro,1,1,'C');

  $pdf->Ln(5);
  $pdf->Cell(160,5,'',0,0);
  $pdf->Cell(48,5,'','B',0,'R');
  $pdf->Cell(5,5,'',0,0,'R');
  $pdf->Cell(47,5,'','B',1,'R');

  $pdf->Cell(160,5,'',0,0);
  $pdf->Cell(48,5,'Docente',0,0,'C');
  $pdf->Cell(5,5,'',0,0,'R');
  $pdf->Cell(46,5,'Coordinador de carrera',0,1,'C');




  $pdf->Output();
  ?>
