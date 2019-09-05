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
    <title><?php echo ACRONYM;?> | TRÁMITES</title>
    <?php include "includes/links.php"?> 
</head>
<header>
    <?php include "includes/nav-lateral.php"?> 
</header>
<body background="<?php echo SERVER;?>/views/img/logo-trasparencia.png">
    <div class="container title-container">
        <div class="page-header">
            <h4 class="text-titles mt-4"><i class="fa fa-file-pdf-o "></i> TRÁMITES Y SERVICIOS</h4>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header text-white" style="background: #024a86;">
                <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO TRÁMITE O SERVICIO
            </div>
            <div class="card-body">
                <p style="font-size:18px;">Aquí podrás solicitar en línea trámites y/o servicios y generar la referencia para pago en banco, 
                                        el trámite que solicites lo podrás consultar y descargar desde tu perfil 24 horas después de realizar el pago.
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
                                <!--<label for="clave_concepto" class="label-solicitud">Clave Concepto</label>-->
                                <input name="cve_concepto" type="hidden" id="clave_concepto" class="form-control text-dark" readonly>
                                <div class="form-group">
                                <label for="fecha_solcitud" class="label-solicitud">Fecha</label>
                                <input name="fecha-solicitud" type="text" value="<?php echo $fecha ?>" id="fecha_solcitud" class="form-control text-dark" readonly>
                            </div>
                            </div>
                        </div>
                    
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="costo-unitario" class="label-solicitud">Costo Unitario</label>
                                <input name="precio" type="hidden" id="costo-unitario" class="form-control text-dark">
                                <input name="precio" type="hidden" id="costo-letra" class="form-control text-dark">
                                <input name="precio" type="text" id="unitario-costo" class="form-control text-dark" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="container row mt-5">
                        <div class="col-md-12 mb-12" id="buttons">
                            <!--<a href="../pdf/html2PDF/pdf_prueba.php" class="btn btn-block btn-primary" target="_blank"><i class="fa fa-inbox pr-2"></i>Guardar</a>-->
                            <button id="guardarSolicitud" type="button" class="btn float-right"><i class=""></i>Generar Referencia</button>
                        </div>
                    </div>
                    <input type="hidden" id="tipo-persona">
                    <input type="hidden" id="cve-persona">
                    <input type="hidden" id="matricula-alumno">
                </form>
                <div id="card-referencia" class="container">
                    <div class="card" style="">
                        <div class="card-header text-white" style="background: #024a86;">REFERENCIA BANCARIA</div>
                        <div class="view overlay">
                            <div class="row justify-content-center">
                                <div class="col-xl-6 mt-5">
                                    <img class="card-img-top" src="img/logo.png" alt="Card image cap">
                                </div>
                            </div>  
                            <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Datos para realizar pago</h4>
                            <form action="../pdf/referenciaPDF.php" class="border" method="POST">
                               <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group mt-3">
                                            <label for="name-completo" class="label-solicitud">Nombre</label>
                                            <input name="name-completo" type="text" id="nombre-completo" class="form-control text-dark" readonly>
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group mt-3">
                                            <label for="num-control" class="label-solicitud">N. Control</label>
                                            <input name="num-control" type="text" id="numero-control" class="form-control text-dark" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group mt-3">
                                            <label for="num-control" class="label-solicitud">Convenio CIE</label>
                                            <input name="num-control" type="text" id="numero-control" class="form-control text-dark" value="001364332" readonly>
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group mt-3">
                                            <label for="carrera" class="label-solicitud">Carrera</label>
                                            <input name="carrera" type="text" id="carrer" class="form-control text-dark" readonly>
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group mt-3">
                                            <label for="concepto" class="label-solicitud">Concepto</label>
                                            <input name="concepto" type="text" id="descripcion" class="form-control text-dark" readonly>
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-xl-4">
                                        <div class="form-group mt-3">
                                            <label for="referencia" class="label-solicitud">Referencia</label>
                                            <input name="referencia" type="text" id="bancaria" class="form-control text-dark" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="form-group mt-3">
                                            <label for="valida" class="label-solicitud">Válido hasta</label>
                                            <input value="<?php echo fecha() ?>" name="valida" type="text" id="validez" class="form-control text-dark" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="form-group mt-3">
                                            <label for="cantidad" class="label-solicitud">Cantidad a pagar</label>
                                            <input name="cantidad" type="text" id="monto" class="form-control text-dark" readonly>
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-xl-12">
                                       <button id="imprimir-referencia" class="float-right btn" type="submit"><i class="fa fa-file-pdf-o pr-2"></i>Imprimir Referencia</button>
                                    </div>
                               </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p class="text-danger">Nota: El pago correspondiente lo podras realizar en el banco BBVA Bancomer</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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