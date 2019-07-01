<?php

    require_once "mainModel.php";

    $clave = $_POST['clave-concepto'];
    $opcion = $_POST['opcion'];
    
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
        else if($opcion == 'guardar'){

            $activo = $_POST['activar'];
            $precio = $_POST['monto'];
            $descrip = $_POST['texto'];
    
            $sql_activo = executeQuery("EXEC caja.sitemas.updateConceptos '$clave', '$descrip', '$precio', $activo");
        
            if($sql_activo){
        
                $response['respuesta'] = "actualizado";

                print json_encode($response);
            }
        }

    }


?>