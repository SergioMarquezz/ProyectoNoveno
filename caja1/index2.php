<?php 
    include "core/configGeneral.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo ACRONYM;?> | UTEC</title>

    <link rel="stylesheet" href="views/css/bootstrap.css"> <!--Estilos bootstrap-->
    <link rel="stylesheet" href="views/css/mdb.css"> <!--Estilos material desing-->
    <link rel="stylesheet" href="views/css/sweetalert2.css"> <!--Estilos para alertas-->
    <link rel="stylesheet" href="views/css/styles.css"> <!--Estilos programador-->
    <link rel="icon" href="views/img/logoHalcon.jpg"> <!--Icono de la pestaña-->
</head>
<body id="body">
    <div class="container">
        <div class="card" id="trasparente">
            <div class="card-body">
                <form class="text-center border border-light p-5 Ajax" action="" method="POST" autocomplete="off">
                    <div class="container-text">
                        <div class="capa"></div>
                        <h1 class="text-white mt-5"><?php echo COMPANY ?> ---SAP---</h1>
                        <div class="text-white" style="font-size:20px;">Este sistema permite el acceso a los diferentes procesos que se gestionan en caja de la Universidad Tecnológica de Tulancingo, 
                                                              si requieres realizar algun pago o una solicitud de documentos, ingresa tu usuario y contraseña para poder entrar.</div> 
                    </div>
                    <img width="150" height="150" src="<?php echo SERVER;?>views/img/utec.jpg" alt="" class="mt-4">
                    <h1 class="mb-4 text-white">Iniciar Sesión</h1>
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
                    <button id="btn-login" class="btn btn-large my-4" type="submit">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
<?php  require_once "views/includes/script.php";?>
</html>