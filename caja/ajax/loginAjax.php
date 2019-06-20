<?php
  
    $peticion = true;
    require_once "../controllers/loginControlador.php";

    $login = new LoginControlador();

    echo $login->startSesionAdminController();


?>