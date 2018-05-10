<?php

include '../../Entidades/proveedor.php';

Class ProveedorDAO extends Conexion
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
    * Método para obtener todos los proveedores
    * @param object Proveedor
    * @return datos
    */
    public static function getProveedores()
    {
        $sql = "SELECT * FROM proveedor";

        self::getConexion();
        $resultado = self::$cnx->prepare($sql);

        $resultado->execute();

        if($resultado->rowCount()>0)
        {


            return $resultado;

        }
        return false;
    }

    /**
    * Método para ingresar nuevos ingredientes
    * @param object Usuario
    * @return datos
    */
    // public static function insertIngre($ingrediente)
    // {
    //     $sql = "SELECT * FROM usuario
    //     WHERE correo  = :correo  AND clave = :clave ";
    //
    //
    //     self::getConexion();
    //
    //     $resultado = self::$cnx->prepare($sql);
    //
    //     $correo = $usuario->getCorreo();
    //     $clave = $usuario->getClave();
    //
    //     $resultado->bindParam(":correo", $correo);
    //     $resultado->bindParam(":clave", $clave);
    //
    //      $resultado->execute();
    //
    //
    //
    //     if($resultado->rowCount()>0)
    //     {
    //
    //       $filas =  $resultado->fetch();
    //           if($filas["correo"] == $usuario->getCorreo() &&
    //             $filas["clave"] == $usuario->getClave())
    //           {
    //              return $filas;
    //           }
    //     }
    //     return false;
    // }


}
?>
