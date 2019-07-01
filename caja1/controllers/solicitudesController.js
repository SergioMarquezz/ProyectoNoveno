$(document).ready(function () {
    
    selectConcepto();
    conceptoUnico();
    enviarSolicitud();
    $("#solicitudes").select2({
        theme: "classic"    
    });
});



function selectConcepto(){

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
            $.each(response.concepto, function () { 
                 
                $("#solicitudes").append("<option value="+this.cve_concepto+">"+this.descripcion+"</option>");
            });
          
        }
    });
}

function conceptoUnico(){

  $("#solicitudes").change(function (e) { 
      e.preventDefault();

     

      var cve_concepto = $(this).val();
      var clave_input = $("#clave_concepto");
      var costo = $("#costo-unitario");
        console.log(cve_concepto);
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
              clave_input.val(cve_concepto);
              costo.val(response.concept[0].costo_unitario);

              /*if(response.concept.activo == 1){
                  
              }*/
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
            textoAlerta="Tu solicitud con el concepto de "+name_concepto+ " quedara guardada en automatico estas seguro de realizarla";
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
            periodo = $("#cve-periodo").val(),
            precio = $("#costo-unitario").val(),
            fecha = $("#fecha_solcitud").val(),
            concepto = $("#clave_concepto").val();
        
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
                "cve_periodo": periodo,
                "cve_concepto": concepto            
            },
            success: function (response) {
                var json = JSON.parse(response); 
                console.log(json);

                switch(json.result){

                    case "solicitud guardada":
                            swal({
                                title: "Solicitud Guardada",   
                                text: "Tu solicitud con el concepto de "+name_concepto+ " se ralizo satisfactoriamente",   
                                type: "success",     
                                confirmButtonText: "Aceptar",
                                allowOutsideClick: false
                            }).then(function (){
                               
                                swal({
                                    title: "Realizar pago",   
                                    text: "Para poder ver tu documento solicitado es importante que realices tu pago de manera inmediata",   
                                    type: "warning",     
                                    confirmButtonText: "Aceptar",
                                    allowOutsideClick: false
                                }).then(function (){
                                    
                                    $('.FormularioSolicitud')[0].reset();
                                    $("#guardarSolicitud").hide();

                                    $("#buttons").append("<button class='btn btn-block btn-success'>Pagar Documento</button>");
                                });
                            });
                        break;
                }
            }
        });

        })

       
    });
}