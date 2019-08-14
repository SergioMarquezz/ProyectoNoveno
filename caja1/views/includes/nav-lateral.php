
<?php 
include "navbar.php";
if(!session_id()){
	session_start();
	//include "models/mainModel.php";

}

if(isset($_SESSION['tipo_admin']) == "Administrador"){
		
	$tipo_user = "admin";
	
}

elseif(isset($_SESSION['tipo_persona']) == 2){

	$tipo_user = "alumno";
}
elseif(isset($_SESSION['type_people']) == 1){
	
	$tipo_user = "aspirante";
}
else{

	$tipo_user = "personal utec";
}
?>

  <ul id="slide-out" class="sidenav"> <!--sidenav-fixed-->
    <li><div class="user-view">
    <h6 class="mb-4 text-center text-white mt-5"><?php echo COMPANY; ?></h6>
      <div class="background" style="background:  #4D9D29 ">
        
      </div>
      <img class="circle" src="img/logoHalcon.jpg"><img>

      <span class="white-text name"><?php echo $_SESSION['name_admin']?></span>

	  <span class="white-text email">jdandturk@gmail.com</span>
	  <input type="hidden" value="<?php echo $tipo_user?>" id="tipo-user">
	  <input type="text" id="key_people" value="<?php echo $_SESSION['clave_persona'] ?>">

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
			<a href="bancos-views.php" class="text-white" id="bank">
				<i class="zmdi zmdi-balance zmdi-hc-lg text-white"></i> Bancos
			</a>
		</li>
		<li id="recibo">
			<a href="recibopago-views.php" class="text-white">
				<i class="fa fa-file text-white" style="font-size:20px"></i>Recibo de pago
			</a>
		</li>
		<li>
			<a href="conceptospago-views.php" class="text-white" id="conceptos">
				<i class="zmdi zmdi-comment zmdi-hc-lg text-white" style="font-size:20px"></i>Conceptos de pago
			</a>
		</li>
		<li class="dropdown show" id="pago-title">
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
		<li class="dropdown show" id="colegiatura">
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
		<li id="nivelacion">
			<a href="#" class="text-white">
				<i class="fa fa-book text-white" style="font-size:20px"></i>Examen de nivelación
			</a>
		</li>
		<li>
			<a href="#" class="text-white" id="sucursales">
				<i class="fa fa-building text-white" style="font-size:20px"></i>Sucursales
			</a>
		</li>
		<li id="list-tramite">
			<a href="solicitudes-views.php" class="text-white">
				<i class="fa fa-file-pdf-o text-white" style="font-size:20px"></i>Generar Tramite
			</a>
		</li>
		<li>
			<a href="visualizar-pagos.php" class="text-white" id="archivos">
				<i class="fa fa-eye text-white" style="font-size:20px"></i>Archivos de Pagos
			</a>
		</li>
		<hr class="border-bottom">
		<li class="dropdown show" id="usuarios">
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
					<a href="<?php echo SERVER?>alumnos" class="text-white"><i class="zmdi zmdi-male-fe	male zmdi-hc-fw text-white"></i> </a>
				</li>
			</ul>
		</li>
	</ul>
    
  </ul>