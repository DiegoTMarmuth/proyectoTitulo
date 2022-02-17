$(document).ready(function () {

  //getAniodispositivos();
  //crearGrafico();
  var activo=[51,40,50,60,70];
  var desactivo=[66,40,50,60,45];
  //grafico(activo,desactivo);
        //Date picker
        $('#datepicker').datepicker({
          autoclose: true
        }).on('changeDate',function(e){
          var valor = $('#datepicker').val();
          crearGrafico();
        })
});


function crearGrafico() {
  
  console.log('graficos d');
  alert($('#datepicker').val());
  $.ajax(
    {
      url: BASE_URL+"Administrador/getDatosGrafico",
      datatype: 'json',
      data:  {'dia':$('#datepicker').val()},
      error: function(error){console.log(error)},
      success: function(response){
        //console.log(response);
        var response=$.parseJSON(response);
        //grafico(response);
        var activo=[];
        var desactivo=[];
        var total;
        alert(response);
      $.each(response, function(index, item){
        activo.push(2);
       desactivo.push(3);
       /* var activo1=activo1+1;
        total[
*/
       });
       grafico(activo,desactivo);
       console.log(activo);
       console.log(desactivo);
      },
      error: function(error) {
        console.log('chao');
        console.log(error);
      }
    });
  
  
}
function grafico(dato,dato2) {
  //graficar por dia es: Especificar dispositivo y activo desactivo.

    var areaChartData = {
      labels  : ['caca'],
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


  $('#datepicker').datepicker({
  autoclose: true
})
