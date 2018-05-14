<?php
// $id = $_SESSION["id_usuario"];
$var = $_REQUEST["user_id"];
?>
<html>
<head>
<meta charset="utf-8">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../asset/css/materialize.min.css">
  	<link rel="stylesheet" type="text/css" href="../asset/dist/sweetalert.css">
    <link rel="stylesheet" href="../asset/css/login.css">
    <link rel="stylesheet" type="text/css" href="../asset/pink/pace-theme-flash.css">
</head>

<body>
  <!-- <div class="error">
          <span>error en los datos</span>
  </div> -->
  <div class="section"></div>
  <main>
    <center>
      <!-- <img class="responsive-img" style=  "width: 250px; height: 200px; border-radius: 50%;" src="img/logo.jpeg" /> -->
      <div class="section"></div>

      <h5 class="pink-text">Bienvenido a L&B Cakes</h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE; ">

          <form class="col s12" method="post" id="formC" action="">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>
            <div>
            
            </div>
            <!-- me traigo el id para el formulario de cambiar contraseña por id -->
                  <input class='validate' type='text' name='id_usuario' id='id_usuario' style="display:none" required  value="<?php  echo $var ?>" />
            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='clave' id='clave' required />
                <label >Nueva clave</label>
              </div>
            </div>
            <center>
              <div class='row'>
                <!-- <input type="submit" name="btn_login" class="btn" value="login"> -->

                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect pink accent-1' id='btn' value="Login"> Cambiar clave
                 <i class="material-icons right">send</i>
               </button>
              </div>
            </center>
          </form>
        </div>
      </div>
      <a  class='pink-text' href="../Usuario/registrar.php">Crear Cuenta</a>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>

  <script type="text/javascript" src="../asset/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="../asset/js/materialize.min.js"></script>
  <script type="text/javascript" src="../asset/dist/sweetalert.min.js"></script>
  <script type="text/javascript" src="../asset/js/login.js"></script>
  <script type="text/javascript" src="../asset/js/recuperar.js"></script>
	<script type="text/javascript" src="../asset/js/pace.min.js"></script>
</body> 

</html>
