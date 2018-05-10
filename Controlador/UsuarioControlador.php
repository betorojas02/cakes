<?php
include '../../Datos/UsuarioDAO.php';


    class UsuarioControlador {

        public static function login ($correo, $clave)
        {
          $obj_usu = new Usuario();
          $obj_usu->setCorreo($correo);
          $obj_usu->setClave($clave);

          return UsuarioDAO::login($obj_usu);
        }

        public function getUsuario($correo, $clave)
        {
          $obj_usu = new Usuario();
          $obj_usu->setCorreo($correo);
          $obj_usu->setClave($clave);

          return UsuarioDAO::getUsuario($obj_usu);
        }

        public function addUsuarioC($nombre,$apellido,$correo,$clave,$ciudad,$telefono,$sexo,$cedula,$tipoP,$direccion,$fecha,$barrio,$estado){
          $respuesta = UsuarioDAO::addUsuarioM($nombre,$apellido,$correo,$clave,$ciudad,$telefono,$sexo,$cedula,$tipoP,$direccion,$fecha,$barrio,$estado);

        }
        public function editUsuarioC($id_usuario,$ciudad,$telefono,$direccion,$barrio){
          $respuesta = UsuarioDAO::editUsuarioM($id_usuario,$ciudad,$telefono,$direccion,$barrio);
      }
        // funcion bloquear usuario
        public function bloqueartUsuarioC($v_usuario){
            $respuesta = UsuarioDAO::bloqueartUsuarioM($v_usuario);
        }
        // FUNCION CORREO REPETIDO
        public function usuarioRepetidoC($correo){

                  $respuesta = UsuarioDAO::usuarioRepetidoM($correo);
                  return $respuesta;
        }
        public function recuperarC($correo){
          $respuesta = UsuarioDAO::recuperarM($correo);
          return $respuesta;

        }


        public function usuLC($id){
        $respuesta = UsuarioDAO::usuLM($id);
          return $respuesta;
      }

      // recuperar clave
      public function cambioClaveC($id_usuario,$clave){
        $respuesta = UsuarioDAO::cambioClaveM($id_usuario,$clave);
      }
}


?>
