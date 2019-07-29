<?php
use Mpdf\Utils\Arrays;

function fileCsv($path){

        $files_csv = "../../pagos/";


        $csv_files = $files_csv.$path;
    
        $linea = 0;
    
        $csv_file = fopen($csv_files, 'r');
    
    
        while (($datos = fgetcsv($csv_file, ",")) == true){
    
            $num = count($datos);
            $linea++;
    
            for ($columna = 0; $columna < $num; $columna++){
    
                $palabra = substr($datos[$columna+1], 0, 3);
    
                if ($palabra == 'CE0' || $palabra == 'CE1'){
    
                    $fecha= $datos[$columna];
                    $referencia = $datos[$columna+1];
                    $pago =  substr($datos[$columna+1],12,2);
                    $matri_clave =  substr($datos[$columna+1],2,10);
                    $cargo =  $datos[$columna+2];
                    $abono = $datos[$columna+3];
                    $saldo = $datos[$columna+4];
                    $referencia_completa = substr($datos[$columna+1],2,20);

                    
                      
                }
                $registros['csv'][] = Array('id' => $linea, 'date' => $fecha, 'refe' => $referencia,
                                    'cve_concepto_pago' => $pago, 'clave_matricula' => $matri_clave,
                                    'cargo' => $cargo, 'abono' => $abono, 'saldo' => $saldo,
                                    'referencia' => $referencia_completa
                                    );
    
           
              
                $columna=$columna+5;
            }
            $json_unico = json_encode($registros);
            
        }
    
        fclose($csv_file); 
        print_r($json_unico);
    
    
    }

    function uploadFiles(){

        $return = Array('upload'=>TRUE);
        $upload_folder ='../../pagos/';
        $name_file = $_FILES['archivo']['name'];
        $type_file = $_FILES['archivo']['type'];
        $size_file = $_FILES['archivo']['size'];
        $tmp_file = $_FILES['archivo']['tmp_name'];
        $path = $upload_folder.$name_file;

        if (!move_uploaded_file($tmp_file, $path)) {
            $return = Array('upload' => FALSE, 'msg' => "Ocurrio un error al subir el archivo. ".$name_file." No pudo guardarse.", 
                            'status' => 'error');
        }

        echo json_encode($return);

    }



?>