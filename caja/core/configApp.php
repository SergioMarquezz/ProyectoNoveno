<?php

    $user = 'sa';
    $pass = 'ingsergiomarquez';
    $server = 'localhost';
    $database = 'saiiut';


    $server_saiiut = '200.10.10.3';
    $user_saiiut = "sitemas";
    $database_saiiut = "saiiut";
    $pass_saiiut = "UtecAreaSistemas";
        
        

    /*$connectionInfo = array(Database"=>$database, "UID"=>$user, "PWD"=>$pass);
    $conn = sqlsrv_connect( $server, $connectionInfo);

    if( $conn ) {
        echo "Conexión establecida.<br />";
    }else{
        echo "Conexión no se pudo establecer.<br />";
        die( print_r( sqlsrv_errors(), true));
    }*/

    //cadena de conexión
	/*$connection_saiiut = "Driver={SQL Server}; Server=$server_saiiut; Database=$database_saiiut; Integrated Security=SSPI;Persist Security Info=False;";
	
    $saiiut = odbc_connect($connection_saiiut, $user_saiiut, $pass_saiiut);*/

    $connection = "Driver={SQL Server}; Server=$server; Database=$database; Integrated Security=SSPI;Persist Security Info=False;";
	
    $saiiut = odbc_connect($connection, $user, $pass);
    
?>