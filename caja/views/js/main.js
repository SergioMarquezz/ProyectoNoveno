$(document).ready(function(){

	$('.sidenav').sidenav();

	$("#selecion-concepto").click(function (e) { 
		e.preventDefault();
	});

	salir();
});
(jQuery);

function salir(){

	$('.btn-exit-system').on('click', function(e){
		e.preventDefault();
		swal({
		  	text: "<strong>¿Estas seguro de querer salir del sistema?</strong>",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#03A9F4',
		  	cancelButtonColor: '#F44336',
		  	confirmButtonText: '<i class="zmdi zmdi-run"></i> Si, Salir!',
		  	cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!'
		}).then(function () {
			window.location.href="index.php";
		});
	});
}




