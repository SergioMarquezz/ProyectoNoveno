<?php
  
    //require_once "../core/configApp.php";
    require_once "mainModel.php";


    $usr = $_POST['usuario-login'];
    $pass = $_POST['usuario-pass'];

  //  $pass = MainModel::encryption($pass);

   $sql = executeQuery("SELECT * FROM caja.sitemas.administradores WHERE nombre_user = '$usr' 
                        AND contrasenia = '$pass' AND activo = 1");


    $user_login = odbc_num_rows($sql); 

    if($user_login == 1){

        $name = odbc_result($sql,"nombre");
        $tipo_user = odbc_result($sql,"tipo_cuenta");
        $privilegio_user = odbc_result($sql,"privilegio");
        $cuenta_codigo = odbc_result($sql,"cuenta_codigo");
        $name_user = odbc_result($sql,"nombre_user");

        session_start();

        $_SESSION['name_admin'] = $name;
        $_SESSION['tipo_admin'] = $tipo_user;
        $_SESSION['privilegio_admin'] = $privilegio_user;
        $_SESSION['cuenta_codigo_admin'] = $cuenta_codigo;
        $_SESSION['name_user'] = $name_user;

        if($tipo_user == 'Administrador'){

            echo "Administrador";
            
        }else{
            echo "Alumno";
        }

    }else{
        echo "error";
    }


?>