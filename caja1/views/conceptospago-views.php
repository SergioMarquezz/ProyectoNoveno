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
    <title><?php echo ACRONYM;?> | CONCEPTOS</title>
    <?php include "includes/links.php"?> 
</head>
<header>
    <?php include "includes/nav-lateral.php"?> 
</header>
<body background="<?php echo SERVER;?>/views/img/logo-utec-nuevo.png">
    <div class="container title-container">
        <div class="page-header">
            <h4 class="text-titles mt-4"><i class="zmdi zmdi-comment"></i> CONCEPTOS DE PAGOS</h4>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header text-white" style="background: #0b1a53;">
                <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO CONCEPTO DE PAGO
            </div>
            <div class="card-body">
                <form action="" >
                    <div class="row">    
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <p style="font-size:18px;">En este formulario podras activar, desactivar, actualizar los conceptos de pago correspondientes,
                                                       cuando presiones el botón <strong>guardar</strong> los cambios seran realizados de manera exitosa.
                            </p>
                            <select class="browser-default custom-select" id="concepto-pago">
                                <option selected disabled>Elige un concepto</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="clave" class="label-conceptos">Clave Concepto</label>
                                <input disabled type="number" id="clave" class="form-control text-dark">
                            </div>
                        </div>
                        <div class="col-lg-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="monto" class="label-conceptos">Costo Unitario</label>
                                <input type="number" id="monto" class="form-control text-dark">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="descripcion" class="label-conceptos">Descripción</label>
                                <input type="text" id="descripcion" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="custom-control custom-checkbox">
                                <input checked type="checkbox" class="custom-control-input" id="activo">
                                <label class="custom-control-label" for="activo">ACTIVO</label>
                            </div>
                        </div>
                    </div>

                    <div class="container row">
                        <div class="col-md-4 mb-4">
                            <button type="button" class="btn btn-primary"><i class="fa fa-clipboard pr-2"></i>Nuevo</button>
                        </div>
                        <div class="col-md-4 mb-4">
                            <button id="guardar" type="button" class="btn btn-primary"><i class="fa fa-inbox pr-2"></i>Guardar</button>
                            <button id="actualizar" type="button" class="btn btn-primary mt-3"><i class="fa fa-edit pr-2"></i>Modificar</button>
                        </div>
                        <div class="col-md-4 mb-4">
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