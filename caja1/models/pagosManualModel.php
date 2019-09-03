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

       // verificarReferencia($reference);
        
        if($result_save){

            echo "save payment";
        }
    }
    else if($option == 'subject'){

        subjects();
    }

    else if($option == "grades"){

        gradeAndStudents();
    }

    else if($option == "subjects default"){

        defaultedSubjects();
    }

    function verificarReferencia($referencia){


        $sql = executeQuery("SELECT cve_tipo_persona,cve_persona,referencia FROM solicitud_documento");

        while($row = odbc_fetch_array($sql)){

           $row_update = $row['referencia'];

           $array_reference = array($row_update);

            if(in_array($referencia,$array_reference)){

                $cve_persona = odbc_result($sql,"cve_persona");
                $type_people = odbc_result($sql,"cve_tipo_persona");
                
                $update = executeQuery("UPDATE solicitud_documento SET pago_realizado = 1 
                WHERE referencia = '$row_update'" );

            }

            
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

    function subjects(){

        
        $matricula = $_POST['matricula'];

        $query_subjects = "SELECT a.grado_actual, (CASE WHEN g.id_grupo = 'A' THEN 1 WHEN g.id_grupo = 'B' THEN 2 
        WHEN g.id_grupo = 'C' THEN 3 WHEN g.id_grupo = 'D' THEN 4 WHEN g.id_grupo = 'E' THEN 5 WHEN g.id_grupo = 'F' THEN 6 END ) AS grupo, 
        c1.cve_grupo,c1.cve_periodo,c1.cve_materia,UPPER(m.nombre) as materia,c2.cve_maestro,(UPPER(rtrim(p.nombre))+' '+UPPER(rtrim(p.apellido_pat))+' '+
        UPPER(rtrim(p.apellido_mat))) as nombrecompleto,mf.cal_materia,mf.estado_cal
        from saiiut.saiiut.calificaciones_alumno as c1
        INNER JOIN saiiut.saiiut.grupo_materia c2 ON c2.cve_grupo = c1.cve_grupo and c2.cve_materia=c1.cve_materia
        INNER JOIN saiiut.saiiut.alumnos a ON a.cve_alumno = c1.cve_alumno
        INNER JOIN saiiut.saiiut.personas p ON p.cve_persona = c2.cve_maestro
        INNER JOIN saiiut.saiiut.grupos g ON a.cve_grupo = g.cve_grupo
        LEFT JOIN saiiut.saiiut.materias m ON m.cve_materia = c1.cve_materia
        LEFT JOIN sice.dbo.es_materia_final mf ON mf.matricula = a.matricula and mf.cve_periodo = c1.cve_periodo and mf.cve_materia = c1.cve_materia
        where c1.cve_periodo = a.cve_periodo_actual and c1.valida = 1 and a.matricula = '$matricula'";

        $result_query = executeQuery($query_subjects);
        

        while($data = odbc_fetch_array($result_query)){

            $array_subject["subjects"][] = array_map("utf8_encode", $data);  
    
            $json_subject = json_encode($array_subject);
        }

        echo $json_subject;
    }


    function defaultedSubjects(){

                
        $matricula_student = '1716110095'; //'1717110193';//'1718110095';//'1717110095';//$_POST['matricula'];

        //Consulta para el total de materias
        $default_subjects = "SELECT a.grado_actual, (CASE WHEN g.id_grupo = 'A' THEN 1 WHEN g.id_grupo = 'B' THEN 2 
        WHEN g.id_grupo = 'C' THEN 3 WHEN g.id_grupo = 'D' THEN 4 WHEN g.id_grupo = 'E' THEN 5 WHEN g.id_grupo = 'F' THEN 6 END ) AS grupo, 
        c1.cve_grupo,c1.cve_periodo,c1.cve_materia,UPPER(m.nombre) as materia,c2.cve_maestro,(UPPER(rtrim(p.nombre))+' '+UPPER(rtrim(p.apellido_pat))+' '+
        UPPER(rtrim(p.apellido_mat))) as nombrecompleto,mf.cal_materia,mf.estado_cal
        from saiiut.saiiut.calificaciones_alumno as c1
        INNER JOIN saiiut.saiiut.grupo_materia c2 ON c2.cve_grupo = c1.cve_grupo and c2.cve_materia=c1.cve_materia
        INNER JOIN saiiut.saiiut.alumnos a ON a.cve_alumno = c1.cve_alumno
        INNER JOIN saiiut.saiiut.personas p ON p.cve_persona = c2.cve_maestro
        INNER JOIN saiiut.saiiut.grupos g ON a.cve_grupo = g.cve_grupo
        LEFT JOIN saiiut.saiiut.materias m ON m.cve_materia = c1.cve_materia
        LEFT JOIN sice.dbo.es_materia_final mf ON mf.matricula = a.matricula and mf.cve_periodo = c1.cve_periodo and mf.cve_materia = c1.cve_materia
        where c1.cve_periodo = a.cve_periodo_actual and c1.valida = 1 and a.matricula = '$matricula_student'";

        $result_query = executeQuery($default_subjects);

        //Se cuenta las materias
        $total_subjects = odbc_num_rows($result_query);

        //Total de materias entre el 50%
        $percent50 = $total_subjects / 2;
        //El resultado del total de materias entre el 50% + 1
        $mas1materia = $percent50 + 1;

        //Total de materias menos el resultado anterior de las materias
        //Materias permitidas a reprobar
        //intval toma solo el entero de una cantidad decimal
        $allowed_subjects = $total_subjects - intval($mas1materia);

        //echo $allowed_subjects;//intval($mas1materia);

        //Consulta de las materias reprobadas
        $query_default = "SELECT a.grado_actual, (CASE WHEN g.id_grupo = 'A' THEN 1 WHEN g.id_grupo = 'B' THEN 2 
        WHEN g.id_grupo = 'C' THEN 3 WHEN g.id_grupo = 'D' THEN 4 WHEN g.id_grupo = 'E' THEN 5 WHEN g.id_grupo = 'F' THEN 6 END ) AS grupo, 
        c1.cve_grupo,c1.cve_periodo,c1.cve_materia,UPPER(m.nombre) as materia,c2.cve_maestro,(UPPER(rtrim(p.nombre))+' '+UPPER(rtrim(p.apellido_pat))+' '+
        UPPER(rtrim(p.apellido_mat))) as nombrecompleto,mf.cal_materia,mf.estado_cal
        from saiiut.saiiut.calificaciones_alumno as c1
        INNER JOIN saiiut.saiiut.grupo_materia c2 ON c2.cve_grupo = c1.cve_grupo and c2.cve_materia=c1.cve_materia
        INNER JOIN saiiut.saiiut.alumnos a ON a.cve_alumno = c1.cve_alumno
        INNER JOIN saiiut.saiiut.personas p ON p.cve_persona = c2.cve_maestro
        INNER JOIN saiiut.saiiut.grupos g ON a.cve_grupo = g.cve_grupo
        LEFT JOIN saiiut.saiiut.materias m ON m.cve_materia = c1.cve_materia
        LEFT JOIN sice.dbo.es_materia_final mf ON mf.matricula = a.matricula and mf.cve_periodo = c1.cve_periodo and mf.cve_materia =c1.cve_materia
        where c1.cve_periodo = a.cve_periodo_actual and c1.valida = 1 and a.matricula = '$matricula_student' and cal_final < (select valor from saiiut.saiiut.parametros p WHERE p.cve_periodo = c1.cve_periodo and p.cve_parametro = 11)";

        $result_query_default = executeQuery($query_default);

        //Materias que tiene reprobadas
        $result_count = odbc_num_rows($result_query_default);

        if($result_count <= $allowed_subjects){
            
            $permit['permit'] = "puede pagar";
            print json_encode($permit);
        }

        else{
            /*$permit['permit'] = "no puede pagar";
            print json_encode($permit);*/

            while($rows = odbc_fetch_array($result_query_default)){
                
                $subject = utf8_encode($rows['materia']);

                //print_r(utf8_encode($rows['nombrecompleto']). "<br>");
              

                $array = array("subjects_default" => array(
                    "subject" => $subject
                ));

                print json_encode($array);
            }

           
            
        }
        //echo $result_count;

        
    }


    function gradeAndStudents(){

        $matriculas = $_POST['matri'];

        $grade_query = "SELECT a.matricula, p.nombre, p.apellido_pat, p.apellido_mat, c.nombre AS carrera, a.grado_actual, (CASE WHEN g.id_grupo = 'A' THEN 1 WHEN g.id_grupo = 'B' THEN 2 
        WHEN g.id_grupo = 'C' THEN 3 WHEN g.id_grupo = 'D' THEN 4 WHEN g.id_grupo = 'E' THEN 5 WHEN g.id_grupo = 'F' THEN 6 END ) AS grupo
        FROM saiiut.saiiut.alumnos a
        INNER JOIN saiiut.saiiut.personas p ON p.cve_persona = a.cve_alumno
        INNER JOIN saiiut.saiiut.carreras_cgut c ON c.cve_carrera = a.cve_carrera
        INNER JOIN saiiut.saiiut.grupos g ON a.cve_grupo = g.cve_grupo
        WHERE a.cve_periodo_actual = (SELECT TOP 1 cve_periodo FROM saiiut.saiiut.periodos WHERE activo = 1)AND a.cve_unidad_academica = 1 AND a.cve_status = 1 AND a.matricula = '$matriculas'";
      
        $result_grade = executeQuery($grade_query);

        
        while($datas = odbc_fetch_array($result_grade)){

            $array_grades["grades"][] = array_map("utf8_encode", $datas);  
    
            $json_grades = json_encode($array_grades);
        }
        echo $json_grades;
    }

?>