<?php

include '../../Entidades/receta.php';

Class recetaDAO extends Conexion
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
    * Método para obtener todos las recetas
    * @return datos
    */
    public static function getRecetas()
    {
        $sql = "SELECT * FROM recetaingrediente
        INNER JOIN producto
         ON producto.id_producto = recetaingrediente.id_producto inner join ingrediente
           on ingrediente.id_ingrediente = recetaingrediente.id_ingrediente inner join unidadmedida ON recetaingrediente.id_medida= unidadmedida.id_medida";
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
    * Método para ingresar nuevas recetas
    * @param object Usuario
    * @return datos
    */
    public static function addReceta($receta)
    {
        $sql = "INSERT INTO recetaingrediente (id_producto,id_ingrediente,cantidad,id_medida) VALUES (:product,:ingre,:cant,:med)";
        self::getConexion();

        $sql2 = "SELECT * FROM recetaingrediente WHERE (id_producto, id_ingrediente) = (:prod,:rec)";



        $res = self::$cnx->prepare($sql2);
        $prod = $receta->getId_producto();
        $rec = $receta->getId_ingrediente();
          $res->bindParam(":prod", $prod);
        $res->bindParam(":rec", $rec);

        $res->execute();
        if($res->rowCount()<1)
        {
          $resultado = self::$cnx->prepare($sql);

          $product = $receta->getId_producto();
          $ingre = $receta->getId_ingrediente();
          $cantidad = $receta->getCantidad();
          $med= $receta -> getId_medida();
        //  $estado = $ingrediente->getestadoI();

          $resultado->bindParam(":product", $product);
          $resultado->bindParam(":ingre", $ingre);
          $resultado->bindParam(":cant", $cant);
          $resultado->bindParam(":med", $med);
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
