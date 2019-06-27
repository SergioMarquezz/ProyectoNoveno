<?php
   // require_once "ajax/verificarSession.php";
   include "../core/configGeneral.php";
?>

<!DOCTYPE html>
<html lang="eS">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo ACRONYM;?> | ADMIN</title>
    <?php include "includes/links.php"?> 
</head>
<header>
    <?php include "includes/nav-lateral.php"?> 

</header>
<body background="<?php echo SERVER;?>/views/img/logo-utec-nuevo.png">
<div class="container title-container">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> <small> Usuarios Administradores</small></h1>
    </div>
    <p class="lead">Todas las personas que se registren en este formulario en automatico seran administradores, por lo cual tendrea que darles privilegios para manejar solo algunas
         funciones o si lo decea que tenga control total del sistema, <strong>se recomienda unicamente dar de alta como adminstradores al personal autorizado.</strong>
     </p>
</div>

<div class="d-flex justify-content-around container-fluid">
    <div class="breadcrumb">
        <div class="p-2"> 
            <a href="admin-views.php" class="btn btn-info">
                <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO ADMINISTRADOR
            </a>
        </div>
            <div class="p-2">
            <a href="listadmin-views.php" class="btn btn-success">
                <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ADMINISTRADORES
            </a>
        </div>
        <div class="p-2">
            <a href="adminsearch-views.php" class="btn btn-primary">
                <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR ADMINISTRADOR
            </a>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="card-header text-white" style="background: #0b1a53;">
            <i class="zmdi zmdi-plus text-white"></i> &nbsp; NUEVO ADMINISTRADOR
        </div>
        <div class="card-body">
            <form action="../models/administradorModel.php" data-form="save" method="POST" class="FormularioAdmin" autocomplete="off" enctype="multipart/form-data">
                <h5 class="mb-5"><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</h5 class="mb-5">
                <h6>* Nombre Completo</h6>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="nombre-admin" class="form-control" name="name-admin">
                            <label for="nombre-admin">Nombre(s)</label>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="apellidoP-admin" class="form-control" name="paterno-admin">
                            <label for="apellidoP-admin">Apellido Paterno</label>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="apellidoM-admin" class="form-control" name="materno-admin">
                            <label for="apellidoM-admin">Apellido Materno</label>
                        </div>
                    </div>
                </div>
                <h6>* Dirección</h6>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="streen" class="form-control" name="calle">
                            <label for="streen">Calle</label>
                        </div> 
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="col" class="form-control" name="colonia">
                            <label for="col">Colonia</label>
                        </div> 
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="md-form">
                            <input type="text" maxlength="3" id="address" class="form-control" name="numero">
                            <label for="address">Numero</label>
                        </div> 
                    </div>
                </div>
                <h6>* Contacto</h6>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="md-form">
                            <input type="tel" maxlength="10" id="telefono" class="form-control" name="celular">
                            <label for="telefono">Telefono Personal</label>
                        </div> 
                    </div>                                
                </div>
                <h6>* Genero</h6>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="sexo-feme" name="genero" value="Femenino" checked>
                            <label class="custom-control-label genero" for="sexo-feme">  <i class="zmdi zmdi-female"></i> &nbsp;Femenino</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="defaultUnchecked1" name="genero" value="Masculino">
                            <label class="custom-control-label genero" for="defaultUnchecked1">   <i class="zmdi zmdi-male-alt"></i> &nbsp;Masculino</label>
                        </div>
                    </div>
                </div>
                <h5><i class="zmdi zmdi-key"></i> &nbsp; Datos de la cuenta</h5>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="md-form">
                            <input type="text" id="nombre-user" class="form-control" name="name-user">
                            <label for="nombre-user">Nombre de usuario</label>
                        </div> 
                    </div>
                    <div class="col-xl-6">
                        <div class="md-form">
                            <input type="email" id="correo" class="form-control" name="email">
                            <label for="correo">Correo Electronico De La Universidad</label>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="md-form">
                            <input type="password" id="pass" class="form-control" name="password">
                            <label for="pass">Contraseña</label>
                        </div> 
                    </div>
                    <div class="col-xl-6">
                        <div class="md-form">
                            <input type="password" id="pass-confirm" class="form-control" name="confirm-password">
                            <label for="pass-confirm">Repite tu contraseña</label>
                        </div> 
                    </div>
                </div>
                <h5><i class="zmdi zmdi-star"></i> &nbsp; Nivel de privilegios</h5>
                <div class="container-fluid mt-4">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="label label-success bg-success pl-2 text-white">Nivel 1 de Administrador</div>
                                </div>
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
                                    <div class="label label-success">Control total del sistema</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="label label-success bg-info pl-2 text-white">Nivel 2 de Administrador</div>
                                </div>
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
                                    <div class="label label-success">Control de registro y actualización</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="label label-success bg-default pl-2 text-white">Nivel 3 de Administrador</div>
                                </div>
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
                                    <div class="label label-success">Control de registro</div>
                                </div>
                            </div>  
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="defaultUncheckedd" name="niveles" value="1" checked>
                                        <label class="custom-control-label niveles" for="defaultUncheckedd"><i class="zmdi zmdi-star"></i> &nbsp;Nivel 1</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 mt-3">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="defaultUnchecke" name="niveles" value="2">
                                        <label class="custom-control-label niveles" for="defaultUnchecke"><i class="zmdi zmdi-star"></i> &nbsp;Nivel 2</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 mt-3">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="defaultUncheckeddd" name="niveles" value="3">
                                        <label class="custom-control-label niveles" for="defaultUncheckeddd"><i class="zmdi zmdi-star"></i> &nbsp;Nivel 3</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-6">
                                <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-inbox pr-2"></i>Guardar</button>
                            </div>
                        </div>
                    </div>
                    <div class="RespuestaAjax">
                    </div>
            </form>
        </div>
        <div class="card-footer text-muted text-center mt-5">
            <?php 
                require_once "includes/fecha.php"; 
                echo $date;
            ?>
        </div>
    </div>
</div>

    
</body>
<?php require_once "includes/footer.php"?>
<?php  require_once "includes/script.php";?>
</html>
