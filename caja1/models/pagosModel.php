
<?php
  
function fileCsv(){

        $tmp_file = $_FILES['files-read']['tmp_name'];
        $name_file = $_FILES['files-read']['name'];
        $type_file = $_FILES['files-read']['type'];
        $size_file = $_FILES['files-read']['size'];

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

                    $registros['csv'][] = Array('id' => $line, 'date' => $date, 'refe' => $referencia,
                        'cve_concepto_pago' => $pago, 'clave_matricula' => $matri_clave,
                        'cargo' => $cargo, 'abono' => $abono, 'saldo' => $saldo,
                        'referencia' => $referencia_completa
                    );


                }
        
            
                $column=$column+5;
            }
            
        }
        $array = json_encode($registros);    
        
        fclose($csv_file); 

        echo $array;
    
    }



    function uploadFiles(){

        $date = date("d")."-".date("m")."-".date("Y");


        $return['upload'] = true;
        $upload_folder ='../../pagos/';
        $name_file = $_FILES['archivo']['name'];
        $type_file = $_FILES['archivo']['type'];
        $size_file = $_FILES['archivo']['size'];
        $tmp_file = $_FILES['archivo']['tmp_name'];

        //Quitando el punto a los archivos
        $only_name =  explode(".",$name_file);
        //Extension de los archivos
        $ext_file = end($only_name);

        //Nombre de archivo
        $name_files = $only_name[0]."--".$date.".".$ext_file;
        
        //Ruta a guardar
        $path = $upload_folder.$name_files;

        if (!move_uploaded_file($tmp_file, $path)) {
            $return['upload'] = false;
        }
      

        echo json_encode($return);


    }




?>