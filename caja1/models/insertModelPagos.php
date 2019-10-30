<?php

    require_once "mainModel.php";
    require_once "../views/includes/fecha.php";

   

    insertFile();

    function insertFile(){

        global $fecha;//, $cve_persona, $type_people;

        $tmp_file = $_FILES['save-file']['tmp_name'];
        $name_file = $_FILES['save-file']['name'];
        $type_file = $_FILES['save-file']['type'];
        $size_file = $_FILES['save-file']['size'];

        $csv_files = $tmp_file;
        $line = 0;
        $csv_file = fopen($csv_files, 'r');
        
    
        //Para archivos csv =  fgetcsv($csv_file, ",")
        while ((($data = fgetcsv($csv_file, 1000, "\t")) !== FALSE)){
    
            $num = count($data);
            $line++;
    
            for ($column=0; $column < $num; $column++){
    
                $word = substr($data[$column+1], 0, 3);
    
                if ($word == 'CE0' || $word == 'CE1'){
    
                    $date = $data[$column];
                    $referencia = $data[$column+1];
                    $pago = substr($data[$column+1],12,2);
                    $matri_clave = substr($data[$column+1],2,10);
                    $cargo = $data[$column+2];
                    $abono = $data[$column+3];
                    $saldo = $data[$column+4];
                    $referencia_completa = substr($data[$column+1],2,20);
                    $consecutivo_aspirante = substr($data[$column+1],8,4);

                    
                    $periodo_activo = periodoActivo();
                    $realizado = 1;
                    $guardado = $fecha;
                    $paid_pago = "BANCO";

                    $str_saldo = str_replace(",", "", $saldo);
                    $str_abono = str_replace(",","",$abono);

                //Consulta para sacar cve_alumno y cve_tipo_persona
                  $sql_keys = "SELECT a.cve_alumno, p.cve_tipo_persona
                  FROM saiiut.saiiut.alumnos a, saiiut.saiiut.personas p
                  WHERE a.cve_alumno = p.cve_persona AND a.matricula = '$matri_clave'";
                  
          
                  $result_key = executeQuery($sql_keys);
                  $key_type_people = odbc_result($result_key,'cve_tipo_persona');
                  $key_people = odbc_result($result_key,'cve_alumno');

                    if($key_people != ""){

                        $sql_insert = verificarReferencia($referencia_completa,$guardado,$key_type_people,$key_people,$str_abono,$periodo_activo,
                        $pago,$realizado,$date,$referencia,$paid_pago);
                    }else{
                        $sql_consecutivo = "SELECT cve_aspirante 
                        FROM saiiut.saiiut.registro_inicial
                        WHERE consecutivo_aspirante = '$consecutivo_aspirante'";

                        $result_consecutivo = executeQuery($sql_consecutivo);
                        $key_type_people = 1;
                        $key_people = odbc_result($result_consecutivo,'cve_aspirante');

                        $sql_insert = verificarReferencia($referencia_completa,$guardado,$key_type_people,$key_people,$str_abono,$periodo_activo,
                        $pago,$realizado,$date,$referencia,$paid_pago);
                    }

               
                   
                }
              
                $column=$column+5;
            }
           
            
        }

        if($sql_insert){

            echo "Guardado";
        }
    
        fclose($csv_file); 
        
    }


    function verificarReferencia($re,$guardados,$key_types_people,$key_peoples,$str_abonos,$periodo_activos,$pagos,$realizados,$dates,$referencias,$paid_pagos){

        $sql_reference = "SELECT referencia FROM solicitud_documento
        WHERE referencia = '$re'";
        $result_reference = executeQuery($sql_reference);
        
        

        $row = odbc_fetch_array($result_reference);

        if($row["referencia"] == ""){
            
           /* executeQuery("INSERT solicitud_documento
            VALUES('$guardados','$key_types_people','$key_peoples','$str_abonos','$periodo_activos','$pagos','$realizados','$re',1,'$str_abonos')");*/

            executeQuery("INSERT INTO saiiut.saiiut.pagos(cve_persona,cve_tipo_persona,cve_periodo,cve_concepto_pago,fecha,
            referencia,referencia_completa,costo_unitario,abono,pago_realizado,fecha_guardado,lugar_pago,activo)
            VALUES('$key_peoples','$key_types_people','$periodo_activos','$pagos',
            '$dates','$referencias','$re','$str_abonos','$str_abonos','$realizados','$guardados','$paid_pagos',1)");

                return true;
            }

            else{
                executeQuery("UPDATE solicitud_documento SET pago_realizado = 1
                WHERE referencia = '$re'");

                executeQuery("UPDATE saiiut.saiiut.pagos SET cve_tipo_persona = '$key_types_people', cve_persona = '$key_peoples'
                WHERE referencia_completa = '$re'");
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