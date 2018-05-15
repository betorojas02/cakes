<?php
require_once 'Conexion.php';


class ProductosModel extends Conexion
{

  public static $cnx;

  private static function getConexion()
  {
     self::$cnx = Conexion::conectar();
  }

  private static function desconectar()
  {
    self::$cnx = null;
  }


    public static function getProductoModel()
    {
        $sql = "SELECT * FROM producto";

         self::getConexion();
         $resultado = self::$cnx->prepare($sql);
         $resultado->execute();
         return $resultado->fetchAll();
    }

    public static function pastelesModel()
    {
        $sql = "SELECT * FROM producto where id_tipo=1";

         self::getConexion();
         $resultado = self::$cnx->prepare($sql);
         $resultado->execute();
         return $resultado->fetchAll();
    }

    public static function postresModel()
    {
        $sql = "SELECT * FROM producto where id_tipo=2";

         self::getConexion();
         $resultado = self::$cnx->prepare($sql);
         $resultado->execute();
         return $resultado->fetchAll();

    

    }

    public static function dulcesModel()
    {
        $sql = "SELECT * FROM producto where id_tipo=3";

         self::getConexion();
         $resultado = self::$cnx->prepare($sql);
         $resultado->execute();
         return $resultado->fetchAll();

    

    }
   

    public function ProductosM()
    {
      $sql =  "SELECT * FROM producto ";
      self::getConexion();
      $resultado = self::$cnx->prepare($sql);
      $resultado->execute();
      return $resultado->rowCount();
 
    }


       public static function addProductos($producto)
    {
        $sql = "INSERT INTO producto (descripcion,nombre,precio,estado,calificacion,id_tipo,votos,imagen)
        VALUES (:descripcion,:nombre,:precio,:estado,:calificacion,:id_tipo,:votos,:imagen)";
        self::getConexion();

        $sql2 = "SELECT * FROM producto WHERE UPPER(nombre) LIKE UPPER(:nomb)";

        $res = self::$cnx->prepare($sql2);
        $nom = "%".$producto->getNombre()."%";
        $res->bindParam(":nomb", $nom);
        $res->execute();
        if($res->rowCount()<1)
        {
          $resultado = self::$cnx->prepare($sql);

          $descripcion = $producto->getDescripcion();
          $nombre = $producto->getNombre();
          $precio = $producto->getPrecio();
          $estado = $producto->getEstado();
          $tipo = $producto->getId_tipo();
          $calificacion= $producto->getCalificacion();
          $votos= $producto->getVotos();
          $imagen = $producto->getImagen();

          $resultado->bindParam(":descripcion", $descripcion);
          $resultado->bindParam(":nombre", $nombre);
          $resultado->bindParam(":precio", $precio);
          $resultado->bindParam(":estado", $estado);
          $resultado->bindParam(":calificacion", $calificacion);
          $resultado->bindParam(":id_tipo", $tipo);
          $resultado->bindParam(":votos", $votos);
          $resultado->bindParam(":imagen", $imagen);

           $resultado->execute();


           return true;

        }
        else {
              return false;
        }
    }


        public static function eliminarPro($producto)
        {
          $sql = "UPDATE producto SET estado = :estado  where id_producto = :id  ";
          self::getConexion();

        

            $resultado = self::$cnx->prepare($sql);

            $estado = $producto->getEstado();
            $id = $producto->getId_producto();


            $resultado->bindParam(":estado",  $estado );
            $resultado->bindParam(":id", $id );

             $resultado->execute();

             return true;
        }
}
  
