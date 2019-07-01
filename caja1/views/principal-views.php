<?php
   // require_once "ajax/verificarSession.php";
   include "../core/configGeneral.php";

    
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

<body background="<?php echo SERVER;?>/views/img/logo-utec-nuevo.png">
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
    <div class="container row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="card" style="max-width: 18rem;">
                <div class="card-header">Pagos Realizados</div>
                <div class="view overlay">
                    <img class="card-img-top" src="img/logo.png" alt="Card image cap">
                    <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="../pdf/html2PDF/pdf_prueba.php" class="btn btn-primary" target="_blank">Button</a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="card" style="max-width: 18rem;">
                <div class="card-header">Pagos a realizar</div>
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
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="card" style="max-width: 18rem;">
                <div class="card-header">Usuarios registrados</div>
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
            </div>
        </div>
    </div>        
</article>

<div id="container" style="width:100%; height:400px;"></div>

<?php require_once "includes/footer.php";?>
<?php  require_once "includes/script.php";?>

    
</body>
</html>


