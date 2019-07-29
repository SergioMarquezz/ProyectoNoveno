<?php
   // require_once "ajax/verificarSession.php";
    include "../core/configGeneral.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo ACRONYM;?> | LISTA ADMIN</title>
    <?php include "includes/links.php"?> 
</head>
<header>
    <?php include "includes/nav-lateral.php"?> 

</header>
<body background="<?php echo SERVER;?>/views/img/logo-trasparencia.png">
    <div class="container title-container">
        <div class="page-header">
            <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> <small> Usuarios Administradores</small></h1>
        </div>
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
            <div class="card-header text-white" style="background:  #009728;">
                LISTA DE LOS ADMINISTRADORES
            </div>
            <div class="card-body">
            <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">DNI</th>
                                <th class="text-center">NOMBRES</th>
                                <th class="text-center">APELLIDOS</th>
                                <th class="text-center">TELÉFONO</th>
                                <th class="text-center">A. CUENTA</th>
                                <th class="text-center">A. DATOS</th>
                                <th class="text-center">ELIMINAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>7890987651</td>
                                <td>Nombres</td>
                                <td>Apellidos</td>
                                <td>Telefono</td>
                                <td>
                                    <a href="#!" class="btn btn-success btn-raised btn-xs">
                                        <i class="zmdi zmdi-refresh"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="#!" class="btn btn-success btn-raised btn-xs">
                                        <i class="zmdi zmdi-refresh"></i>
                                    </a>
                                </td>
                                <td>
                                    <form>
                                        <button type="submit" class="btn btn-danger btn-raised btn-xs">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>7890987651</td>
                                <td>Nombres</td>
                                <td>Apellidos</td>
                                <td>Telefono</td>
                                <td>
                                    <a href="#!" class="btn btn-success btn-raised btn-xs">
                                        <i class="zmdi zmdi-refresh"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="#!" class="btn btn-success btn-raised btn-xs">
                                        <i class="zmdi zmdi-refresh"></i>
                                    </a>
                                </td>
                                <td>
                                    <form>
                                        <button type="submit" class="btn btn-danger btn-raised btn-xs">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation example" id="paginacion">
    <ul class="pagination pagination-circle justify-content-center">
        <li class="page-item"><a class="page-link">First</a></li>
        <li class="page-item disabled">
        <a class="page-link" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
        </a>
        </li>
        <li class="page-item active"><a class="page-link">1</a></li>
        <li class="page-item"><a class="page-link">2</a></li>
        <li class="page-item"><a class="page-link">3</a></li>
        <li class="page-item"><a class="page-link">4</a></li>
        <li class="page-item"><a class="page-link">5</a></li>
        <li class="page-item">
        <a class="page-link" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
        </a>
        </li>
        <li class="page-item"><a class="page-link">Last</a></li>
    </ul>
    </nav>
            </div>
            <div class="card-footer  text-muted text-center mt-5">
                <?php 
                    require_once "includes/fecha.php";
                    echo $date;
                ?>
            </div>
        </div>
    </div>

</body>
<?php require_once "includes/footer.php"?>
<?php require_once "includes/script.php";?> 
</html>
