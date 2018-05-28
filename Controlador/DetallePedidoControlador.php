<?php
require_once '../../Datos/DetallePedidoDao.php';

class DetallePedidoControlador
{
    /**
     * funcion para dar con los pedidos o las compras de los usuarios de la session iniciada mediante su id
     *
     * @param [type] $id
     * @return  $respuesta;
     */
    public static function detallePedidoC($id)
    {

        $respuesta = DetallePedidoDao::detallePedidoM($id);

        return $respuesta;
   
    }
    /**
     * funcion para agregar una compra o un pedido , estos parametros va un modelo.
     *
     * @param [type] $code
     * @param [type] $id
     * @param [type] $precio
     * @param [type] $cantidad
     * @param [type] $total
     * @param [type] $fechaP
     * @param [type] $nombre
     * @param [type] $lapPaymentMethod
     * @param [type] $direccion
     * @return void
     */
    public static function pedidosC($code,$id,$precio,$cantidad,$total,$fechaP,$nombre,$lapPaymentMethod,$direccion){

        $respuesta = DetallePedidoDao::pedidoM($code,$id,$precio,$cantidad,$total,$fechaP,$nombre,$lapPaymentMethod,$direccion);
    }

  }

 ?>
