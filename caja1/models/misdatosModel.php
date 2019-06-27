<?php

    session_start();

    $array_datos = Array("admin" => Array(
        "nombre" =>  $_SESSION['name_admin'],
        "paterno" =>   $_SESSION['paterno'],
        "materno" =>   $_SESSION['materno'],
        "calle" =>   $_SESSION['calle'],
        "colonia" =>   $_SESSION['colonia'],
        "numero" =>   $_SESSION['number'],
        "email" =>   $_SESSION['email'],
    ));

    print json_encode($array_datos);

?>