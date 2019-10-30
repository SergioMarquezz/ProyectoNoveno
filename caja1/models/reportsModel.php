<?php
    require_once "mainModel.php";

    $options = $_POST['opt'];
    $top = $_POST['num_top'];


    if($top != ""){

        top($top);
    }
    else{

        switch($options){

            case "total payment":
                    totalPayments();
                break;

            case "for date":
                    $date_report = $_POST['date_report'];
                    paymentsDate($date_report);
                break;

            case "count_payment":
                    $count_payment = $_POST['count'];
                    $diferenciador = $_POST['dife'];

                    if($diferenciador == "sum concept"){

                        sumForDateConcept($count_payment);   
                    }

                    else if($diferenciador == "count and sum"){

                        $array_count_sum = array("count" => countPaymentDate($count_payment), "sum" => sumForDate($count_payment));
                        print json_encode($array_count_sum);
                    }

                break;

            case "count key":
                    $count_key = $_POST['key_count'];
                    $distinto = $_POST['distinto'];

                    if($distinto == "sum key"){

                        sumForConcept($count_key);
                    }
                    else if($distinto == "count key"){

                        countKey($count_key);
                    }
                break;

            case "paymet concept":
                    $key_concept = $_POST['key'];
                    paymentForConcept($key_concept);
                break;

            case "payment month":
                $months = $_POST['months'];
                $distinto = $_POST['distinto'];

                if($distinto == 'report month'){

                    reportMonth($months);
                }

                else if($distinto == "month count and sum"){

                    $array_month = array("month_count" => countMonth($months), "sum_month" => sumMonth($months));
                    print json_encode($array_month);
                }
               
                break;
        }
     }
    
    function totalPayments(){

        $sql_payments_totals = "SELECT DAY(fecha) AS dia_fecha, DATENAME(MONTH, fecha) AS mes_fecha, YEAR(fecha) AS anio_fecha, a.matricula, 
        (p.nombre+' '+p.apellido_pat+' '+p.apellido_mat) AS nombre_completo, carrera = (SELECT nombre FROM saiiut.saiiut.carreras_cgut WHERE cve_carrera = a.cve_carrera),
        (CASE WHEN a.cve_unidad_academica = 1 THEN 'TULANCINGO' WHEN a.cve_unidad_academica = 2 THEN 'HUEHUETLA'  WHEN a.cve_unidad_academica = 3 THEN 'CUAUTEPEC' END) AS sede, 
        a.grado_actual, grupo = (SELECT(CASE WHEN id_grupo = 'A' THEN 1 WHEN id_grupo = 'B' THEN 2 WHEN id_grupo = 'C' THEN 3 WHEN id_grupo = 'D' THEN 4 WHEN id_grupo = 'E' THEN 5 
        WHEN id_grupo = 'F' THEN 6 END) FROM saiiut.saiiut.grupos WHERE cve_grupo = a.cve_grupo), 
        (CASE WHEN a.cve_turno = 1 THEN 'MATUTINO'  WHEN a.cve_turno = 2 THEN 'VESPERTINO' END) AS turno, 
        cp.descripcion, cantidad, pa.costo_unitario, abono, lugar_pago
        FROM saiiut.saiiut.pagos pa
        INNER JOIN saiiut.saiiut.personas p ON pa.cve_persona = p.cve_persona
        INNER JOIN saiiut.saiiut.conceptos_pago cp ON pa.cve_concepto_pago = cp.cve_concepto
        LEFT JOIN saiiut.saiiut.alumnos a ON pa.cve_persona = a.cve_alumno
        WHERE pa.cve_periodo = (SELECT cve_periodo FROM saiiut.saiiut.periodos WHERE activo = 1)
        ORDER BY fecha";

        $result_payment = executeQuery($sql_payments_totals);

        while($data = odbc_fetch_array($result_payment)){
        
            $array_payment["reports"][] = array_map("utf8_encode", $data);  
        
            $json_payment = json_encode($array_payment);
        }
    
        echo $json_payment;

    }

    function top($num_top){

        $sql_payments_top = "SELECT TOP $num_top DAY(fecha) AS dia_fecha, DATENAME(MONTH, fecha) AS mes_fecha, YEAR(fecha) AS anio_fecha, a.matricula, 
        (p.nombre+' '+p.apellido_pat+' '+p.apellido_mat) AS nombre_completo, carrera = (SELECT nombre FROM saiiut.saiiut.carreras_cgut WHERE cve_carrera = a.cve_carrera),
        (CASE WHEN a.cve_unidad_academica = 1 THEN 'TULANCINGO' WHEN a.cve_unidad_academica = 2 THEN 'HUEHUETLA'  WHEN a.cve_unidad_academica = 3 THEN 'CUAUTEPEC' END) AS sede, 
        a.grado_actual, grupo = (SELECT(CASE WHEN id_grupo = 'A' THEN 1 WHEN id_grupo = 'B' THEN 2 WHEN id_grupo = 'C' THEN 3 WHEN id_grupo = 'D' THEN 4 WHEN id_grupo = 'E' THEN 5 
        WHEN id_grupo = 'F' THEN 6 END) FROM saiiut.saiiut.grupos WHERE cve_grupo = a.cve_grupo), 
        (CASE WHEN a.cve_turno = 1 THEN 'MATUTINO'  WHEN a.cve_turno = 2 THEN 'VESPERTINO' END) AS turno, 
        cp.descripcion, cantidad, pa.costo_unitario, abono, lugar_pago
        FROM saiiut.saiiut.pagos pa
        INNER JOIN saiiut.saiiut.personas p ON pa.cve_persona = p.cve_persona
        INNER JOIN saiiut.saiiut.conceptos_pago cp ON pa.cve_concepto_pago = cp.cve_concepto
        LEFT JOIN saiiut.saiiut.alumnos a ON pa.cve_persona = a.cve_alumno
        ORDER BY fecha";

        $result_top = executeQuery($sql_payments_top);

        while($data_top = odbc_fetch_array($result_top)){
        
            $array_payment_top["reports"][] = array_map("utf8_encode", $data_top);  
        
            $json_payment_top = json_encode($array_payment_top);
        }
    
        echo $json_payment_top;

    }

    function paymentsDate($date){

        $paymets_date = "SELECT DAY(fecha) AS dia_fecha, DATENAME(MONTH, fecha) AS mes_fecha, YEAR(fecha) AS anio_fecha, a.matricula, 
        (p.nombre+' '+p.apellido_pat+' '+p.apellido_mat) AS nombre_completo, carrera = (SELECT nombre FROM saiiut.saiiut.carreras_cgut WHERE cve_carrera = a.cve_carrera),
        (CASE WHEN a.cve_unidad_academica = 1 THEN 'TULANCINGO' WHEN a.cve_unidad_academica = 2 THEN 'HUEHUETLA'  WHEN a.cve_unidad_academica = 3 THEN 'CUAUTEPEC' END) AS sede, 
        a.grado_actual, grupo = (SELECT(CASE WHEN id_grupo = 'A' THEN 1 WHEN id_grupo = 'B' THEN 2 WHEN id_grupo = 'C' THEN 3 WHEN id_grupo = 'D' THEN 4 WHEN id_grupo = 'E' THEN 5 
        WHEN id_grupo = 'F' THEN 6 END) FROM saiiut.saiiut.grupos WHERE cve_grupo = a.cve_grupo), 
        (CASE WHEN a.cve_turno = 1 THEN 'MATUTINO'  WHEN a.cve_turno = 2 THEN 'VESPERTINO' END) AS turno, 
        cp.descripcion, cantidad, pa.costo_unitario, abono, lugar_pago
        FROM saiiut.saiiut.pagos_copy pa
        INNER JOIN saiiut.saiiut.personas p ON pa.cve_persona = p.cve_persona
        INNER JOIN saiiut.saiiut.conceptos_pago cp ON pa.cve_concepto_pago = cp.cve_concepto
        LEFT JOIN saiiut.saiiut.alumnos a ON pa.cve_persona = a.cve_alumno
        WHERE pa.fecha = '$date'";
    
        $result_date = executeQuery($paymets_date);


        while($rows_date = odbc_fetch_array($result_date)){

            $array_date['reports'][] = array_map("utf8_encode", $rows_date);

            $json_date = json_encode($array_date);
        }

        $description_date = odbc_result($result_date,"descripcion");
        $full_name = odbc_result($result_date,"nombre_completo");

        if($description_date == ""){

            $empty['reports'] = "sin registros";
            print json_encode($empty);
        }

        else{
            echo $json_date;
        }

    }

    function reportMonth($month){

        $paymets_month = "SELECT DAY(fecha) AS dia_fecha, DATENAME(MONTH, fecha) AS mes_fecha, YEAR(fecha) AS anio_fecha, a.matricula, 
        (p.nombre+' '+p.apellido_pat+' '+p.apellido_mat) AS nombre_completo, carrera = (SELECT nombre FROM saiiut.saiiut.carreras_cgut WHERE cve_carrera = a.cve_carrera),
        (CASE WHEN a.cve_unidad_academica = 1 THEN 'TULANCINGO' WHEN a.cve_unidad_academica = 2 THEN 'HUEHUETLA'  WHEN a.cve_unidad_academica = 3 THEN 'CUAUTEPEC' END) AS sede, 
        a.grado_actual, grupo = (SELECT(CASE WHEN id_grupo = 'A' THEN 1 WHEN id_grupo = 'B' THEN 2 WHEN id_grupo = 'C' THEN 3 WHEN id_grupo = 'D' THEN 4 WHEN id_grupo = 'E' THEN 5 
        WHEN id_grupo = 'F' THEN 6 END) FROM saiiut.saiiut.grupos WHERE cve_grupo = a.cve_grupo), 
        (CASE WHEN a.cve_turno = 1 THEN 'MATUTINO'  WHEN a.cve_turno = 2 THEN 'VESPERTINO' END) AS turno, 
        cp.descripcion, cantidad, pa.costo_unitario, abono, lugar_pago
        FROM saiiut.saiiut.pagos_copy pa
        INNER JOIN saiiut.saiiut.personas p ON pa.cve_persona = p.cve_persona
        INNER JOIN saiiut.saiiut.conceptos_pago cp ON pa.cve_concepto_pago = cp.cve_concepto
        LEFT JOIN saiiut.saiiut.alumnos a ON pa.cve_persona = a.cve_alumno
        WHERE MONTH(pa.fecha) = '$month'";

        $result_month = executeQuery($paymets_month);

        while($row_month = odbc_fetch_array($result_month)){

            $array_month['reports'][] = array_map("utf8_encode", $row_month);

            $json_month = json_encode($array_month);
        }

        echo $json_month;
    }

    function countMonth($month_date){

        $query_month = "SELECT COUNT(cve_concepto_pago) AS count_month
        FROM saiiut.saiiut.pagos_copy pc, saiiut.saiiut.conceptos_pago cp
        WHERE pc.cve_concepto_pago = cp.cve_concepto AND MONTH(pc.fecha) = '$month_date'";

        $result_count_month = executeQuery($query_month);

        $count_month = odbc_result($result_count_month,"count_month");

        return $count_month;
    }

    function sumMonth($sum){

        $query_sum_month = "SELECT SUM(pa.abono) AS sum_month_count
        FROM saiiut.saiiut.pagos_copy pa, saiiut.saiiut.conceptos_pago cp
        WHERE pa.cve_concepto_pago = cp.cve_concepto AND MONTH(pa.fecha) = '$sum'";

        $resul_sum_month = executeQuery($query_sum_month);

        $sum_month = odbc_result($resul_sum_month,"sum_month_count");

        return $sum_month;
    }

    function countPaymentDate($dates){


            $sql_count_payment = "SELECT COUNT(cve_concepto_pago) AS count_concepto
            FROM saiiut.saiiut.pagos_copy pc, saiiut.saiiut.conceptos_pago cp
            WHERE pc.cve_concepto_pago = cp.cve_concepto AND pc.fecha = '$dates'";
    
            $result_count = executeQuery($sql_count_payment);
    
            $count = odbc_result($result_count,"count_concepto");
   
            return $count;

    }

    function sumForDate($sum_date){

        $query_sum_date = "SELECT SUM(pa.abono) AS sum_date_count
        FROM saiiut.saiiut.pagos_copy pa, saiiut.saiiut.conceptos_pago cp
        WHERE pa.cve_concepto_pago = cp.cve_concepto AND pa.fecha = '$sum_date'"; //2019-08-6 ó 2019-08-15

        $result_sum_date = executeQuery($query_sum_date);

        $sum_result = odbc_result($result_sum_date,"sum_date_count");

        return $sum_result;
    }

    function countKey($key){

        $sql_count_for_concept = "SELECT COUNT(cve_concepto_pago) AS count_concepto
        FROM saiiut.saiiut.pagos_copy pc, saiiut.saiiut.conceptos_pago cp
        WHERE pc.cve_concepto_pago = cp.cve_concepto AND pc.cve_concepto_pago = '$key'";

        $result_count_concept = executeQuery($sql_count_for_concept);

        $count = odbc_result($result_count_concept,"count_concepto");

        echo $count;

    }

    function sumForConcept($key_for_concept){

        $sql_sum_concept = "SELECT cp.descripcion,SUM(pa.abono) AS sum_concept
        FROM saiiut.saiiut.pagos_copy pa, saiiut.saiiut.conceptos_pago cp
        WHERE pa.cve_concepto_pago = cp.cve_concepto AND pa.cve_concepto_pago = '$key_for_concept'
        GROUP BY cp.descripcion";

        $result_sum_concept = executeQuery($sql_sum_concept);

        $sum_concept = odbc_result($result_sum_concept,"sum_concept");
        $descripcion = odbc_result($result_sum_concept,"descripcion");

        
        $array_data = array('sum_concept' => $sum_concept, 'description' => $descripcion);
        print json_encode($array_data);


        

        
    }

    function sumForDateConcept($sum_date_concept){

        $sql_sum_date_concept = "SELECT cp.descripcion, SUM(pa.abono) AS sum_date
        FROM saiiut.saiiut.pagos_copy pa, saiiut.saiiut.conceptos_pago cp
        WHERE pa.cve_concepto_pago = cp.cve_concepto AND pa.fecha = '$sum_date_concept'
        GROUP BY cp.descripcion";

        $result_date_concept = executeQuery($sql_sum_date_concept);

        while($datos = odbc_fetch_array($result_date_concept)){

            $array_sum_concept[] = array_map("utf8_encode", $datos);

            $json_sum_concept = json_encode($array_sum_concept);

        }

        echo $json_sum_concept;
    }

    function paymentForConcept($concept){

        $query_concept = "SELECT DAY(pa.fecha) AS dia_fecha, DATENAME(MONTH, pa.fecha) AS mes_fecha, YEAR(pa.fecha) AS anio_fecha, a.matricula, 
        (p.nombre+' '+p.apellido_pat+' '+p.apellido_mat) AS nombre_completo, carrera = (SELECT nombre FROM saiiut.saiiut.carreras_cgut WHERE cve_carrera = a.cve_carrera),
        (CASE WHEN a.cve_unidad_academica = 1 THEN 'TULANCINGO' WHEN a.cve_unidad_academica = 2 THEN 'HUEHUETLA'  WHEN a.cve_unidad_academica = 3 THEN 'CUAUTEPEC' END) AS sede, 
        a.grado_actual, grupo = (SELECT(CASE WHEN id_grupo = 'A' THEN 1 WHEN id_grupo = 'B' THEN 2 WHEN id_grupo = 'C' THEN 3 WHEN id_grupo = 'D' THEN 4 WHEN id_grupo = 'E' THEN 5 
        WHEN id_grupo = 'F' THEN 6 END) FROM saiiut.saiiut.grupos WHERE cve_grupo = a.cve_grupo), 
        (CASE WHEN a.cve_turno = 1 THEN 'MATUTINO'  WHEN a.cve_turno = 2 THEN 'VESPERTINO' END) AS turno, 
        cp.descripcion, cantidad, pa.costo_unitario, abono, lugar_pago
        FROM saiiut.saiiut.pagos_copy pa
        INNER JOIN saiiut.saiiut.personas p ON pa.cve_persona = p.cve_persona
        INNER JOIN saiiut.saiiut.conceptos_pago cp ON pa.cve_concepto_pago = cp.cve_concepto
        LEFT JOIN saiiut.saiiut.alumnos a ON pa.cve_persona = a.cve_alumno
        WHERE p.cve_persona = pa.cve_persona AND pa.cve_concepto_pago = $concept
        ORDER BY pa.fecha";

        $result_concept = executeQuery($query_concept);

        while($rows_concept = odbc_fetch_array($result_concept)){

            $array_concept['reports'][] = array_map("utf8_encode", $rows_concept);

            $json_concept = json_encode($array_concept);
            
        }

        echo $json_concept;

    }
            
?>
