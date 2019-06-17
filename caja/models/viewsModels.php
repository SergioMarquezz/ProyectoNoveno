<?php

    class ViewModel{

        protected function obtenerViewsModels($views){

            //Rutas para acceder al sistema
            $lista_blanca = ["recibopago","principal", "conceptospago", "registroaspirantes", "colegiatura", "admin", "alumnos", 
                             "titulos", "listadmin", "adminsearch","misdatos"] ;

            //Se verifica que la ruta que se le pase a la url se encuentre en el array                  
            if(in_array($views, $lista_blanca)){

                //Se verifica que la ruta que es pasada a la url sea un archivo de php
                if(is_file("views/contenidos/" .$views."-views.php")){
                    
                    $contenido = "views/contenidos/" .$views."-views.php"; //Se guarda el contenido de las vistas en una variable

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

            return $contenido; //Retorna el contenido segun la ruta que se le pase
        }
    }

?>