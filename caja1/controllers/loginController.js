$(document).ready(function () {
    
    iniciarSession();
    iniciarSessionAlumno();
    typeUser();
});


function iniciarSessionAlumno(){

    $("#btn-login").click(function(e){
        e.preventDefault()
        var user = $("#usuario").val();
        var pass = $("#contrasenia").val();

        $.ajax({
            type: "POST",
            url: "models/loginModel.php",
            data: {
                "usuario-login": user,
                "usuario-pass": pass,
                "opcion": "Alumno"
            },
            success: function (response) {
                console.log(response);

                if(response == "alumno"){
                    
                    swal({
                        title: "Acceso correcto",
                        text: "<strong>Tus credenciales que ingresaste son correctas, has ingresado al sistema como alumno</strong>",
                        type: 'success',
                        confirmButtonColor: '#03A9F4',
                        confirmButtonText: ' Aceptar'
                  }).then(function () {
                      window.location.href="views/recibopago-views.php";
                      
                  });

              
                }
                else{
                    swal({
                        title: "Problemas al iniciar sesión",
                        text: "El nombre de usuario y contraseña no son correctos o tu cuenta puede estas desabilitada",
                        type: 'error',
                        confirmButtonColor: '#03A9F4',
                        confirmButtonText: ' Aceptar!'
                  })
                }
                
            }
        });
    });
}

function iniciarSession(){

    $("#login-btn").click(function (e) { 
        e.preventDefault();
        
        var user = $("#usuarios-admin").val();
        var pass = $("#pass-admin").val();

        $.ajax({
            type: "POST",
            url: "models/loginModel.php",
            data: {
                "usuario-login": user,
                "usuario-pass": pass,
                "opcion": "Admin"
            },
            success: function (response) {
                console.log(response);

                if(response == "Administrador"){
                     
                    swal({
                        title: "Acceso correcto",
                        text: "<strong>Tus credenciales que ingresaste son correctas, has ingresado al sistema como administrador</strong>",
                        type: 'success',
                        confirmButtonColor: '#03A9F4',
                        confirmButtonText: ' Aceptar'
                  }).then(function () {
                      window.location.href="views/principal-views.php";
                  });
                }else{
                        
                }
            }
        });
    });
}

function typeUser(){
    
    var tipo_user = $("#tipo-user").val();
    
    if(tipo_user == "admin"){

        $("#list-tramite").hide();
        $("#recibo").hide();
        $("#pago-title").hide();
        $("#colegiatura").hide();
        $("#nivelacion").hide();
    }

    else if(tipo_user == "alumno"){

        $("#bank").hide();
        $("#conceptos").hide();
        $("#sucursales").hide();
        //$("#archivos").hide();
        $("#usuarios").hide();
        $("#report").hide();
        $("hr").hide();
        
    }
}