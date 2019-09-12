  var file_cvs;

$(document).ready(function () {
 
    searchData();
    seeData();
    saveData();
    $("#pagos-realizados").fadeOut();

        
});



function uploadFile(){

            var elem = document.getElementById("myBar");
            var width = 10;
        
            var inputFileCsv = document.getElementById("cvs");
            var file = inputFileCsv.files[0];

            if(file.type == ""){
                var id = setInterval(frame, 100);
                
            }
            else{
                swal({
                    title: "Error en el archivo",
                    text: "El archivo seleccionado debe ser el que se descargo del banco",
                    type: 'error',
                    confirmButtonColor: '#03A9F4',
                    confirmButtonText: ' Aceptar!'
              });

        
            }
              
        function frame() {
            if (width >= 100) {
                clearInterval(id);
            
                 
                  var cero = width - 100;

                  elem.innerHTML = width - 100;
                  elem.style.width = cero;
                  $("#leer-archivo").attr('disabled', true);
                  $("#file-bank").attr('disabled', true); 
                  showTable();

            }  
            else {
                width++; 
                elem.style.width = width + '%'; 
                elem.innerHTML = width * 1  + '%' + ' Leyendo Archivo';
            }
        }   
}

function saveData(){

    $("#save-datos").click(function (e) { 
        e.preventDefault();


        $(this).attr('disabled', true);
       
        swal({
            title: "¿Estás seguro?",   
            text: "Los datos que se muestran en la tabla seran guardados",   
            type: "question",   
            showCancelButton: true,     
            confirmButtonText: "Si",
            allowOutsideClick: false
        }).then(function (){

            var inputFileCsv = document.getElementById("cvs");
            var file = inputFileCsv.files[0];

            var dataForm = new FormData();
            dataForm.append('archivo', file);
            dataForm.append('option', "upload");

            var url = "../views/includes/pagosVariable.php";

            $.ajax({
                type: "POST",
                url: url,
                data: dataForm,
                contentType: false,
                processData: false,
                cache: false, 
                success: function (response) {
                    console.log(response);
                    var json = JSON.parse(response); 
                    
                    if(json.upload == true){

                        var forms = new FormData();
                        forms.append('save-file', file);

                        $.ajax({
                            type: "POST",
                            url: "../models/insertModelPagos.php",
                            data: forms,
                            contentType: false,
                            processData: false,
                            cache: false, 
                            success: function (response) {
                                console.log(response);
            
                                if(response == "Guardado"){
            
                                    swal({
                                        title: "Proceso Satisfactorio",   
                                        text: "Los datos se han guardado correctamente",   
                                        type: "success",   
                                        confirmButtonText: "Aceptar",
                                        allowOutsideClick: false
                                    }).then(function (){
            
                                        location.reload();
                                    })
                                }
            
                            
                            }
                        });
                     
                    }
                    /*else if(json.upload == "El archivo existe"){

                        swal({
                            title: "Error en el archivo",
                            text: "El archivo seleccionado ya esta guardado",
                            type: 'error',
                            confirmButtonColor: '#03A9F4',
                            confirmButtonText: ' Aceptar!'
                      }).then(function (){
            
                        location.reload();
                    })
                    }*/
                }
            });
          
        },function(dismiss){
            if (dismiss === 'cancel'){

                location.reload();
            }
        })
    });
}

function showTable(){

    var inputFileCsv = document.getElementById("cvs");
    var file = inputFileCsv.files[0];

    var form = new FormData();
    form.append('files-read', file);
    form.append('option', "read");

$.ajax({

    type: "POST",
    data: form,
    url: "../views/includes/pagosVariable.php",
    contentType: false,
    processData: false,
    cache: false,
    success: function (response) {
        var json = JSON.parse(response);
      
       var filas = json.csv.length;
       

        for( i= 0; i < filas; i++){

            var tbody = "<tr><td for='id'>"+json.csv[i].id+"</td>"+
                            "<td for='id'>"+json.csv[i].date+"</td>"+
                            "<td for='id'>"+json.csv[i].refe+"</td>"+
                            "<td for='id'>"+json.csv[i].cve_concepto_pago+"</td>"+
                            "<td for='id'>"+json.csv[i].clave_matricula+"</td>"+
                            "<td for='id'>"+json.csv[i].cargo+"</td>"+
                            "<td for='id'>"+json.csv[i].abono+"</td>"+
                            "<td for='id'>"+json.csv[i].saldo+"</td>"+
                            "<td for='id'>"+json.csv[i].referencia+"</td>"+
                        "</tr>"
            $("#tbody").append(tbody);
        }
       
    }
});

    $("#pagos-realizados").fadeIn();
}

function seeData(){

    $("#leer-archivo").click(function(e){ 
        e.preventDefault();
        
      
        var file2 = $('#cvs');  
        var archivo = file2[0].files; 
        
        
        $.each(archivo, function () { 
             
            file_cvs = this.name;
           
        });

        console.log(file_cvs);
        if(file_cvs == undefined){

            swal({
                title: 'Archivo no seleccionado',
                text: 'Selecciona un archivo para poder ver los datos',
                imageUrl: '../views/img/txt-file.png',
                imageWidth: 400,
                imageHeight: 250,
                confirmButtonText: 'Aceptar',
                animation: false,
                allowOutsideClick: false
              })
        }else{

            uploadFile();

            }    
    });
}



function searchData() {

    $("#myInput").keyup(function(){

        _this = this;

        $.each($("#myTable tbody tr"), function() {
            
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1){
                
                $(this).hide();
            }
            else{
                $(this).show();
            }
            
        });
    });
  }

    



