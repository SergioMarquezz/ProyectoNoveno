  var file_cvs;

$(document).ready(function () {
 
    searchData();
    seeData();
    uploadFile();
    saveData();
    $("#pagos-realizados").fadeOut();
        
});



function uploadFile(){

    $("#subir-archivo").click(function (e) { 
        e.preventDefault();

        var file2 = $('#subir-csv');  
        var archivo = file2[0].files; 

        

        $.each(archivo, function () { 
             
            file_cvs = this.name;
        });

        if(file_cvs != undefined){
            
            var elem = document.getElementById("myBar");
            var width = 10;
          

            var inputFileCsv = document.getElementById("subir-csv");
            var file = inputFileCsv.files[0];

            console.log(file);

            if(file.type == ""){

                var id = setInterval(frame, 100);
                $("#subir-archivo").attr('disabled', true);
                $("#btn-file").attr("disabled", true);

            }else{
                
                swal({
                    title: 'Ocurrio un error',
                    text: "El archivo tiene extensión, verifique que sea el correcto",
                    type: 'error',
                    confirmButtonColor: '#ff0000',
                    confirmButtonText: "Aceptar",
                    allowOutsideClick: false
                });
            }

        function frame() {
            if (width >= 100) {
                clearInterval(id);
                  
                  $("#subir-archivo").attr('disabled', false);
                  $("#btn-file").attr("disabled", false);
                 
                  var cero = width - 100;

                  elem.innerHTML = width - 100;
                  elem.style.width = cero; 


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
        
                            swal({
                                title: 'Satisfactorio',
                                text: "El archivo fue subido correctamente",
                                type: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: "Aceptar",
                                allowOutsideClick: false
                            }).then(function(){

                              location.reload();
                            })
                        }
                    }
                });

            }  
            else {
                width++; 
                elem.style.width = width + '%'; 
                elem.innerHTML = width * 1  + '%' + ' Subiendo Archivo';
            }
        }   
        }else{
            swal({
                title: 'Archivo no seleccionado',
                text: 'Selecciona un archivo para poder realizar la subida',
                imageUrl: '../views/img/txt-file.png',
                imageWidth: 400,
                imageHeight: 250,
                confirmButtonText: 'Aceptar',
                allowOutsideClick: false,
                animation: false
              })
        }
    });
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
            cancelButtonText: "NO",
            allowOutsideClick: false
        }).then(function (){
            console.log(file_cvs);

            var inputFileCsv = document.getElementById("cvs");
            var file = inputFileCsv.files[0];

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
        })
    });
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

    



