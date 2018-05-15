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
          $sql = "SELECT * FROM tipo WHERE estado = 'A'";
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
          * Método para ingresar nuevas categorias
          * @param object Categoria
          * @return datos
          */
          public static function addTipo($tipo)
          {
              $sql = "INSERT INTO tipo (nombre_tipo,estado)
              VALUES (:nombre,:estado)";
              self::getConexion();

              $sql2 = "SELECT * FROM tipo WHERE UPPER(nombre_tipo) LIKE UPPER(:nomb)";

              $res = self::$cnx->prepare($sql2);
              $nom = "%".$tipo->getNombre_tipo()."%";
              $res->bindParam(":nomb", $nom);
              $res->execute();
              if($res->rowCount()<1)
              {
                $resultado = self::$cnx->prepare($sql);


                $nombre = $tipo->getNombre_tipo();
                $estado = $tipo->getEstado();


                $resultado->bindParam(":nombre", $nombre);

                $resultado->bindParam(":estado", $estado);

                 $resultado->execute();



                 return true;

              }
              else {
                    return false;
              }
          }

          public static function eliminarTipo($tipo)
          {
            $sql = "UPDATE tipo SET estado = :estado  where id_tipo = :id  ";
            self::getConexion();


              $resultado = self::$cnx->prepare($sql);

              $estado = $tipo->getEstado();
              $id = $tipo->getId_tipo();


              $resultado->bindParam(":estado",  $estado );
              $resultado->bindParam(":id", $id );

               $resultado->execute();

               return true;
          }
      }


?>
