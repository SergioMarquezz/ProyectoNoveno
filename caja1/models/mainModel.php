<?php

    require_once "../core/configApp.php";
    

     function clearString($string){
            
        $string = trim($string);
        $string = stripslashes($string);
        $string = str_ireplace("<script>", "", $string);
        $string = str_ireplace("</script>", "", $string);
        $string = str_ireplace("<script src", "", $string);
        $string = str_ireplace("<script type=", "", $string);
        $string = str_ireplace("SELECT * FROM", "", $string);
        $string = str_ireplace("DELETE  FROM", "", $string);
        $string = str_ireplace("INSERT INTO", "", $string);
        $string = str_ireplace("--", "", $string);
        $string = str_ireplace("==", "", $string);
        $string = str_ireplace("{", "", $string);
        $string = str_ireplace("}", "", $string);
        $string = str_ireplace("[", "", $string);
        $string = str_ireplace("]", "", $string);

        return $string;
    }

    function randomNumber($letter, $lenght,$number){

        for($i=1; $i<=$lenght; $i++){
            $number = rand(0,9);
            $letter.= $number;
        }

        return $letter."-".$number;
    }


    function encryption($string){
        
        $output=FALSE;
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output=base64_encode($output);
        return $output;
    }

    function decryption($string){

        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $output;
    }

     function executeQuery($query){
         
        global $connection;
        $execute = odbc_exec($connection,$query) or die (odbc_errormsg());
        return $execute;
    }

  

?>