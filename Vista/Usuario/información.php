<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" type="text/css" href="../asset/css/materialize.min.css">
  <link rel="stylesheet" href="../asset/css/index.css">
  <link rel="stylesheet" type="text/css" href="../asset/pink/pace-theme-flash.css">
</head>

<body>
  <main>
    <?php include 'navbar/navbarUsuario.php';?>
    <h3>
      <center>
        <div style="color:#CB115A">¿Quienes somos? </div>
      </center>
    </h3>
    <div class="container">
      <div class="row">
        <div class="col s12 ">
          <div class="card-panel pink">
            <span class="white-text">L&B Cakes es una microempresa la cual se dedica a la elaboración, venta y comercialización de productos de repostería,
              que ofrece amplia variedad de sabores para sus deliciosos pasteles, postres y variados bocadillos, también
              postres como pay y cheesecakes.
            </span>
          </div>
        </div>
      </div>
    </div>


    <div class="container">
      <div class="row">
        <div class="col s12 ">
          <div class="card-panel pink">
            <span class="white-text">Nuestra visión es convertirnos una empresa referente a productos de Pateleria. Obtener el reconocimiento de todos
              nuestros clientes. Aportar innovación y creatividad en nuestros productos así como un ejemplo de buen servicio
              y rentabilidad.
            </span>
          </div>
        </div>
      </div>
    </div>


    <div class="container">
      <div class="row">
        <div class="col s12 ">
          <div class="card-panel pink">
            <span class="white-text">Nuestra misión es darnos a conocer localmente y dar lo mejor de nosotros para lograr estar a la altura de la
              marca que representamos
          </div>
        </div>
      </div>
    </div>


  </main>
  <footer class="page-footer" id="footerContainer">
    <?php include("navbar/footer.php"); ?>
  </footer>


  <!--  script jquery  -->
  <script type="text/javascript" src="../asset/js/jquery-3.3.1.min.js"></script>
  <!-- Compiled and minified JavaScript -->


  <script type="text/javascript" src="../asset/js/materialize.min.js"></script>
  <!--  script funciones index -->
  <script src="../asset/js/index.js"></script>
  <script type="text/javascript" src="../asset/js/pace.min.js"></script>


  </div>
</body>

</html>