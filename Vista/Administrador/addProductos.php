<?php

include '../../Controlador/ProductoControlador.php';

if(isset($_POST['nombre']) ){



$nombre = $_POST['nombre'];
$precio= $_POST['precio'];
$descripcion = $_POST['descripcion'];
$tipo = $_POST['tipo'];
$imagen = $_FILES['imagen'];

echo $imagen;


// $ruta = $_FILES["imagen"]["tmp_name"];
// $destino = "../../files/".$imagen;
// copy($ruta,$destino);



 // $saveItem = ProductoControlador::addProductos($nombre,$precio,$descripcion,$tipo,$destino);
 //  if($saveItem){
 //    $return['valid'] = true;
 //    $return['msg'] = "Nuevo registro agregado con éxito!";
 //
 //  }else{
 //    $return['valid'] = false;
 //    $return['msg'] = "El nombre del producto ya existe";
 //  }
 //  echo json_encode($saveItem);


}


 ?>
