<?php

    require_once "mainModel.php";

    
    $opcion = $_POST['opcion'];
    $cve_banco = $_POST['bankos'];

    selectBancos();

    function selectBancos(){

        global $opcion, $cve_banco;

        if($opcion == "bancos"){

            $sql = executeQuery("SELECT * FROM saiiut.saiiut.bancos");

            while($row = odbc_fetch_array($sql)){
    
    
                //print_r(utf8_encode( $row["nombre_banco"]));
                $array_bancos["bancos"][] = array_map("utf8_encode", $row);  
    
                $json_bancos = json_encode($array_bancos);
            
           }
           echo $json_bancos;
        }
      
        elseif($opcion == "bank"){

            $sql = executeQuery("SELECT * FROM saiiut.saiiut.bancos WHERE cve_banco = '$cve_banco'");

            while($row = odbc_fetch_array($sql)){
    
                $array_bank["bank"][] = array_map("utf8_encode", $row);  
    
                $json_bank = json_encode($array_bank);
            
           }
           echo $json_bank;
        }
        

      
    }




   
?>