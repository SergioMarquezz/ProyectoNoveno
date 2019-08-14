$(document).ready(function(){

	$('.sidenav').sidenav(); //Para mostrar y ocultar la barra lateral

	$("#selecion-concepto").click(function (e) { 
		e.preventDefault();
    });
    
    salir();
    pendientes();
    tramitesTotales();
    modal();

});
(jQuery);

function modal(){

    $("#btn-mas-informe").click(function (e) { 
        e.preventDefault();
        $("#modal-totales").modal().show();
    });

    $("#btn-modal").click(function (e) { 
        e.preventDefault();
        $("#modal-totales").modal().hide();
    });
}

//Funcion para salir del sistema
function salir(){

	$('.btn-exit-system').on('click', function(e){
        e.preventDefault();
        
        var name_cuenta = $(".btn-exit-system ").attr('href');

		swal({
		  	text: "<strong>¿Estas seguro de querer salir del sistema?</strong>",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#03A9F4',
		  	cancelButtonColor: '#F44336',
		  	confirmButtonText: '<i class="zmdi zmdi-run"></i> Si, Salir!',
		  	cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!'
		}).then(function () {
            
            $.ajax({
                url: "../models/cerrarSessionModel.php?codigo="+name_cuenta,
                success: function (response) {
    
                   if(response == "cerrar"){
                        window.location.href="../index.php";
                   }
                }
            })
		
		});
	});
}

function pendientes(){
   
    var clave_persona = $("#key_people").val();

    $.ajax({
        type: "POST",
        url: "../models/principalModel.php",
        data: {
            "cve_persona": clave_persona,
            "opciones": "faltan"
        },
        success: function (response) {
            var json = JSON.parse(response); 
            console.log(json);
            if(json.pagos.pendiente != 0){

                $("#texto-pendientes").text(" En este momento tienes "+json.pagos.pendiente+" tramites que has solicitado pero que aun no has pagado, te recomedamos realizar el pago correspodiente");
                $(".list-group").show();
            }
            else{
                $("#texto-pendientes").html("<h3 class='text-center'>"+json.pagos.pendiente+"</h3>");
                $(".list-group").hide();
            }
        }
    });

    $.ajax({
        type: "POST",
        url: "../models/principalModel.php",
        data: {
            "cve_persona": clave_persona,
            "opciones": "pendientes"
        },
        dataType: "json",
        success: function(data){
            $.each(data.pendientes, function (){
                
                $("#lista-pendientes").append("<li class='list-group-item border-success'>"+this.descripcion+""+" pagar la cantidad de $ "+this.costo_unitario+"</li>")

                
            })
            
        }
    })
}

function tramitesTotales(){

    $("#btn-mas-informe").click(function(e){

        var clave_persona = $("#key_people").val();
        $(this).attr('disabled', true);

        $.ajax({
            type: "POST",
            url: "../models/principalModel.php",
            data: {
                "cve_persona": clave_persona,
                "opciones": "totales"
            },
            success: function (response) {
               // var json = JSON.parse(response);
                console.log(response);
            /*    var filas = json.totales.length;
                
                var num = 0;

                for( i= 0; i < filas; i++){

                    num++;
                    var tbody_table = "<tr><td class='text-white'>"+num+"</td>"+
                                        "<td class='text-white'>"+json.totales[i].fecha_solicitud+"</td>"+
                                        "<td class='text-white'>"+json.totales[i].descripcion+"</td>"+
                                        "<td class='text-white'>"+json.totales[i].costo_unitario+"</td>"+
                                      "</tr>";

                    $("#body-modal").append(tbody_table);

                    
                }*/
            }
        });

        
    })

    $("#btn-modal").click(function (e) { 
        e.preventDefault();
        $("#btn-mas-informe").attr('disabled', false);
        $("#body-modal").empty();
    });
}

//Funcion para el envio de datos de todos los formularios
/*function enviarForms(){

	$('.FormularioAjax').submit(function(e){
        e.preventDefault();

        var form=$(this);

        var tipo=form.attr('data-form');
        var accion=form.attr('action');
        var metodo=form.attr('method');
        var respuesta=form.children('.RespuestaAjax');

        var name = $("#nombre-admin").val();

        var msjError="<script>swal('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";
        var formdata = new FormData(this);
 

        var textoAlerta;
        if(tipo==="save"){
            textoAlerta="Los datos que enviaras quedaran almacenados en el sistema";
        }else if(tipo==="delete"){
            textoAlerta="Los datos serán eliminados completamente del sistema";
        }else if(tipo==="update"){
        	textoAlerta="Los datos del sistema serán actualizados";
        }else{
            textoAlerta="Quieres realizar la operación solicitada";
        }


        swal({
            title: "¿Estás seguro?",   
            text: textoAlerta,   
            type: "question",   
            showCancelButton: true,     
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar"
        }).then(function () {
            $.ajax({
                type: metodo,
                url: accion,
                data: formdata ? formdata : form.serialize(),
                cache: false,
                contentType: false,
                processData: false,
                xhr: function(){ //Funcion que sirve para el tiempo de peticion al servidor
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                      if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);
                        if(percentComplete<100){
                        	respuesta.html('<p class="text-center">Procesado... ('+percentComplete+'%)</p><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width: '+percentComplete+'%;"></div></div>');
                      	}else{
                      		respuesta.html('<p class="text-center"></p>');
                      	}
                      }
                    }, false);
                    return xhr;
                },
                success: function (data) {
                   console.log(data);
                },
                error: function() {
                   // respuesta.html(msjError);
                }
            });
            return false;
        });
    });
}*/


Highcharts.chart('container', {
    chart: {
        type: 'areaspline'
    },
    title: {
        text: 'Average fruit consumption during one week'
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 150,
        y: 100,
        floating: true,
        borderWidth: 1,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
    xAxis: {
        categories: [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
        ],
        plotBands: [{ // visualize the weekend
            from: 4.5,
            to: 6.5,
            color: 'rgba(68, 170, 213, .2)'
        }]
    },
    yAxis: {
        title: {
            text: 'Fruit units'
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' units'
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.5
        }
    },
    series: [{
        name: 'John',
        data: [3, 4, 3, 5, 4, 10, 12]
    }, {
        name: 'Jane',
        data: [1, 3, 4, 3, 3, 5, 4]
    }]
});





