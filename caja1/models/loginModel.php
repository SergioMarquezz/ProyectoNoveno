<?php
  
    require_once "mainModel.php";


    $usr = "granillohermi@gmail.com";//clearString($_POST['usuario-login']); 
    $pass = "LX6YR2PMFL";//clearString($_POST['usuario-pass']);
    $opcion = "aspirante";//clearString($_POST['opcion']);

    login();

    function login(){

        global $usr, $pass, $opcion;

        if($opcion == "Admin"){

            $password = encryption($pass);

            $sql = executeQuery("SELECT * FROM administradores WHERE nombre_user = '$usr' 
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
                    
                }
        
            }
        }else if($opcion == "Alumno"){
            
            $query = "SELECT saiiut.saiiut.personas.cve_persona, cve_tipo_persona, cve_periodo_actual, saiiut.saiiut.personas.nombre, 
            saiiut.saiiut.personas.apellido_pat, saiiut.saiiut.personas.apellido_mat, matricula, saiiut.saiiut.carreras_cgut.nombre AS carrera
            FROM saiiut.saiiut.alumnos
            INNER JOIN saiiut.saiiut.personas ON saiiut.saiiut.alumnos.cve_alumno = saiiut.saiiut.personas.cve_persona
            INNER JOIN saiiut.saiiut.usuarios ON saiiut.saiiut.alumnos.matricula = saiiut.saiiut.usuarios.login_usuario
            INNER JOIN saiiut.saiiut.carreras_cgut ON saiiut.saiiut.alumnos.cve_carrera = saiiut.saiiut.carreras_cgut.cve_carrera
            WHERE login_usuario = '$usr' AND contrasena2 = '$pass' AND saiiut.saiiut.usuarios.activo = 1";

            $sql_alumno = executeQuery($query);

            $user_alumno = odbc_num_rows($sql_alumno);
            
            if($user_alumno == 1){

                $cve_persona = odbc_result($sql_alumno,"cve_persona");
                $cve_tipo_persona = odbc_result($sql_alumno,"cve_tipo_persona");
                $periodo = odbc_result($sql_alumno,"cve_periodo_actual");
                $nombre = odbc_result($sql_alumno,"nombre");
                $ape_paterno = odbc_result($sql_alumno,"apellido_pat");
                $ape_materno = odbc_result($sql_alumno,"apellido_mat");
                $matricula = odbc_result($sql_alumno,"matricula");
                //$calle_alumno = odbc_result($sql_alumno,"calle");
               // $numero_exterior = odbc_result($sql_alumno,"numero_exterior");
                $carrera = utf8_encode(odbc_result($sql_alumno,"carrera"));


            
                session_start();
                $_SESSION['clave_persona'] = $cve_persona;
                $_SESSION['tipo_persona'] = $cve_tipo_persona;
                $_SESSION['periodo'] = $periodo;
                $_SESSION['name_admin'] = $nombre;
                $_SESSION['ape_paterno'] = $ape_paterno;
                $_SESSION['ape_materno'] = $ape_materno;
                $_SESSION['matricula'] = $matricula;
                //$_SESSION['calle'] = $calle_alumno;
               // $_SESSION['numero'] = $numero_exterior;
                $_SESSION['carrera'] = $carrera;
                

                if($cve_tipo_persona == 2){
                    
                    echo "alumno";
                }

            }
        }else if($opcion == "aspirante"){

            $sql_candidate = "SELECT consecutivo_aspirante, saiiut.saiiut.registro_inicial.nombre, apellido_pat, apellido_mat, saiiut.saiiut.carreras_cgut.nombre AS carrera
            FROM saiiut.saiiut.registro_inicial
            INNER JOIN saiiut.saiiut.carreras_cgut ON saiiut.saiiut.registro_inicial.carrera = saiiut.saiiut.carreras_cgut.cve_carrera
            WHERE correo = '$usr' AND password = '$pass'";

            $query_candidte = executeQuery($sql_candidate);

            $count_query = odbc_num_rows($query_candidte);

            if($count_query == 1){

                echo odbc_result($query_candidte,"consecutivo_aspirante");
            }
        }

    }


?>