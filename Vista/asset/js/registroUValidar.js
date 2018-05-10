function validar() {

	var nombre;
	var apellido;
	var correo;
	var clave;
	var ciudad;
	var direccion;
	var barrio;
  var telefono;
  var cedula;
  var fecha;


	nombre = document.getElementById("nombre").value;
	apellido = document.getElementById("apellido").value;
	correo = document.getElementById("correo").value;
	clave = document.getElementById("clave").value;
  	ciudad = document.getElementById("ciudad").value;
	direccion = document.getElementById("direccion").value;
	barrio = document.getElementById("barrio").value;
	telefono = document.getElementById("telefono").value;

  cedula = document.getElementById("cedula").value;
	fecha = document.getElementById("fecha").value;



	expresion = /\w+@\w+\.+[a-z]/;

	if (nombre === "" || apellido === "" || correo === "" || clave === "" || ciudad === "" || direccion === "" || barrio === "" || telefono === "" || cedula === "" || cedula === "") {
		sweetAlert("Oops...", "Todos los campos son obligatorios", "error");
		return false;
	}

	if (nombre <= 0 || nombre >= 0) {
		sweetAlert("Oops...", "El nombre no puede contener numeros", "error");
		return false;
	}
  //
	if (apellido <= 0 || apellido >= 0) {

		sweetAlert("Oops...", "El apellido paterno no puede contener numeros", "error");
		return false;
	}
  //
	if (ciudad <= 0 || ciudad >= 0) {

		sweetAlert("Oops...", "El ciudad materno no puede contener numeros", "error");
		return false;
	}



}
