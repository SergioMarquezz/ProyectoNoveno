<?php
    //TODO:Falta validacion de radiosButtons
    $peticion = true;
    require_once "../core/mainModel.php";

    if(isset($_POST['name-admin'])){

        //Se importa el archivo de administrador controlador
        require_once "../controllers/administradorControlador.php";
        
        //Se instancia la clase para poder llamar al metodo de agregar administrador controlador
        $ins_admin = new AdministradorController();

        if(($_POST['name-admin'] == "") || ($_POST['paterno-admin'] == "") || ($_POST['materno-admin'] == "")){
            
            $message = [
                "Alert"=>"simple",
                "Title"=>"Nombre Incompleto",
                "Text"=>"Algunos campos del nombre estan vacios, por favor llenelos",
                "Type"=>"error"
            ];

            echo MainModel::alerts($message);
            
        }elseif($_POST['calle'] == "" || $_POST['colonia'] == "" || $_POST['numero'] == ""){

            $message = [
                "Alert"=>"simple",
                "Title"=>"Dirección Incompleta",
                "Text"=>"Algunos campos de la dirección estan vacios, por favor llenalos",
                "Type"=>"error"
            ];

            echo MainModel::alerts($message);

        }elseif($_POST['celular'] == ""){

            $message = [
                "Alert"=>"simple",
                "Title"=>"Contacto vacio",
                "Text"=>"Por favor proporcione un numero de celular",
                "Type"=>"error"
            ];

            echo MainModel::alerts($message);

        }elseif($_POST['genero'] == false){

            $message = [
                "Alert"=>"simple",
                "Title"=>"Error de genero",
                "Text"=>"Por favor seleccione su genero (Masculino o Femenino)",
                "Type"=>"error"
            ];

            echo MainModel::alerts($message);
        }
        
        elseif($_POST['name-user'] == "" || $_POST['email'] == "" || $_POST['password'] == "" || $_POST['confirm-password'] == ""){

            $message = [
                "Alert"=>"simple",
                "Title"=>"Datos de la cuenta vacios",
                "Text"=>"Algunos campos del registro de tu cuenta estan vacios, por favor llenalos",
                "Type"=>"error"
            ];

            echo MainModel::alerts($message);

        }
        elseif($_POST['niveles'] == false){

            $message = [
                "Alert"=>"simple",
                "Title"=>"Nivel de privilegios sin asignar",
                "Text"=>"Por favor asigne permisos al administrador del sistema",
                "Type"=>"error"
            ];

            echo MainModel::alerts($message);

        }
        else{
            //Se llama al metodo del controlador para agregar al administrador
            echo $ins_admin->agregarAdministradorControlador();

        }

    }else{
        /*session_start();
        session_destroy();

        echo '<script>window.location.href="'.SERVER.'login/"</script>';*/
    }

?>