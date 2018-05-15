<?php
  include '../../Controlador/IngreControlador.php';
include '../../Controlador/ProvControlador.php';

if(isset($_POST['nombreE']) ){



$nombreE = $_POST['nombreE'];
$nombreC = $_POST['nombreC'];
$telefono = $_POST['telefono'];
$direccion= $_POST['direccion'];
$ciudad= $_POST['ciudad'];
$pais= $_POST['pais'];
$region= $_POST['region'];
$sitio= $_POST['sitio'];



 $saveItem = ProvControlador::addProveedor($nombreE,$nombreC, $telefono,$direccion,$ciudad,$pais,$region,$sitio);
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
