$(document).ready(function () {
    
    var nombre = $("#name");
    var ape_paterno = $("#paterno-user");
    var ape_materno = $("#materno");
    var correo = $("#correo");
   // var calle = $("#calle");
    var colonia = $("#colonia");
  //  var number = $("#numero");
    var tel = $("#telefono");
    var matricula = $("#matricula");
    var cve_persona = $("#cve-persona");
    var tipo_persona = $("#tipo-persona");

    //Variable para el form de solicitudes
    var matricula_alumno = $("#matricula-alumno");

    //Varaibles para referencia bancaria
    var name = $("#nombre-completo");
    var carrera = $("#carrer");
    var num_control = $("#numero-control");

 
    

        $.ajax({
            url: "../models/misdatosModel.php",
            success: function (response) {

                var json = JSON.parse(response); 
                console.log(json); 

                if(json.arreglo.name  === undefined  ){

                    nombre.val(json.arreglo.nombre);
                    ape_paterno.val(json.arreglo.paterno);
                    ape_materno.val(json.arreglo.materno);
                    correo.val(json.arreglo.email);
                    calle.val(json.arreglo.calle);
                    colonia.val(json.arreglo.colonia);
                    number.val(json.arreglo.numero);
                    tel.val(json.arreglo.tel);
                    
                }
                else{
                    nombre.val(json.arreglo.name);
                    ape_paterno.val(json.arreglo.apellido_pa);
                    ape_materno.val(json.arreglo.apellido_ma);
                 //   calle.val(json.arreglo.calle);
                    colonia.val(json.arreglo.col);
                    matricula.val(json.arreglo.matricula);
                  //  number.val(json.arreglo.number);
                    cve_persona.val(json.arreglo.cve_persona);
                    tipo_persona.val(json.arreglo.tipo_persona);
                    matricula_alumno.val(json.arreglo.matricula);
                    name.val(json.arreglo.name + " "+ json.arreglo.apellido_pa + " "+ json.arreglo.apellido_ma);
                    num_control.val(json.arreglo.matricula);
                    carrera.val(json.arreglo.carrer);

                    if(json.arreglo.tipo_persona == 2){
                       
                        //$("#bank").hide();
                    }
                }       
    
                /*if(json.admin.privilegio >= 2){
                    
                    
                    
                }*/
            }
        });
    
});

