$(document).ready(function () {
    
    validarSoloNumbersLetters();
    //cargarTabla();
    iniciarSession();
    
});


function cargarTabla(){

    $("#dt-admin").DataTable();
}

function iniciarSession(){

    $("#btn-login").click(function (e) { 
        e.preventDefault();
        
        var user = $("#usuario").val();
        var pass = $("#contrasenia").val();

        $.ajax({
            type: "POST",
            url: "models/loginModel.php",
            data: {
                "usuario-login": user,
                "usuario-pass": pass
            },
            success: function (response) {
                if(response == "Administrador"){
                    swal({
                        title: "Acceso correcto",
                        text: "<strong>Tus credenciales que ingresaste son correctas, puedes entrar al sistema</strong>",
                        type: 'success',
                        confirmButtonColor: '#03A9F4',
                        confirmButtonText: ' Aceptar'
                  }).then(function () {
                      window.location.href="views/principal-views.php";
                  });
                }else{

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


function validarSoloNumbersLetters(){

    //Solo numeros
    $("#address, #telefono").keypress(function (e) { 
        
        if(event.charCode >= 48 && event.charCode <= 57){
            return true;
           }
           return false;

    });
    
    //Solo letras
    $("#nombre-admin, #apellidoP-admin, #apellidoM-admin, #streen, #col, #nombre-user, #usuario").keypress(function (e) { 
        
        if(event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode == 32){
            return true;
           }
           return false;
    });
}


