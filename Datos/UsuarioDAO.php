<?php
  include 'Conexion.php';
  include '../../Entidades/Usuario.php';

  Class UsuarioDAO extends Conexion
  {
      protected static $cnx;

      private static function getConexion()
      {
         self::$cnx = Conexion::conectar();
      }

      private static function desconectar()
      {
        self::$cnx = null;
      }

      /**
      * Método para validar el login del Usuario
      * @param object Usuario
      * @return datos
      */
      public static function login($usuario)
      {
          $sql = "SELECT * FROM usuario
          WHERE correo  = :correo  AND clave = :clave  AND estado = 'A'  ";


          self::getConexion();

          $resultado = self::$cnx->prepare($sql);

          $correo = $usuario->getCorreo();
          $clave = $usuario->getClave();

          $resultado->bindParam(":correo", $correo);
          $resultado->bindParam(":clave", $clave);

           $resultado->execute();



          if($resultado->rowCount()>0)
          {

            $filas =  $resultado->fetch();
                if($filas["correo"] == $usuario->getCorreo() &&
                  $filas["clave"] == $usuario->getClave())
                {
                   return $filas;
                }
          }
          return false;

      }


      /**
      * Método para validar obtener datos del usuario
      * @param object Usuario
      * @return object
      */
      public static function getUsuario($usuario)
      {
          $sql = "SELECT id_usuario,id_perfil,nombre,apellido,correo,ciudad,direccion,telefono,sexo,cedula,
           fecha_nacimiento,barrio,estado FROM usuario
          WHERE correo  = :correo  AND clave = :clave ";
          self::getConexion();

          $resultado = self::$cnx->prepare($sql);

          $correo = $usuario->getCorreo();
          $clave = $usuario->getClave();

          $resultado->bindParam(":correo", $correo);
          $resultado->bindParam(":clave", $clave);

          $resultado->execute();

          $filas =  $resultado->fetch();

          $usuario = new Usuario();
          $usuario->setId($filas["id_usuario"]);
          $usuario->setPerfil($filas["id_perfil"]);
          $usuario->setNombre($filas["nombre"]);
          $usuario->setApellido($filas["apellido"]);
          $usuario->setCorreo($filas["correo"]);
          $usuario->setCiudad($filas["ciudad"]);
          $usuario->setDireccion($filas["direccion"]);
          $usuario->setTelefono($filas["telefono"]);
          $usuario->setSexo($filas["sexo"]);
          $usuario->setCedula($filas["cedula"]);
          $usuario->setFechaNacimiento($filas["fecha_nacimiento"]);
          $usuario->setBarrio($filas["barrio"]);
          $usuario->setEstado($filas["estado"]);


          return $usuario;

      }

      public static function addUsuarioM($nombre,$apellido,$correo,$clave,$ciudad,$telefono,$sexo,$cedula,$tipoP,$direccion,$fecha,$barrio,$estado)

      {
          $sql = "INSERT INTO usuario (id_perfil,nombre,apellido,correo,clave,ciudad,direccion,telefono,sexo,cedula,fecha_nacimiento,barrio,estado)
                                VALUES(:id_perfil,:nombre,:apellido,:correo,:clave,:ciudad,:direccion,:telefono,:sexo,:cedula,:fecha_nacimiento,:barrio,:estado)";
                self::getConexion();
                $resultado = self::$cnx->prepare($sql);
                 $resultado->bindParam(":id_perfil", $tipoP);
                $resultado->bindParam(":nombre", $nombre);
                $resultado->bindParam(":apellido", $apellido);
                 $resultado->bindParam(":correo", $correo);
                $resultado->bindParam(":clave", $clave);
                $resultado->bindParam(":ciudad", $ciudad);
                  $resultado->bindParam(":direccion", $direccion);
               $resultado->bindParam(":telefono", $telefono);
                $resultado->bindParam(":sexo", $sexo);
                  $resultado->bindParam(":cedula", $cedula);
                    $resultado->bindParam(":fecha_nacimiento", $fecha);
               $resultado->bindParam(":barrio", $barrio);
                 $resultado->bindParam(":estado", $estado);
                $resultado->execute();

      }

      public static function editUsuarioM($id_usuario,$ciudad,$telefono,$direccion,$barrio){
        $sql = "UPDATE usuario SET  ciudad=:ciudad , telefono=:telefono , direccion=:direccion  , barrio=:barrio WHERE id_usuario=:id_usuario";
            self::getConexion();
            $resultado = self::$cnx->prepare($sql);
            $resultado->bindParam(":id_usuario", $id_usuario);
            $resultado->bindParam(":ciudad", $ciudad);
            $resultado->bindParam(":telefono", $telefono);
            $resultado->bindParam(":direccion", $direccion);
            $resultado->bindParam(":telefono", $telefono);
            $resultado->bindParam(":barrio", $barrio);
            $resultado->execute();
      }

// funcion bloquear usuario
      public function bloqueartUsuarioM($v_usuario){
        $sql = "UPDATE usuario SET estado='I' WHERE correo=:correo";
            self::getConexion();
            $resultado = self::$cnx->prepare($sql);
            $resultado->bindParam(":correo", $v_usuario);
               $resultado->execute();
      }
// METODO DEL USUARIO LOGIADO
      public static function usuLM($id){
          $sql ="SELECT * FROM usuario WHERE id_usuario=:id_usuario";
          self::getConexion();
          $resultado = self::$cnx->prepare($sql);
          $resultado->bindParam(":id_usuario", $id);
          $resultado->execute();
          return $resultado->fetchAll();

      }

      public function usuarioRepetidoM($correo){
      $sql =  "SELECT correo FROM usuario WHERE correo=:correo";
      self::getConexion();
      $resultado = self::$cnx->prepare($sql);
      $resultado->bindParam(":correo", $correo);
      $resultado->execute();
      return $resultado->rowCount();

      }
      // correo a recuperar
      public function recuperarM($correo){
        $sql =  "SELECT id_usuario FROM usuario WHERE correo=:correo";
        self::getConexion();
        $resultado = self::$cnx->prepare($sql);
        $resultado->bindParam(":correo", $correo);
        $resultado->execute();
        return $resultado->fetchColumn();
      }
      // recupear clave
      public function cambioClaveM($id_usuario,$clave){


        $sql = "UPDATE usuario SET clave=:clave , estado='A' WHERE id_usuario=:id_usuario";
            self::getConexion();
            $resultado = self::$cnx->prepare($sql);
            $resultado->bindParam(":id_usuario", $id_usuario);
            $resultado->bindParam(":clave", $clave);

            $resultado->execute();
      }






  }

?>
