<?php
require_once '../../Datos/UsuarioDAO.php';


    class UsuarioControlador {

   
      /**
       * funcion para hacer un login en la pagina 
       *
       * @param [type] $correo
       * @param [type] $clave
       * @return  UsuarioDAO::login($obj_usu);
       */
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
        /**
         * funcion Controlador para agregar un usuario
         *
         * @param [type] $nombre
         * @param [type] $apellido
         * @param [type] $correo
         * @param [type] $clave
         * @param [type] $ciudad
         * @param [type] $telefono
         * @param [type] $sexo
         * @param [type] $cedula
         * @param [type] $tipoP
         * @param [type] $direccion
         * @param [type] $fecha
         * @param [type] $barrio
         * @param [type] $estado
         * @return void
         */
        public function addUsuarioC($nombre,$apellido,$correo,$clave,$ciudad,$telefono,$sexo,$cedula,$tipoP,$direccion,$fecha,$barrio,$estado){
          $respuesta = UsuarioDAO::addUsuarioM($nombre,$apellido,$correo,$clave,$ciudad,$telefono,$sexo,$cedula,$tipoP,$direccion,$fecha,$barrio,$estado);

        }
        /**
         * funcion Controlador para editar un usuario
         * 
         * @param [type] $id_usuario
         * @param [type] $ciudad
         * @param [type] $telefono
         * @param [type] $direccion
         * @param [type] $barrio
         * @return void
         */
        
        public function editUsuarioC($id_usuario,$ciudad,$telefono,$direccion,$barrio){
          $respuesta = UsuarioDAO::editUsuarioM($id_usuario,$ciudad,$telefono,$direccion,$barrio);
      }
       /**
        * funcion para bloquear despues de 3 intentos
        *
        * @param [type] $v_usuario
        * @return void
        */
        public function bloqueartUsuarioC($v_usuario){
            $respuesta = UsuarioDAO::bloqueartUsuarioM($v_usuario);
        }
        /**
         * funcion Controlador para saber si ya existe un correo
         *
         * @param [type] $correo
         * @return respuesta;
         */
        public function usuarioRepetidoC($correo){

                  $respuesta = UsuarioDAO::usuarioRepetidoM($correo);
                  return $respuesta;
        }
        /**
         * funcion Controlador para recuperar la clave de un usuario
         *
         * @param [type] $correo
         * @return void
         */
        public function recuperarC($correo){
          $respuesta = UsuarioDAO::recuperarM($correo);
          return $respuesta;

        }
        /**
         * funcion Controlador de los datos del usuario logiado
         *
         * @param [type] $id
         * @return respuesta
         */
        public function usuLC($id){
        $respuesta = UsuarioDAO::usuLM($id);
          return $respuesta;
      }

     /**
      * funcion controlador para el cambio de clave o recuperacion de clave
      *
      * @param [type] $id_usuario
      * @param [type] $clave
      * @return void
      */
      public function cambioClaveC($id_usuario,$clave){
        $respuesta = UsuarioDAO::cambioClaveM($id_usuario,$clave);
      }
}


?>
