<?php
include '../../Datos/ProductoDAO.php';

class ProductosController
{

    public static function getProductosControllers()
    {

        $respuesta = ProductosModel::getProductoModel();

        return $respuesta;
   
    }

    public static function ProductosC(){
        $respuesta = ProductosModel::ProductosM();
        return $respuesta;
    }
  }

 ?>