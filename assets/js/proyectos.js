$(document).ready(function () {
    getTableProyectos();
    getAniodispositivos();
    //crearGrafico();
    var activo=[50,40,50,60,70];
    var desactivo=[60,40,50,60,45];
    grafico(activo,desactivo);
          //Date picker
          $('#datepicker').datepicker({
            autoclose: true
          }).on('changeDate',function(e){
            var valor = $('#datepicker').val();
            crearGrafico();
          })
});

function crearGrafico() {
  
  console.log('graficosdssd');
  var valor = $('#datepicker').val();
  $.ajax(
    {
    
      url: BASE_URL+"Administrador/GraficarDia",
      datatype: 'json',
      data: { 'dia': $('#datepicker').val()},
      error: function(error){console.log(error)},
      success: function(response){
        console.log(response);
        //var response=$.parseJSON(response);
        //grafico(response);
        console.log(response);
        var activo=[];
        var desactivo=[];
      
      $.each(response, function(index, item){
        activo.push(item.ActividadDia);
       });
       console.log(activo);
       grafico(activo,desactivo);
      },
      error: function(error) {
        console.log('chao');
        console.log(error);
      }
    });
  
  
}



    function getTableProyectos(){
  
      $.ajax(
      {
        url: BASE_URL+"Administrador/getTablaProyectos",
        datatype: 'json',
        error: function(error){console.log(error)},
        success: function(response){
          var response=$.parseJSON(response);
       
          $("#cuerpoTabla").html("");
          
        $.each(response, function(index, item){
          
          var estado;
          if(item.Estado==1){
            estado=  '<td> activo</td>';
          }else{
            estado=  '<td> desactivo </td>';
          }
            var valor = 
             '<tr>' +
               '<td>' + item.Nombre + '</td>' +
               '<td>' + item.Fecha_Actividad + '</td>' +
                        estado +           
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
    
    function getAniodispositivos(){

      $.ajax(
      {
        url: BASE_URL+"Administrador/getAniodispositivos",
        datatype: 'json',
        error: function(error){console.log(error)},
        success: function(response){
         
          //var response=$.parseJSON(response);

          $("#cuerpoTabla").html("");
        $.each(response, function(index, item){
          console.log('ho');
          var fechas = item.Ano_Creacion.split("/", 1);
          $each
          console.log(item.Ano_Creacion.toDate());
          var valor = 
             '<tr>' +
             '<td>#</td>' +
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
  
function grafico(dato,dato2) {
  

    var areaChartData = {
      labels  : ['Diciembre','e','caca'],
      datasets: [
        {
          label               : 'Activo',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : dato
        },
        {
          label               : 'Desactivado',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : dato2
        },
      ]
    }
  
    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }
  
  //-------------
      //- BAR CHART -
      //-------------
      var barChartCanvas = $('#myChart').get(0).getContext('2d')
      var barChartData = $.extend(true, {}, areaChartData)
      var temp0 = areaChartData.datasets[0]
      var temp1 = areaChartData.datasets[1]
      barChartData.datasets[0] = temp1
      barChartData.datasets[1] = temp0
  
      var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
      }
  
      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })
    } 

     
            //Date picker
            $('#datepicker').datepicker({
              autoclose: true
            })
        

            $(".monthPicker").datepicker({
              dateFormat: 'MM yy',
              changeMonth: true,
              changeYear: true,
              showButtonPanel: true,
      
              onClose: function(dateText, inst) {
                  var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                  var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                  $(this).val($.datepicker.formatDate('MM yy', new Date(year, month, 1)));
              }
          });