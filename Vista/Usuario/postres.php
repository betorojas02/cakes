<?php
require_once ('../../Controlador/ProductoControlador.php');
session_start();
$postres = ProductosController::getPostresControllers();
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
 <?php include('navbar/navbarUsuario.php');?>

    <div class="container">
        <div class="row">

        <?php 
            foreach($postres as $po):
                ?>

            <div class="col s12 m6 l3">

            <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="../asset/img/pr.jpg">
            </div>
                <!-- <a class="add-btn-flt btn btn-floating pink darken-1">
                    <i class="material-icons ">add</i>
                </a> -->
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4"><?php echo $po['nombre']; ?><a class="add-btn-flt btn btn-floating pink darken-1">
                <i class="material-icons" id="adds">add</i>
                </a></span>
                <p><a href="#!" id="linkCarritoProducto"><h5>Agregar al carrito</h5></a></p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Postre<i class="material-icons right">close</i></span>
                <p>Nombre: <?php echo $po['nombre']; ?></p>
                <p>Precio: <?php echo $po['precio']; ?></p>
                <p>Descripcion: <?php echo $po['descripcion']; ?></p>
            <!-- <p><a href="carrito/index.php?id=13"><h6>Agregar al carrito</h6></a></p> -->
            </div>
            </div>
            </div>

<?php endforeach ?>


    </div>
</div>

  <footer class="page-footer">
 <?php include("navbar/footer.php"); ?>
 </footer>
  <!--  script jquery  -->
  <script type="text/javascript" src="../asset/js/jquery-3.3.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->


  <script type="text/javascript" src="../asset/js/materialize.min.js"></script>
  <!--  script funciones index -->
  <script  src="../asset/js/index.js"></script>
  <script type="text/javascript" src="../asset/js/pace.min.js"></script>

</body>
</html>