<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registrate</title>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="favicon.png" />
	<meta charset="UTF-8">

	<link rel="stylesheet" type="text/css" href="../asset/dist/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="../asset/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="../asset/pink/pace-theme-flash.css">
	<!-- Carga asincronida media="none" onload="if(media!='all')media='all'"-->
	<link rel="stylesheet" href="../asset/css/login.css">
	<link rel="stylesheet" href="../asset/css/index.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">




</head>
<body>
	<noscript>
		<div class="container">
			<center class="animated pulse infinite">
				<h5><p>ATENCIÓN</p></h5>
				<font color="red"><h5 class="red-text"><p>La página que estás viendo requiere para su funcionamiento el uso de JavaScript.
					Si lo has deshabilitado intencionadamente, por favor vuelve a activarlo.</p></h5></font>
				</center>
			</div>
		</noscript>

	<div class="container">
		<div class="row">
			<div class="s12 m12 l12 center">
				<a href="index.php"><h1 id="l">L&B</h1></a>
			</div>
			<div class="col s12 m12 l12">
				<br>
				<hr width="50%">
			</div>
			<!-- Registrar cuenta -->
			<div class="col s0 m0 l3"></div>
			<div class="col s12 m12 l6 "  id="signup ">
				<form name="signup" method="post" id="form-item" action="" >
					<br><label><h4>Registra una cuenta nueva:</h4></label>

					<div class="input-field col s6">

						<input  class="validate" type="text" name="nombre" id="nombre" required  pattern="[a-z]{1,15}">
							<label>Nombre</label>
					</div>
					<div class="input-field col s6">

						<input  class="validate"   type="text" name="apellido" id="apellido" required pattern="[a-z]{1,15}">
						<label>Apellido</label>
					</div>
          <div class="input-field col s6 m6 l6">
            <label>Correo</label>
            <input  class="validate"  type="email" name="correo" id="correo" required>
          </div>
          <div class="input-field col s6 m6 l6">
            <label>Clave:</label>
            <input class="validate" type="password" name="clave" id="clave" size="30"  required>
          </div>

          <div class="input-field col s6 m6 l6">
            <label>Ciudad</label>
            <input  class="validate" type="text" name="ciudad" id="ciudad" required>
          </div>

					<div class="input-field col s6 m6 l6">
						<label>Direccion</label>
						<input class="validate" type="text" name="direccion" id="direccion" required>
					</div>
					<div class="input-field col s6 m6 l6">
						<label>Barrio</label>
						<input  class="validate" type="text" name="barrio" id="barrio" required pattern="[a-z]{1,15}">
					</div>
          <div class="input-field col s6 m6 l6">
            <label>telefono</label>
            <input class="validate" type="number" name="telefono" id="telefono" required>
          </div>
					<div class="input-field col s6 m6 l6">
						<label>Cedula</label>
						<input  class="validate" type="number" name="cedula" id="cedula" required >
					</div>
						<!-- fecha -->
						<div class="input-field col s6">
						<label>fecha</label>
							<input  type="text" class="datepicker" id="fecha" required>
						</div>
						<!-- <div class="col s12">
								<label>fecha de nacimiento</label>
								<input type="text" class="datepicker" name="fecha" id="fecha">
						</div> -->




          <label>Sexo</label><br><br>
            <label>
              <input type="radio" name="edad" id="edad1" value="1" required   >
                  <span>Masculino</span>
           </label>
					 <label>
						 <input type="radio" name="edad" id="edad2" value="2"  >
								 <span>Femenino</span>
					</label>
					<div class="center col s12 m12 l12">
						<br>
						<button class="btn waves-effect waves-light left pink darken-1" type="submit" id="submit-item" value="add">Enviar
							<i class="material-icons right">send</i>
						</button>

						<button class="btn waves-effect waves-light right pink darken-1" type="reset" name="enviar">Restablecer</button>

					</div>

				</form>
				<p class="col s12 m12 l12 center"><h6 class="center">¿Ya tienes una cuenta? <a href="../login/login.php">Iniciar sesión</a> </h6></p>
				<a  class='pink-text' href="index.php">Volver Al Inicio</a>
			</div>

			<!-- Fin registrar cuenta -->
		</div>
	</div>
  <!--  script jquery  -->
	<script type="text/javascript" src="../asset/js/jquery-3.3.1.min.js"></script>
	<!-- <script type="text/javascript" src="../asset/js/jquery-1.12.3.js"></script> -->
  <script type="text/javascript" src="../asset/js/materialize.min.js"></script>
  <script type="text/javascript" src="../asset/dist/sweetalert.min.js"></script>
  <!--  script funciones index -->
	<script type="text/javascript" src="../asset/js/registro.js"></script>
	<script type="text/javascript" src="../asset/js/pace.min.js"></script>
	

</body>
</html>
