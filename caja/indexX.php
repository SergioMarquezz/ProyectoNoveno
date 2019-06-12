<?php

    //Se importa el archivo de configuracion general donde esta la variable del servidor y nombre del sistema
    require_once "core/configGeneral.php";
    //Se importa el archivo del controlador para obtener la vista de la plantilla general
    require_once "controllers/viewsControllers.php";

    //Se crea una instancia de la clase del controlador para poder llamar al metodo que obtiene la plantilla general
    $pantilla = new ViewController();
    $pantilla->obtenerPlantillaController(); //Se llama al metodo para poder ver la plantilla


?>