<?php
 require_once('../../Controlador/UsuarioControlador.php');
if(isset($_POST['id_usuario']) && isset($_POST['ciudad']) ){


 $id_usuario = $_POST['id_usuario'];

 $ciudad = $_POST['ciudad'];
 $telefono= $_POST['telefono'];
 $direccion = $_POST['direccion'];
 $barrio= $_POST['barrio'];


   $saveItem = UsuarioControlador::editUsuarioC($id_usuario,$ciudad,$telefono,$direccion,$barrio);
  if($saveItem)
  {
    $return['valid'] = true;
    $return['msg'] = "Nuevo registro agregado con éxito!";
    echo json_encode(array('error' => false ));
  }else
  {
    $return['valid'] = false;
  }
  echo json_encode($saveItem);


}

?>