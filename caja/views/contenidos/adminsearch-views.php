<div class="container">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> <small> Usuarios Administradores</small></h1>
    </div>
 
</div>

<div class="d-flex justify-content-around container-fluid">
    <div class="breadcrumb">
        <div class="p-2"> 
            <a href="<?php echo SERVER?>admin" class="btn btn-info">
                <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO ADMINISTRADOR
            </a>
        </div>
            <div class="p-2">
            <a href="<?php echo SERVER?>listadmin" class="btn btn-success">
                <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ADMINISTRADORES
            </a>
        </div>
        <div class="p-2">
            <a href="<?php echo SERVER?>adminsearch" class="btn btn-primary">
                <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR ADMINISTRADOR
            </a>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="card-header text-white" style="background: #0b1a53;">
            <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR ADMINISTRADOR
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <div class="form-group label-floating">
                            <span class="control-label">¿A quién estas buscando?</span>
                            <input class="form-control" type="text" name="search_admin_init" required>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6">
                            <button type="submit" class="btn btn-block btn-primary"> <i class="zmdi zmdi-search"></i> &nbsp;Buscar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer text-muted text-center mt-5">
            Fecha de hoy <br> 4/06/2019
        </div>
    </div>
</div>
<?php require_once "views/modules/footer.php"?>