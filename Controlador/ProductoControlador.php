<?php
require_once '../../Datos/ProductoDAO.php';

class ProductosController
{

    public static function getProductosControllers()
    {

        $respuesta = ProductosModel::getProductoModel();

        return $respuesta;
   
    }

    public static function getPastelesControllers()
    {

        $respuesta = ProductosModel::pastelesModel();
        return $respuesta;
   
    }
    public static function ProductosC(){
        $respuesta = ProductosModel::ProductosM();
        return $respuesta;
    }
  }

 ?>
