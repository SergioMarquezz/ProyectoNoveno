<?php

    //Constantes para conexion local
   const USER = "sergio";
   const PASS = "ingsergiomarquez";
   const SERVER = "localhost";
   const DATABASE = "caja";

    //Constantes para conexion al servidor remoto del saiiut
    /*const SERVER_SAIIUT = '200.10.10.3';
    const USER_SAIIUT = "sitemas";
    const DATABASE_SAIIUT = "saiiut";
    const PASS_SAIIUT = "UtecAreaSistemas";*/

    //Linea de codigo para conectar con SQL Server 2017
    const SGBD = "Driver={SQL Server Native Client 10.0};Server=".SERVER.";Database=".DATABASE.";";

    
    //Constante para almacenar la informacion de la base de datos
   // const SGBD = "Driver={SQL Server}; Server=".SERVER.";Database=".DATABASE.";Integrated Security=SSPI;Persist Security Info=False;";

   $connection = odbc_connect(SGBD, USER, PASS);

  

   

   
   

    //Para ir cambiando la incriptacion despues de insertar un registro no se debe cambiar
    const METHOD = "AES-256-CBC";
    const SECRET_KEY = '$SERGIO@2019';
    const SECRET_IV = '192604';
 
?>