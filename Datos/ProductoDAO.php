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

   

    public function ProductosM()
    {
      $sql =  "SELECT * FROM producto ";
      self::getConexion();
      $resultado = self::$cnx->prepare($sql);
      $resultado->execute();
      return $resultado->rowCount();
 
    }
  }
