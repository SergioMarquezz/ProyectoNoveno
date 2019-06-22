<?php

      if($peticion){

        require_once "../core/mainModel.php";
    }else{
        require_once "./core/mainModel.php";
        
    }

    class LoginModelo extends MainModel{
        
        protected function startSesionAdminModel($datos){

            $user = $datos['nombre-user'];
            $pass = $datos['password'];

            $connection = MainModel::connection();

            $sql = "SELECT * FROM caja.sitemas.administradores WHERE nombre_user = '$user' 
                    AND contrasenia = '$pass' AND activo = 1";
            $response = odbc_exec($connection, $sql) or die (odbc_errormsg());

            return $response;
        }
    }

?>