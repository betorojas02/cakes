$ (document).ready (function () {
  $ ('.datepicker').datepicker ({
    format: 'dd/mm/yyyy',
  });
});

//ajax para registrar usuarios
//ajax para registrar usuarios
$ (document).on ('submit', '#form-item', function (event) {
  event.preventDefault ();
  /* Act on the event */
  var nombre = $ ('#nombre').val ();
  var apellido = $ ('#apellido').val ();
  var correo = $ ('#correo').val ();
  var clave = $ ('#clave').val ();
  var ciudad = $ ('#ciudad').val ();
  var telefono = $ ('#telefono').val ();
  var sexo = $ ('input:radio[name=edad]:checked').val ();
  var direccion = $ ('#direccion').val ();
  var barrio = $ ('#barrio').val ();
  var cedula = $ ('#cedula').val ();
  var fecha = $ ('#fecha').val ();
  var estado = 'A';

  var tipoP = 2;
  if ($ ('#submit-item').val () == 'add') {
    // console.log('add ra');
    $ (document).ajaxStart (function () {
      Pace.restart ();
    });
    $.ajax ({
      url: 'datosUsuarioRegistrar.php',
      type: 'POST',
      dataType: 'json',
      data: 'nombre=' +
        nombre +
        '&apellido=' +
        apellido +
        '&correo=' +
        correo +
        '&clave=' +
        clave +
        '&ciudad=' +
        ciudad +
        '&telefono=' +
        telefono +
        '&sexo=' +
        sexo +
        '&2=' +
        tipoP +
        '&direccion=' +
        direccion +
        '&barrio=' +
        barrio +
        '&A=' +
        estado +
        '&cedula=' +
        cedula +
        '&fecha=' +
        fecha,
    }).done (function (resp) {
      console.log (resp);

      if (!resp.error) {
        swal (
          {
            title: 'registar',
            text: 'Exito registrar',
            type: 'success',
            button: 'cerrar',
          },
          function () {
            window.location.href = 'index.php';
          }
        );
      } else {
        swal ( 'Lo sentimos, el correo no existe');
      }
    });
  } //end if == "add"
});
//ajax para aditar usuario

$ (document).on ('submit', '#formE', function (event) {
  event.preventDefault ();
  /* Act on the event */
  var id_usuario = $ ('#id_usuario').val ();
  var nombre = $ ('#nombre').val ();
  var apellido = $ ('#apellido').val ();
  var ciudad = $ ('#ciudad').val ();
  var telefono = $ ('#telefono').val ();
  //
  var direccion = $ ('#direccion').val ();
  var barrio = $ ('#barrio').val ();
  var cedula = $ ('#cedula').val ();
  if ($ ('#submit-item').val () == 'add') {
    // console.log('add ra');
    $.ajax ({
      url: 'datosEditarUsuario.php',
      type: 'POST',
      dataType: 'json',
      data: 'nombre=' +
        nombre +
        '&id_usuario=' +
        id_usuario +
        '&apellido=' +
        apellido +
        '&ciudad=' +
        ciudad +
        '&telefono=' +
        telefono +
        '&direccion=' +
        direccion +
        '&barrio=' +
        barrio +
        '&cedula=' +
        cedula,
    }).done (function (resp) {
      console.log (resp);
      console.error (resp);

      $ ('#modal2').modal ({
        complete: function () {}, // Callback for Modal close
      });
      swal (
        {
          title: 'editar',
          text: 'Datos correctamente editados',
          type: 'success',
          button: 'cerrar',
        },
        function () {
          window.location.href = 'datosUsuario.php';
        }
      );
    });
  } //end if == "add"
});
