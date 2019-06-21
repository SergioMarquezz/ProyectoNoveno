
<?php 
include "navbar.php";

if(!session_id()){
	session_start();
}


?>

  <ul id="slide-out" class="sidenav"> <!--sidenav-fixed-->
    <li><div class="user-view">
    <h6 class="mb-4 text-center text-white"><?php echo COMPANY; ?></h6>
      <div class="background">
        <img src="<?php echo SERVER;?>views/assets/img/fondo-azul.jpg">
      </div>
      <a href="#user"><img class="circle" src="<?php echo SERVER;?>views/assets/img/logoHalcon.jpg"></a>
      <a href="#name"><span class="white-text name"><?php echo $_SESSION['name_admin']?></span></a>
      <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
      <a href="<?php echo SERVER ?>misdatos" title="Mis datos" class="text-white ml-5">
				<i class="zmdi zmdi-account-circle"></i>
			</a>
      <a href="#" title="Mi cuenta" class="text-white ml-5">
					<i class="zmdi zmdi-settings"></i>
			</a>
      <a href="#!" title="Salir del sistema" class="btn-exit-system text-white ml-5">
				<i class="zmdi zmdi-power"></i>
			</a>
    </div></li>
    			<!-- SideBar Menu -->
	<ul class="">
		<li>
			<a href="<?php echo SERVER ?>principal" class="text-white">
				<i class="zmdi zmdi-view-dashboard zmdi-hc-fw text-white"></i> Inicio
			</a>
		</li>
		<li>
			<a href="<?php echo SERVER ?>recibopago" class="text-white">
				<i class="zmdi zmdi-view-dashboard zmdi-hc-fw text-white"></i> Recibo de pago
			</a>
		</li>
		<li>
			<a href="<?php echo SERVER ?>conceptospago" class="text-white">
				<i class="zmdi zmdi-book-image zmdi-hc-fw text-white"></i>Conceptos de pago
			</a>
		</li>
		<li class="dropdown show">
			<a class="dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="zmdi zmdi-case zmdi-hc-fw text-white"></i> Pagos de titulo
			</a>
			<ul class="dropdown-menu">
				<li>
					<a class="dropdown-item text-white" href="<?php echo SERVER ?>titulos"><i class="zmdi zmdi-balance zmdi-hc-fw text-white"></i> TSU</a>
				</li>
				<li>
					<a class="dropdown-item text-white" href="<?php echo SERVER ?>titulos"><i class="zmdi zmdi-labels zmdi-hc-fw text-white"></i> Ingeniería/Licenciatura</a>
				</li>
			</ul>
		</li>
		<li>
		<li class="dropdown show">
			<a class="dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="zmdi zmdi-case zmdi-hc-fw text-white"></i> Pagos de colegiatura
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="<?php echo SERVER ?>registroaspirantes" class="dropdown-item text-white" href="#"><i class="zmdi zmdi-balance zmdi-hc-fw text-white"></i> Registro de aspisrantes</a>
				</li>
				<li>
					<a href="#" class="dropdown-item text-white" href="#"><i class="zmdi zmdi-balance zmdi-hc-fw text-white"></i> Inscripción</a>
				</li>
				<li>
					<a href="<?php echo SERVER ?>colegiatura" class="dropdown-item text-white" href="#"><i class="zmdi zmdi-balance zmdi-hc-fw text-white"></i> Reinscripción</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="#" class="text-white">
				<i class="zmdi zmdi-book-image zmdi-hc-fw text-white"></i>Examen de nivelación
			</a>
		</li>
		<li>
			<a href="#" class="text-white">
				<i class="zmdi zmdi-book-image zmdi-hc-fw text-white"></i>Sucursales
			</a>
		</li>
		<hr class="border-bottom">
		<li class="dropdown show">
			<a class="dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="zmdi zmdi-account-add zmdi-hc-fw text-white"></i> Usuarios
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="<?php echo SERVER?>admin" class="text-white"><i class="zmdi zmdi-account zmdi-hc-fw text-white"></i> Administradores</a>
				</li>
				<li>
					<a href="<?php echo SERVER?>alumnos" class="text-white"><i class="zmdi zmdi-male-female zmdi-hc-fw text-white"></i> Alumnos</a>
				</li>
			</ul>
		</li>
		<hr class="border-bottom">
		<li class="dropdown show">
			<a class="dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="zmdi zmdi-account-add zmdi-hc-fw text-white"></i> Reportes
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="<?php echo SERVER?>admin" class="text-white"><i class="zmdi zmdi-account zmdi-hc-fw text-white"></i> Administradores</a>
				</li>
				<li>
					<a href="<?php echo SERVER?>alumnos" class="text-white"><i class="zmdi zmdi-male-female zmdi-hc-fw text-white"></i> Alumnos</a>
				</li>
			</ul>
		</li>
	</ul>
    
  </ul>