<?php
require_once '../../Datos/DetallePedidoDao.php';

class DetallePedidoControlador
{

    public static function detallePedidoC($id)
    {

        $respuesta = DetallePedidoDao::detallePedidoM($id);

        return $respuesta;
   
    }

    public static function pedidosC($code){

        $respuesta = DetallePedidoDao::pedidoM($code);
    }

  }

 ?>
