<?php

    require_once "../models/administradorModel.php";

    class AdministradorController extends AdministradorModelo{

        
        public function agregarAdministradorControlador(){   
            
            //Declaracion de variables limpiando las cadenas
            $privilegio = MainModel::clearString($_POST['niveles']);
            $name_admin = MainModel::clearString($_POST['name-admin']);
            $paterno_admin =  MainModel::clearString($_POST['paterno-admin']);
            $materno_admin =  MainModel::clearString($_POST['materno-admin']);
            $calle =  MainModel::clearString($_POST['calle']);
            $colonia =  MainModel::clearString($_POST['colonia']);
            $number =  MainModel::clearString($_POST['numero']);
            $celular =  MainModel::clearString($_POST['celular']);
            $genero =  MainModel::clearString($_POST['genero']);
            $name_user =  MainModel::clearString($_POST['name-user']);
            $password =  MainModel::clearString($_POST['password']);
            $pass_confirm =  MainModel::clearString($_POST['confirm-password']);
            $email =  MainModel::clearString($_POST['email']);
          
            //Validaciones para el registro
            if($password != $pass_confirm){

                $message = [
                    "Alert"=>"simple",
                    "Title"=>"Error de contraseñas",
                    "Text"=>"Las contraseñas deben coincidir, por favor escribelas nuevamente",
                    "Type"=>"error"
                ];
            }else{

                //Si viene definada la variable email
               if($email != ""){

                $query_email = MainModel::executeQuery("SELECT email FROM caja.sitemas.administradores WHERE email = '$email'");
                $email_count = odbc_num_rows($query_email);


               }else{
                    //Si no viene definido
                    $email_count = 0;
               }

               if($email_count >= 1){

                $message = [
                    "Alert"=>"simple",
                    "Title"=>"Error de correo",
                    "Text"=>"El correo que ingreso ya esta registrado en el sistema.",
                    "Type"=>"error"
                ];
               }else{
                    $query_user = MainModel::executeQuery("SELECT nombre_user FROM caja.sitemas.administradores WHERE nombre_user = '$name_user'");
                    $user_count = odbc_num_rows($query_user); 
                  
                    if($user_count >= 1){

                        $message = [
                            "Alert"=>"simple",
                            "Title"=>"Error en el nombre de usuario",
                            "Text"=>"El usuario que ingreso ya esta registrado en el sistema.",
                            "Type"=>"error"
                        ];
                    }else{

                        $query_registros = MainModel::executeQuery("SELECT cve_administrador FROM caja.sitemas.administradores");
                        $registros_count = (odbc_num_rows($query_registros)) + 1;
                        
                        //Se genera el codigo para cada cuenta
                        $codigo_cuenta = MainModel::randomNumber("CA",7,$registros_count);

                        $clave_pass = MainModel::encryption($password);

                        $data_admin_cuenta = [
                            "cuenta_codigo" => $codigo_cuenta,
                            "privilegio" => $privilegio,
                            "nombre" => $name_admin,
                            "ape_paterno"=> $paterno_admin,
                            "ape_materno" => $materno_admin,
                            "calle" => $calle,
                            "colonia" => $colonia,
                            "numero_dir" => $number,
                            "tel_celular" => $celular,
                            "genero" => $genero,
                            "nombre_user" => $name_user,
                            "contrasenia" => $clave_pass,
                            "email" => $email,
                            "activo" => 1,
                            "tipo_cuenta" => "Administrador"
                        ];
            
            
                        $guard_admin = AdministradorModelo::agregarAdministradorModelo($data_admin_cuenta);
                        $row_count = odbc_num_rows($guard_admin); 

                        if($row_count >= 1){

                            $message = [
                                "Alert"=>"clear",
                                "Title"=>"Registro Satisfactorio",
                                "Text"=>"El administrador se registro con exito en el sistema",
                                "Type"=>"success"
                            ];
                        }else{

                            $message = [
                                "Alert"=>"simple",
                                "Title"=>"Ocurrio un error inesperado",
                                "Text"=>"No se ah podido registrar al administrador.",
                                "Type"=>"error"
                            ];
                        }
                      
                    }
               }
            
            }

            return MainModel::alerts($message);
        }
    }


?>