
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
      <div class="background" style="background:  #4D9D29 ">
        
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
      <a href="<?php echo $_SESSION['name_admin'];?>" title="Salir del sistema" class="btn-exit-system text-white ml-5">
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
				<i class="fa fa-file text-white" style="font-size:20px"></i>Recibo de pago
			</a>
		</li>
		<li>
			<a href="conceptospago-views.php" class="text-white">
				<i class="zmdi zmdi-comment zmdi-hc-lg text-white" style="font-size:20px"></i>Conceptos de pago
			</a>
		</li>
		<li class="dropdown show">
			<a class="dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fa fa-graduation-cap text-white" style="font-size:18px"></i> Pagos de titulo
			</a>
			<ul class="dropdown-menu">
				<li>
					<a class="dropdown-item text-white" href="titulos-views.php">TSU</a>
				</li>
				<li>
					<a class="dropdown-item text-white" href="titulos-views.php">Ingeniería/Licenciatura</a>
				</li>
			</ul>
		</li>
		<li>
		<li class="dropdown show">
			<a class="dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fa fa-dollar text-white" style="font-size:20px"></i> Pagos de colegiatura
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="registroaspirantes-views.php" class="dropdown-item text-white">Registro de aspisrantes</a>
				</li>
				<li>
					<a href="inscripcion-views.php" class="dropdown-item text-white"> Inscripción</a>
				</li>
				<li>
					<a href="colegiatura-views.php" class="dropdown-item text-white" href="#">Reinscripción</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="#" class="text-white">
				<i class="fa fa-book text-white" style="font-size:20px"></i>Examen de nivelación
			</a>
		</li>
		<li>
			<a href="#" class="text-white">
				<i class="fa fa-building text-white" style="font-size:20px"></i>Sucursales
			</a>
		</li>
		<li>
			<a href="solicitudes-views.php" class="text-white">
				<i class="fa fa-file-pdf-o text-white" style="font-size:20px"></i>Generar Tramite
			</a>
		</li>
		<hr class="border-bottom">
		<li class="dropdown show">
			<a class="dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="zmdi zmdi-account-add zmdi-hc-fw text-white"  style="font-size:20px"></i> Usuarios
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
			<a class="dropdown-toggle text-white" href="#" role="button" id="report" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fa fa-pencil text-white"  style="font-size:20px"></i> Reportes
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