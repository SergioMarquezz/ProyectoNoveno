<?php

    class ViewModel{

        protected function obtenerViewsModels($views){

            $lista_blanca = ["recibopago","principal", "conceptospago", "registroaspirantes", "colegiatura", "admin", "alumnos", "titulos", "listadmin", "adminsearch"] ;

            if(in_array($views, $lista_blanca)){

                if(is_file("views/contenidos/" .$views."-views.php")){
                    
                    $contenido = "views/contenidos/" .$views."-views.php";

                }else{
                    $contenido = "login";
                }

            }elseif($views == "login"){

                $contenido = "login";
                
            }elseif($views == "index"){

                $contenido = "login";
            }else{

                $contenido = "404";
            }

            return $contenido;
        }
    }

?>