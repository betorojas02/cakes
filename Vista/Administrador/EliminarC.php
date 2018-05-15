<?php
include '../../Controlador/IngreControlador.php';
include '../../Controlador/TipoControlador.php';
   $id = $_GET['i2'];


 $saveItem =  TipoControlador::eliminarDatos($id);

  if($saveItem){
    $return['valid'] = true;
    $return['msg'] = "registro eliminado con éxito!";

  }else{
    $return['valid'] = false;
    $return['msg'] = "El nombre del ingrediente ya existe";
  }
  echo json_encode($saveItem);

    header("location:categoriaa.php");



 ?>
