$(document).ready(function () {
    
    studentsRegular();
    searchStudentsData();
    paymentsManual();

    $("#hide").hide();
    $("#hide2").hide();
    $("#hide3").hide();
});

function studentsRegular(){

    $.ajax({
        type: "POST",
        url: "../models/pagosManualModel.php",
        data: {
            "options": "students"
        },
        dataType: "json",
        success: function (response) {
        

            var rows = response.students.length;
          
            for(row = 0; row < rows; row++){

              var tbody_students = "<tr><td>"+response.students[row].matricula+"</td>"+
                                        "<td>"+response.students[row].nombre+"</td>"+
                                        "<td>"+response.students[row].apellido_pat+"</td>"+
                                        "<td>"+response.students[row].apellido_mat+"</td>"+
                                        "<td>"+response.students[row].carrera+"</td>"+
                                        "<td>"+response.students[row].grado_actual+"</td>"+
                                    "</tr>"

                $("#tbodyAlumnos").append(tbody_students);
            }
        }
    });
}

function paymentsManual(){

    $("#btn-pagar").click(function (e) { 
        e.preventDefault();
        
        var matricula = $("#myInputAlumnos").val();
        var textoAlerta = "El pago que estas realizando quedara guardado con los datos correspondientes";

        swal({
            title: "¿Estás seguro?",   
            text: textoAlerta,   
            type: "question",   
            showCancelButton: true,     
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar",
            allowOutsideClick: false
        })

        $.ajax({
            type: "POST",
            url: "../models/pagosManualModel.php",
            data: {
                "options": "enrollments",
                "enrollment": matricula
            },
            
            success: function (response) {
                var json = JSON.parse(response);
                console.log(json); 
            }
        });
    });
}

function searchStudentsData(){

    $("#myInputAlumnos").keyup(function(){

        _this = this;

        $.each($("#myTableAlumnos tbody tr"), function() {
            
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1){
                
                $(this).hide();
            }
            else{
                $(this).show();

                $("#hide").show();
                $("#hide2").show();
                $("#hide3").show();
            }
            
        });
    });
  }