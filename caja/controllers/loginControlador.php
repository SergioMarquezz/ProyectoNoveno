<?php
   // if($peticion){

        require_once "../models/loginModel.php";
   // }else{
       // require_once "./models/loginModel.php";
        
   // }

    class LoginControlador extends LoginModelo{
        
        public function startSesionAdminController(){

          

            $usr = MainModel::clearString($_POST['usuario-login']);
            $pass = MainModel::clearString($_POST['usuario-pass']);

            $pass = MainModel::encryption($pass);

            $data_login = [

                "nombre-user" => $usr,
                "password" => $pass
            ];

            $cuenta_login = LoginModelo::startSesionAdminModel($data_login);
            $user_login = odbc_num_rows($cuenta_login); 

            return $user_login;

            
        }
    }
