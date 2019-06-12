<div class="container">
    <div class="page-header">
        <h4 class="text-titles mt-4"><i class="zmdi zmdi-bookmark"></i> Registro de Aspirantes</h4>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-header text-white" style="background: #0b1a53;">
            <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO RECIBO DE PAGO
        </div>
        <form action="">
            <div class="row mt-5">
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
            <div class="card-header">
                <h5 class="panel-title"><i class="fa fa-graduation-cap"></i> &nbsp; DATOS ESCOLARES</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <input type="number" id="form1" class="form-control">
                            <label for="form1">Folio CENEVAL</label>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-4">
                        <button class="btn btn-success" id="selecion-concepto" data-toggle="modal" data-target="#modal1">Aspirante</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <h5 class="text-center">Nombre Completo Del Aspirante</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="name-aspirante" class="form-control">
                            <label for="name-aspirante">Nombre(s)</label>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="apePaterno-aspirante" class="form-control">
                            <label for="apePaterno-aspirante">Apellido Paterno</label>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="apeMaterno-aspirante" class="form-control">
                            <label for="apeMaterno-aspirante">Apellido Materno</label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="unidad-academica" class="form-control">
                            <label for="unidad-academica">Unidad Academica</label>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="division" class="form-control">
                            <label for="division">División</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="carrera" class="form-control">
                            <label for="carrera">Carrera</label>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="prome-bachiller" class="form-control">
                            <label for="prome-bachiller">Promedio de Bachillerato</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <h5 class="panel-title"><i class="zmdi zmdi-comment"></i> &nbsp; CONCEPTO</h5>
            </div>
            <div class="card-body">
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
            </div>
            <div class="card-footer text-muted text-center">
                <?php 
                    require_once "views/modules/fecha.php"; 
                    echo $date;
                ?>
            </div>
        </form>
    </div>
</div>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
        <h4 class="text-white text-center mt-3">Registro De Aspirante</h4>
        <div class="modal-content modal-dialog cascading-modal modal-avatar">
            <div class="modal-header">
                <img src="<?php echo SERVER;?>views/assets/img/logoHalcon.jpg" alt="avatar" class="rounded-circle img-responsive">
            </div>
            <select class="browser-default custom-select">
                <option selected disabled>Elije una opción</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <p class="text-white text-center">Selecciona el concepto de pago con el cual deseas llenar el formulario
            <br>los datos apareceran en automatico, cuando presiones el botón de aceptar <br> el formulario principal sera llenado
        </p>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-lg-4 col-md-4 col-sm-12">
                <div class="md-form">
                    <input type="number" disabled id="clave-concepto" class="form-control">
                    <label for="clave-concepto" class="text-white">Folio CENEVAL</label>
                </div>
            </div>
        </div>
       <div class="container">
           <div class="row justify-content-center">
                <div class="col-xl-6">
                    <button class="btn btn-cyan modal-close waves-effect waves-green" id="aceptar">Aceptar</button>
                </div>
           </div>
       </div> 
  </div>
  <?php require_once "views/modules/footer.php";?>