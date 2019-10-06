  
var matricula = $("#myInputAlumnos");
var fertilizer = $("#costo-unitario"); //Variable para generar la referencia
var fertilizer_bd = $("#costo-letra"); //Variable que se guarda en base de datos
var concept = $("#clave_concepto");
var total_amount = $("#monto-total");
var cantidad = $("#quantity");
var description = $("#descripcion");
var cost = $("#unitario-costo");

$(document).ready(function () {
    
    searchStudentsData();
    savePaymentsManual();
    paymentTotal();
    subjects();
    paymentHistory();

    $("#hide").hide();
    $("#hide2").hide();
    $("#hide3").hide();
    $("#quantity").attr('readonly', true);
    $("#materias").hide();

    $("#card-historial").slideUp();
});

function studentsRegular(){

    var matricula = $("#myInputAlumnos").val();
    var name = $("#myInputSearchName").val();
    var apellido = $("#myInputSearchApellido").val();

    $("#tbodyAlumnos").empty();
    $.ajax({
        type: "POST",
        url: "../models/pagosManualModel.php",
        data: {
            "options": "students",
            "matricula": matricula,
            "name": "",
            "apellido": ""
        },
        dataType: "json",
        success: function (response) {
        
            table(response);
        }
    });

    $.ajax({
        type: "POST",
        url: "../models/pagosManualModel.php",
        data: {
            "options": "students",
            "matricula": "",
            "name": name,
            "apellido": apellido
        },
        dataType: "json",
        success: function (response) {
            console.log(response);
            table(response);
            $("#myInputAlumnos").val(response.students[0].matricula);
        }
    });
}

function table(data){

     var rows = data.students.length;
        
        for(row = 0; row < rows; row++){

            var tbody_students = "<tr><td>"+data.students[row].matricula+"</td>"+
                                    "<td>"+data.students[row].nombre+"</td>"+
                                    "<td>"+data.students[row].apellido_pat+"</td>"+
                                    "<td>"+data.students[row].apellido_mat+"</td>"+
                                    "<td>"+data.students[row].carrera+"</td>"+
                                    "<td>"+data.students[row].grado_actual+"</td>"+
                                "</tr>";

            $("#tbodyAlumnos").append(tbody_students);
        }
}

function paymentHistory(){

    $("#btn-history").click(function (e) { 
        e.preventDefault();

        $("#card-historial").slideDown();
        $("#card-pago").slideUp();
        
        var enrollments = matricula.val();

        $.ajax({
            type: "POST",
            url: "../models/pagosManualModel.php",
            data: {
                "options": "payment history",
                "mat": enrollments
            },
            success: function (response) {
                var json = JSON.parse(response);

                if(json.history_payment == "sin adeudo"){

                    console.log("no debe");
                }
                else{

                    var rows = json.history_payment.length;
                    for(row = 0; row < rows; row++){

                        var tbody_history = "<tr><td>"+json.history_payment[row].fecha_solicitud+"</td>"+
                                                "<td>"+json.history_payment[row].descripcion+"</td>"+
                                                "<td>"+json.history_payment[row].cantidad+"</td>"+
                                                "<td>"+json.history_payment[row].costo_unitario+"</td>"+
                                                "<td>"+json.history_payment[row].monto+"</td>"
                                            "</tr>";

                        $("#tbodyHistory").append(tbody_history);
                    }

                }


                /*var rows = json.history_payment.length;
                console.log(rows);*/
            }
        });
    });

    $("#btn-table").click(function (e) { 
        e.preventDefault();
        $("#card-historial").slideUp();
        $("#card-pago").slideDown();
        $("#tbodyHistory").empty();
    });
}
//Materias
function subjects(){

    $("#students-pagos").change(function (e) { 
        e.preventDefault();
        $("#btn-pagar").attr('disabled', false);
        var name_concept = $("#students-pagos option:selected").text();
        
        if(name_concept == "Examen extraordinario" || name_concept == "examen extraordinario" || name_concept == "Examen Extraordinario"){

            $("#materias").show();

            var enrollment = matricula.val();

              //Ajax para validad si puede pagar
            $.ajax({
                type: "POST",
                url: "../models/pagosManualModel.php",
                data: {
                    "options": "subjects default",
                    "mat": enrollment
                },
                dataType: "json",
                success: function (response) {
                
                switch(response.permit){

                        case "puede pagar":
                                $("#btn-pagar").attr('disabled', false);
                            break;

                        case "no puede pagar":
                                swal({
                                    title: "Materias reprobadas",   
                                    text: "El alumnno tiene mas materias reprobadas de las permitidas, por lo que no puede pagar",   
                                    type: "warning",      
                                    confirmButtonText: "Aceptar",
                                    allowOutsideClick: false
                                }).then(function (){  

                                    $("#btn-pagar").attr('disabled', true);
                                    document.getElementById("students-pagos").selectedIndex = "0";
                                   // $("#students-pagos").select2("val", '0',false);
                                
                                   concept.val("");
                                   description.val("");
                                   cost.val("");
                                   // matricula.val("");
                                
                                });
                            break
                    }
                }
            });
        }
        else{
            $("#materias").hide();
        }
    });

    $("#materias").click(function (e) { 
        e.preventDefault();
        
        $("#modal-materias").modal().show();

        var matri = matricula.val();

        //Ajax para las materias
        $.ajax({
            type: "POST",
            url: "../models/pagosManualModel.php",
            data: {
                "options": "subject",
                "matricula": matri
            },
            success: function (response) {
                var json = JSON.parse(response);
                console.log(json);
                var row = json.subjects.length;

                for(rows = 0; rows < row; rows++){

                    var final_score = (parseFloat(json.subjects[rows].cal_materia).toFixed(2));

                    var subjects = "<tr><td class='text-white'>"+json.subjects[rows].materia+"</td>"+
                                        "<td class='text-white'>"+json.subjects[rows].nombrecompleto+"</td>"+
                                        "<td class='text-white'>"+final_score+"</td>"+
                                    "</tr>";


                    $("#body-modal-materias").append(subjects);
                      
                    $("#body-modal-materias td").each(function(){

                        //Se parsea el texto para poder evaluar numericamente
                        if(parseFloat($(this).text()) < 8){

                            $(this).css("background-color", "#c9383a");

                        }

                    });
                    
                }

            }
        });

        //Ajax para grado, grupo y carrera
        $.ajax({
            type: "POST",
            url: "../models/pagosManualModel.php",
            data: {
                "options": "grades",
                "matri": matri
            },
            success: function (response){
                
                var grade = $("#grade-actual");
                var group = $("#grupo-actual");
                var carrer = $("#carrera-actual");

                var json = JSON.parse(response);
               
                grade.val(json.grades[0].grado_actual);
                group.val(json.grades[0].grupo);
                carrer.val(json.grades[0].carrera);

            }
        });

      
    });

    
    $("#btn-modal-materias").click(function (e) { 
        e.preventDefault();
        $("#modal-materias").modal().hide();
        $("#body-modal-materias").empty();

    });
}


function savePaymentsManual(){

    $("#btn-pagar").click(function (e) { 
        e.preventDefault();
      
        var textoAlerta = "El pago que estas realizando quedara guardado con los datos correspondientes";
        var key_people;
        var matri = matricula.val();
        var ferti = fertilizer.val();
        var ferti_bd = fertilizer_bd.val();
        var key_concept = concept.val();
        var abono = total_amount.val();
        var quantity = cantidad.val();
  

        //Ajax para la clave de persona
        $.ajax({
            type: "POST",
            url: "../models/pagosManualModel.php",
            data: {
                "options": "enrollments",
                "enrollment": matri
            },
            
            success: function (response) {
                console.log(response);
                var json = JSON.parse(response);
                key_people = json.key_student; 
            }
        });

        swal({
            title: "¿Estás seguro?",   
            text: textoAlerta,   
            type: "question",   
            showCancelButton: true,     
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar",
            allowOutsideClick: false
        }).then(function(){

            var name_concept = $("#students-pagos option:selected").text();
            

            if(key_concept == ""){

                swal({
                    title: "Error al guardar",   
                    text: "No has indicado el concepto que se quiere pagar, por favor selecciona alguno",   
                    type: "error",      
                    confirmButtonText: "Aceptar",
                    allowOutsideClick: false
                })
            }
            else if(matricula.val() == ""){

                swal({
                    title: "Error al guardar",   
                    text: "Escribe la matricula del alumno",   
                    type: "error",      
                    confirmButtonText: "Aceptar",
                    allowOutsideClick: false
                })
            }

            
            else if(name_concept == "Elige un concepto"){

                swal({
                    title: "Error al guardar",   
                    text: "No has indicado el concepto que se quiere pagar, por favor selecciona alguno",   
                    type: "error",      
                    confirmButtonText: "Aceptar",
                    allowOutsideClick: false
                })
            }

            else if(quantity == ""){
                swal({
                    title: "Error al guardar",   
                    text: "No has indicado la cantidad a pagar",   
                    type: "error",      
                    confirmButtonText: "Aceptar",
                    allowOutsideClick: false
                })
            }
            
            else{
                   //Ajax para guardar el pago
                $.ajax({
                    type: "POST",
                    url: "../models/pagosManualModel.php",
                    data: {
                        "options": "payment-manual",
                        "matricula": matri,
                        "key_people": key_people,
                        "fertilizer": ferti,
                        "fertilizer_bd": ferti_bd,
                        "key_concept": key_concept,
                        "abonos": abono,
                        "quantity": quantity

                    },
                    success: function (response) {
                        console.log(response);
                        if(response == "save payment"){
                        
                            swal({
                                title: "Proceso Satisfactorio",   
                                text: "El pago se realizo correctamente",   
                                type: "success",   
                                confirmButtonText: "Aceptar",
                                allowOutsideClick: false
                            }).then(function(){

                                location.reload();
                            })
                        }
                    }
                });
            }
        });

    });
}

//Funcion para busqueda de datos
function searchStudentsData(){

    $("#myInputAlumnos").keyup(function(){

        $("#myInputSearchApellido").val("");
        $("#myInputSearchName").val("");

        if($("#myInputAlumnos").val().length == 10){

            studentsRegular();
            $("#hide").show();
            $("#hide2").show();
            $("#hide3").show();
            document.getElementById("students-pagos").selectedIndex = "0";
        }
        else{
            $("#tbodyAlumnos").empty();
            $("#hide").hide();
            $("#hide2").hide();
            $("#hide3").hide();
        }

    });

    $("#myInputSearchApellido").keyup(function (e) { 

        if($("#myInputSearchApellido").val().length >=3){

            studentsRegular();
            $("#hide").show();
            $("#hide2").show();
            $("#hide3").show();
            document.getElementById("students-pagos").selectedIndex = "0";
        }
        else{
            $("#tbodyAlumnos").empty();
            $("#hide").hide();
            $("#hide2").hide();
            $("#hide3").hide();
        }
         
       
    });

    $("#myInputSearchName").keyup(function (e) { 
        $("#tbodyAlumnos").empty();
        $("#myInputAlumnos").val("");
     
    });
  }

  //Funcion para sacar el total del pago
  function paymentTotal(){

    $("#quantity").keyup(function (e) { 


        var letter_cost = fertilizer_bd.val();
        var quantity = $(this).val();

        var total_cost = letter_cost * quantity;

        total_amount.val(total_cost);

        $.ajax({
            type: "POST",
            url: "../views/includes/num_letra.php",
            data: {
                "numero": total_cost
            },
            success: function (data) {
                console.log(data);
                
                var str = data + " Pesos 00/100 M.N.";
                var res = str.toUpperCase();
                $("#total").val("$ "+total_cost + " ("+res+")");
            }
        });
        //Variables para la referencia bancaria
        var monto_total = $("#monto-total").val();
        var total = $("#monto");
        total.val("$ "+monto_total+".00");
        var costo = $("#costo-unitario");
        costo.val(monto_total+"00");
    });
  }