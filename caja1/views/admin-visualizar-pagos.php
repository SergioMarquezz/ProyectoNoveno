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
    <title><?php echo ACRONYM;?> | PAGOS</title>
    <?php include "includes/links.php"?> 
</head>
<header>
    <?php include "includes/nav-lateral.php"?> 
</header>
<body background="<?php echo SERVER;?>/views/img/logo-trasparencia.png">

    <div class="container title-container">
        <div class="page-header">
            <h4 class="text-titles mt-4"><i class="fa fa-eye"></i>ARCHIVOS DE PAGOS</h4>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header text-white" style="background: #024a86;">
                <i class="zmdi zmdi-view-headline"></i> &nbsp; Pagos Realizados
            </div>
            <div class="card-body">
                <section class="mb-5">
                    <div class="md-accordion accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <a id="reader_file" data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    <h5 class="mt-1 mb-0">
                                        <span>Subir Archivos</span>
                                        <i class="fa fa-angle-down rotate-icon"></i>
                                    </h5>
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                <div class="card-body">
                                    <form>
                                        <div class="file-field input-field">
                                            <div class="btn" id="btn-file">
                                                <span>Selecciona Archivo</span>
                                                <input type="file" id="subir-csv">
                                            </div>
                                            <div class="row">
                                                <div class="file-path-wrapper col-lg-4">
                                                    <input class="file-path" type="text" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-blue-grey" type="button" id="subir-archivo">Subir</button>         
                                    </form>
                                    <div id="myProgress">
                                            <div id="myBar">0%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingTwo">
                                <a id="folder-2" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo"
                                    aria-expanded="true" aria-controls="collapseTwo">
                                    <h5 class="mt-1 mb-0">
                                        <span>Leer Archivos</span>
                                        <i class="fa fa-angle-down rotate-icon"></i>
                                    </h5>
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="card-body">
                                <form action="#">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Archivo del banco</span>
                                            <input type="file" id="cvs">
                                        </div>
                                        <div class="row">
                                            <div class="file-path-wrapper col-lg-4">
                                                <input class="file-path" type="text" readonly>
                                            </div>
                                        </div>
                                    </div>
                                        <button class="btn btn-blue-grey" type="button" id="leer-archivo">Ver datos</button>     
                                    <div class="row" id="pagos-realizados">
                                        <div class="col-xl-12">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                <h5 class="mb-5">Pagos Realizados</h5>
                                                <div class="form-group label-floating row">
                                                    <div class="col-lg-6">
                                                        <span class="control-label">Busqueda de pagos</span>
                                                        <input type="text" id="myInput" placeholder="BUSCAR...">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="panel-heading clearfix">
                                                            <div class="pull-right mt-5">
                                                                <button class="btn btn-primary" id="save-datos">Guardar Datos</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="scroll-y scrollbar">
                                                        <table class="table-bordered table-responsive" id="myTable">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" style="width: 10%;">#</th>
                                                                    <th class="text-center" style="width: 10%;"> Fecha</th>
                                                                    <th class="text-center" style="width: 10%;"> Referencia </th>
                                                                    <th class="text-center" style="width: 10%;"> Pago </th>
                                                                    <th class="text-center" style="width: 10%;"> Matricula/Clave </th>
                                                                    <th class="text-center" style="width: 10%;"> Cargo </th>
                                                                    <th class="text-center" style="width: 10%;"> Abono </th>
                                                                    <th class="text-center" style="width: 10%;"> Saldo </th>
                                                                    <th class="text-center" style="width: 10%;"> Referencia Completa </th>
                                                                    <!--<th class="text-center" style="width: 10%;"> Agregado </th>
                                                                    <th class="text-center" style="width: 100px;"> Acciones </th>-->
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbody">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                       <!-- <div class="card">

                            <div class="card-header" role="tab" id="headingThree">

                            <div class="dropdown float-left">
                                <button class="btn btn-info btn-sm m-0 mr-3 p-2 dropdown-toggle" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-pencil-alt"></i>
                                </button>
                                <div class="dropdown-menu dropdown-info">
                                <a class="dropdown-item" href="#">Add new</a>
                                <a class="dropdown-item" href="#">Rename folder</a>
                                <a class="dropdown-item" href="#">Delete folder</a>
                                </div>
                            </div>

                            <a id="folder-3" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree"
                                aria-expanded="true" aria-controls="collapseThree">
                                <h5 class="mt-1 mb-0">
                                <span>Folder 3</span>
                                <i class="fas fa-angle-down rotate-icon"></i>
                                </h5>
                            </a>
                            </div>
                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. 3 wolf moon officia aute,
                                non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch
                                3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                accusamus
                                labore sustainable VHS.
                            </div>
                            </div>
                        </div>-->
                    </div>
                </section>
               
            </div>
            <div class="card-footer  text-muted text-center mt-5">
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