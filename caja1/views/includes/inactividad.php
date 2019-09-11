<?php
/*
    session_start();

    //Dos minutos
    $inactivo = 120;

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

*/
?>