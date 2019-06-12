<?php

    if($peticion){

        require_once "../core/mainModel.php";
    }else{
        require_once "./core/mainModel.php";
        
    }

    class AdministradorModelo extends MainModel{

        protected function agregarAdministradorModelo($data){

            //Campos de la base de datos
            $name = $data['nombre'];
            $paterno = $data['paterno'];
            $materno = $data['materno'];

            $sql_connection = MainModel::connection();
            $declaration = "EXEC insertar '$name','$paterno','$materno'";
            $response = odbc_exec($sql_connection, $declaration) or die (odbc_errormsg());

            return $response;
          
           
        }

    }

?>