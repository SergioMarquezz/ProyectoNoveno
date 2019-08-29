$(document).ready(function () {
    
    validarSoloNumbersLetters();
    //cargarTabla();
  //  iniciarSession();
    enviarForms();
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
                "usuario-pass": pass,
                "opcion": "Admin"
            },
            success: function (response) {
              
                console.log(response);
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
   /* $("#address, #telefono,[placeholder=Matricula], #myInputAlumnos, #quantity").keypress(function (e) { 
        
        if(event.charCode >= 48 && event.charCode <= 57){
            return true;
           }
           return false;

    });*/
    
    //Solo letras
   /* $("#nombre-admin, #apellidoP-admin, #apellidoM-admin, #streen, #col, #nombre-user, [placeholder=Usuario]").keypress(function (e) { 
        
        if(event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode == 32){
            return true;
           }
           return false;
    });*/
}

function enviarForms(){

	$('.FormularioAdmin').submit(function(e){
        e.preventDefault();

        var form=$(this);

        var tipo=form.attr('data-form');
        var accion=form.attr('action');
        var metodo=form.attr('method');
        var respuesta=form.children('.RespuestaAjax');


        var msjError="<script>swal('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";
        var formdata = new FormData(this);
 

        var textoAlerta;
        if(tipo==="save"){
            textoAlerta="Los datos que enviaras quedaran almacenados en el sistema";
        }


        swal({
            title: "¿Estás seguro?",   
            text: textoAlerta,   
            type: "question",   
            showCancelButton: true,     
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar"
        }).then(function () {
            $.ajax({
                type: metodo,
                url: accion,
                data: formdata ? formdata : form.serialize(),
                cache: false,
                contentType: false,
                processData: false,
                xhr: function(){ //Funcion que sirve para el tiempo de peticion al servidor
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                      if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);
                        if(percentComplete<100){
                        	respuesta.html('<p class="text-center">Procesado... ('+percentComplete+'%)</p><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width: '+percentComplete+'%;"></div></div>');
                      	}else{
                      		respuesta.html('<p class="text-center"></p>');
                      	}
                      }
                    }, false);
                    return xhr;
                },
                success: function (data) {
                    var json = JSON.parse(data); 
                    console.log(json);

                    switch(json.result){

                        case "datos vacios":
                                swal({
                                    title: "Nombre Incompleto",   
                                    text: "Algunos campos del nombre estan vacios, por favor llenelos",   
                                    type: "error",     
                                    confirmButtonText: "Aceptar",
                                })
                            break;
                        case  "address vacia":
                                swal({
                                    title: "Dirección Incompleta",   
                                    text: "Algunos campos de la dirección estan vacios, por favor llenalos",   
                                    type: "error",     
                                    confirmButtonText: "Aceptar",
                                })
                            break;
                        case  "cel vacio":
                                swal({
                                    title: "Contacto vacio",   
                                    text: "Por favor proporcione un numero de celular",   
                                    type: "error",     
                                    confirmButtonText: "Aceptar",
                                })
                            break;
                        case "genero vacio":
                                swal({
                                    title: "Error de genero",   
                                    text: "Por favor seleccione su genero (Masculino o Femenino)",   
                                    type: "error",     
                                    confirmButtonText: "Aceptar",
                                })
                            break;
                        case "privelegio vacio":
                                swal({
                                    title: "Nivel de privilegios sin asignar",   
                                    text: "Por favor asigne permisos al administrador del sistema",   
                                    type: "error",     
                                    confirmButtonText: "Aceptar",
                                })
                            break;
                        case "cuenta vacia":
                                swal({
                                    title: "Datos de la cuenta vacios",   
                                    text: "Algunos campos del registro de tu cuenta estan vacios, por favor llenalos",   
                                    type: "error",     
                                    confirmButtonText: "Aceptar",
                                })
                            break;
                        case "contraseñas incorrectas":
                                swal({
                                    title: "Error de contraseñas",   
                                    text: "Las contraseñas deben coincidir, por favor escribelas nuevamente",   
                                    type: "error",     
                                    confirmButtonText: "Aceptar",
                                })
                            break;
                        case "email encontrado":
                                swal({
                                    title: "Error de correo",   
                                    text: "El correo que ingreso ya esta registrado en el sistema.",   
                                    type: "error",     
                                    confirmButtonText: "Aceptar",
                                })
                            break;
                        case "user registrado":
                                swal({
                                    title: "Error en el nombre de usuario",   
                                    text: "El usuario que ingreso ya esta registrado en el sistema.",   
                                    type: "error",     
                                    confirmButtonText: "Aceptar",
                                })
                            break;
                        case "registro guardado":
                                swal({
                                    title: "Registro Satisfactorio",   
                                    text: "El usuario se registro como administrador en el sistema",   
                                    type: "success",     
                                    confirmButtonText: "Aceptar",
                                }).then(function (){
                                    $('.FormularioAdmin')[0].reset();
                                });
                            break;
                        default:
                                swal({
                                    title: "Error de registro",   
                                    text: "El usuario no se registro en el sistema",   
                                    type: "error",     
                                    confirmButtonText: "Aceptar",
                                })

                    }

                },
                error: function() {
                   // respuesta.html(msjError);
                }
            });
            return false;
        });
    });
}





