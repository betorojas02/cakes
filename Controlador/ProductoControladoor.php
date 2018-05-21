<?php
include '../../Datos/ProductosDAO.php';

class ProductoControlador
{

    public static function getProductos()
    {

        $respuesta = ProductosDAO::getProductos();

        return $respuesta;

    }

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

    public static function eliminarDatos ($id)
    {
      $obj_ingre = new Producto();
      $obj_ingre->setId_producto($id);
      $obj_ingre->setEstado("I");
       ProductosDAO::eliminarPro($obj_ingre);
    }

    public static function prodModoPago()
    {
      $respuesta = ProductosDAO::getProModoPago();

      return $respuesta;
    }

    public static function ventasXCliete()
    {
      $respuesta = ProductosDAO::getventasXCliete();

      return $respuesta;
    }

  }

 ?>
