<?php
include '../../Controlador/IngreControlador.php';
   $id = $_GET['i2'];


 $saveItem =  IngreControlador::eliminarDatos($id);

  if($saveItem){
    $return['valid'] = true;
    $return['msg'] = "registro eliminado con éxito!";

  }else{
    $return['valid'] = false;
    $return['msg'] = "El nombre del ingrediente ya existe";
  }
  echo json_encode($saveItem);

    header("location:ingredientes.php");



 ?>
