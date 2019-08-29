$(document).ready(function () {
    
    iniciarSessionAdmin();
    iniciarSessionAlumno();
    //loginCandidate();
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
                      window.location.href="views/principal-views.php";
                      
                  });

              
                }
                else{
                    messageError();
                }
                
            }
        });
    });
}

function iniciarSessionAdmin(){

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
                      window.location.href="views/admin-visualizar-pagos.php";
                  });
                }else{
                    messageError();
                }
            }
        });
    });
}


function loginCandidate(){

    $("#aspirantes-btn").click(function (e){ 
        e.preventDefault();

        var user = $("#usuarios-asipirante").val();
        var pass = $("#pass-asipirante").val();

        $.ajax({
            type: "POST",
            url: "models/loginModel.php",
            data: {
                "usuario-login": user,
                "usuario-pass": pass,
                "opcion": "aspirante"
            },
            success: function (response) {
                
                if(response == "aspirante"){
                    swal({
                        title: "Acceso correcto",
                        text: "<strong>Tus credenciales que ingresaste son correctas, en este momento eres aspirante</strong>",
                        type: 'success',
                        confirmButtonColor: '#03A9F4',
                        confirmButtonText: ' Aceptar'
                  }).then(function () {
                     window.location.href="views/principal-views.php";
                  });
                }else{
                    messageError();
                }
            }
        });
    });
}

function messageError(){

    swal({
        title: "Problemas al iniciar sesión",
        text: "El nombre de usuario y contraseña no son correctos o tu cuenta puede estas desabilitada",
        type: 'error',
        confirmButtonColor: '#03A9F4',
        confirmButtonText: ' Aceptar!'
  });
}

function typeUser(){
    
    var tipo_user = $("#tipo-user").val();
    
    if(tipo_user == "admin"){

        //TODO:Solo se van a ocultar por un rato en lo que se programan
        $("#list-tramite").hide();
        $("#recibo").hide();
        $("#pago-title").hide();
        $("#colegiatura").hide();
        $("#nivelacion").hide();
        $("#dasboard").hide();
        $("#bank").hide();
        $("#recibo_pay").hide();
        $("#sucursales").hide();
        $("#students").hide();
        $("#reports").hide();
        $("#mydata").hide();
        $("#usuarios").hide();
        $("hr").hide();
    }

    else if(tipo_user == "alumno"){

        $("#bank").hide();
        $("#conceptos").hide();
        $("#sucursales").hide();
        $("#archivos").hide();
        $("#usuarios").hide();
        $("#report").hide();
        $("hr").hide();
        $("recibo_pay").hide();
        $("#pago-title").hide();
        $("#recibo").hide();
        $("#colegiatura").hide();
        $("#payments-manual").hide();        
    }
    else{
        $("#pago-title").hide();
        $("#colegiatura").hide();
        $("#nivelacion").hide();
        $("#bank").hide();
        $("#recibo").hide();
        $("#conceptos").hide();
        $("#sucursales").hide();
       // $("#archivos").hide();
        $("#usuarios").hide();
        $("#report").hide();
        $("hr").hide();
    }
}