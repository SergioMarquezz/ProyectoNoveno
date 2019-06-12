<?php

   const USER = "sa";
   const PASS = "ingsergiomarquez";
   const SERVER = "localhost";
   const DATABASE = "caja";


    /*const SERVER_SAIIUT = '200.10.10.3';
    const USER_SAIIUT = "sitemas";
    const DATABASE_SAIIUT = "saiiut";
    const PASS_SAIIUT = "UtecAreaSistemas";*/
        


    //cadena de conexión
	/*$connection_saiiut = "Driver={SQL Server}; Server=$server_saiiut; Database=$database_saiiut; Integrated Security=SSPI;Persist Security Info=False;";
	
    $saiiut = odbc_connect($connection_saiiut, $user_saiiut, $pass_saiiut);*/

    /*$connection = "Driver={SQL Server}; Server=$server; Database=$database; Integrated Security=SSPI;Persist Security Info=False;";
	
    $saiiut = odbc_connect($connection, $user, $pass);*/

    const SGBD = "Driver={SQL Server}; Server=".SERVER.";Database=".DATABASE.";Integrated Security=SSPI;Persist Security Info=False;";

    //Para ir cambiando la incriptacion despues de insertar un registro no se debe cambiar
    const METHOD = "AES-256-CBC";
	const SECRET_KEY = '$SERGIO@2019';
	const SECRET_IV = '192604';
 
    

?>