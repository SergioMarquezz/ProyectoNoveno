<?php

$listar = null;

$directorio = opendir("../pagos/");

while($elemento = readdir($directorio)){

    if(!is_dir("../pagos/".$elemento)){

        $listar.= "&nbsp;&nbsp;&nbsp;&nbsp;<a class='text-dark' href='../pagos/$elemento' target='_blank'>$elemento</a>";
    }

}


?>


