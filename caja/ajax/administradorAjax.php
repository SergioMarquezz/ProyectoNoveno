<?php
    $peticion = true;
    require_once "../controllers/administradorControlador.php";

    $ins_admin = new AdministradorController();

    echo $ins_admin->agregarAdministradorControlador();

?>