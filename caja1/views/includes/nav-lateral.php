
<?php 
include "navbar.php";
if(!session_id()){
	session_start();
	//include "models/mainModel.php";

}

/*if( $_SESSION['tipo_admin'] == "Administrador"){
		
	$tipo_user = "admin";
}

else{

	$tipo_user = "alumno";
}*/
?>

  <ul id="slide-out" class="sidenav"> <!--sidenav-fixed-->
    <li><div class="user-view">
    <h6 class="mb-4 text-center text-white mt-5"><?php echo COMPANY; ?></h6>
      <div class="background">
        <img src="<?php echo SERVER;?>views/img/fondo-azul.jpg">
      </div>
      <img class="circle" src="img/logoHalcon.jpg"><img>

      <span class="white-text name"><?php echo $_SESSION['name_admin']?></span>

      <span class="white-text email">jdandturk@gmail.com</span>

      <a href="misdatos-views.php" title="Mis datos" class="text-white ml-5">

		<i class="zmdi zmdi-account-circle zmdi-hc-lg"></i>
	  </a>
      <a href="#" title="Mi cuenta" class="text-white ml-5">
	  	<i class="zmdi zmdi-settings zmdi-hc-lg"></i>
	  </a>
      <a href="<?php echo $_SESSION['cuenta_codigo_admin'];?>" title="Salir del sistema" class="btn-exit-system text-white ml-5">
				<i class="zmdi zmdi-power zmdi-hc-lg"></i>
			</a>
    </div></li>
    			<!-- SideBar Menu -->
	<ul class="">
		<li>
			<a href="principal-views.php" class="text-white">
				<i class="zmdi zmdi-view-dashboard zmdi-hc-lg text-white"></i> Inicio
			</a>
		</li>
		<li>
			<a href="bancos-views.php" class="text-white">
				<i class="zmdi zmdi-balance zmdi-hc-lg text-white"></i> Bancos
			</a>
		</li>
		<li>
			<a href="recibopago-views.php" class="text-white">
				<i class="fa fa-dollar text-white" style="font-size:20px"></i>Recibo de pago
			</a>
		</li>
		<li>
			<a href="conceptospago-views.php" class="text-white">
				<i class="zmdi zmdi-book-image zmdi-hc-fw text-white"></i>Conceptos de pago
			</a>
		</li>
		<li class="dropdown show">
			<a class="dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="zmdi zmdi-case zmdi-hc-fw text-white"></i> Pagos de titulo
			</a>
			<ul class="dropdown-menu">
				<li>
					<a class="dropdown-item text-white" href="titulos-views.php"><i class="zmdi zmdi-balance zmdi-hc-fw text-white"></i> TSU</a>
				</li>
				<li>
					<a class="dropdown-item text-white" href="titulos-views.php"><i class="zmdi zmdi-labels zmdi-hc-fw text-white"></i> Ingeniería/Licenciatura</a>
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
					<a href="registroaspirantes-views.php" class="dropdown-item text-white"><i class="zmdi zmdi-balance zmdi-hc-fw text-white"></i> Registro de aspisrantes</a>
				</li>
				<li>
					<a href="inscripcion-views.php" class="dropdown-item text-white"><i class="zmdi zmdi-balance zmdi-hc-fw text-white"></i> Inscripción</a>
				</li>
				<li>
					<a href="colegiatura-views.php" class="dropdown-item text-white" href="#"><i class="zmdi zmdi-balance zmdi-hc-fw text-white"></i> Reinscripción</a>
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
					<a href="admin-views.php" class="text-white"><i class="zmdi zmdi-account zmdi-hc-fw text-white"></i> Administradores</a>
				</li>
				<li>
					<a href="alumnos-views.php" class="text-white"><i class="zmdi zmdi-male-female zmdi-hc-fw text-white"></i> Alumnos</a>
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
					<a href="<?php echo SERVER?>admin" class="text-white"><i class="zmdi zmdi-account zmdi-hc-fw text-white"></i> </a>
				</li>
				<li>
					<a href="<?php echo SERVER?>alumnos" class="text-white"><i class="zmdi zmdi-male-female zmdi-hc-fw text-white"></i> </a>
				</li>
			</ul>
		</li>
	</ul>
    
  </ul>