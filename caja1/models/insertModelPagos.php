<?php

    require_once "mainModel.php";
    require_once "../views/includes/fecha.php";

   

    insertFile();

    function insertFile(){

        global $fecha, $cve_persona, $type_people;

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

                    
                    $periodo_activo = periodoActivo();
                    $realizado = 1;
                    $guardado = $fecha;
                    $paid_pago = "BANCO";

                    $str_saldo = str_replace(",", "", $saldo);
                    $str_abono = str_replace(",","",$abono);

                        
                    $sql_insert = executeQuery("INSERT INTO saiiut.saiiut.pagos(cve_persona,cve_tipo_persona,cve_periodo,cve_concepto_pago,fecha,
                                                                                referencia,referencia_completa,costo_unitario,abono,pago_realizado,fecha_guardado,lugar_pago)
                                                VALUES('$cve_persona','$type_people','$periodo_activo','$pago',
                                                '$date','$referencia','$referencia_completa','$str_abono','$str_abono','$realizado','$guardado','$paid_pago')");



                   
                
                  $referencias_exist = array($referencia_completa);

                    verificarReferencia($referencias_exist);

                    
                }
              
                $column=$column+5;
            }
           
            
        }

        if($sql_insert){

            echo "Guardado";
        }
    
        fclose($csv_file); 
        
    }


    function verificarReferencia($array){

        

        $sql = executeQuery("SELECT cve_tipo_persona,cve_persona,referencia FROM solicitud_documento");

        while($row = odbc_fetch_array($sql)){

           $row_update = $row['referencia'];

            if(in_array($row['referencia'],$array)){

                $cve_persona = odbc_result($sql,"cve_persona");
                $type_people = odbc_result($sql,"cve_tipo_persona");
                
                $update = executeQuery("UPDATE solicitud_documento SET pago_realizado = 1 
                WHERE referencia = '$row_update'" );

                $update_pay = executeQuery("UPDATE saiiut.saiiut.pagos SET cve_tipo_persona = '$type_people', cve_persona = '$cve_persona'
                WHERE referencia_completa = '$row_update'");
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