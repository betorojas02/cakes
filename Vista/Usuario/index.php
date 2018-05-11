<?php

include_once('../../Controlador/ProductoControlador.php');
$obj=new ProductosController();
$productos=$obj->getProductosControllers();
$totalP =$obj->ProductosC();
session_start();


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortout icon" href="../Diseños/img/logo.png">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--  iconos de google-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" type="text/css" href="../asset/css/materialize.min.css">
<link rel="stylesheet" href="../asset/css/index.css">
  <title>L&B CAKES</title>
</head>
<body >



  <header>
    <?php include("navbar/navbarUsuario.php"); ?>
  <!--  terminaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->
</header>

<div class="container">
    <div class="row">
        <div class="col s12">
          <div class="slider">
  					<ul class="slides">
  						<li>
  							<img src="../asset/img/slide1.jpg">
  							<div class="caption center-align">
  								<h3 class="animated flip">Productos</h3>
  								<h5 class="light grey-text text-lighten-3 ani">Ediciones especiales </h5>
  								<!-- <a class="waves-effect waves-light btn animated bounceIn" href="catalogo/index.php">Comprar</a> -->
  							</div>
  						</li>
  						<li>
  							<img src="../asset/img/slide2.jpg">
  							<div class="caption left-align">
  								<h3>Postress.</h3>
  								<h5 class="light grey-text text-lighten-3">Productos de calidad en cakes</h5>
  							</div>
  						</li>


        </div>
    </div>
</div>
</div>

<div class="container">
    <div class="row">

    <?php if($totalP> 0){?>
      <?php
    
      foreach ($productos as $pro):
        // code..
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
            <span class="card-title activator grey-text text-darken-4"><?php echo $pro['nombre']; ?><a class="add-btn-flt btn btn-floating pink darken-1">
              <i class="material-icons" id="adds">add</i>
            </a></span>
            <p><a href="#!" id="linkCarritoProducto"><h5>Agregar al carrito</h5></a></p>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Postre<i class="material-icons right">close</i></span>
            <p>Nombre: <?php echo $pro['nombre']; ?></p>
            <p>Precio: <?php echo $pro['precio']; ?></p>
            <p>Descripcion: <?php echo $pro['descripcion']; ?></p>
    <!-- <p><a href="carrito/index.php?id=13"><h6>Agregar al carrito</h6></a></p> -->
          </div>
        </div>
      </div>
      
    <?php endforeach ?>
    <?php }else{ ?>
              <div>
                <div class="center">
                  <div class="card-panel  pink darken-1" id="np">
                   No Hay Productos Disponibles
                  </div>
                </div>  
              </div>
         
            
  </div>
</div>

            <?php
            }
            ?>

  <!--  script jquery  -->
  <script type="text/javascript" src="../asset/js/jquery-3.3.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->


  <script type="text/javascript" src="../asset/js/materialize.min.js"></script>
  <!--  script funciones index -->
  <script  src="../asset/js/index.js"></script>


</body>
</html>
