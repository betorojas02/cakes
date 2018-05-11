$(document).on('submit', '#formC', function (event) {
	event.preventDefault();
	/* Act on the event */
	var id_usuario = $('#id_usuario').val()
	var clave = $('#clave').val();
	// console.log('add ra');
	$.ajax({
		url: 'recuperarClave.php',
		type: 'POST',
		dataType: 'json',
		data: 'clave=' + clave + "&id_usuario=" + id_usuario
	}).done(function (resp) {
		console.log(resp);

		if (!resp.error) {
			swal({
					title: "restabelcer",
					text: "cambio su clave ",
					type: "success",
					button: "cerrar",
				},
				function () {
					window.location.href = '../Usuario/index.php';
				});
		}

	});
});