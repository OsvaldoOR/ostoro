$(document).ready(function(){
    tablaClientes = $("#tablaClientes").DataTable({
       "columnDefs":[{  //creaacion de botones para cada fila agregada
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
        //Para cambiar el lenguaje a español
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
// boton nuevo con jquery
$("#btnNuevo").click(function(){
    $("#formClientes").trigger("reset");// referencia al modal y asignacion de color
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Cliente");            
    $("#modalABC").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr"); //referencia a la fila
    id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    edad = parseInt(fila.find('td:eq(2)').text());
    colonia = fila.find('td:eq(3)').text();
    cyn = fila.find('td:eq(4)').text();
    telefono = fila.find('td:eq(5)').text();
    
    
    $("#nombre").val(nombre);
    $("#edad").val(edad);
    $("#colonia").val(colonia);
    $("#cyn").val(cyn);
    $("#telefono").val(telefono);
    
    opcion = 2; //editar
    //stilos para el boton editar
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Cliente");            
    $("#modalABC").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
             tablaClientes.row(fila.parents('tr')).remove().draw();
            }
        });
        window.location.reload();
    }   
});
    
//ALTA
$("#formClientes").submit(function(e){
    e.preventDefault();    //evita que se recargue la pagina
    nombre = $.trim($("#nombre").val());
    edad = $.trim($("#edad").val());    
    colonia = $.trim($("#colonia").val());
    cyn = $.trim($("#cyn").val());
    telefono = $.trim($("#telefono").val());
    $.ajax({ //codigo con ajax, hace refgerencia al archivo de php
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {nombre:nombre, edad:edad, colonia:colonia, cyn:cyn, telefono:telefono, id:id, opcion:opcion},
        success: function(data){  
            console.log(data); //para ver por consola
            id = data[0].id;            
            nombre = data[0].nombre;
            edad = data[0].edad;
            colonia = data[0].colonia;
            cyn = data[0].cyn;
            telefono = data[0].telefono;
            if(opcion == 1){tablaClientes.row.add([id,nombre,edad,colonia,cyn,telefono]).draw();}
            else{tablaClientes.row(fila).data([id,nombre,edad,colonia,cyn,telefono]).draw();}    //para agregar dinamicamente        
        }        
    });
    $("#modalABC").modal("hide");  //cerrar modal  
    
});    
    
});