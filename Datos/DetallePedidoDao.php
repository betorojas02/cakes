<?php
require_once 'Conexion.php';


class DetallePedidoDao extends Conexion
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


    public static function detallePedidoM($id)
    {
        $sql = "SELECT p.nombre , d.cantidad, d.precio_total, d.precio_unidad FROM producto p , detallepedido d   , pedido pe
        WHERE
       
        p.id_producto = d.id_producto AND 
      
        pe.id_usuario =:id_usuario AND
        
        pe.id_pedido = d.id_pedido";

      
         self::getConexion();
         $resultado = self::$cnx->prepare($sql);
         $resultado->bindParam(":id_usuario", $id);
         $resultado->execute();

         if($resultado -> rowCount() > 0){

           return $resultado->fetchAll();
          }
          return  false;


    }


 
  }
