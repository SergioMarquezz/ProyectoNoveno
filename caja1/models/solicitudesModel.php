<?php

    require_once "mainModel.php";
    require_once "../views/includes/referencia.php";

  $cve_concepto = clearString($_POST['clave']);
  $opcion = clearString($_POST['option']);

   solicitud();
 

    function solicitud(){

        global $cve_concepto, $opcion, $unique_referencia;

        if($opcion == 'conceptos'){

            $sql_concepto = executeQuery("SELECT cve_concepto,descripcion,costo_unitario,activo FROM saiiut.saiiut.conceptos_pago WHERE activo = 1 ORDER BY descripcion");

            while($row = odbc_fetch_array($sql_concepto)){
        
        
                $array_concepto["concepto"][] = array_map("utf8_encode", $row);  
    
                $json_concepto = json_encode($array_concepto);
            
           }
           echo $json_concepto;

        }else if($opcion == 'select'){

            $query_concepto = executeQuery("SELECT cve_concepto,descripcion,costo_unitario,activo FROM saiiut.saiiut.conceptos_pago WHERE cve_concepto = '$cve_concepto'");
            $count_concepto = odbc_num_rows($query_concepto);

            if($count_concepto == 1){

                while($row = odbc_fetch_array($query_concepto)){

                    $array_concep["concept"] = array_map("utf8_encode", $row);  
    
                    $json_concept = json_encode($array_concep);

                }

                echo $json_concept;

            }

        }
        else if($opcion == "save"){

            $date = clearString($_POST['fecha-solicitud']);
            $tipo_persona = clearString($_POST['cve_tipo_persona']);
            $cve_persona = clearString($_POST['cve_persona']);
            $monto = clearString($_POST['precio']);
            $costo_unitario = clearString($_POST['costo']);
            $periodo = periodoActivo();
            $concepto = clearString($_POST['cve_concepto']);
            $matricula = clearString($_POST['matricula']);
            $total = clearString($_POST['total']);
            $cantidad = clearString($_POST['quantity']);
            $pago = 0;


            if($concepto == ""){

                $result['result'] = "sin clave";
                print json_encode($result);
            }

            else if($total == ""){
                $result['result'] = "total vacio";
                print json_encode($result);
            }
            else{

                $monto_total = str_replace(' . ', '', $monto);
                
                $referencia = referencia($matricula,$concepto,$monto_total);

                  $referencia_unique = uniqueReferencia($cve_persona,$concepto, $date);

                    if($referencia_unique == 1){

                            $persona_cve = odbc_result($unique_referencia,"cve_persona");
                            $concepto_cve = odbc_result($unique_referencia,"cve_concepto_pago");
                            $date_today = odbc_result($unique_referencia,"fecha_solicitud");
                            $a_reference = odbc_result($unique_referencia,"referencia"); 

                            if($persona_cve == $cve_persona && $concepto == $concepto_cve){

                                $result['result'] = "referencia existe";
                                print json_encode($result);
                            }
                          
                    }else{

                       
                       $sql_save_solicitud = executeQuery("INSERT INTO solicitud_documento(fecha_solicitud,cve_tipo_persona,cve_persona,monto,cve_periodo,cve_concepto_pago,pago_realizado,referencia,cantidad,costo_unitario) 
                       VALUES ('$date',$tipo_persona,'$cve_persona','$total','$periodo','$concepto','$pago','$referencia','$cantidad','$costo_unitario')");

                        if($sql_save_solicitud == false){
                
                                            
                            $result['result'] = "error de registro";
                            print json_encode($result);
                        }else{
                            
                            $result['result'] = "solicitud guardada";
                            print json_encode($result);
                        }
                    }

              }
        }

        else if($opcion == "referencia"){

            $clave_persona = clearString($_POST['cve-persona']);

            $query_referencia = executeQuery("SELECT referencia FROM solicitud_documento WHERE cve_persona = '$clave_persona' AND cve_concepto_pago = '$cve_concepto'
                                              AND pago_realizado = 0;	");

            $count_referencias = odbc_num_rows($query_referencia);

            if($count_referencias == 1){


                while($row = odbc_fetch_array($query_referencia)){

                    $array_referencia["referencia"] = array_map("utf8_encode", $row);  
    
                    $json_referencia = json_encode($array_referencia);

                }

                echo $json_referencia;
            }

        }

        else if($opcion == "extra"){

            extraordinaryExam();
        }
    
    }

    function extraordinaryExam(){

        $query_exam = executeQuery("SELECT cve_concepto,descripcion,costo_unitario FROM saiiut.saiiut.conceptos_pago
        WHERE cve_concepto = 6");

        $num_concept = odbc_num_rows($query_exam);

        if($num_concept == 1){

            $description = odbc_result($query_exam,"descripcion");
            $key_concept = odbc_result($query_exam,"cve_concepto");
            $unit_cost = odbc_result($query_exam,"costo_unitario");

            $utf8_concept = utf8_encode($description);
    
            $data_extraordinary = array("extraordinary" => array(

                "concept" => $utf8_concept,
                "key" => $key_concept,
                "cost" => $unit_cost
            ));

            print json_encode($data_extraordinary);
          }
    }

    function periodoActivo(){
        
      $sql =  executeQuery("SELECT cve_periodo FROM saiiut.saiiut.periodos WHERE activo = 1");

      $num = odbc_num_rows($sql);

      if($num == 1){

        $periodo = odbc_result($sql,"cve_periodo");

        return $periodo;
      }
    }


    function uniqueReferencia($persona_clave,$concepto_pago,$fecha){

        global $unique_referencia;
        $unique_referencia = executeQuery("SELECT fecha_solicitud, cve_persona, cve_concepto_pago, referencia
        FROM solicitud_documento
        WHERE cve_persona = '$persona_clave' AND cve_concepto_pago = '$concepto_pago' AND fecha_solicitud = '$fecha'");

        $row_nums = odbc_num_rows($unique_referencia);

        return $row_nums;
    }

?>