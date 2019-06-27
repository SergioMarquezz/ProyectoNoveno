<?php
  
    require_once "mainModel.php";


    $usr = $_POST['usuario-login'];
    $pass = $_POST['usuario-pass'];


    $password = encryption($pass);

   $sql = executeQuery("SELECT * FROM caja.sitemas.administradores WHERE nombre_user = '$usr' 
                        AND contrasenia = '$password' AND activo = 1");


    $user_login = odbc_num_rows($sql); 

    if($user_login == 1){

        $name = odbc_result($sql,"nombre");
        $paterno = odbc_result($sql,"ape_paterno");
        $materno = odbc_result($sql,"ape_materno");
        $calle = odbc_result($sql,"calle");
        $col = odbc_result($sql,"colonia");
        $number = odbc_result($sql,"numero_dir");
        $celular = odbc_result($sql,"tel_celular");
        $email = odbc_result($sql,"email");
        $privilegio_user = odbc_result($sql,"privilegio");
        $cuenta_codigo = odbc_result($sql,"cuenta_codigo");
        $tipo_user = odbc_result($sql,"tipo_cuenta");
        $name_user = odbc_result($sql,"nombre_user");

        session_start();

        $_SESSION['name_admin'] = $name;
        $_SESSION['paterno'] = $paterno;
        $_SESSION['materno'] = $materno;
        $_SESSION['calle'] = $calle;
        $_SESSION['number'] = $number;
        $_SESSION['colonia'] = $col;
        $_SESSION['celular'] = $celular;
        $_SESSION['email'] = $email;
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