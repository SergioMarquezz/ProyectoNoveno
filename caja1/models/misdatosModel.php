<?php

    session_start();

    //Datos administrador
    if(isset($_SESSION['cuenta_codigo_admin'])){

        $array_admin = array("arreglo_datos" => array(
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
       

     //Datos alumnos   
    }else if(isset($_SESSION['clave_persona'])){

        $array_alumno = array("arreglo_datos" => array(
            "cve_persona" => $_SESSION['clave_persona'],
            "tipo_persona" => $_SESSION['tipo_persona'],
            "periodo" => $_SESSION['periodo'],
            "name" => $_SESSION['name_admin'],
            "apellido_pa" => $_SESSION['ape_paterno'],
            "apellido_ma" => $_SESSION['ape_materno'],
            "matricula" => $_SESSION['matricula'],
           // "calle" => $_SESSION['calle'],
            //"number" => $_SESSION['numero'],
            "carrer" =>   $_SESSION['carrera']
           
        ));

        print json_encode($array_alumno);
    }

    //Datos aspirante
    else if(isset($_SESSION['type_people'])){

        $array_aspirante = array("arreglo_datos" =>array(

            "consecutive" =>  $_SESSION['key'],
            "name_cadidate" => $_SESSION['name_admin'] ,
            "father" => $_SESSION['father'],
            "mother" =>  $_SESSION['mother'],
            "career" =>  $_SESSION['career'],
            "key_type" =>  $_SESSION['type_people']
        ));

        print json_encode($array_aspirante);
    }


?>