<?php 
  require_once "../core/configGeneral.php";

?>
<footer class="page-footer font-small teal pt-4 mt-5">
  <div class="row justify-content-center container">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <h6 class="text-uppercase font-weight-bold text-center">Departamento De Sistemas y Soporte Técnico</h6>
      </div>
  </div>
  <div class="container-fluid text-center text-md-left">
    <div class="row">
      <div class="col-md-6 mt-md-0 mt-3">
        <h6 class="text-uppercase font-weight-bold">Universidad Tecnológica de Tulancingo</h6>
        <p class="pagina-utec">Pagina Oficial: <a href="https://www.utectulancingo.edu.mx/"  target="_blank" class="pagina-utec"> https://www.utectulancingo.edu.mx</a></p>
        <p class="pagina-utec"><a href="http://200.79.176.151/sigees/"  target="_blank" class="pagina-utec">Sistema de Gestión Escolar SIGES </a></p>
      </div>
      <hr class="clearfix w-100 d-md-none pb-3">
      <div class="col-md-6 mb-md-0 mb-3">
        <h6 class="text-uppercase font-weight-bold"><?php echo COMPANY;?></h6>
        <h6>Realizado por: Sergio Alberto Marquez Moreno<br> Sistemas y Soporte Técnico</h6>
        <p class="pagina-utec">Contacto de asistencia: sergiomarquez@utectulancingo.edu.mx</p>
      </div>
    </div>
  </div>
  <div class="footer-copyright text-center py-3 px-5">© <?php require_once "fecha.php"; echo $year;?>  Copyright
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6">
            <a href="https://github.com/SergioMarquezz" target="_blank" title="GitHub"><i class="fa fa-github redes-sociales"></i></a>
            <a href="https://www.facebook.com/sergio.marquez.775" target="_blank" title="Facebook"><i class="fa fa-facebook-square redes-sociales ml-3"></i></a>
            <a href="#" target="_blank" title="Twitter"><i class="fa fa-twitter-square redes-sociales ml-3"></i></a>
          </div>
        </div>
      </div>
  </div>
</footer>
