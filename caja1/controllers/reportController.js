var url_model = "../models/reportsModel.php";
var input_date = $('#textbox-date');
var input_diario = $("#textbox-date-diario");
var value;

$(document).ready(function () {
    
    $("#msj-cargando").hide();
    $("#sum-concept").slideUp();
    $("#list-sum-concept").hide();
    navsReports();
    reportsTotals();
    tops();
    reportForDate();
    paymentKey();
    reportMonth();
});

function navsReports(){

   $("#nav-total-pagos").click(function (e) { 
       e.preventDefault();
       
       $("#table-reports").empty();
       $(".h5-payments").html("");
       $(".h5-sum-payments").html("");
       $("#for-date-report").val("");
       $("#sum-concept").slideUp();

       $(".h5-concept").html("");
       $(".h5-sum-concept").html("");
       $("#h5-sum-total-for-concept").html("");
       $("#list-for-concept").empty();

       $('#conceptos-report option').eq(0).prop('selected', true);
      
       $("#conceptos-report option").removeAttr('disabled');
       
       $("#list-sum-concept option").remove();

   });

   $("#nav-for-date").click(function (e) { 
       e.preventDefault();
       $("#table-reports").empty();
       $(".h5-concept").html("");
       $(".h5-sum-concept").html("");
       $("#h5-sum-total-for-concept").html("");

       $("#list-for-concept").empty();

       $('#conceptos-report option').eq(0).prop('selected', true);

       $("#conceptos-report option").removeAttr('disabled');
       
       $("#list-sum-concept option").remove();
   });

   $("#nav-for-concept").click(function (e) { 
       e.preventDefault();
       
       $("#table-reports").empty();
       $(".h5-payments").html("");
       $(".h5-sum-payments").html("");
       $("#for-date-report").val("");
       $("#sum-concept").slideUp();

   });

   $("#nav-month").click(function (e) { 
       e.preventDefault();
       $("#table-reports").empty();
       $(".h5-payments").html("");
       $(".h5-sum-payments").html("");
       $("#for-date-report").val("");
       $("#sum-concept").slideUp();

       $('#conceptos-report option').eq(0).prop('selected', true);

       $("#conceptos-report option").removeAttr('disabled');
       
       $("#list-sum-concept option").remove();

       $(".h5-concept").html("");
       $(".h5-sum-concept").html("");
       $("#h5-sum-total-for-concept").html("");

       $("#list-for-concept").empty();

   });
}

function paymentKey(){

    $("#conceptos-report").change(function (e) { 
        e.preventDefault();
        
        var key_concept = $("#conceptos-report").val();
        $("#table-reports").empty();
      
        $.ajax({
            type: "POST",
            url: url_model,
            data: {
                "opt": "paymet concept",
                "num_top": "",
                "key" : key_concept
            },
            dataType: "json",
            success: function (response) {
                
                tablePayments(response);

                $.ajax({
                    type: "POST",
                    url: url_model,
                    data: {
                        "opt": "count key",
                        "key_count": key_concept,
                        "num_top": "",
                        "distinto" : "count key"
                    },
                    success: function (response) {
                        $(".h5-concept").html("<h5 class='text-primary'>PAGOS REALIZADOS POR CONCEPTO "+response+"</h5>");
                    }
                });

                $.ajax({
                    type: "POST",
                    url: url_model,
                    data: {
                        "opt": "count key",
                        "key_count": key_concept,
                        "num_top": "",
                        "distinto" : "sum key"
                    },
                    dataType:"json",
                    success: function (response) {

                        var sum_sin_decimal = (parseFloat(response.sum_concept).toFixed());
                        (response);

                        $.ajax({
                            type: "POST",
                            url: "../views/includes/num_letra.php",
                            data: {
                                "numero": sum_sin_decimal
                            },
                          
                            success: function (data) {
                                
                                $(".h5-sum-concept").html("<h5 class='text-primary'>SUMA DE PAGOS POR CONCEPTO $"+response.sum_concept+" ("+data+" pesos)</h5>");
                            }
                            
                        });


                        var options = "<option value='"+response.sum_concept+"'>"+response.sum_concept+"</option>";

                       $("#list-sum-concept").append(options);

                        var index = document.getElementById("conceptos-report").selectedIndex;
                        document.getElementById("conceptos-report").options[index].disabled = true;

                        var list = "<li class='list-group-item list-group-item-success text-dark'>"+response.description+"&nbsp;| $"+response.sum_concept+"</li>";
                        $("#list-for-concept").append(list);

                        var suma = 0;

                        $("#list-sum-concept option").each(function(){
                
                            suma += parseInt($(this).attr('value'))
                            
                         });
                    
                         $.ajax({
                             type: "POST",
                             url: "../views/includes/num_letra.php",
                             data: {
                                 "numero": suma
                             },
                             success: function (response) {
                                $("#h5-sum-total-for-concept").html("<h5 class='text-primary'>SUMA TOTAL DE CONCEPTOS $"+suma+" ("+response+ " pesos)</h5>");
                             }
                         });
                    }
                });
            }
        });
    });

}


function reportMonth(){

    $("#months").change(function (e) { 
        e.preventDefault();
    
        var month_value = $(this).val();
        $("#table-reports").empty();

        $.ajax({
            type: "POST",
            url: url_model,
            data: {
                "opt": "payment month",
                "months": month_value,
                "num_top": "",
                "distinto": "report month"
            },
            dataType: "json",
            success: function (response) {

                tablePayments(response)
            }
        });
    
        $.ajax({
            type: "POST",
            url: url_model,
            data: {
                "opt": "payment month",
                "months": month_value,
                "num_top": "",
                "distinto": "month count and sum"
            },
            dataType: "json",
            success: function (response) {
                
                $("#h5-sum-month").html("<h5 class='text-primary mt-4'>PAGOS POR MES "+response.month_count+"</h5>");
            }
        });
    });

}



function reportForDate(){

    var dd_mm_yyyy;
    var input_day_month_year;


     $("#for-date-report").change( function(){

        $("#table-reports").empty();
        $("#sum-for-concept").empty();

        var changedDate = $(this).val(); //in yyyy-mm-dd format obtained from for-date-report
        
        var date = new Date(changedDate);
        dd_mm_yyyy = (date.getDate()+1)+"/"+(date.getMonth()+1)+"/"+date.getFullYear();

        input_date.val(dd_mm_yyyy);

        input_day_month_year = input_date.val();

        $.ajax({
            type: "POST",
            url: url_model,
            data: {
                "opt": "for date",
                "date_report": input_day_month_year,
                "num_top": ""
            },
            dataType: "json",
            success: function (response) {
            

                if(response.reports == "sin registros"){
                        
                    swal({
                        title: "Sin registros",   
                        text: "No existen registros en la fecha seleccionada",   
                        type: "info",      
                        confirmButtonText: "Aceptar",
                        allowOutsideClick: false
                    })

                   $(".h5-payments").html("<h5>Pagos realizados 0</h5>");
                }
                else{
                    tablePayments(response);
                    $("#sum-concept").slideDown();
                    $.ajax({
                        type: "POST",
                        url: url_model,
                        data: {
                            "opt": "count_payment",
                            "count": input_day_month_year,
                            "dife": "count and sum",
                            "num_top": ""
                        },
                        dataType: "json",
                        success: function (response) {
                       
                            var sum_num;
                            var sum_letra;

                            var sum_sin_decimal = (parseFloat(response.sum).toFixed());
                            sum_num = response.sum;


                            $(".h5-payments").html("<h5 class='text-primary'>PAGOS REALIZADOS POR FECHA "+response.count+"</h5>");

                            $.ajax({
                                type: "POST",
                                url: "../views/includes/num_letra.php",
                                data: {
                                    "numero": sum_sin_decimal
                                },
                              
                                success: function (response) {
                                    
                                    sum_letra = response;

                                    (sum_letra);
                                    (sum_num);

                                    $(".h5-sum-payments").html("<h5 class='text-primary'>SUMA DE PAGOS POR FECHA <br>$"+sum_num+"<br>("+sum_letra+ " pesos) "+"</h5>");
                                }
                                
                            });
                        }
                    });
                       
                    $.ajax({
                        type: "POST",
                        url: url_model,
                        data: {
                            "opt": "count_payment",
                            "count": input_day_month_year,
                            "dife": "sum concept",
                            "num_top": ""
                        },
                        dataType: "json",
                        success: function (response) {
                            
                            var size = response.length;
                        
                            for($i = 0; $i < size; $i++){

                                var list_group = "<li class='list-group-item list-group-item-success text-dark'>"+response[$i].descripcion+"&nbsp;| $"+response[$i].sum_date+"</li>";

                                $("#sum-for-concept").append(list_group);

                            }
                          
                        }
                    });
                }
            }
        });
        
    });
}

function reportsTotals(){

    $("#total_pagos").change(function (e) { 
        e.preventDefault();
 
        $("#msj-cargando").show();
        $("#table-reports").empty();
        $.ajax({
            type: "POST",
            url: url_model,
            data: {
                "opt": "total payment",
                "num_top": ""
            },
            dataType: "json",
            success: function (response) {
                (response);
                 if(response != ""){
 
                     $("#msj-cargando").hide();
 
                     tablePayments(response)
                 
                 }
            }
        });
   
    });
 }

 function tablePayments(success){

    var rows_payment = success.reports.length;
    var num = 0;

    for(data = 0; data < rows_payment; data++){
 
        num++;
        var date = success.reports[data].dia_fecha +" de "+success.reports[data].mes_fecha+" "+success.reports[data].anio_fecha

        var table_report = "<tr><td>"+num+"</td>"+
                                "<td>"+date+"</td>"+
                                "<td>"+success.reports[data].matricula+"</td>"+
                                "<td>"+success.reports[data].nombre_completo+"</td>"+
                                "<td>"+success.reports[data].carrera+"</td>"+
                                "<td>"+success.reports[data].sede+"</td>"+
                                "<td>"+success.reports[data].grado_actual+"</td>"+
                                "<td>"+success.reports[data].grupo+"</td>"+
                                "<td>"+success.reports[data].turno+"</td>"+
                                "<td>"+success.reports[data].descripcion+"</td>"+
                                "<td>"+success.reports[data].cantidad+"</td>"+
                                "<td>"+success.reports[data].costo_unitario+"</td>"+
                                "<td>"+success.reports[data].abono+"</td>"+
                                "<td>"+success.reports[data].lugar_pago+"</td>"+
                            "</tr>";


        $("#table-reports").append(table_report);
    }  

}

function tops(){

    $("#20_payments, #40_payments, #60_payments, #80_payments, #100_payments, #120_payments, #140_payments, #160_payments, #180_payments, #200_payments").change(function (e) { 
        e.preventDefault();
        
        var top_payments = $("input[name='payments']:checked").val();
        $("#table-reports").empty();

        (top_payments);
        $.ajax({
            type: "POST",
            url: "../models/reportsModel.php",
            data: {
                "opt": "",
                "num_top": top_payments
            },
            dataType: "json",
            success: function (response) {
            
                tablePayments(response);
            }
        });
    });
}