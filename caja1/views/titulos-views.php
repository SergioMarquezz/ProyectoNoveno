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
    <title><?php echo ACRONYM;?> | TITULOS</title>
    <?php include "includes/links.php"?> 
</head>
<header>
    <?php include "includes/nav-lateral.php"?> 
</header>
<body>

<div class="container title-container">
    <div class="page-header">
        <h4 class="text-titles mt-4"><i class="zmdi zmdi-bookmark"></i> PAGO DE TITULO</h4>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-header text-white" style="background: #0b1a53;">
            <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO RECIBO DE PAGO
        </div>
        <div class="card-body">
            <form action="" >
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                        <div class="md-form">
                            <input type="number" id="form1" class="form-control">
                            <label for="form1">Matricula</label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 ">
                        <div class="md-form">
                            <input type="number" id="form1" class="form-control">
                            <label for="form1">Serie</label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                        <div class="md-form">
                            <input type="number" id="form1" class="form-control">
                            <label for="form1">Folio</label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mt-4">
                        <button class="btn btn-success" id="selecion-concepto" data-toggle="modal" data-target="#modal1">Lista de personas</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="form2" class="form-control">
                            <label for="form1">Nombre</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="md-form">
                            <input type="number" id="form" class="form-control">
                            <label for="form1">Apellido Paterno</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="md-form">
                            <input type="number" id="form" class="form-control">
                            <label for="form1">Apellido Materno</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mt-3">
                        <label for="">Carrera</label>
                        <select class="browser-default custom-select">
                            <option selected disabled>Elije una opción</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                        <div class="md-form">
                            <input type="number" id="form" class="form-control">
                            <label for="form1">Cuatrimestre</label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                        <div class="md-form">
                            <input type="number" id="form" class="form-control">
                            <label for="form1">Grupo</label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                        <div class="md-form">
                            <input type="number" id="form" class="form-control">
                            <label for="form1">Turno</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-2">
                        <div class="md-form">
                            <input type="number" id="form" class="form-control">
                            <label for="form1">Periodo Escolar</label>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <label for="exampleForm2">Fecha</label>
                        <input type="date" id="exampleForm2" class="form-control">
                    </div>
                </div>

                <div class="container row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-4">
                        <button type="button" class="btn btn-primary"><i class="fa fa-clipboard pr-2"></i>Nuevo</button>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-4">
                        <button type="button" class="btn btn-primary"><i class="fa fa-inbox pr-2"></i>Guardar</button>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-4">
                        <button type="button" class="btn btn-primary"><i class="fa fa-times pr-2"></i>Cancelar</button>
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

<?php require_once "includes/footer.php";?>
<?php  require_once "includes/script.php";?>
    
</body>
</html>