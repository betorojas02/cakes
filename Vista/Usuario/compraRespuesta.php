<?php
require_once "../../Controlador/DetallePedidoControlador.php";
 require_once "../../include/session.php"; 
 require_once ('../../Controlador/cartControlador.php');


 $id =  $_SESSION["usuario"]["id_usuario"];
 $nombre = $_SESSION["usuario"]["nombre"];
 $fechaP = date("d-m-Y");
 $lapPaymentMethod = $_REQUEST['lapPaymentMethod'];
if(isset($_SESSION['cart'])){

$item = $_SESSION['cart'];
foreach($item as $i){

    $code=$i['code'];
    $precio = $i['price'];
    $cantidad = $i['amount'];
    $total = ($precio*$cantidad);

     $datos = DetallePedidoControlador::pedidosC($code,$id,$precio,$cantidad,$total,$fechaP,$nombre,$lapPaymentMethod);

echo $datos;
}
}else{
  echo "no esta";
}



$_SESSION['cart']=NULL;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../asset/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="../asset/dist/sweetalert.css">
    <link rel="stylesheet" href="../asset/css/index.css">
    <link rel="stylesheet" href="../asset/css/datosUsu.css">
    <title>Document</title>
</head>
<body>
<header>
      <?php include("navbar/navbarUsuario.php"); ?>
    <!--  terminaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->
  </header>
  <main>
<div class="container">
    <div class="row">
        <div class="center">
            <div class="card-panel pink darken-1">

            <p  style="color:#ffffff"> Compra Exitosa</p>

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
      <script type="text/javascript" src="../asset/dist/sweetalert.min.js"></script>
        <!--  script funciones index -->
    <script  src="../asset/js/index.js"></script>
    <script type="text/javascript" src="../asset/js/registro.js"></script>
</body>
</html>