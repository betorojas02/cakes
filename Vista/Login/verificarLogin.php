<?php

  require_once('../../Controlador/UsuarioControlador.php');

  session_start();
  if (!isset($_SESSION['contadorLogin']) && !isset($_POST["email"])) {
  
      $_SESSION['contadorLogin']=0;
      }


   $usuC = $_POST["email"];
   $v_usuario=  $_POST["email"];
   $v_password= $_POST["password"];


$resultado_set= UsuarioControlador::login($v_usuario,$v_password);

if($resultado_set)
{
  $usuario = UsuarioControlador::getUsuario($v_usuario,$v_password);
  $_SESSION["usuario"] = array(
      "id_usuario" =>  $usuario->getId(),
      "id_perfil"  =>  $usuario->getPerfil(),
      "nombre"     =>  $usuario->getNombre(),
      "correo"     =>  $usuario->getCorreo(),
      "estado"     =>  $usuario->getEstado(),
  );
  echo json_encode(array('error' => false , 'tipo' => $resultado_set['id_perfil']));
}else{

      $_SESSION['contadorLogin'] =  ++$_SESSION['contadorLogin'];
         // echo   $_SESSION['contadorLogin'];
        echo json_encode(array('error' => true ));
}
  // code...
  if($_SESSION['contadorLogin']>3){
    // echo "bloqueo usuario";
  $usuario = UsuarioControlador::bloqueartUsuarioC($v_usuario);
// echo "asd";
}



// if ($_SESSION['contadorLogin']>3) {
//   echo "hola";
//   // $usuario = UsuarioControlador::bloqueartUsuarioC($v_usuario);
// }



?>
