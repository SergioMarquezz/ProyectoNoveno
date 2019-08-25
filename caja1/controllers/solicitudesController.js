$(document).ready(function () {
    
    selectConcepto();
    conceptoUnico();
    enviarSolicitud();
    $("#solicitudes").select2({
        theme: "classic"    
    });

    $("#card-referencia").fadeOut();
});



function selectConcepto(){

   var type_user = $("#tipo-user").val();
    
   if(type_user == "aspirante"){

    $.ajax({
        type: "POST",
        url: "../models/solicitudesModel.php",
        data: {
            "clave": "",
            "option": "extra"
        },
        dataType: "json",
        success: function (response) {
            
            $("#solicitudes").append("<option value="+response.extraordinary.key+">"+response.extraordinary.concept+"</option>");
        }
    });
   }
   else{
       $.ajax({
        type: "POST",
        url: "../models/solicitudesModel.php",
        data:{
            "clave": "",
            "option": "conceptos"
        },
        dataType: "json",
        
        success: function (response) {
            console.log(response);

          
            $.each(response.concepto, function (){ 
                 
                $("#solicitudes").append("<option value="+this.cve_concepto+">"+this.descripcion+"</option>");
            });
          
        }
    });
   }
}



function conceptoUnico(){

  $("#solicitudes, #students-pagos").change(function (e) { 
      e.preventDefault();

  
      var cve_concepto = $(this).val();
      var clave_input = $("#clave_concepto");
      var costo = $("#costo-unitario");
      var unitario = $("#unitario-costo");
      var costo_letra = $("#costo-letra");

      //Variables para la referencia bancaria
      var texto = $("#descripcion");
      var total = $("#monto");
      var key_concepto = $("#claveconcepto");

      key_concepto.val(cve_concepto);

      $.ajax({
          type: "POST",
          url: "../models/solicitudesModel.php",
          data:{
            "clave": cve_concepto,
            "option": "select"
        },
          dataType: "json",
          success: function (response) {
              console.log(response);
             
         


              var costo_sin_decimal = (parseFloat(response.concept.costo_unitario).toFixed());

              costo.val(costo_sin_decimal + "00" );
              costo_letra.val(costo_sin_decimal);
              clave_input.val(cve_concepto);
              texto.val(response.concept.descripcion);
              total.val("$ "+response.concept.costo_unitario);

              if(response.concept.costo_unitario != ""){

                var num = costo_letra.val();

                $.ajax({
                    type: "POST",
                    url: "../views/includes/num_letra.php",
                    data: {
                        "numero": num
                    },
                    success: function (data) {
                        console.log(data);
                        
                        var str = data + " Pesos 00/100 M.N.";
                        var res = str.toUpperCase();
                        unitario.val("$ "+response.concept.costo_unitario + " ("+res+")");
                    }
                });
              }
          }
      });
    
      
  });

    
}

function enviarSolicitud(){

	$("#guardarSolicitud").click(function (e) { 
        e.preventDefault();

        var name_concepto = $("#solicitudes option:selected").html();

        var form=$(".FormularioSolicitud");

        var tipo=form.attr('data-form');

        var textoAlerta;
        if(tipo==="save"){
            textoAlerta="Tu tramite o servicio con el concepto de "+name_concepto+ " quedara guardado en automatico estas seguro de realizarlo";
        }

        swal({
            title: "¿Estás seguro?",   
            text: textoAlerta,   
            type: "question",   
            showCancelButton: true,     
            confirmButtonText: "Si",
            cancelButtonText: "No",
            allowOutsideClick: false
        }).then(function (){


        var tipo_persona = $("#tipo-persona").val(),
            cve_persona = $("#cve-persona").val(),
            precio = $("#costo-unitario").val(),
            fecha = $("#fecha_solcitud").val(),
            concepto = $("#clave_concepto").val(),
            matricula = $("#matricula-alumno").val();
        
        $.ajax({
            type: "POST",
            url: "../models/solicitudesModel.php",
            data: {
                "clave": "",
                "option": "save",
                "fecha-solicitud": fecha,
                "cve_tipo_persona": tipo_persona,
                "cve_persona": cve_persona,
                "precio": precio,
                "cve_concepto": concepto,
                "matricula": matricula            
            },
            success: function (response) {
                console.log(response);
                 var json = JSON.parse(response); 
                     console.log(json);

                switch(json.result){

                    case "solicitud guardada":
                            swal({
                                title: "Trámite o servicio guardado",   
                                text: "El tramite o servicio con el concepto de "+name_concepto+ " se ralizo satisfactoriamente",   
                                type: "success",     
                                confirmButtonText: "Aceptar",
                                allowOutsideClick: false
                            }).then(function (){
                                
                                swal({
                                    title: "Realizar pago",   
                                    text: "Para poder realizar el pago correspondiente la referencia bancaria sera generada",
                                    confirmButtonText: "Entendido",
                                    imageUrl: '../views/img/dinero.png',
                                    imageHeight: 150,
                                    allowOutsideClick: false
                                }).then(function (){

                                    referencias();    

                                });
                            
                            });
                        break;
                    
                    case "referencia existe":
                            swal({
                                title: "Solicitud ya realizada",   
                                text: "Tu solicitud con concepto: "+name_concepto+" para el dia de hoy ya fue realizada, la referencia bancaria correspondiente sera generada",   
                                type: "info",     
                                confirmButtonText: "Entendido",
                                allowOutsideClick: false
                            }).then(function(){

                              referencias();  
                            })
                        break;
                    
                    default:
                            swal({
                                title: "Concepto vacio",   
                                text: "Tu solicitud no tiene ningun concepto seleccionado, elige uno",   
                                type: "warning",     
                                confirmButtonText: "Aceptar",
                                allowOutsideClick: false
                            });
                }
            }
        });

        })

       
    });
}

function referencias(){

    var clave_person = $("#cve-persona").val();
    var clave_concepto = $("#clave_concepto").val();
    var referencia = $("#bancaria");
    
    $(".FormularioSolicitud").fadeOut();
    $("#card-referencia").fadeIn();
    
    $.ajax({
        type: "POST",
        url: "../models/solicitudesModel.php",
        data: {
            "option": "referencia",
            "cve-persona": clave_person,
            "clave" : clave_concepto
        },
        dataType: "json",
        success: function (response) {
            
            console.log(response);

            referencia.val(response.referencia.referencia);
        }
    });
}