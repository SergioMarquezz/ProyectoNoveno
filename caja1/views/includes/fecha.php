<?php

$date =  date("d") . " / " . date("m") . " / " . date("Y");
$year = date("Y");

$fecha = date("Y"). " / ". date("m"). " / ". date("d");


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

	$hoy = $dia." de ".$meses[$mes-1]. " del ".$ano;
	return $hoy;
}


?>