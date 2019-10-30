$(document).ready(function () {
    
    selectBancos();
    bankUnique();
    hideAndShowModal();
    resetFormMain();
});


function selectBancos(){

    $.ajax({
        type: "POST",
        url: "../models/bancosModel.php",
        data:{
            opcion: "bancos",
            "bankos": ""
        },
        dataType: "json",
        
        success: function (response) {
            (response);
            $.each(response.bancos, function () { 
                 
                $("#bancos").append("<option value="+this.cve_banco+">"+this.nombre_banco+"</option>");
            });
          
        }
    });

}

function bankUnique(){

    
    $("#bancos").change(function (e) { 
        e.preventDefault();

        var cve_banco = $("#bancos").val();

        var abreviatura_banco = $("#abreviatura");
        var name_banco = $("#nombre-banco");
        var activo_banco = $("#activo");

        $.ajax({
            type: "POST",
            url: "../models/bancosModel.php",
            data: {
                "opcion": "bank",
                "bankos": cve_banco
            },
            dataType: "json",
            success: function (response) {

                (response);
                abreviatura_banco.val(response.bank[0].abreviatura);
                name_banco.val(response.bank[0].nombre_banco);
                
               if(response.bank[0].activo == 1){
                   activo_banco.val("Si");
               }else{
                    activo_banco.val("No");
               }
            }
        });
        
    });
}



function hideAndShowModal(){

    $("#selecion-concepto").click(function (e) { 
        e.preventDefault();
        $("#modal1").modal().show();
    });

    $("#aceptar-banco").click(function (e) { 
        e.preventDefault();

        $("#modal1").modal().hide();

        var abreviatura_banco = $("#abreviatura").val();
        var name_banco = $("#nombre-banco").val();
        var activo_banco = $("#activo").val();
        var clave_banco =  $("#bancos").val();

        $("#modal-bancos")[0].reset();

        $("#nombre-banco-principal").val(name_banco);
        $("#clave-banco-principal").val(clave_banco);
        $("#abre-banco-principal").val(abreviatura_banco);

        if(activo_banco == "Si"){
            
            $("#activo-banco-principal").attr('checked', true);
        }else{
            $("#activo-banco-principal").attr('checked', false);
        }
    });
}

function resetFormMain(){

    $("#nuevo, #cancelar").click(function (e) { 
        e.preventDefault();
        
        $("#bancos-principal")[0].reset();
        $("#activo-banco-principal").attr('checked', false);
    });
}