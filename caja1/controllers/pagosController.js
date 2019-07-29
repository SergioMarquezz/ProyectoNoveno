 var file_cvs;

$(document).ready(function () {
 
    readCSV();
    searchData();
    seeData();
    uploadFile();
    $("#pagos-realizados").fadeOut();
        
});


function uploadFile(){

    $("#subir-archivo").click(function (e) { 
        e.preventDefault();

        var inputFileCsv = document.getElementById("subir-csv");
        var file = inputFileCsv.files[0];
        
        var dataForm = new FormData();
        dataForm.append('archivo', file);

        var url = "../views/includes/pagosVariable.php"

        $.ajax({
            type: "POST",
            url: url,
            data: dataForm,
            contentType: false,
            processData: false,
            cache: false, 
            success: function (response) {
                
                console.log(response);
            }
        });
    });
}

function seeData(){

    $("#leer-archivo").click(function (e) { 
        e.preventDefault();

        if(file_cvs == undefined){

            swal({
                title: 'Archivo no seleccionado',
                text: 'Selecciona un archivo para poder ver los datos',
                imageUrl: '../views/img/CSV.png',
                imageWidth: 400,
                imageHeight: 250,
                confirmButtonText: 'Aceptar',
                animation: false
              })
        }else{

            $("#pagos-realizados").fadeIn();
        }        
    });
}


function readCSV(){

    
    $("#leer-archivo").click(function (e) { 
        e.preventDefault();
        
        var file2 = $('#cvs');  
        var archivo = file2[0].files; 
        
        $.each(archivo, function () { 
             
            file_cvs = this.name;
        });


    $.ajax({
       
        type: "POST",
        data: {
            "csv": file_cvs,
            "option" : "read"
        },
        url: "../views/includes/pagosVariable.php",
        dataType: "json",
        success: function (response) {
            console.log(response);

            var filas = response.csv.length;

            for( i= 0; i < filas; i++){

                var tbody = "<tr><td>"+response.csv[i].id+"</td>"+
                                "<td>"+response.csv[i].date+"</td>"+
                                "<td>"+response.csv[i].refe+"</td>"+
                                "<td>"+response.csv[i].cve_concepto_pago+"</td>"+
                                "<td>"+response.csv[i].clave_matricula+"</td>"+
                                "<td>"+response.csv[i].cargo+"</td>"+
                                "<td>"+response.csv[i].abono+"</td>"+
                                "<td>"+response.csv[i].saldo+"</td>"+
                                "<td>"+response.csv[i].referencia+"</td>"+
                            "</tr>"
                $("#tbody").append(tbody);
            }
           
        }
    });



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

    



