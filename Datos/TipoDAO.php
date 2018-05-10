<?php
  //include 'Conexion.php';
  include '../../Entidades/claseTipo.php';

  Class TipoDAO extends Conexion
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
      * Método para validar obtener datos de los tipo de producto
      * @param object claseTipo
      * @return object
      */
      public static function getTipos()
      {
          $sql = "SELECT * FROM tipo";
          self::getConexion();
          $resultado = self :: $cnx->prepare($sql);
          $resultado->execute();
          if($resultado->rowCount()>0)
          {
            return $resultado;
          }
          return false;
      }

      /**
      * Método para validar insertar
      * @param object claseTipo
      * @return object
      */
      public static function insertarTipos()
      {
          $sql = "INSERT INTO tipo (nombre_tipo) VALUES(default, ?)";
          self::getConexion();
          $resultado = self :: $cnx->prepare($sql);
          $resultado->execute();
          if($resultado->rowCount()>0)
          {
            return $resultado;
          }
          return false;


      }


  }

?>
