<?php
   include "../core/configGeneral.php";
   require_once "includes/fecha.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo ACRONYM;?> | SOLICITUDES</title>
    <?php include "includes/links.php"?> 
</head>
<header>
    <?php include "includes/nav-lateral.php"?> 
</header>
<body background="<?php echo SERVER;?>/views/img/logo-utec-nuevo.png">
    <div class="container title-container">
        <div class="page-header">
            <h4 class="text-titles mt-4"><i class="fa fa-file-pdf-o "></i> SOLICITUDES DE PAGOS</h4>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header text-white" style="background: #024a86;">
                <i class="zmdi zmdi-plus"></i> &nbsp; NUEVA SOLICITUD DE PAGO
            </div>
            <div class="card-body">
                <p style="font-size:18px;">Este formulario te permite solicitar algún tipo de documento o realizar los pagos que requieras,
                    todas las solicitudes quedaran guardadas de manera inmediata al presionar el botón de <strong>guardar solicitud,</strong>
                    los documentos que solicites no seran generados hasta despues de realizar el pago correspondiente.
                </p>
                <br>
                <form action="" data-form="save" method="" class="FormularioSolicitud" autocomplete="off" enctype="multipart/form-data">
                    <div class="row">
                    <select class="browser-default custom-select" id="solicitudes">
                        <option selected disabled>Elige un concepto</option>
                    </select>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="clave_concepto" class="label-solicitud">Clave Concepto</label>
                                <input name="cve_concepto" type="number" id="clave_concepto" class="form-control text-dark" disabled>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="fecha_solcitud" class="label-solicitud">Fecha</label>
                                <input name="fecha-solicitud" type="text" value="<?php echo $fecha ?>" id="fecha_solcitud" class="form-control text-dark" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="costo-unitario" class="label-solicitud">Costo Unitario</label>
                                <input name="precio" type="number" id="costo-unitario" class="form-control text-dark" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="container row justify-content-center mt-5">
                        <div class="col-md-12 mb-12" id="buttons">
                            <!--<a href="../pdf/html2PDF/pdf_prueba.php" class="btn btn-block btn-primary" target="_blank"><i class="fa fa-inbox pr-2"></i>Guardar</a>-->
                            <button id="guardarSolicitud" type="button" class="btn btn-block"><i class="fa fa-inbox pr-2"></i>Guardar Solicitud</button>
                        </div>
                        <div class="col-md-12 mb-12 mt-3">
                            <button type="button" class="btn btn-block btn-danger"><i class="fa fa-times pr-2"></i>Cancelar Solicitud</button>
                        </div>
                    </div>
                    <input type="hidden" id="tipo-persona">
                    <input type="hidden" id="cve-persona">
                    <input type="hidden" id="cve-periodo">
                </form>
            </div>
            <div class="card-footer text-muted text-center mt-5">
                <?php 
                    
                    echo $date;
                ?>
            </div>
        </div>
    </div>
    <?php require_once "includes/footer.php";?>
    <?php  require_once "includes/script.php";?>
</body>
</html>