//ajax para registrar ingredientes
$(document).on('submit', '#form-item', function (event) {
	event.preventDefault();
	/* Act on the event */
	var nombre = $('#nombre').val();
	var precio = $('#precio').val();
	var proveedor = $('#proveedor').val();
	var cantidad = $('#cantidad').val();

	if ($('#submit-item').val() == "add") {
		// console.log('add ra');
		$.ajax({
			url: 'addIngredientes.php',
			type: 'POST',
			dataType: 'json',
			data: 'nombre=' + nombre + '&precio=' + precio + '&proveedor=' + proveedor + '&cantidad=' + cantidad
		}).done(function (resp) {
			console.log(resp);
			swal({
					title: "registar",
					text: "Exito registrar",
					type: "success",
					button: "cerrar",
				},
				function () {
					window.location.href = 'ingredientes.php';
				});
		});
	} //end if == "add"
});