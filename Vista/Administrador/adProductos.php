<?php
include '../../Controlador/ProductoControlador.php';

$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];
$tipo = $_POST["tipo"];
$foto = $_FILES["imagen"];
$imagen = $_FILES["imagen"]["name"];
$ruta = $_FILES["imagen"]["tmp_name"];
$destino = "../../files/".$imagen;


if( $foto["type"] == "imagen/jpg"  OR $foto["type"] == "image/jpeg" )
{
  copy($ruta,$destino);
  //$ruta = "../../files/".md5($imagen["tmp_name"]).".jpg";
  $saveItem = ProductoControlador::addProductos($nombre,$precio,$descripcion,$tipo,$destino);
   if($saveItem){
     $return['valid'] = true;
     $return['msg'] = "Nuevo registro agregado con éxito!";

   }else{
     $return['valid'] = false;
     $return['msg'] = "El nombre del producto ya existe";
   }
   echo json_encode($saveItem);
}
else {
  ECHO "FORMATO INCORRECTO";
}



//echo $nombre. " " . $descripcion. " ". $precio. " " . $tipo
//echo $imagen;

// foreach ($imagen as $key => $value) {
//   // code...
//   echo $key." : " .$value. "<br>";
// }
 ?>
