<?php
  

    $peticion = true;

    if($peticion){

        require_once "../core/mainModel.php";
    }else{
        require_once "./core/mainModel.php";
        
    }


    $connection = MainModel::connection();

    $usr = $_POST['usuario-login'];
    $pass = $_POST['usuario-pass'];

    $pass = MainModel::encryption($pass);

    $sql = "SELECT * FROM caja.sitemas.administradores WHERE nombre_user = '$usr' 
            AND contrasenia = '$pass' AND activo = 1";
    $response = odbc_exec($connection, $sql) or die (odbc_errormsg());


    $user_login = odbc_num_rows($response); 

    if($user_login == 1){

        $name = odbc_result($response,"nombre");
        $tipo_user = odbc_result($response,"tipo_cuenta");
        $privilegio_user = odbc_result($response,"privilegio");
        $cuenta_codigo = odbc_result($response,"cuenta_codigo");

        session_start();

        $_SESSION['name_admin'] = $name;
        $_SESSION['tipo_admin'] = $tipo_user;
        $_SESSION['privilegio_admin'] = $privilegio_user;
        $_SESSION['cuenta_codigo_admin'] = $cuenta_codigo;

        if($tipo_user == 'Administrador'){

            echo "Administrador";
            
        }else{
            echo "Alumno";
        }

        

    }else{
        echo "error";
    }


?>