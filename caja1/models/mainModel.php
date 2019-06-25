<?php

    require_once "../core/configApp.php";
    


    function encryption($string){
        
        $output=FALSE;
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output=base64_encode($output);
        return $output;
    }

     function executeQuery($query){
         
        global $connection;
        $execute = odbc_exec($connection,$query);
        return $execute;
    }

?>