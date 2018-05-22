<?php
require_once '../../Controlador/ProductoControlador.php';
session_start();
$dulces = ProductosController::getDulcesControllers();

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
  <link rel="stylesheet" type="text/css" href="../asset/dist/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="../asset/css/materialize.min.css">
<link rel="stylesheet" href="../asset/css/index.css">
<link rel="stylesheet" type="text/css" href="../asset/pink/pace-theme-flash.css">
</head>
<body>
<main>
 <?php include 'navbar/navbarUsuario.php';?>

    <div class="container">
        <div class="row">
<?php if($dulces > 0){


 ?>
        <?php
foreach ($dulces as $du):
?>

            <div class="col s12 m6 l3">

            <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="<?php echo $du['imagen'] ?>">
            </div>
                <!-- <a class="add-btn-flt btn btn-floating pink darken-1">
                    <i class="material-icons ">add</i>
                </a> -->
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4"><?php echo $du['nombre']; ?><a class="add-btn-flt btn btn-floating pink darken-1">
                <i class="material-icons" id="adds">add</i>
                </a></span>
                <div class="input-field ">
            <?php  $code = $du['id_producto']; ?>
						<label>Cantidad</label>
						<input  class="validate" type="number"  id="<?PHP echo $code ?>" value="1"  min="1"  >
					</div>
            <a class="waves-effect waves-light btn pink darken-1"   onClick="addProduct(<?PHP echo $code ?>);">Agregar Carrito</a>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Postre<i class="material-icons right">close</i></span>
                <p>Nombre: <?php echo $du['nombre']; ?></p>
                <p>Precio: <?php echo $du['precio']; ?></p>
                <p>Descripcion: <?php echo $pa['descripcion']; ?></p>
            <!-- <p><a href="carrito/index.php?id=13"><h6>Agregar al carrito</h6></a></p> -->
            </div>
            </div>
            </div>

<?php endforeach?>
<?php }else {?>
    <br>
          <br>
          <br>
  <div class="container">
    <div class="row">
                <div class="center">
                  <div class="card-panel  pink darken-1" id="np">
                  Productos agotado
                  </div>
                  </div>
                  </div>
                  </div>
    <?php }?>
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
  <script  src="../asset/js/index.js"></script>
  <script type="text/javascript" src="../asset/js/pace.min.js"></script>
  <script type="text/javascript" src="../asset/dist/sweetalert.min.js"></script>

</body>
</html>