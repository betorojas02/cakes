<?php

include '../../Controlador/IngreControlador.php';

if(isset($_POST['nombre']) ){



$nombre = $_POST['nombre'];
$precio= $_POST['precio'];
$proveedor = $_POST['proveedor'];
$cantidad = $_POST['cantidad'];



 $saveItem = IngreControlador::addIngredientes($nombre,$precio,$proveedor,$cantidad);
  if($saveItem){
    $return['valid'] = true;
    $return['msg'] = "Nuevo registro agregado con éxito!";
    
  }else{
    $return['valid'] = false;
    $return['msg'] = "El nombre del ingrediente ya existe";
  }
  echo json_encode($saveItem);


}


 ?>
