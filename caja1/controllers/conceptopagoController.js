var activo = $("#activo");
var cve_concepto = $("#concepto-pago");
var clave;
var activar;
var clave_concepto = $("#clave");
var costo = $("#monto");
var concepto = $("#descripcion");

$(document).ready(function () {

    $("#concepto-pago").select2({
        theme: "classic"    
    });

    selectConceptos();
    activarDesactivarConcepto();
    actualizar();
    unicoConcepto();
    nuevoConceptoAndCancelar();
    saveConcepto();
    
 
});

function unicoConcepto(){

    $("#concepto-pago").change(function (e) { 
        e.preventDefault();
   
        $("#actualizar").attr('disabled', false);
        $("#eliminar").attr('disabled', false);
        

        var cve_concepto = $(this).val();
        
       
       clave_concepto.val(cve_concepto);
  
        $.ajax({
            type: "POST",
            url: "../models/conceptopagoModel.php",
            data:{
              "clave-concepto": cve_concepto,
              "opcion": "unico concepto"
          },
            dataType: "json",
            success: function (response) {
                console.log(response);
                
                costo.val(response.unicoconcepto[0].costo_unitario);
                concepto.val(response.unicoconcepto[0].descripcion);
               
            }
        });
      
        
    });
  
      
  }


function nuevoConceptoAndCancelar(){

    $("#nuevo-concepto").click(function (e) { 
        e.preventDefault();

        var clave = $("#clave");
        
        $("#actualizar").attr('disabled', true);
        $("#guardar").attr('disabled', false);
        $("#cancel").attr('disabled', false);
        $("#concepto-pago").attr('disabled', true);
        $("#eliminar").attr('disabled', true);
        $(this).attr('disabled', true);
    
        costo.val("");
        concepto.val("");

        $.ajax({
            type: "POST",
            url: "../models/conceptopagoModel.php",
            data: {
                "clave-concepto": "",
                "opcion": "clave"
            },
            dataType: "json",
            success: function (data) {
            
                clave.val(data.sum.cve_concepto);
            }
        });
    });

    $("#cancel").click(function (e) { 
        e.preventDefault();

        $("#actualizar").attr('disabled', true);
        $("#guardar").attr('disabled', true);
        $("#concepto-pago").attr('disabled', false);
        $("#nuevo-concepto").attr('disabled', false);
        $(this).attr('disabled',true);

        clave_concepto.val("");
        costo.val("");
        concepto.val("");
    });
}

function saveConcepto(){

    $("#guardar").click(function (e) { 
        e.preventDefault();

        var llave = clave_concepto.val();
        var precio = costo.val();
        var des = concepto.val();
        var activar = activo.val();

        var form = $(".FormularioConceptos");
        var tipo=form.attr('data-form');

        var textoAlerta;

        clave = cve_concepto.val();
        activar = activo.val();

        var attr = form[0].attributes;

        var tipo = attr[1].nodeValue = "save";

        if(tipo==="save"){
            textoAlerta="El nuevo concepto sera guardado de manera correcta, estas seguro de continuar";
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

            $.ajax({
                type: "POST",
                url: "../models/conceptopagoModel.php",
                data: {
                    "clave-concepto": llave,
                    "opcion": "save",
                    "monto" : precio,
                    "texto": des,
                    "activar": activar
                },
                dataType: "json",
                success: function (response){

                    console.log(response);
                    
                    switch(response.respuesta){

                        case "precio vacio":
                                swal({
                                    title: "Costo sin asignar",   
                                    text: "Asigna el costo unitario para el concepto que deseas agregar",   
                                    type: "error",    
                                    confirmButtonText: "Aceptar",
                                    allowOutsideClick: false
                                });
                            break;
                        
                        case "sin descripcion":
                                swal({
                                    title: "La descripción esta vacia",   
                                    text: "Asigna el nuevo concepto para poder agregarlo",   
                                    type: "error",    
                                    confirmButtonText: "Aceptar",
                                    allowOutsideClick: false
                                });
                            break

                            default:
                                swal({
                                    title: "Registro Satisfactorio",   
                                    text: "El nuevo concepto fue agregado",   
                                    type: "success",    
                                    confirmButtonText: "Aceptar",
                                    allowOutsideClick: false
                                }).then(function (){

                                    location.reload();
                                })

                    }
                }
            });
        });

    });
}

function actualizar(){

    $("#actualizar").click(function (e) { 
        e.preventDefault();

        //var conceptos = $("#concepto-pago option:selected").html();
        var form = $(".FormularioConceptos");
        var tipo=form.attr('data-form');

        var textoAlerta;

        clave = cve_concepto.val();
        activar = activo.val();

        var precio = costo.val();
        var descripcion = concepto.val();

        var attr = form[0].attributes;

        var tipo = attr[1].nodeValue = "update";

        if(tipo==="update"){
            textoAlerta="El concepto sera modificado de manera correcta, estas seguro de continuar";
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

            $.ajax({
                type: "POST",
                url: "../models/conceptopagoModel.php",
                data: {
                    "activar": activar,
                    "clave-concepto": clave,
                    "opcion": "update",
                    "monto": precio,
                    "texto": descripcion
                },
                success: function (response) {
                    console.log(response);
                    var json = JSON.parse(response);
                    
                    
                    switch(json.respuesta){
    
                        case "sin seleccionar":
                                swal({
                                    title: "Ningún concepto seleccionado",   
                                    text: "Selecciona el concepto que deseas modificar",   
                                    type: "warning",     
                                    confirmButtonText: "Aceptar",
                                })
                            break;
    
                            default:
                                swal({
                                    title: "Modificación Satisfactoria",   
                                    text: "El registro fue modificado correctamente",   
                                    type: "success",     
                                    confirmButtonText: "Aceptar",
                                }).then(function (){
                                    //$('.FormularioAdmin')[0].reset();
                                });
    
    
                    }
                    
                }
            });

        });

        
    });
}

function selectConceptos(){

    $.ajax({
        type: "POST",
        url: "../models/conceptopagoModel.php",
        data:{
            "clave-concepto": "",
            "opcion": "llenar select"
        },
        dataType: "json",
        
        success: function (response) {
            console.log(response);
            $.each(response.pagoconcepto, function () { 
                 
                $("#concepto-pago").append("<option value="+this.cve_concepto+">"+this.descripcion+"</option>");
            });
          
        }
    });
}

function activarDesactivarConcepto(){


    if($(activo).is(':checked')){

        activo.val(1);
    }

    $("#activo").change(function (e) { 
        e.preventDefault();

        if($(activo).is(':checked')){
        
           activo.val(1)

           swal({
            type: 'info',
            title: 'Concepto Activado',
            showConfirmButton: false,
            timer: 2500
          })
        
        }
        else{
            activo.val(0)

            swal({
                type: 'info',
                title: 'Concepto Desactivado',
                showConfirmButton: false,
                timer: 2500
              })
        }

        
    });

}