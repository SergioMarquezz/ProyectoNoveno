<div class="container mt-5">
    <div class="card">
        <div class="card-header text-white" style="background: #0b1a53;">
            <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO RECIBO DE PAGO
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