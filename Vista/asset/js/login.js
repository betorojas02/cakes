jQuery(document).on('submit', '#formlg', function (event) {
    event.preventDefault();
    jQuery.ajax({
            url: 'verificarLogin.php',
            type: 'POST',
            dataType: 'json',
            data: $(this).serialize(),
            beforeSend: function () {
                $('.btn-large').val('Valiando....');

            }
        })
        .done(function (respuesta) {
            console.log(respuesta);
            if (!respuesta.error) {
                if (respuesta.tipo = '1') {
                    location.href = '../Administrador/index.php';
                } else if (respuesta.tipo = '2') {
                    location.href = '../Usuario/index.php'
                }
            } else {
                swal("Oops", "Usuario o clave invalidos", "error");
                $('.btn').val('Login');
            }
        })
        .fail(function (resp) {
            console.log(resp.responseText);
        })
        .always(function () {
            console.log("complete")
        });
});