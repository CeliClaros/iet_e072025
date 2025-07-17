  $(document).ready(function () {
    $('.sidebar-menu').tree()


  //$(function () {     //es similar a document.ready
    $('#registros').DataTable({
      'paging'      : true,
      'pageLength'  : 10,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'language'    : {
          paginate : {
            next: 'Siguiente',
            previous: 'Anterior',
            last : 'Último', 
            first: 'Primero'
          },

          info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
          emptyTable: 'No hay registros',
          infoEmpty: '0 Registros',
          search: 'Buscar: '

      }
    })
  //})
/*
//CODIGO DASHBOARD: GRAFICO LINE-CHART: 

    // LINE CHART
    var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      data: [
        {y: '2011 Q1', item1: 2666},
        {y: '2011 Q2', item1: 2778},
        {y: '2011 Q3', item1: 4912},
        {y: '2011 Q4', item1: 3767},
        {y: '2012 Q1', item1: 6810},
        {y: '2012 Q2', item1: 5670},
        {y: '2012 Q3', item1: 4820},
        {y: '2012 Q4', item1: 15073},
        {y: '2013 Q1', item1: 10687},
        {y: '2013 Q2', item1: 8432}
      ],
      xkey: 'y',
      ykeys: ['item1'],
      labels: ['Item 1'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
*/

//GRAFICO RESERVAS IET: 
//$(function () {  

$.getJSON("servicio-registrados.php",function(data){

 // console.log(data);

var line = new Morris.Line({
      element: 'grafica-registros',
      resize: true,
      data: data,
      xkey: 'fecha',
      ykeys: ['cantidad'],
      labels: ['CANT.RESERVAS'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    }); 

}); // })

/*
              // data: [{"fecha":"2020-12-13","cantidad":"7"},{"fecha":"2020-12-14","cantidad":"2"},{"fecha":"2021-01-14","cantidad":"5"},{"fecha":"2021-01-15","cantidad":"2"},{"fecha":"2021-01-29","cantidad":"1"},{"fecha":"2021-03-17","cantidad":"3"}], 
      //data: [{"fecha":"2020-12-13","cantidad":"7"},{"fecha":"2020-12-14","cantidad":"2"},{"fecha":"2021-01-14","cantidad":"5"},{"fecha":"2021-01-15","cantidad":"2"}],
      //data: [{"fecha":"2020-12-13","cantidad":"7"}],
      */

      /*data: [
        {y: '2011 Q1', item1: 2666},
        {y: '2011 Q2', item1: 2778},
        {y: '2011 Q3', item1: 4912},
        {y: '2011 Q4', item1: 3767},
        {y: '2012 Q1', item1: 6810},
        {y: '2012 Q2', item1: 5670},
        {y: '2012 Q3', item1: 4820},
        {y: '2012 Q4', item1: 15073},
        {y: '2013 Q1', item1: 10687},
        {y: '2013 Q2', item1: 8432}
      ],   
      xkey: 'y',
      ykeys: ['item1'],
      labels: ['Item 1'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
*/


//rta de Mi Servicio : '[{"fecha":"2020-12-13","cantidad":"7"}]'

//--------------------

//DONUT IET: 
$.getJSON("serv-grafico-donut.php",function(data){


/*
//DONUT CHART
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a"],
      data: [
        {label: "INICIADOS", value: ['iniciados']},
        {label: "FINALIZADOS", value: ['finalizados']},
        {label: "WAITING", value: ['waiting']},
        {label: "AUSENTES", value: ['ausentes']},
        {label: "CANCELADOS", value: ['cancelados']},
        {label: "ERROR", value: ['error']}
      ],
      hideHover: 'auto'
    });
});
//{"iniciados":50,"finalizados":0,"waiting":0,"ausentes":50,"cancelados":0,"error":0}

*/

//DONUT CHART
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a"],
      data: data,
        {label: "INICIADOS", value: ['iniciados']},
        {label: "FINALIZADOS", value: ['finalizados']},
        {label: "WAITING", value: ['waiting']},
        {label: "AUSENTES", value: ['ausentes']},
        {label: "CANCELADOS", value: ['cancelados']},
        {label: "ERROR", value: ['error']},
      
      hideHover: 'auto'
    });
});
//{"iniciados":50,"finalizados":0,"waiting":0,"ausentes":50,"cancelados":0,"error":0}








/*doc: 
//DONUT CHART
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a"],
      data: [
        {label: "Download Sales", value: 12},
        {label: "In-Store Sales", value: 30},
        {label: "Mail-Order Sales", value: 20}
      ],
      hideHover: 'auto'
    });

*/




  })