<?php
include '../../Datos/recetaDAO.php';


    class recetaControlador
    {

        public static function  getDatos ()
        {
          return recetaDAO::getRecetas();
          }

        public static function addRecetas($pro,$ing,$cantidad,$medida)
        {
          $obj_receta = new Receta();

          $obj_receta->setId_producto($pro);
          $obj_receta->setId_ingrediente($ing);
          $obj_receta->setCantidad($cantidad);
          $obj_receta->setId_medida($medida);
       //   $obj_pro->setEstado("A");

          $respuesta = recetaDAO::addReceta($obj_receta);

        }


    }

?>
