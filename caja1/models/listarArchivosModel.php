<?php

$listar = null;

$directorio = opendir("../pagos/");

while($elemento = readdir($directorio)){

    if(!is_dir("../pagos/".$elemento)){

        $url = "../pagos/$elemento";
  
        $listar.= "&nbsp;&nbsp;&nbsp;&nbsp;<a class='text-dark' href=' $url' target='_blank'>$elemento</a>";
    }

}


?>


