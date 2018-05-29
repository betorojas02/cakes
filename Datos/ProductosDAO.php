<?php
include 'Conexion.php';
include '../../Entidades/producto.php';

class ProductosDAO extends Conexion
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


    public static function getProductos()
    {
        $sql = "SELECT * FROM producto INNER JOIN tipo ON producto.id_tipo = tipo.id_tipo WHERE producto.estado = 'A' ";

         self::getConexion();
         $resultado = self::$cnx->prepare($sql);
         $resultado->execute();

         if($resultado->rowCount()>0)
         {

             return $resultado;

         }
         else {
           return false;
         }

    }

    /**
    * Método para ingresar nuevos productos
    * @param object Producto
    * @return datos
    */
    public static function addProductos($producto)
    {
        $sql = "INSERT INTO producto (descripcion,nombre,precio,estado,id_tipo,imagen)
        VALUES (:descripcion,:nombre,:precio,:estado,:id_tipo,:imagen)";
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
          $resultado->bindParam(":id_tipo", $tipo);
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


        public static function getProModoPago()
        {
            $sql = "SELECT nombre,count(*) AS total  from modopago, pedido
            where pedido.id_modopago=modopago.id_modo_pago
            group by (nombre);";

             self::getConexion();

             $resultado = self::$cnx->prepare($sql);
             $resultado->execute();
             return $resultado->fetchAll();
        }


        public static function getventasXCliete()
        {
          $sql = "SELECT nombre_usuario2, apellido_usuario2, sum(precio_total) as total
          from detallepedido INNER JOIN pedido ON detallepedido.id_pedido = pedido.id_pedido
          group by (nombre_usuario2, apellido_usuario2);";

          self::getConexion();

          $resultado = self::$cnx->prepare($sql);
          $resultado->execute();
          return $resultado->fetchAll();
        }
}


?>
