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


  })