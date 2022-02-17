$(document).ready(function () {
    getTableProyectos();
    getAñoDispositivos();
});

var areaChartData = {
    labels  : ['Marzo', 'Abril', 'Mayo', 'Junio', 'Julio'],
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
        data                : [28, 48, 40, 19, 86]
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
        data                : [65, 59, 80, 81, 56]
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


    function getTableProyectos(){

      $.ajax(
      {
        url: BASE_URL+"Administrador/getTablaProyectos",
        datatype: 'json',
        error: function(error){console.log(error)},
        success: function(response){
          console.log('hola');
         
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
             '<td>#d</td>' +
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

   

    