$(document).ready(function () {
  $('.slider').slider();
  $('.modal').modal();
  $('.tabs').tabs();
  $('.dropdown-trigger').dropdown();
  $('#example').DataTable({
    language: {
      sProcessing: 'Procesando...',
      sLengthMenu: 'Mostrar _MENU_ registros',
      sZeroRecords: 'No se encontraron resultados',
      sEmptyTable: 'Ningún dato disponible en esta tabla',
      sInfo: 'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
      sInfoEmpty: 'Mostrando registros del 0 al 0 de un total de 0 registros',
      sInfoFiltered: '(filtrado de un total de _MAX_ registros)',
      sInfoPostFix: '',
      sSearch: 'Buscar:',
      sUrl: '',
      sInfoThousands: ',',
      sLoadingRecords: 'Cargando...',
      oPaginate: {
        sFirst: 'Primero',
        sLast: 'Último',
        sNext: 'Siguiente',
        sPrevious: 'Anterior',
      },
      oAria: {
        sSortAscending: ': Activar para ordenar la columna de manera ascendente',
        sSortDescending: ': Activar para ordenar la columna de manera descendente',
      },
    },
  });

  // $(".button-collapse").sideNav();
  $(window).scroll(function () {
    if ($(document).scrollTop() > 50) {
      $('#nav').addClass('beto');
    } else {
      $('#nav').removeClass('beto');
    }
  });
});


function addProduct(code) {
  var amount = document.getElementById("cantidad").value;
  window.location.href = "datosUsuario.php?action=add&code=" + code + '&amount=' + amount;;
}