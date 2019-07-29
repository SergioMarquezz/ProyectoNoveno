<?php

    session_start();

    if(isset($_SESSION['cuenta_codigo_admin'])){

        $array_admin = Array("arreglo" => Array(
            "nombre" =>  $_SESSION['name_admin'],
            "paterno" =>   $_SESSION['paterno'],
            "materno" =>   $_SESSION['materno'],
            "calle" =>   $_SESSION['calle'],
            "colonia" =>   $_SESSION['colonia'],
            "numero" =>   $_SESSION['number'],
            "email" =>   $_SESSION['email'],
            "tel" => $_SESSION['celular'],
            "privilegio" =>  $_SESSION['privilegio_admin'],
  
        ));
    
        print json_encode($array_admin);
       

    }else if(isset($_SESSION['clave_persona'])){

        $array_alumno = Array("arreglo" => Array(
            "cve_persona" => $_SESSION['clave_persona'],
            "tipo_persona" => $_SESSION['tipo_persona'],
            "periodo" => $_SESSION['periodo'],
            "name" => $_SESSION['name_admin'],
            "apellido_pa" => $_SESSION['ape_paterno'],
            "apellido_ma" => $_SESSION['ape_materno'],
            "matricula" => $_SESSION['matricula'],
            "calle" => $_SESSION['calle'],
            "number" => $_SESSION['numero'],
            "carrer" =>   $_SESSION['carrera']
           
        ));

        print json_encode($array_alumno);
    }

?>