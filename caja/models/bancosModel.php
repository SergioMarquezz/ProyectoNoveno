<?php

    require_once "mainModel.php";

    selectBancos();

    function selectBancos(){

        $sql = executeQuery("SELECT * FROM saiiut.saiiut.bancos");

        while($row = odbc_fetch_array($sql)){


            //print_r(utf8_encode( $row["nombre_banco"]));
            $array_alumnos["bancos"][] = array_map("utf8_encode", $row);  

            $json_alumnos = json_encode($array_alumnos);
        
       }
       echo $json_alumnos;
    }



   
?>