$(document).ready(function () {
    

    $.ajax({
        url: "../models/bancosModel.php",
        dataType: "json",
        success: function (response) {
            
            $.each(response.bancos, function (indexInArray, valueOfElement) { 
                 
                $("#bancos").append('<option>'+this.nombre_banco+'</option>');
            });
          
          //  console.log(response.bancos);
        }
    });
});