<?php
include '../../Controlador/ProductoControlador.php';
include '../../Controlador/TipoControlador.php';

if(isset($_POST['nombre']) ){



$nombre = $_POST['nombre'];




 $saveItem = TipoControlador::addTipo($nombre);
  if($saveItem){
    $return['valid'] = true;
    $return['msg'] = "Nueva categoría agregada con éxito!";

  }else{
    $return['valid'] = false;
    $return['msg'] = "El nombre de la categoría ya existe";
  }
  echo json_encode($saveItem);


}


 ?>
