
function getTableGaleria(){

    $.ajax(
    {
      url: BASE_URL+"Subir_archivos/mostrar_imagenes_galeria",
      datatype: 'json',
      error: function(error){console.log(error)},
      success: function(response){
     
       
        var response=$.parseJSON(response);
        console.log(response);
        $("#cuerpoTabla").html("");
        
      $.each(response, function(index, item){
        var estado;
        if(response.Estado==1){
          estado=  '<td> Desarrollo </td>';
        }else{
          estado=  '<td> Terminado </td>';
        }
          var valor = 
           '<tr>' +
             '<td>' + item.Nombre + '</td>' +
             '<td>' + item.Ano_Creacion + '</td>' +
                         estado                   +
           '</tr>';
           $(valor).appendTo("#cuerpoTabla");
       });
      },
      error: function(error) {
        console.log('chao');
        console.log(error);
      }
    });
  };