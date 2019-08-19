<?php
 
    include "../core/configGeneral.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo ACRONYM;?> | MISDATOS</title>
    <?php include "includes/links.php"?> 
</head>
<header>
    <?php include "includes/nav-lateral.php"?> 
</header>
<body background="<?php echo SERVER;?>/views/img/logo-trasparencia.png">

    <div class="container title-container">
        <div class="page-header">
            <h1 class="text-titles"><i class="zmdi zmdi-account-circle zmdi-hc-fw"></i> <small> MIS DATOS</small></h1>
        </div>
        <hr class="">
        <p class="lead">
            <!--TODO:Modifiacar texto-->
            En este apartado del sistema, la información que proporcionaste en tu registro inicial
            podras actualizarla desde aqui cada vez que sea necesario o podras hacerlo tambien desde
        </p>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header text-white" style="background: #0b1a53;">
                <i class="zmdi zmdi-refresh"></i> &nbsp; MIS DATOS
            </div>
           
            <div class="card-body">
                <form action="">
                    <h5 class="mb-5"><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</h5 class="mb-5">
                    <h6>Matricula</h6>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="md-form">
                                <input type="number" id="matricula" class="form-control text-dark" readonly>
                                <label for="matricula"></label>
                            </div>
                        </div>
                    </div>
                    <h6>Nombre Completo</h6>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="name">Nombre(s)</label>
                                <input type="text" id="name" class="form-control text-dark" readonly>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="paterno-user">Apellido Paterno</label>
                                <input type="text" id="paterno-user" class="form-control text-dark" readonly>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="materno">Apellido Materno</label>
                                <input type="text" id="materno" class="form-control text-dark" readonly>
                            </div>
                        </div>
                    </div>
                    <h6>Contacto</h6>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="telefono">Telefono Personal</label>
                                <input type="tel" id="telefono" class="form-control text-dark" readonly>
                            </div> 
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="correo">Correo Electronico</label>
                                <input type="tel" id="correo" class="form-control text-dark" readonly>
                            </div> 
                        </div>                                 
                    </div>
                    <h6>Dirección</h6>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="calle">Calle</label>
                                <input type="text" id="calle" class="form-control text-dark" readonly>
                            </div> 
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="colonia">Colonia</label>
                                <input type="text" id="colonia" class="form-control text-dark" readonly>
                            </div> 
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="numero">Numero</label>
                                <input type="text" id="numero" class="form-control text-dark" readonly>
                            </div> 
                        </div>
                    </div>
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-xl-6">
                                <button id="update-data" type="button" class="btn btn-block "><i class="zmdi zmdi-refresh"></i> Actualizar</button>
                            </div>
                        </div>
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

    <?php require_once "includes/footer.php"?>
    <?php  require_once "includes/script.php";?>
    
</body>
</html>
