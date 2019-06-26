$(document).ready(function () {
    
    $.ajax({
        url: "../models/verificarSessionModel.php",
        
        success: function (response) {
            var json = JSON.parse(response); 

            if(json.session == false){

                window.location.href = "../index.php";
            }
        }
    });
});