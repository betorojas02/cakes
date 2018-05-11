$(document).ready(function () {

  $("#form-item").submit(insertProductos)

  function insertProductos(event) {
    event.preventDefault()
    var datos = new FormData($("#form-item")[0])
    $.ajax({
      url: 'adProductos.php',
      type: 'POST',
      data: datos,
      contentType: false,
      processData: false,
    }).done(function (resp) {
      console.log(resp);
      swal({
          title: "registar",
          text: "Exito registrar",
          type: "success",
          button: "cerrar",
        },
        function () {
          window.location.href = 'productos.php';
        });
    });
  }
})