$(document).ready(function () {
   // mostrarImagenesGaleria();
    
});
/*
function mostrarImagenesGaleria(){

    $.ajax(
    {
      url: BASE_URL+"Subir_archivos/mostrar_imagenes_galeria",
      datatype: 'json',
      error: function(error){console.log(error)},
      success: function(response){
        console.log('hola');
       
        var response=$.parseJSON(response);
        console.log(response);
        $("#cuerpoTabla").html("");
        
      $.each(response, function(index, item){
          var valor = 
           '<tr>' +
             '<td>' + BASE_URL+item.Ruta + '</td>' +
              '<td> <img src="'+BASE_URL+item.Ruta +'.jpg" alt="'+BASE_URL+item.Ruta+'.jpg"></td>'+
           '</tr>';
           $(valor).appendTo("#cuerpoTabla");
       });
      },
      error: function(error) {
        console.log('chao');
        console.log(error);
      }
    });
  };*/