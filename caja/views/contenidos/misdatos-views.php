<div class="container">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-account-circle zmdi-hc-fw"></i> <small> MIS DATOS</small></h1>
    </div>
    <hr class="">
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptas reiciendis tempora voluptatum eius porro ipsa quae voluptates officiis sapiente sunt dolorem, velit quos a qui nobis sed, dignissimos possimus!</p>
</div>

<div class="container">
    <div class="card">
        <div class="card-header text-white" style="background: #0b1a53;">
            <i class="zmdi zmdi-refresh"></i> &nbsp; MIS DATOS
        </div>
        <div class="card-body">
            <form action="">
                <h5 class="mb-5"><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</h5 class="mb-5">
                <h6>Matricula</h6>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="md-form">
                            <input type="number" id="form1" class="form-control">
                            <label for="form1"></label>
                        </div>
                    </div>
                </div>
                <h6>Nombre Completo</h6>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="form1" class="form-control">
                            <label for="form1">Nombre(s)</label>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="form1" class="form-control">
                            <label for="form1">Apellido Paterno</label>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="form1" class="form-control">
                            <label for="form1">Apellido Materno</label>
                        </div>
                    </div>
                </div>
                <h6>Contacto</h6>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <input type="tel" id="form1" class="form-control">
                            <label for="form1">Telefono Personal</label>
                        </div> 
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <input type="tel" id="form1" class="form-control">
                            <label for="form1">Correo Electronico</label>
                        </div> 
                    </div>                                 
                </div>
                <h6>Dirección</h6>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="form1" class="form-control">
                            <label for="form1">Calle</label>
                        </div> 
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="form1" class="form-control">
                            <label for="form1">Colonia</label>
                        </div> 
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="form1" class="form-control">
                            <label for="form1">Numero</label>
                        </div> 
                    </div>
                </div>
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-xl-6">
                            <button type="button" class="btn btn-block btn-primary"><i class="zmdi zmdi-refresh"></i> Actualizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer text-muted text-center mt-5">
            <?php 
                require_once "views/modules/fecha.php"; 
                echo $date;
            ?>
        </div>
    </div>
</div>

<?php require_once "views/modules/footer.php"?>