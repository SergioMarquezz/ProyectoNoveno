<?php

    if($peticion){

        require_once "../core/mainModel.php";
    }else{
        require_once "./core/mainModel.php";
        
    }

    class AdministradorModelo extends MainModel{

        protected function agregarAdministradorModelo($data){

            //Campos de la base de datos
            $codigo = $data['cuenta_codigo'];
            $privilegio = $data['privilegio'];
            $name = $data['nombre'];
            $paterno = $data['ape_paterno'];
            $materno = $data['ape_materno'];
            $calle = $data['calle'];
            $col = $data['colonia'];
            $number = $data['numero_dir'];
            $celular = $data['tel_celular'];
            $sexo = $data['genero'];
            $user = $data['nombre_user'];
            $pass = $data['contrasenia'];
            $email = $data['email'];
            $activo = $data['activo'];
            $tipo_cuenta = $data['tipo_cuenta'];

            $sql_connection = MainModel::connection();
            $declaration = "EXEC caja.sitemas.insertar '$codigo','$privilegio','$name','$paterno','$materno','$calle','$col','$number','$celular','$sexo','$user','$pass','$email','$activo','$tipo_cuenta'";
            $response = odbc_exec($sql_connection, $declaration) or die (odbc_errormsg());

            return $response;
            
           
        }

        protected function datosSessionModel($tipo, $codigo){

            if($tipo == "Unico"){

                $connect = MainModel::connection();
                $query = MainModel::executeQuery("SELECT * FROM caja.sitemas.administradores WHERE cuenta_codigo = '$codigo'");

                return $query;
            }else{

            }
        }

    }

?>