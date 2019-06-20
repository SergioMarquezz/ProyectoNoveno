<?php

   // if($peticion){

        require_once "../models/loginModel.php";
   // }else{
     //   require_once "./models/loginModel.php";
        
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

            if($user_login == 1){

                $name = odbc_result($cuenta_login,"nombre");
                $tipo_user = odbc_result($cuenta_login,"tipo_cuenta");
                $privilegio_user = odbc_result($cuenta_login,"privilegio");
                $cuenta_codigo = odbc_result($cuenta_login,"cuenta_codigo");

                session_start(['name' => 'ADMIN']);

                $_SESSION['name_admin'] = $name;
                $_SESSION['tipo_admin'] = $tipo_user;
                $_SESSION['privilegio_admin'] = $privilegio_user;
                $_SESSION['cuenta_codigo_admin'] = $cuenta_codigo;

                if($tipo_user == 'Administrador'){

                    $url = "principal";
                }else{
                    $url = "misdatos";
                }

                return $location = '<script>
                                        window.location.href="'.$url.'"
                                    </script>';

            }else{
               echo "error";
                $message = [
                    "Alert"=>"simple",
                    "Title"=>"Error al iniciar sesión",
                    "Text"=>"El nombre de usuario y contraseña no son correctos o tu cuenta esta desabilitada.",
                    "Type"=>"error"
                ];
                
                echo MainModel::alerts($message);
            }

            
        }
    }
