<div class="container">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> <small> Usuarios Alumnos</small></h1>
    </div>
    <p class="lead">Todas las personas que se registren en este formulario en automatico seran administradores, por lo cual tendrea que darles privilegios para manejar solo algunas
         funciones o si lo decea que tenga control total del sistema, <strong>se recomienda unicamente dar de alta como adminstradores al personal autorizado.</strong>
     </p>
</div>

<div class="d-flex justify-content-around container-fluid">
    <div class="breadcrumb">
            <div class="p-2">
            <a href="<?php echo SERVER?>alumnos" class="btn btn-success">
                <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ALUMNOS
            </a>
        </div>
        <div class="p-2">
            <a href="<?php echo SERVER?>alumnosearch" class="btn btn-primary">
                <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR ALUMNO
            </a>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="card-header text-white" style="background:  #009728;">
        <i class="zmdi zmdi-format-list-bulleted"></i>    LISTA DE LOS ALUMNOS
        </div>
        <div class="card-body">
        <div class="table-responsive">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">DNI</th>
                            <th class="text-center">NOMBRES</th>
                            <th class="text-center">APELLIDOS</th>
                            <th class="text-center">TELÉFONO</th>
                            <th class="text-center">A. CUENTA</th>
                            <th class="text-center">A. DATOS</th>
                            <th class="text-center">ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>7890987651</td>
                            <td>Nombres</td>
                            <td>Apellidos</td>
                            <td>Telefono</td>
                            <td>
                                <a href="#!" class="btn btn-success btn-raised btn-xs">
                                    <i class="zmdi zmdi-refresh"></i>
                                </a>
                            </td>
                            <td>
                                <a href="#!" class="btn btn-success btn-raised btn-xs">
                                    <i class="zmdi zmdi-refresh"></i>
                                </a>
                            </td>
                            <td>
                                <form>
                                    <button type="submit" class="btn btn-danger btn-raised btn-xs">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>7890987651</td>
                            <td>Nombres</td>
                            <td>Apellidos</td>
                            <td>Telefono</td>
                            <td>
                                <a href="#!" class="btn btn-success btn-raised btn-xs">
                                    <i class="zmdi zmdi-refresh"></i>
                                </a>
                            </td>
                            <td>
                                <a href="#!" class="btn btn-success btn-raised btn-xs">
                                    <i class="zmdi zmdi-refresh"></i>
                                </a>
                            </td>
                            <td>
                                <form>
                                    <button type="submit" class="btn btn-danger btn-raised btn-xs">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation example" id="paginacion">
  <ul class="pagination pagination-circle justify-content-center">
    <li class="page-item"><a class="page-link">First</a></li>
    <li class="page-item disabled">
      <a class="page-link" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item active"><a class="page-link">1</a></li>
    <li class="page-item"><a class="page-link">2</a></li>
    <li class="page-item"><a class="page-link">3</a></li>
    <li class="page-item"><a class="page-link">4</a></li>
    <li class="page-item"><a class="page-link">5</a></li>
    <li class="page-item">
      <a class="page-link" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link">Last</a></li>
  </ul>
</nav>
        </div>
        <div class="card-footer  text-muted text-center mt-5">
            <?php 
                require_once "views/modules/fecha.php"; 
                echo $date;
            ?>
        </div>
    </div>
</div>