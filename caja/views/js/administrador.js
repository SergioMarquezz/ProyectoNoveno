$(document).ready(function () {
    
    validarSoloNumbersLetters();
    //cargarTabla();
});


function cargarTabla(){

    $("#dt-admin").DataTable();
}


function validarSoloNumbersLetters(){

    $("#address, #telefono").keypress(function (e) { 
        
        if(event.charCode >= 48 && event.charCode <= 57){
            return true;
           }
           return false;

    });
    
    $("#nombre-admin, #apellidoP-admin, #apellidoM-admin, #streen, #col, #nombre-user").keypress(function (e) { 
        
        if(event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122){
            return true;
           }
           return false;
    });
}
