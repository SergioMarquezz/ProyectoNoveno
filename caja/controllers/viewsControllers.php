<?php

    require_once "./models/viewsModels.php";

    class ViewController extends ViewModel{

            public function obtenerPlantillaController(){

               return require_once "views/plantilla.php";
            }

            public function obtenerViewsControllers(){

                if(isset($_GET['views'])){

                    $ruta = explode("/", $_GET['views']);
                    $response = ViewModel::obtenerViewsModels($ruta[0]); 

                }else{

                    $response = "login";
                }

                return $response;
            }
    }

?>