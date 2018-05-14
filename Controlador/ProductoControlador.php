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

    public static function getPostresControllers()
    {

        $respuesta = ProductosModel::postresModel();
        return $respuesta;
   
    }

    public static function getDulcesControllers()
    {

        $respuesta = ProductosModel::dulcesModel();
        return $respuesta;
   
    }

    public static function ProductosC(){
        $respuesta = ProductosModel::ProductosM();
        return $respuesta;
    }
  }

 ?>
