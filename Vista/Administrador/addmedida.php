<?php

include '../../Controlador/MedidaControlador.php';

if(isset($_POST['descripcion']) ){



$descripcion = $_POST['descripcion'];



 $saveItem = MedidaControlador::addMedidas($descripcion);
  if($saveItem){
    $return['valid'] = true;
    $return['msg'] = "Nuevo registro agregado con éxito!";
    
  }else{
    $return['valid'] = false;
    $return['msg'] = "El nombre de esta unidad ya existe";
  }
  echo json_encode($saveItem);


}


 ?>
