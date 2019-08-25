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
        $fertilizer = $_POST['fertilizer'];
        $key_period = periodoActivo();
        $key_payment = $_POST['key_concept'];
        $payment = 1;
        $reference = referencia($matricula,$key_payment,$fertilizer);
        $quantity = $_POST['quantity'];

        $insert_payment = "INSERT INTO saiiut.saiiut.pagos(fecha,cve_tipo_persona,cve_persona,abono,cve_periodo,
        cve_concepto_pago,pago_realizado,referencia_completa,fecha_guardado,cantidad)
        VALUES('$date_save','$type_people','$key_people','$fertilizer','$key_period','$key_payment','$payment',
        '$reference','$date_save','$quantity')";

        $result_save = executeQuery($insert_payment);
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