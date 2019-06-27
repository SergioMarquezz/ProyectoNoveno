<?php

    require_once "mainModel.php";
    
    $privilegio = clearString($_POST['niveles']);
    $name = clearString($_POST['name-admin']);
    $paterno = clearString($_POST['paterno-admin']);
    $materno = clearString($_POST['materno-admin']);
    $calle = clearString($_POST['calle']);
    $col = clearString($_POST['colonia']);
    $number = clearString($_POST['numero']);
    $celular = clearString($_POST['celular']);
    $sexo = clearString($_POST['genero']);
    $user = clearString($_POST['name-user']);
    $pass = clearString($_POST['password']);
    $pass_confirm = clearString($_POST['confirm-password']);
    $email = clearString($_POST['email']);
    $activo = 1;//clearString($_POST['activo']);
    $tipo_cuenta = "Administrador";//clearString($_POST['tipo_cuenta']);
    

    saveAdmin();


    function saveAdmin(){

        global $privilegio, $name ,$paterno, $materno, $calle, $col, $number, $celular, $sexo, $user,
               $pass, $email, $activo, $tipo_cuenta, $pass_confirm;

            if($pass != $pass_confirm){

         
                $result['result'] = "contraseñas incorrectas";
                print json_encode($result);

            }else{

                if($email != ""){

                    $sql_email = executeQuery("SELECT email FROM caja.sitemas.administradores WHERE email = '$email'");
                    $email_count = odbc_num_rows($sql_email);
            
                }else{
                    
                    $email_count = 0;
            
                }

                if($email_count >= 1){
                        
                 
                    $result['result'] = "email encontrado";
                    print json_encode($result);

                }else{

                    $sql_user = executeQuery("SELECT nombre_user FROM caja.sitemas.administradores WHERE nombre_user = '$user'");
                    $user_count = odbc_num_rows($sql_user);
                    
                    if($user_count >= 1){
                        
                        
                        $result['result'] = "user registrado";
                        print json_encode($result);

                    }else{

                        $sql_registros = executeQuery("SELECT cve_administrador FROM caja.sitemas.administradores");
                        $registros_count = (odbc_num_rows($sql_registros)) + 1;

                        //Se genera el codigo para cada cuenta
                        $codigo_cuenta = randomNumber("CA",7,$registros_count);

                        $clave_pass = encryption($pass);

                        $sql_save_admin = executeQuery("EXEC caja.sitemas.insertar '$codigo_cuenta','$privilegio','$name','$paterno','$materno','$calle','$col','$number','$celular','$sexo','$user','$clave_pass','$email','$activo','$tipo_cuenta'");

                        if($sql_save_admin == false){

                            
                            $result['result'] = "error de registro";
                            print json_encode($result);
                        }else{
                            
                            $result['result'] = "registro guardado";
                            print json_encode($result);
                        }
                    }
                }
                
            }
        
        }
   

?>