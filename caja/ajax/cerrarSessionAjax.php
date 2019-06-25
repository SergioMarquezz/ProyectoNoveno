<?php

    if(isset($_GET['codigo'])){

        session_start();
        session_unset();
        session_destroy();

        echo "cerrar";
    }else{
        echo "abierto";
    }

?>