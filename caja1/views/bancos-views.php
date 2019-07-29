<?php
  //  require_once "ajax/verificarSession.php";
  include "../core/configGeneral.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo ACRONYM;?> | BANCOS</title>
    <?php include "includes/links.php"?> 
</head>
<header>
    <?php include "includes/nav-lateral.php"?> 
</header>
<body background="<?php echo SERVER;?>/views/img/logo-trasparencia.png">

  

<div class="container title-container">
    <div class="page-header">
        <h4 class="text-titles mt-4"><i class="fa fa-bank"></i>  BANCOS</h4>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-header text-white" style="background: #0b1a53;">
            <i class="zmdi zmdi-plus"></i> &nbsp; REGISTRAR NUEVO BANCO
        </div>
        <div class="card-body">
            <form action="" id="bancos-principal">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="clave-banco-principal" class="label-bancos">Clave</label>
                            <input type="number" id="clave-banco-principal" class="form-control text-dark" disabled>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-4">
                        <button class="btn btn-success" id="selecion-concepto">Selecciona Banco</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="nombre-banco-principal" class="label-bancos">Nombre del banco</label>
                            <input type="text" id="nombre-banco-principal" class="form-control text-dark" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="abre-banco-principal" class="label-bancos">abreviatura</label>
                            <input type="text" id="abre-banco-principal" class="form-control text-dark" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" disabled class="custom-control-input" id="activo-banco-principal">
                            <label class="custom-control-label label-bancos" for="activo-banco-principal">ACTIVO</label>
                        </div>
                    </div>
                </div>

                <div class="container row">
                    <div class="col-md-4 mb-4">
                        <button type="button" id="nuevo" class="btn btn-primary"><i class="fa fa-clipboard pr-2"></i>Nuevo</button>
                    </div>
                    <div class="col-md-4 mb-4">
                        <button type="button" class="btn btn-primary"><i class="fa fa-inbox pr-2"></i>Guardar</button>
                    </div>
                    <div class="col-md-4 mb-4">
                        <button type="button" id="cancelar" class="btn btn-primary"><i class="fa fa-times pr-2"></i>Cancelar</button>
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
  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <form id="modal-bancos">
        <h4 class="text-white text-center mt-3">Bancos registrados</h4>
            <div class="modal-content modal-dialog cascading-modal modal-avatar">
                <div class="modal-header">
                    <img src="img/logoHalcon.jpg" alt="avatar" class="rounded-circle img-responsive">
                </div>
                <select class="browser-default custom-select" id="bancos" name="bank">
                    <option selected disabled>Elije un banco</option>
                </select>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="clave-concepto" class="text-white label-bancos">Nombre del banco</label>
                        <input type="text" disabled id="nombre-banco" class="form-control text-white">
                    </div>
                </div>
                <div class="col-lg-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="costo-concepto" class="text-white label-bancos">Abreviatura</label>
                        <input type="text" disabled id="abreviatura" class="form-control text-white">
                    </div>
                </div>
                <div class="col-lg-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="activo-concepto" class="text-white label-bancos">Activo</label>
                        <input type="text" disabled id="activo" class="form-control text-white">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <button class="btn btn-cyan modal-close waves-effect waves-green" id="aceptar-banco">Aceptar</button>
                    </div>
                </div>
            </div> 
        </div>
    </form>
  <?php require_once "includes/footer.php";?>
  <?php  require_once "includes/script.php";?>
    
</body>
</html>

