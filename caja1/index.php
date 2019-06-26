<?php 
    include "core/configGeneral.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo ACRONYM;?> | UTEC</title>

    <link rel="stylesheet" href="views/css/bootstrap.css"> <!--Estilos bootstrap-->
    <link rel="stylesheet" href="views/css/mdb.css"> <!--Estilos material desing-->
    <link rel="stylesheet" href="views/css/sweetalert2.css"> <!--Estilos para alertas-->
    <link rel="stylesheet" href="views/css/style.css"> <!--Estilos programador-->
    <link rel="icon" href="views/img/logoHalcon.jpg"> <!--Icono de la pestaña-->
    
</head>
<body id="body" background="<?php echo SERVER;?>/views/img/logo-utec-nuevo.png">


<div class="container-all">
    <div class="container-form">
        <img src="<?php echo SERVER;?>views/img/utec.jpg" alt="" class="logo">
        <h1 class="title">Iniciar Sesión</h1>
            <form action="" method="POST" autocomplete="off" class="Ajax">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="usuario" name="usuario-login" class="form-control text-white">
                            <label for="usuario" class="text-white label-login">Usuario</label>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <input type="password" name="usuario-pass" id="contrasenia" class="form-control text-white">
                            <label for="contrasenia" class="text-white label-login">Contraseña</label>
                        </div>
                    </div>
                </div>
                <button id="btn-login" type="submit" class="btn btn-block">Entrar</button>
            </form>
    </div>


    <div class="container-text">
        <div class="capa"></div>
        <h1 class="litle-description text-center"><?php echo COMPANY ?> ---SAE---</h1>
        <p class="text-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Praesentium eaque repellat beatae eligendi, placeat, qui veritatis voluptates 
            architecto repellendus amet inventore? Nihil aspernatur repellat enim voluptatibus 
            magnam totam debitis exercitationem.</p>
    </div>
</div>
    
</body>
<?php  require_once "views/includes/script.php";?>
</html>