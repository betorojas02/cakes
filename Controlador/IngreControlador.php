<?php
include '../../Datos/IngredienteDAO.php';


    class IngreControlador
    {

        public static function  getDatos()
        {
          return IngredienteDAO::getIngredientes();
        }

        public static function addIngredientes($nombre,$precio,$proveedor,$cantidad)
        {
          $obj_ingre = new Ingrediente();

          $obj_ingre->setNombre($nombre);
          $obj_ingre->setPrecio($precio);
          $obj_ingre->setId_proveedor($proveedor);
          $obj_ingre->setCantidad($cantidad);

          $respuesta = IngredienteDAO::addIngrediente($obj_ingre);

        }

        public static function  eliminarDatos ($id)
        {
          $obj_ingre = new Ingrediente();
          $obj_ingre->setId_ingrediente($id);
          $obj_ingre->setEstado("I");
          return IngredienteDAO::eliminarIng($obj_ingre);
        }


    }

?>
