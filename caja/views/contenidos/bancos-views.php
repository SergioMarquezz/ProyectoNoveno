<div class="container title-container">
    <div class="page-header">
        <h4 class="text-titles mt-4"><i class="zmdi zmdi-bookmark"></i>  BANCOS</h4>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-header text-white" style="background: #0b1a53;">
            <i class="zmdi zmdi-plus"></i> &nbsp; REGISTRAR NUEVO BANCO
        </div>
        <div class="card-body">
            <form action="" >
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <input type="number" id="form1" class="form-control">
                            <label for="form1">Clave</label>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-4">
                        <button class="btn btn-success" id="selecion-concepto" data-toggle="modal" data-target="#modal1">Selecciona Banco</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <input type="text" id="form2" class="form-control">
                            <label for="form1">Nombre</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <input type="number" id="form" class="form-control">
                            <label for="form1">Abreviatura</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="defaultIndeterminate2">
                            <label class="custom-control-label" for="defaultIndeterminate2">ACTIVO</label>
                        </div>
                    </div>
                </div>

                <div class="container row">
                    <div class="col-md-4 mb-4">
                        <button type="button" class="btn btn-primary"><i class="fa fa-clipboard pr-2"></i>Nuevo</button>
                    </div>
                    <div class="col-md-4 mb-4">
                        <button type="button" class="btn btn-primary"><i class="fa fa-inbox pr-2"></i>Guardar</button>
                    </div>
                    <div class="col-md-4 mb-4">
                        <button type="button" class="btn btn-primary"><i class="fa fa-times pr-2"></i>Cancelar</button>
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
  <!-- Modal Structure -->
  <div id="modal1" class="modal">
  <h4 class="text-white text-center mt-3">Bancos registrados</h4>
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
        <div class="row">
            <div class="col-lg-4 col-lg-4 col-md-4 col-sm-12">
                <div class="md-form">
                    <input type="number" disabled id="clave-concepto" class="form-control">
                    <label for="clave-concepto" class="text-white">Nombre</label>
                </div>
            </div>
            <div class="col-lg-4 col-lg-4 col-md-4 col-sm-12">
                <div class="md-form">
                    <input type="number" disabled id="costo-concepto" class="form-control">
                    <label for="costo-concepto" class="text-white">Abreviatura</label>
                </div>
            </div>
            <div class="col-lg-4 col-lg-4 col-md-4 col-sm-12">
                <div class="md-form">
                    <input type="text" disabled id="activo-concepto" class="form-control">
                    <label for="activo-concepto" class="text-white">Activo</label>
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