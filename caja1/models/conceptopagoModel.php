<?php

    require_once "mainModel.php";

   $clave = clearString($_POST['clave-concepto']);
   $opcion = clearString($_POST['opcion']);
    
   conceptos();


    function conceptos(){


        global $clave, $opcion;

        if($opcion == 'llenar select'){

            $sql = executeQuery("SELECT * FROM saiiut.saiiut.conceptos_pago ORDER BY descripcion");

            while($row = odbc_fetch_array($sql)){
        
                $array_pago["pagoconcepto"][] = array_map("utf8_encode", $row);  
    
                $json_pago = json_encode($array_pago);
            
           }
           echo $json_pago;

        }else if($opcion == 'unico concepto'){

            $query = executeQuery("SELECT * FROM saiiut.saiiut.conceptos_pago WHERE cve_concepto = '$clave'");
            $count = odbc_num_rows($query);

            if($count == 1){

                while($row = odbc_fetch_array($query)){

                    $array_cocept_unico["unicoconcepto"][] = array_map("utf8_encode", $row);  
    
                    $json_unico = json_encode($array_cocept_unico);

                }

                echo $json_unico;

            }

        }
        else if($opcion == 'update'){

            $activo = clearString($_POST['activar']);
            $precio = clearString($_POST['monto']);
            $descrip = clearString($_POST['texto']);

            if($clave == ""){
                $response['respuesta'] = "sin seleccionar";

                print json_encode($response);
            }
            else {

                    
                $description = utf8_decode($descrip);

                $descuento = selectPaymentDescuento($clave);

                if($descuento == 0){

                    $sql_activo = executeQuery("EXEC updateConceptos '$clave', '$description', '$precio', $activo,0");
                }else{

                    $sql_activo = executeQuery("EXEC updateConceptos '$clave', '$description', '$precio', $activo,'$precio'");
                }
            
                if($sql_activo){
            
                    $response['respuesta'] = "actualizado";

                    print json_encode($response);
                }
            }
        }

        else if($opcion == "clave"){

            $sql = executeQuery("SELECT MAX(cve_concepto) + 1 AS clave FROM saiiut.saiiut.conceptos_pago");

            $result = odbc_result($sql,'clave');
    
            $array = Array('sum'=> Array(
    
                "cve_concepto" => $result
            ));
    
            print json_encode($array);

            
        }
        else if($opcion == 'save'){

            $precio = clearString($_POST['monto']);
            $descrip = clearString($_POST['texto']);


            if($precio == ""){

                $response['respuesta'] = "precio vacio";

                print json_encode($response);
            }

            else if($descrip == ""){

                $response['respuesta'] = "sin descripcion";

                print json_encode($response);
            }
            else{

                $description = utf8_decode($descrip);

                $save_concepto = executeQuery("INSERT INTO saiiut.saiiut.conceptos_pago(cve_concepto,cve_universidad,descripcion,costo_unitario,activo)
                values('$clave',17,'$description','$precio',0)");
    
                if($save_concepto){
    
                    $response['respuesta'] = "guardado";
    
                    print json_encode($response);
                }
            }
            
        }
        else if($opcion == "delete"){

            $sql_delete = "DELETE FROM saiiut.saiiut.conceptos_pago WHERE cve_concepto = '$clave'";
            
            $delete = executeQuery($sql_delete);

            if($delete){

                $response['respuesta'] = "borrado";
    
                print json_encode($response);
            }
        }

    }


    function selectPaymentDescuento($key_concepto){

        $query_key = "SELECT descripcion, pago_descuento FROM saiiut.saiiut.conceptos_pago
        WHERE cve_concepto = '$key_concepto';";

        $result_key = executeQuery($query_key);

        $paymet_descuento = odbc_result($result_key,'pago_descuento');

        return $paymet_descuento;
    }


?>