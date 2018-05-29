<?php

include '../../Entidades/medida.php';

Class MedidaDAO extends Conexion
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
    * Método para obtener todos las unidades de medida que puede tener un ingrediente
    * @param object Usuario
    * @return datos
    */
    public static function getMedida()
    {
        $sql = "SELECT * FROM unidadmedida";
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
    * Método para ingresar nuevas unidades de medida de los ingredientes
    * @param object Usuario
    * @return datos
    */
    public static function addMedida($medida)
    {
        $sql = "INSERT INTO unidadmedida (descripcion) VALUES (:des)";
        self::getConexion();

        $sql2 = "SELECT * FROM unidadmedida WHERE UPPER(descripcion) LIKE UPPER(:nomb)";


        $res = self::$cnx->prepare($sql2);
        $nom = "%".$medida->getDescripcion()."%";
        $res->bindParam(":nomb", $nom);
        $res->execute();
        if($res->rowCount()<1)
        {
          $resultado = self::$cnx->prepare($sql);


          $des = $medida->getDescripcion();
        //  $estado = $ingrediente->getestadoI();


          $resultado->bindParam(":des", $des);
      //    $resultado->bindParam(":estado", $estado);

           $resultado->execute();

           return true;

        }
        else {
              return false;
        }
    }


}
?>
