<?php

    session_start();

    //Una hora
    $inactivo = 3600;

    if(isset($_SESSION['tiempo']) ) {
        
    $vida_session = time() - $_SESSION['tiempo'];

        if($vida_session > $inactivo)
        {
        
            session_unset();
            session_destroy();
            header("Location: ../index.php"); 
        }
    }

    $_SESSION['tiempo'] = time();


?>