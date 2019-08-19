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
                

                //Aspirante
                if(json.arreglo_datos.consecutive != undefined){

                    nombre.val(json.arreglo_datos.name_cadidate);
                    ape_paterno.val(json.arreglo_datos.father);
                    ape_materno.val(json.arreglo_datos.mother);
                    carrera.val(json.arreglo_datos.career);
                    name.val(json.arreglo_datos.name_cadidate + " "+ json.arreglo_datos.father + " "+ json.arreglo_datos.mother);
                    cve_persona.val(json.arreglo_datos.consecutive);
                    tipo_persona.val(json.arreglo_datos.key_type);
                    matricula_alumno.val("000000" + json.arreglo_datos.consecutive);
                    num_control.val("000000" + json.arreglo_datos.consecutive);
                    
                }

                //Alumnos
                else if(json.arreglo_datos.name != undefined){

                    nombre.val(json.arreglo_datos.name);
                    ape_paterno.val(json.arreglo_datos.apellido_pa);
                    ape_materno.val(json.arreglo_datos.apellido_ma);
                 //   calle.val(json.arreglo.calle);
                    colonia.val(json.arreglo_datos.col);
                    matricula.val(json.arreglo_datos.matricula);
                  //  number.val(json.arreglo.number);
                    cve_persona.val(json.arreglo_datos.cve_persona);
                    tipo_persona.val(json.arreglo_datos.tipo_persona);
                    matricula_alumno.val(json.arreglo_datos.matricula);
                    name.val(json.arreglo_datos.name + " "+ json.arreglo_datos.apellido_pa + " "+ json.arreglo_datos.apellido_ma);
                    num_control.val(json.arreglo_datos.matricula);
                    carrera.val(json.arreglo_datos.carrer);
                }

                //Administrador
                else if(json.arreglo_datos.nombre != undefined){

                    console.log("admin");
                }

               /* if(json.arreglo.name  === undefined  ){

                    nombre.val(json.arreglo.nombre);
                    ape_paterno.val(json.arreglo.paterno);
                    ape_materno.val(json.arreglo.materno);
                    correo.val(json.arreglo.email);
                    calle.val(json.arreglo.calle);
                    colonia.val(json.arreglo.colonia);
                    number.val(json.arreglo.numero);
                    tel.val(json.arreglo.tel);
                    
                }
                else{*/
                    
               

                /*    if(json.arreglo.tipo_persona == 2){
                       
                        //$("#bank").hide();
                    }
                }       */
    
                /*if(json.admin.privilegio >= 2){
                    
                    
                    
                }*/
            }
        });
    
});

