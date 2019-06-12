<?php

    require_once "../models/administradorModel.php";

    class AdministradorController extends AdministradorModelo{

        
        public function agregarAdministradorControlador(){   
            
            $name_admin = MainModel::clearString($_POST['name-admin']);
            $paterno_admin =  MainModel::clearString($_POST['paterno-admin']);
            $materno_admin =  MainModel::clearString($_POST['materno-admin']);


            if($paterno_admin != $materno_admin){

                $alert = [
                    "Alert"=>"simple",
                    "Title"=>"Error Inesperado",
                    "Text"=>"Las contraseñas no sirven",
                    "Type"=>"error"
                ];
            }else{

                $dataAD = [
                    "nombre" => $name_admin,
                    "paterno"=> $paterno_admin,
                    "materno" => $materno_admin
                ];
    
    
                $guard_admin = AdministradorModelo::agregarAdministradorModelo($dataAD);

                $alert = [
                    "Alert"=>"clear",
                    "Title"=>"Aceptado",
                    "Text"=>"Se registro",
                    "Type"=>"success"
                ];
            }

            

            return MainModel::alerts($alert);
        }
    }


?>