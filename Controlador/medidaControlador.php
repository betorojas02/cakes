<?php
include '../../Datos/medidaDAO.php';

class MedidaControlador
{

    public static function getMedidas()
    {

        $respuesta = MedidaDAO::getMedida();

        return $respuesta;

    }

    public static function addMedidas($descripcion)
    {

        $obj_med = new Medida();


        $obj_med->setDescripcion($descripcion);
      

        $respuesta = MedidaDAO::addMedida($obj_med);

        return $respuesta;

    }
  }

 ?>
