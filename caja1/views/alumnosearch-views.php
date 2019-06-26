<?php
    //require_once "ajax/verificarSession.php";
    include "../core/configGeneral.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo ACRONYM;?> | BUSCAR ALUMNOS</title>
    <?php include "includes/links.php"?> 
</head>
<header>
    <?php include "includes/nav-lateral.php"?> 

</header>
<body background="<?php echo SERVER;?>/views/img/logo-utec-nuevo.png">

    <div class="container title-container">
        <div class="page-header">
            <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> <small> Usuarios Alumnos</small></h1>
        </div>
    </div>

    <div class="d-flex justify-content-around container-fluid">
        <div class="breadcrumb">
                <div class="p-2">
                <a href="alumnos-views.php" class="btn btn-success">
                    <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ALUMNOS
                </a>
            </div>
            <div class="p-2">
                <a href="alumnosearch-views.php" class="btn btn-primary">
                    <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR ALUMNO
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header text-white" style="background: #0b1a53;">
                <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR ALUMNOS
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="form-group label-floating">
                                <span class="control-label">¿A quién estas buscando?</span>
                                <input class="form-control" type="text" name="search_admin_init" required>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-6">
                                <button type="submit" class="btn btn-block btn-primary"> <i class="zmdi zmdi-search"></i> &nbsp;Buscar</button>
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