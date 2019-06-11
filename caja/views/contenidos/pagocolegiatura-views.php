<div class="container">
    <div class="page-header">
        <h4 class="text-titles mt-4"><i class="zmdi zmdi-bookmark"></i> Cobros Colegiaturas</h4>
    </div>
</div>

<div class="container">
    <ul class="breadcrumb">
        <li>
            <div class="custom-control custom-radio">
                <input type="radio" disabled class="custom-control-input" id="radio-aspirantes" name="tipo-colegiatura">
                <label class="custom-control-label text-capitalize tipo" for="radio-aspirantes">
                    <a href="<?php echo SERVER;?>registroaspirantes" id="aspirantes" class="text-dark">Registro de aspirantes</a>
                </label>
            </div>
        </li>
        <li>
            <div class="custom-control custom-radio ml-1">
                <input type="radio" disabled class="custom-control-input" id="radio-inscripcion" name="tipo-colegiatura">
                <label class="custom-control-label tipo text-dark" for="radio-inscripcion">
                    <a href="#" id="inscripcion" class="text-dark">Inscrpción</a>
                </label>
            </div>
        <li>
            <div class="custom-control custom-radio ml-1">
                <input type="radio" disabled class="custom-control-input" id="radio-colegiatura" name="tipo-colegiatura">
                <label class="custom-control-label tipo text-dark" for="radio-colegiatura">
                    <a href="<?php echo SERVER?>colegiatura" id="colegiatura" class="text-dark">Colegiatura</a>
                </label>
            </div>
        </li>
        <li>
            <div class="custom-control custom-radio ml-1">
                <input type="radio" checked disabled class="custom-control-input" id="recibo-pago" name="tipo-colegiatura">
                <label class="custom-control-label text-capitalize tipo" for="recibo-pago">
                    <a href="<?php echo SERVER;?>pagocolegiatura" id="aspirantes" class="text-dark">Recibo De Pago</a>
                </label>
            </div>
        </li>
    </ul>
</div>
   
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO RECIBO DE PAGO</h5>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <label for="basic-url" class="text-dark labels-recibo">Fecha</label>
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <label for="basic-url" class="text-dark labels-recibo">Folio</label>
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <label for="basic-url" class="text-dark labels-recibo">Serie</label>
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form input-group">
                            <input type="text" id="form1" class="form-control">
                            <label for="form1">Por concepto de</label>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form input-group">
                            <input type="number" id="form1" class="form-control">
                            <label for="form1">Monto Total</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="defaultIndeterminate2" checked>
                        <label class="custom-control-label" for="defaultIndeterminate2">EFECTIVO</label>
                    </div>
                </div>

                <div class="container row">
                    <div class="col-md-4 mb-4">
                        <button type="button" class="btn btn-primary"><i class="fa fa-clipboard pr-2"></i>Nuevo recibo</button>
                    </div>
                    <div class="col-md-4 mb-4">
                        <button type="button" class="btn btn-primary"><i class="fa fa-inbox pr-2"></i>Guardar recibo</button>
                    </div>
                    <div class="col-md-4 mb-4">
                        <button type="button" class="btn btn-primary"><i class="fa fa-times pr-2"></i>Cancelar recibo</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer text-muted text-center">
            <?php 
                require_once "views/modules/fecha.php"; 
                echo $date;
            ?>
        </div>
    </div>
</div>
<?php require_once "views/modules/footer.php";?>