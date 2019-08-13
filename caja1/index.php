<?php 
    include "core/configGeneral.php";
    include "views/includes/fecha.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">

    <title><?php echo ACRONYM;?> | LOGIN</title>
    
    <link href="views/css/main.cba69814a806ecc7945a.css" rel="stylesheet">
   
    <link rel="stylesheet" href="views/css/styles.css"> <!--Estilos programador-->
    <link rel="stylesheet" href="views/css/sweetalert2.css"> <!--Estilos para alertas-->
    <link rel="stylesheet" href="views/css/font-awesome.min.css"> <!--Estilos para iconos-->
    <link rel="icon" href="views/img/logoHalcon.jpg"> <!--Icono de la pestaña-->
    
</head>

<body>
<div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100">
                <div class="h-100 no-gutters row">
                    <div class="d-none d-lg-block col-lg-4">
                        <div class="slider-light">
                            <div class="slick-slider">
                                <div>
                                    <div class="position-relative h-100 d-flex align-items-center" tabindex="-1" id="derecha">
                                        <div class="slider-content">
                                            <img width="150" height="150" src="<?php echo SERVER;?>views/img/utec.jpg" alt="" class="mt-4">
                                            <h3>Universidad Tecnologica de Tulancingo</h3>
                                            <h4><?php echo meses();?></h4>
                                            <h6 class="mt-5"><?php echo COMPANY ?></h6>
                                            <h6>SAP</h6>
                                            <div class="container mt-3">
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-12">
                                                        <a href="https://github.com/SergioMarquezz" target="_blank" title="GitHub" class="text-white"><i class="fa fa-github redes-sociales"></i></a>
                                                        <a href="https://www.facebook.com/sergio.marquez.775" target="_blank" title="Facebook" class="text-white"><i class="fa fa-facebook-square redes-sociales ml-3"></i></a>
                                                        <a href="#" target="_blank" title="Twitter" class="text-white"><i class="fa fa-twitter-square redes-sociales ml-3"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="body" class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
                        <div class="col-sm-12 col-md-10 col-lg-9">
                            <h1 class="text-white text-center"><?php echo COMPANY ?></h1>
                            <p id="bienvenida" class="text-white">Bienvenid@</p>
                            <p id="texto-inicial" class="text-white">Este sistema permite el acceso a los diferentes procesos que se gestionan en caja de la Universidad Tecnológica de Tulancingo, 
                                si requieres realizar algun pago o una solicitud de documentos, ingresa tu usuario y contraseña para poder entrar.
                            </p>
                            <div class="app-logo"></div>
                                <div class="container register">
                                    <h4 class="text-center text-white">Inicia sesión en el sistema</h4>
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link text-white active" id="pills-home-tab" data-toggle="pill" href="#login-alumnos" role="tab" aria-controls="pills-home" aria-selected="true">Alumnos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white" id="pills-profile-tab" data-toggle="pill" href="#login-aspirantes" role="tab" aria-controls="pills-profile" aria-selected="false">Aspirantes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white" id="pills-contact-tab" data-toggle="pill" href="#login-admin" role="tab" aria-controls="pills-contact" aria-selected="false">Administrador</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Personal UTEC</a>
                                        </li>
                                    </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="login-alumnos" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <form method="post">
                                            <div class="form-group">
                                                <input type="text" name="usuario-login" id="usuario" class="form-control" placeholder="Matricula" value="" required=""/>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="usuario-pass" id="contrasenia" class="form-control" placeholder="Contraseña" value="" required=""/>
                                            </div>
                                            <div class="form-group">
                                                <button id="btn-login" class="btn btn-large my-4 btnContactSubmit" type="submit">Acceder al sistema</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="login-aspirantes" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <form method="post">
                                            <div class="form-group">
                                                <input type="text" name="usuario-login" id="usuarios-asipirante" class="form-control" placeholder="Correo" value="" required=""/>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="usuario-pass" id="pass-asipirante" class="form-control" placeholder="Contraseña" value="" required=""/>
                                            </div>
                                            <div class="form-group">
                                                <button id="aspirantes-btn" class="btn btn-large my-4 btnContactSubmit" type="submit">Acceder al sistema</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="login-admin" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <form method="post">
                                            <div class="form-group">
                                                <input type="text" name="usuario-login" id="usuarios-admin" class="form-control" placeholder="Usuario" value="" required=""/>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="usuario-pass" id="pass-admin" class="form-control" placeholder="Contraseña" value="" required=""/>
                                            </div>
                                            <div class="form-group">
                                                <button id="login-btn" class="btn btn-large my-4 btnContactSubmit" type="submit">Acceder al sistema</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  require_once "views/includes/script.php";?>

</body>
</html>
