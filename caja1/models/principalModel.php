<?php

    require_once "mainModel.php";
    
    pendientes();


    function pendientes(){

        $clave_persona = $_POST['cve_persona'];
        $opciones = $_POST['opciones'];
        $periodo_activo = periodoActivo();

        if($opciones == "faltan"){

            $count_pagos_pendientes = executeQuery(" SELECT COUNT(cve_concepto_pago) AS faltantes FROM solicitud_documento
            WHERE pago_realizado = 0 AND cve_persona = '$clave_persona' AND cve_periodo = '$periodo_activo'");

            if($count_pagos_pendientes){

                
                $count_pendientes = odbc_result($count_pagos_pendientes,"faltantes");

                $count_array_pendiente = array("pagos" => array(

                    "pendiente" => $count_pendientes,
                ));

                print json_encode($count_array_pendiente);

            }
        }

        elseif($opciones == "pendientes"){

            $periodo_active = periodoActivo();

            $pagos_pendientes = executeQuery("SELECT fecha_solicitud,descripcion,monto FROM saiiut.saiiut.conceptos_pago
            INNER JOIN solicitud_documento ON saiiut.saiiut.conceptos_pago.cve_concepto = solicitud_documento.cve_concepto_pago
            WHERE solicitud_documento.cve_persona = '$clave_persona' AND solicitud_documento.pago_realizado = 0
            AND solicitud_documento.cve_periodo = '$periodo_active'");

              if($pagos_pendientes){

                    while($row = odbc_fetch_array($pagos_pendientes)){

                    $array_pago['pendientes'][] = array_map("utf8_encode", $row);
                    
                    $json_pendientes = json_encode($array_pago);
                }

                echo $json_pendientes;
            }
        }
        elseif($opciones == "totales"){

            $periodo_actual = periodoActivo();

            $solicitud_total = executeQuery("SELECT fecha_solicitud,descripcion,administracion.dbo.solicitud_documento.costo_unitario,cantidad,monto,pago_realizado
            FROM saiiut.saiiut.conceptos_pago
            INNER JOIN solicitud_documento ON saiiut.saiiut.conceptos_pago.cve_concepto = solicitud_documento.cve_concepto_pago
            WHERE solicitud_documento.cve_persona = '$clave_persona' AND solicitud_documento.cve_periodo = '$periodo_actual'");

            if($solicitud_total){

                while($row = odbc_fetch_array($solicitud_total)){

                    $array_tatal['totales'][] = array_map("utf8_encode", $row);
                    
                    $json_total = json_encode($array_tatal);
                }

                echo $json_total;

            }
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

?>