<?php
require_once '../../Datos/DetallePedidoDao.php';

class DetallePedidoControlador
{

    public static function detallePedidoC($id)
    {

        $respuesta = DetallePedidoDao::detallePedidoM($id);

        return $respuesta;
   
    }

  }

 ?>
