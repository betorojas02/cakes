<?php
include '../../Datos/TipoDAO.php';


    class TipoControlador {


        public function getTipo()
        {
          return TipoDAO::getTipos();
        }




     public static function addTipo($nombre)
     {

    $obj_pro = new Tipo();

    $obj_pro->setNombre_tipo($nombre);
    $obj_pro->setEstado("A");

    $respuesta = TipoDAO::addTipo($obj_pro);

    return $respuesta;

    }


    public static function  eliminarDatos($id)
    {
      $obj_ingre = new Tipo();
      $obj_ingre->setId_tipo($id);
      $obj_ingre->setEstado("I");
      return TipoDAO::eliminarTipo($obj_ingre);
    }

}


?>
