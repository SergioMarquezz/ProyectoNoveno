<?php

    require_once "mainModel.php";
    require_once "../views/includes/fecha.php";
    require_once "../views/includes/referencia.php";

    $option = $_POST['options'];

    if($option == 'students'){

        $sql = "SELECT a.matricula, p.nombre, p.apellido_pat, p.apellido_mat, c.nombre AS carrera, a.grado_actual, p.cve_persona
        FROM saiiut.saiiut.alumnos a
        INNER JOIN saiiut.saiiut.personas p ON p.cve_persona = a.cve_alumno
        INNER JOIN saiiut.saiiut.carreras_cgut c ON c.cve_carrera = a.cve_carrera
        WHERE a.cve_periodo_actual = (SELECT TOP 1 cve_periodo FROM saiiut.saiiut.periodos WHERE activo = 1 ORDER BY cve_periodo DESC )AND a.cve_unidad_academica = 1 AND a.cve_status = 1
        ORDER BY c.nombre";
    
        $query_students = executeQuery($sql);
    
        while($row = odbc_fetch_array($query_students)){
    
            $array_students["students"][] = array_map("utf8_encode", $row);  
        
            $json_students = json_encode($array_students);
        }
    
        echo $json_students;
    }

    else if($option == 'enrollments'){

        $enrollment = $_POST['enrollment'];

        $key_query = "SELECT al.cve_alumno
        FROM saiiut.saiiut.alumnos al
        WHERE al.matricula = '$enrollment'";

        $result_query = executeQuery($key_query);

        $key_student = odbc_result($result_query,"cve_alumno");

        $key['key_student'] = $key_student;

        print json_encode($key);
    }

    else if($option == "payment-manual"){

        $matricula = $_POST['matricula'];
        $date_save = $fecha;
        $type_people = 2;
        $key_people = $_POST['key_people'];
        $fertilizer = $_POST['fertilizer'];//Variable para genrar la referencia 70000
        $fertilizer_bd = $_POST['fertilizer_bd'];//Variable para guardar en base de datos 700
        $abono = $_POST['abonos']; //$fertilizer_bd * $quantity
        $key_period = periodoActivo();
        $key_payment = $_POST['key_concept']; //85
        $payment = 1;
        $reference = referenceToday($matricula,$key_payment,$fertilizer);
        $quantity = $_POST['quantity'];
        $identificador_payment = "CAJA";

        $insert_payment = "INSERT INTO saiiut.saiiut.pagos(cve_persona,cve_tipo_persona,cve_periodo,cve_concepto_pago,fecha,
        referencia_completa,cantidad,costo_unitario,abono,pago_realizado,fecha_guardado,lugar_pago)
        VALUES('$key_people','$type_people','$key_period','$key_payment','$date_save','$reference','$quantity',
        '$fertilizer_bd','$abono','$payment','$date_save','$identificador_payment')";

        $result_save = executeQuery($insert_payment);

        
        if($result_save){

            echo "save payment";
        }
    }


    TODO://Verificar dos periodos activos y ver que sale de resultado
    function periodoActivo(){
        
        $sql =  executeQuery("SELECT cve_periodo FROM saiiut.saiiut.periodos WHERE activo = 1");
  
        $num = odbc_num_rows($sql);
  
        if($num == 1){
  
          $periodo = odbc_result($sql,"cve_periodo");
  
          return $periodo;
        }
      }

?>