<?php

   include "../core/configGeneral.php";
   include_once "../views/includes/inactividad.php";
   include_once "../views/includes/fecha.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo ACRONYM;?> | REPORTES</title>
    <?php include "includes/links.php"?> 
</head>
<header>
    <?php include "includes/nav-lateral.php"?> 
</header>
<body background="<?php echo SERVER;?>/views/img/logo-trasparencia.png">
    <div class="container title-container">
        <div class="page-header">
            <h4 class="text-titles mt-4"><i class="fa fa-pencil"></i> REPORTES GENERALES</h4>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header text-white" style="background: #024a86;">
                <i class="zmdi zmdi-plus"></i> &nbsp; GENERAR REPORTES
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-2">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="nav-total-pagos" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Total de pagos</a>
                            <a class="nav-link" id="nav-for-date" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Reporte por fecha y diario</a>
                            <a class="nav-link" id="nav-for-concept" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Reporte por concepto</a>
                            <a class="nav-link" id="nav-month" data-toggle="pill" href="#report-month" role="tab" aria-controls="report-month" aria-selected="false">Reporte mensual</a>
                        </div>
                    </div>
                    <div class="col-xl-10">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="nav-total-pagos">
                                <!--Btn reporte pagos-->
                                <div class="row" id="radio-payments">
                                    <div class="col-xl-12 text-center">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="total_pagos" name="payments">
                                            <label class="custom-control-label" for="total_pagos">Ver todos los pagos</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="20_payments" name="payments" value="20">
                                            <label class="custom-control-label" for="20_payments">20 pagos</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="40_payments" name="payments" value="40">
                                            <label class="custom-control-label" for="40_payments">40 pagos</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="60_payments" name="payments" value="60">
                                            <label class="custom-control-label" for="60_payments">60 pagos</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="80_payments" name="payments" value="80">
                                            <label class="custom-control-label" for="80_payments">80 pagos</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="100_payments" name="payments" value="100">
                                            <label class="custom-control-label" for="100_payments">100 pagos</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="120_payments" name="payments" value="120">
                                            <label class="custom-control-label" for="120_payments">120 pagos</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="140_payments" name="payments" value="140">
                                            <label class="custom-control-label" for="140_payments">140 pagos</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="160_payments" name="payments" value="160">
                                            <label class="custom-control-label" for="160_payments">160 pagos</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="180_payments" name="payments" value="180">
                                            <label class="custom-control-label" for="180_payments">180 pagos</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="200_payments" name="payments" value="200">
                                            <label class="custom-control-label" for="200_payments">200 pagos</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <!--Reportes por fecha-->
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="nav-for-date">
                                <div class="row" id="report-date">
                                    <div class="col-xl-4">
                                        <input type="date" name="" id="for-date-report">
                                        <input type="hidden" name="" id="textbox-date">
                                    </div>
                                    <div class="col-xl-4 h5-payments">
                                            
                                    </div>
                                   <div class="col-xl-4 h5-sum-payments">
                                    
                                    </div>
                                </div>
                                <div class="row" id="sum-concept">
                                    <div class="col-xl-6">
                                        <h5 class="text-primary">SUMA POR CONCEPTO</h5>
                                        <ul id="sum-for-concept">
                                      
                                        </ul>
                                    </div>
                                </div> 
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="nav-for-concept">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <select class="browser-default custom-select mt-4" id="conceptos-report">
                                            <option selected disabled>Elige un concepto</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-6 h5-concept">
                                
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 h5-sum-concept">

                                    </div>
                                </div>
                                <div class="row">
                                    <select class="browser-default custom-select mt-4" id="list-sum-concept">
                                                
                                    </select>
                                    <div class="col-xl-6">
                                        <ul id="list-for-concept" class="mt-2">
                                      
                                        </ul>
                                    </div>
                                    <div class="col-xl-6" id="h5-sum-total-for-concept">
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="report-month" role="tabpanel" aria-labelledby="nav-dario">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <select class="browser-default custom-select mt-4" id="months">
                                            <option selected disabled>Selecciona el mes</option>
                                            <option value="1">ENERO</option>
                                            <option value="2">FEBRERO</option>
                                            <option value="3">MARZO</option>
                                            <option value="4">ABRIL</option>
                                            <option value="5">MAYO</option>
                                            <option value="6">JUNIO</option>
                                            <option value="7">JULIO</option>
                                            <option value="8">AGOSTO</option>
                                            <option value="9">SEPTIEMBRE</option>
                                            <option value="10">OCTUBRE</option>
                                            <option value="11">NOVIEMBRE</option>
                                            <option value="12">DICIEMBRE</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-6" id="h5-sum-month">
                                       
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-xl-12">
                        <h5 class="text-center text-primary" id="msj-cargando">Cargando Datos...</h5>
                        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Fecha de pago</th>
                                    <th>Matricula</th>
                                    <th>Nombre</th>
                                    <th>Carrera</th>
                                    <th>Sede</th>
                                    <th>Grado</th>
                                    <th>Grupo</th>
                                    <th>Turno</th>
                                    <th>Concepto</th>
                                    <th>Cantidad</th>
                                    <th>Costo</th>
                                    <th>Total</th>
                                    <th>Lugar de pago</th>
                                </tr>
                            </thead>
                            <tbody id="table-reports">

                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <?php require_once "includes/footer.php";?>
    <?php  require_once "includes/script.php";?>    
</body>

</html>