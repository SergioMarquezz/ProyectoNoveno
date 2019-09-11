<?php
   include "../core/configGeneral.php";
   include_once "../views/includes/inactividad.php";
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo ACRONYM;?> | PRINCIPAL</title>

    <?php include "includes/links.php"?> 
</head>
<header>
    <?php include "includes/nav-lateral.php"?> 
</header>

<body background="<?php echo SERVER;?>/views/img/logo-trasparencia.png">
<script src="../plugins/highcharts.js"></script>
<script src="../plugins/data.js"></script>
<script src="../plugins/drilldown.js"></script>


<div class="container title-container">
    <div class="page-header">
       <h1 class="text-titles"><small>Información General</small></h1>
    </div>
</div>
<hr>
<article>
    <div class="container-fluid">
    <div class="jumbotron">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="card border-success bg-light" style="width: 18rem;">
                    <div class="card-header text-white" style="background: #024a86;">Pagos pendientes</div>
                    <img class="card-img-top mt-3" src="img/logo.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Tramites o servicios pendientes por pagar</h5>
                        <p class="card-text" id="texto-pendientes"></p>
                    </div>
                    <ul class="list-group list-group-flush" id="lista-pendientes">
                      <!--  <li class="list-group-item border-success">Cras justo odio por $200</li>
                        <li class="list-group-item border-success">Dapibus ac fa   cilisis in</li>
                        <li class="list-group-item border-success">Vestibulum at eros</li>-->
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="card border-success bg-light" style="max-width: 18rem;">
                    <div class="card-header text-white" style="background: #024a86;">Pagos realizados</div>
                    <div class="view overlay">
                        <img class="card-img-top mt-3" src="img/logo.png" alt="Card image cap">
                        <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Mis pagos realizados durante el cuatrimestre actual</h4>
                        <p class="card-text">
                            Estimado alumno los pagos que ya hayas realizado apareceran cuando presiones el botón
                        </p>
                        <button type="button" class="btn" id="see-payments">Ver mis pagos</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <!--<div class="card border-success" style="max-width: 18rem;">
                    <div class="card-header text-white"style="background: #024a86;">Alumnos Regulares</div>
                    <div class="view overlay">
                        <img class="card-img-top" src="img/logo.png" alt="Card image cap">
                        <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Button</a>
                    </div>
                </div>-->
                <div class="card bg-light border-success" style="max-width: 18rem;">
                    <div class="card-header text-white"style="background: #024a86;">Tramites y/o servicios totales</div>
                    <div class="view overlay">
                        <img class="card-img-top mt-3" src="img/logo.png" alt="Card image cap">
                        <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Tramites y/o servicios que has realizado durante el cuatrimestre actual</h5>
                        <p class="card-text">Estimado alumno puedes ver todos aquellos tramites y servicios que has realizado presionando el botón</p>
                        <button id="btn-mas-informe" type="button" class="btn">
                            Ver mis tramites 
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <h5>Tramites y servicios realizados durante tu carrera</h5>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Periodo</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div> 
    </div>      
</article>
    <!--Modal tramites totales-->
   <div class="modal" id="modal-totales">
        <div class="container-fluid">
            <h5 class="text-center text-white">Mis tramites y servicios durante el cuatrimestre</h5>
            <table class="mt-3 table-bordered">
            <thead>
                    <tr>
                        <th>#</th>
                        <th>Fecha de solicitud</th>
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Pago Total</th>
                        <th>Estado</th>
                    </tr>
            </thead>
                <tbody id="body-modal">
                
                </tbody>
            </table>
            <div class="row justify-content-center">
                <div class="col-lg-3 mt-3">
                    <button id="btn-modal" class="btn btn-info btn-block">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    
    <!--Modal pagos realizados-->
    <div class="modal" id="modal-totales">
        <div class="container-fluid">
            <h5 class="text-center text-white">Mis tramites y servicios durante el cuatrimestre</h5>
            <table class="mt-3 table-bordered">
            <thead>
                    <tr>
                        <th>#</th>
                        <th>Fecha de solicitud</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                    </tr>
            </thead>
                <tbody id="body-modal">
                
                </tbody>
            </table>
            <div class="row justify-content-center">
                <div class="col-lg-3 mt-3">
                    <button id="btn-modal" class="btn btn-info btn-block">Aceptar</button>
                </div>
            </div>
        </div>
    </div>  

    <!--Div para la grafica-->
<!--<div id="container" style="width:100%; height:400px;"></div>-->

<?php require_once "includes/footer.php";?>
<?php  require_once "includes/script.php";?>

    
</body>
</html>


