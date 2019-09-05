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
    <title><?php echo ACRONYM;?> | CONCEPTOS</title>
    <?php include "includes/links.php"?> 
</head>
<header>
    <?php include "includes/nav-lateral.php"?> 
</header>
<body background="<?php echo SERVER;?>/views/img/logo-trasparencia.png">
    <div class="container title-container">
        <div class="page-header">
            <h4 class="text-titles mt-4"><i class=" fa fa-dollar"></i> PAGOS ALUMNOS</h4>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header text-white" style="background: #024a86;">
                <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO CONCEPTO DE PAGO
            </div>
            <div class="card-body">
               <form action="" data-form="update" method="" class="FormularioConceptos" autocomplete="off" enctype="multipart/form-data">
                    <div class="row">
                            <p style="font-size:18px;" class="mb-5">En este formulario podrás realizar de manera manual algún pago que requiera el alumnado,
                                                       cuando presiones el botón <strong>realizar pago</strong> los cambios surgieran efecto.
                            </p>
                            
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                <span class="control-label">Busqueda de alumno</span>
                                <input type="text" maxlength="10" id="myInputAlumnos" placeholder="Escribe la matricula">
                        </div>    
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mt-5">
                            <select class="browser-default custom-select" id="students-pagos">
                                <option selected disabled>Elige un concepto</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 mt-4">
                            <div class="form-group">
                                <input type="text" id="quantity" class="form-control text-dark" placeholder="Cantidad">
                            </div>
                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-header text-white" style="background: #024a86;">
                            <i class="zmdi zmdi-male-female zmdi-hc-fw text-white"></i> &nbsp; ALUMNOS
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                            <h5 class="mb-2">Alumnos de la sede de tulancingo</h5>
                                            <div class="form-group label-floating row">
                                                
                                                <div class="col-lg-6 mt-4">
                                                    <button id="materias" type="button" class="btn btn-blue">Ver materias</button>
                                                </div>
                                            </div>
                                                <div class="scroll-y scrollbar">
                                                    <table class="table-bordered table-responsive" id="myTableAlumnos">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" style="width: 10%;">Matricula</th>
                                                                <th class="text-center" style="width: 10%;">Nombre</th>
                                                                <th class="text-center" style="width: 10%;">Apellido Paterno</th>
                                                                <th class="text-center" style="width: 10%;">Apellido Materno</th>
                                                                <th class="text-center" style="width: 10%;">Carrera</th>
                                                                <th class="text-center" style="width: 10%;">Grado Actual</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbodyAlumnos">
                                                        </tbody>
                                                    </table>
                                                    <div class="row mt-5" id="hide">
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="clave" class="label-conceptos">Clave Concepto</label>
                                                                <input name="cve_concepto" type="text" id="clave_concepto" class="form-control text-dark" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="fecha_solcitud" class="label-solicitud">Fecha</label>
                                                                <input name="fecha-solicitud" type="text" value="<?php echo $fecha ?>" id="fecha_solcitud" class="form-control text-dark" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="hide2">
                                                        <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="descripcion" class="label-conceptos">Descripción</label>
                                                                <input type="text" id="descripcion" class="form-control text-dark" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="monto-total" class="label-conceptos">Monto total</label>
                                                                <input type="hidden" id="monto-total" class="form-control text-dark">
                                                                <input type="text" id="total" class="form-control text-dark" readonly>
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
                                                    <div class="panel-heading clearfix" id="hide3">
                                                        <div class="pull-right">
                                                            <button type="button" class="btn" id="btn-pagar">Realizar pago</button>
                                                        </div>
                                                    </div>
                                                <input type="hidden" id="tipo-persona">
                                                <input type="hidden" id="cve-persona">
                                                <input type="hidden" id="matricula-alumno">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <div class="modal" id="modal-materias">
        <div class="container-fluid">
            <h5 class="text-center text-white">Materias del cuatrimestre actual</h5>
            <div class="row">
                <div class="col-lg-1">
                    <div class="form-group">
                        <label for="grade-actual" class="label-grado">Grado</label>
                        <input type="text" id="grade-actual" class="form-control text-white" readonly>
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="form-group">
                        <label for="grupo-actual" class="label-grupo">Grupo</label>
                        <input type="text" id="grupo-actual" class="form-control text-white" readonly>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="form-group">
                        <label for="carrera-actual" class="label-carrera">Carrera</label>
                        <input type="text" id="carrera-actual" class="form-control text-white" readonly>
                    </div>
                </div>
            </div>
            <table class="mt-3 table-bordered">
            <thead>
                    <tr>
                        <th>MATERIA</th>
                        <th>PROFESOR</th>
                        <th>CALIFICACIÓN FINAL</th>
                    </tr>
            </thead>
                <tbody id="body-modal-materias">
                
                </tbody>
            </table>
            <div class="row">
                <div class="col-lg-6 mt-5">
                    <div class="label label-success pl-2 text-white" id="materias-reprobadas">Materias reprobadas</div>
                </div>
                <div class="col-lg-6 mt-4">
                    <button id="btn-modal-materias" class="btn btn-info btn-block">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "includes/footer.php";?>
    <?php  require_once "includes/script.php";?>
</body>
</html>