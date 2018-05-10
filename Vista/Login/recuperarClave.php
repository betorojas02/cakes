<?php
 require_once('../../Controlador/UsuarioControlador.php');

if(isset($_POST['id_usuario']) && isset($_POST['clave']) ){
 $clave = $_POST['clave'];
  $id_usuario = $_POST['id_usuario'];



 UsuarioControlador::cambioClaveC($id_usuario,$clave);



   echo json_encode(array('error' => false ));


}
?>
