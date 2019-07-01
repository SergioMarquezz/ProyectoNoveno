var activo = $("#activo");
var cve_concepto = $("#concepto-pago");
var clave;
var activar;

$(document).ready(function () {

    $("#concepto-pago").select2({
        theme: "classic"    
    });

    selectConceptos();
    activarDesactivarConcepto();
    actualizar();
    unicoConcepto();
    
 
});

function unicoConcepto(){

    $("#concepto-pago").change(function (e) { 
        e.preventDefault();
   
    
        var cve_concepto = $(this).val();
        var clave_concepto = $("#clave");
        var costo = $("#monto");
        var concepto = $("#descripcion");
       
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

function actualizar(){

    $("#actualizar").click(function (e) { 
        e.preventDefault();
        clave = cve_concepto.val();
        activar = activo.val();

        var descripcion = $("#descripcion").val();
        var precio = $("#monto").val();

        console.log(clave);
        console.log(activar);
        $.ajax({
            type: "POST",
            url: "../models/conceptopagoModel.php",
            data: {
                "activar": activar,
                "clave-concepto": clave,
                "opcion": "guardar",
                "monto": precio,
                "texto": descripcion
            },
            success: function (response) {
                
                var json = JSON.parse(response); 
                
                if(json.respuesta == "actualizado"){
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
        }
        else{
            activo.val(0)
        }

        
    });

}