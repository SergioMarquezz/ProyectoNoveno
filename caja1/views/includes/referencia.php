<?php

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
        $fecha = strtotime('+2 day',strtotime($fecha));
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
   
    function referenceToday($folio, $pag, $mont){

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
?>