<?php
include 'Conexion.php';
include '../../Entidades/clasePerfil.php';

Class PerfilDAO extends Conexion
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
    * Método para obtener todos los ingredientes
    * @param object Usuario
    * @return datos
    */
    public static function getPerfil()
    {
        $sql = "SELECT * FROM perfil";
        self::getConexion();

        $resultado = self::$cnx->prepare($sql);

        $resultado->execute();



        if($resultado->rowCount()>0)
        {

            return $resultado;

        }
        return false;
    }
}
?>
