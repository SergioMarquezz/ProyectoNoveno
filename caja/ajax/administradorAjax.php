<?php
    $peticion = true;
    require_once "../core/mainModel.php";

    if(isset($_POST['name-admin'])){

        require_once "../controllers/administradorControlador.php";
        
        $ins_admin = new AdministradorController();

        if(($_POST['name-admin'] == "") || ($_POST['paterno-admin'] == "") || ($_POST['materno-admin'] == "")){
            
            $message = [
                "Alert"=>"simple",
                "Title"=>"Ocurrio un error inesperado",
                "Text"=>"Los campos de nombre y apellidos estan vacios, por favor llenelos",
                "Type"=>"error"
            ];

            echo MainModel::alerts($message);
            
        }else{
            echo $ins_admin->agregarAdministradorControlador();

            
        }

    }else{
        /*session_start();
        session_destroy();

        echo '<script>window.location.href="'.SERVER.'login/"</script>';*/
    }

?>