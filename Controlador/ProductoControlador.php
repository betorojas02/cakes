<?php
require_once '../../Datos/ProductoDAO.php';

class ProductosController
{
    /**
     * metodo del controlador para traer todos los productos
     *
     * @return $respuesta
     */
    public static function getProductosControllers()
    {

        $respuesta = ProductosModel::getProductoModel();

        return $respuesta;
   
    }
    /**
     * funccion del controlador para traer todos los pasteles
     *
     * @return $respuesta
     */
    public static function getPastelesControllers()
    {

        $respuesta = ProductosModel::pastelesModel();
        return $respuesta;
   
    }
    /**
     * metodo del controlador para traer todos los postres
     *
     * @return void
     */
    public static function getPostresControllers()
    {

        $respuesta = ProductosModel::postresModel();
        return $respuesta;
   
    }
    /**
     * metodo del controlador para traer todos los dulces
     *
     * @return $respuesta
     */
    public static function getDulcesControllers()
    {

        $respuesta = ProductosModel::dulcesModel();
        return $respuesta;
   
    }
     /**
     * metodo del controlador para traer todos los ProductosC
     *
     * @return $respuesta
     */
    public static function ProductosC(){
        $respuesta = ProductosModel::ProductosM();
        return $respuesta;
    }
    /**
     * metodo controlador para agregar un producto
     *
     * @param [type] $nombre
     * @param [type] $precio
     * @param [type] $descripcion
     * @param [type] $tipo
     * @param [type] $destino
     * @return $respuesta
     */
    public static function addProductos($nombre,$precio,$descripcion,$tipo,$destino)
    {

        $obj_pro = new Producto();

        $obj_pro->setNombre($nombre);
        $obj_pro->setPrecio($precio);
        $obj_pro->setDescripcion($descripcion);
        $obj_pro->setId_tipo($tipo);
        $obj_pro->setImagen($destino);
        $obj_pro->setEstado("A");
        $obj_pro->setCalificacion("0");
        $obj_pro->setVotos("0");

        $respuesta = ProductosDAO::addProductos($obj_pro);

        return $respuesta;

    }
    /**
     * metodo para eleminar un producto mediante su id
     *
     * @param [type] $id
     * @return void
     */
    public static function eliminarDatos ($id)
    {
      $obj_ingre = new Producto();
      $obj_ingre->setId_producto($id);
      $obj_ingre->setEstado("I");
       ProductosDAO::eliminarPro($obj_ingre);
    }
  }

 ?>
