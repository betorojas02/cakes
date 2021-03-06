<?php

include '../../Entidades/ingrediente.php';

Class IngredienteDAO extends Conexion
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
    public static function getIngredientes()
    {
        $sql = "SELECT * FROM ingrediente
        INNER JOIN proveedor ON ingrediente.id_proveedor = proveedor.id_proveedor  WHERE ingrediente.estado = 'A' ";
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
    public static function addIngrediente($ingrediente)
    {
        $sql = "INSERT INTO ingrediente (nombre_ingrediente,precio,id_proveedor,cantidad,estado) VALUES (:nombre,:precio,:prov,:cant,:esta)";
        self::getConexion();

        $sql2 = "SELECT * FROM ingrediente WHERE UPPER(nombre_ingrediente) LIKE UPPER(:nomb)";

        $sql3 = "UPDATE ingrediente SET cantidad = cantidad + :cantidad WHERE UPPER(nombre_ingrediente) LIKE UPPER(:nombr) ";

        $res = self::$cnx->prepare($sql2);
        $nom = "%".$ingrediente->getNombre()."%";
        $res->bindParam(":nomb", $nom);
        $res->execute();
        if($res->rowCount()<1)
        {
          $resultado = self::$cnx->prepare($sql);

          $nombre = $ingrediente->getNombre();
          $precio = $ingrediente->getPrecio();
          $prov = $ingrediente->getId_proveedor();
          $cantidad = $ingrediente->getCantidad();
          $estado = $ingrediente->getEstado();

          $resultado->bindParam(":nombre", $nombre);
          $resultado->bindParam(":precio", $precio);
          $resultado->bindParam(":prov", $prov);
          $resultado->bindParam(":cant", $cantidad);
          $resultado->bindParam(":esta", $estado);

           $resultado->execute();

           return true;

        }
        else {
              return false;
        }
    }


    public static function eliminarIng($ingrediente)
    {
      $sql = "UPDATE ingrediente SET estado = :estado  where id_ingrediente = :id  ";
      self::getConexion();



        $resultado = self::$cnx->prepare($sql);

        $estado = $ingrediente->getEstado();
        $id = $ingrediente->getId_ingrediente();


        $resultado->bindParam(":estado",  $estado );
        $resultado->bindParam(":id", $id );

         $resultado->execute();

         return true;
    }


}


?>
