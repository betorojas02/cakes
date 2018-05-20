<?php
require_once '../../Datos/DetallePedidoDao.php';

class DetallePedidoControlador
{

    public static function detallePedidoC($id)
    {

        $respuesta = DetallePedidoDao::detallePedidoM($id);

        return $respuesta;
   
    }

    public static function pedidosC($code,$id,$precio,$cantidad,$total,$fechaP,$nombre,$lapPaymentMethod){

        $respuesta = DetallePedidoDao::pedidoM($code,$id,$precio,$cantidad,$total,$fechaP,$nombre,$lapPaymentMethod);
    }

  }

 ?>
