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
    public static function addProveedor($proveedor)
    {
        $sql = "INSERT INTO proveedor (nombre_empresa,nombre_contacto,telefono_proveedor,direccion_proveedor,
          ciudad_proveedor,pais_proveedor,region_proveedor,sitio_web_proveedor,estado)
        VALUES (:nomE,:nomC,:tel,:dir,:ciudad,:pais,:region,:sitio,:estado)";
        self::getConexion();

        $sql2 = "SELECT * FROM proveedor WHERE UPPER(nombre_empresa) LIKE UPPER(:nomb)";

        //$sql3 = "UPDATE prive SET cantidad = cantidad + :cantidad WHERE UPPER(nombre_ingrediente) LIKE UPPER(:nombr) ";

        $res = self::$cnx->prepare($sql2);
        $nom = "%".$proveedor->getNombreEmpresa()."%";
        $res->bindParam(":nomb", $nom);
        $res->execute();
        if($res->rowCount()<1)
        {
          $resultado = self::$cnx->prepare($sql);

          $nombE = $proveedor->getNombreEmpresa();
          $nombC = $proveedor->getNombreContacto();
          $tel = $proveedor->getTelefono();
          $dir =  $proveedor->getDireccion();
          $ciudad =  $proveedor->getCiudad();
          $pais =  $proveedor->getPais();
          $region =  $proveedor->getRegion();
          $sitio = $proveedor->getSitio();
          $estado =  $proveedor->getEstado();


          $resultado->bindParam(":nomE", $nombE);
          $resultado->bindParam(":nomC", $nombC);
          $resultado->bindParam(":tel", $tel);
          $resultado->bindParam(":dir", $dir);
          $resultado->bindParam(":ciudad", $ciudad);
          $resultado->bindParam(":pais", $pais);
          $resultado->bindParam(":region", $region);
          $resultado->bindParam(":sitio", $sitio);
          $resultado->bindParam(":estado", $estado);

           $resultado->execute();

           return true;

        }
        else {
              return false;
        }
    }


    // public static function eliminarIng($ingrediente)
    // {
    //   $sql = "UPDATE ingrediente SET estado = :estado  where id_ingrediente = :id  ";
    //   self::getConexion();
    //
    //
    //
    //     $resultado = self::$cnx->prepare($sql);
    //
    //     $estado = $ingrediente->getEstado();
    //     $id = $ingrediente->getId_ingrediente();
    //
    //
    //     $resultado->bindParam(":estado",  $estado );
    //     $resultado->bindParam(":id", $id );
    //
    //      $resultado->execute();
    //
    //      return true;
    // }



}
?>
