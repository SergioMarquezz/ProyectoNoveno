<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo ACRONYM;?> | UTEC</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
	<?php include "views/modules/links.php"?> 
</head>
<body background="<?php echo SERVER;?>views/assets/img/logo-utec-nuevo.png">

	<?php
		
		$peticion = false;
	

		require_once "controllers/viewsControllers.php";

		$vt = new ViewController();
		$views_response = $vt->obtenerViewsControllers();

		if($views_response == "login" || $views_response == "404"):

			if($views_response == "login"){
				
				require_once "views/contenidos/login-views.php";
			}else{
				require_once "views/contenidos/404-views.php";
			}
		
		else:
			session_start();
			

			if(!isset($_SESSION['name_admin']) || !isset( $_SESSION['name_user'])){

			//	require_once "../ajax/cerrarSessionAjax.php";
			}
	?>

	<!-- SideBar -->
    <?php include "views/modules/nav-lateral.php"; ?>

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		
		
		<!-- Content page -->
		<?php  require_once $views_response; ?>
		
		
	</section>

	<?php  endif?>
	
	<!--====== Scripts -->
	<?php  require_once "views/modules/script.php";?>
	
	
</body>

</html>