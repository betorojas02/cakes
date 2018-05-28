<?php
include '../../Controlador/ProductoControladoor.php';
   $id = $_GET['i2'];


 $saveItem =  ProductoControlador::eliminarDatos($id);

  if($saveItem){
    $return['valid'] = true;
    $return['msg'] = "registro eliminado con éxito!";

  }else{
    $return['valid'] = false;
    $return['msg'] = "El nombre del ingrediente ya existe";
  }
  echo json_encode($saveItem);

    header("location:productos.php");



 ?>
