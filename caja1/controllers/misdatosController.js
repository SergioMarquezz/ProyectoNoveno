$(document).ready(function () {
    
    var nombre = $("#name");

    $.ajax({
        url: "../models/misdatosModel.php",
        success: function (response) {
            var json = JSON.parse(response); 
            console.log(json);

            nombre.val(json.admin.nombre);
        }
    });
});