$(document).on('submit', '#formR', function (event) {
	event.preventDefault();
	/* Act on the event */
	var correo = $('#correo').val();
	// console.log('add ra');
	$.ajax({
		url: 'datoscorreo.php',
		type: 'POST',
		dataType: 'json',
		data: 'correo=' + correo
	}).done(function (resp) {
		console.log(resp);
		console.error(resp);

		if (!resp.error) {
			swal({
				title: "restabelcer",
				text: "correo envio",
				type: "success",
				button: "cerrar",
			},
				function () {
					window.location.href = '../Usuario/index.php';
				});
			$("#formR")[0].reset();

		} else {
			swal("Oops", "Correo no existe", "error");
		}

	});
});
