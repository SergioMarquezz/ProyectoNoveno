<?php

    require_once "mainModel.php";
    require_once "../views/includes/referencia.php";

   $cve_concepto = clearString($_POST['clave']);
   $opcion = clearString($_POST['option']);

    solicitud();

    function solicitud(){

        global $cve_concepto, $opcion;

        if($opcion == 'conceptos'){

            $sql_concepto = executeQuery("SELECT cve_concepto,descripcion,costo_unitario,activo FROM saiiut.saiiut.conceptos_pago ORDER BY descripcion");

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

                    $array_concep["concept"][] = array_map("utf8_encode", $row);  
    
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
            $periodo = clearString($_POST['cve_periodo']);
            $concepto = clearString($_POST['cve_concepto']);
            $matricula = clearString($_POST['matricula']);
            $pago = 0;


            if($concepto == ""){

                $result['result'] = "sin clave";
                print json_encode($result);
            }
            else{

                $referencia = referencia($matricula,$concepto,$monto);

                $sql_save_solicitud = executeQuery("EXEC caja.sitemas.insertarSolicitud '$date','$tipo_persona','$cve_persona','$monto','$periodo','$concepto','$pago','$referencia'");
 
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

?>