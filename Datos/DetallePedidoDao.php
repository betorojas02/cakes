<?php
require_once 'Conexion.php';

class DetallePedidoDao extends Conexion
{

    public static $cnx;

    private static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar()
    {
        self::$cnx = null;
    }
    /**
     * metodo para saber el pedido de o el detallepedido de un cliente
     *
     * @param [type] $id
     * @return void
     */
    public static function detallePedidoM($id)
    {
        $sql = "SELECT p.nombre , d.cantidad, d.precio_total, d.precio_unidad FROM producto p , detallepedido d   , pedido pe
        WHERE

        p.id_producto = d.id_producto AND

        pe.id_usuario =:id_usuario AND

        pe.id_pedido = d.id_pedido";

        self::getConexion();
        $resultado = self::$cnx->prepare($sql);
        $resultado->bindParam(":id_usuario", $id);
        $resultado->execute();

        if ($resultado->rowCount() > 0) {

            return $resultado->fetchAll();
        }
        return false;

    }
    /**
     * metodo para hacer la insercion de un pedido
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
    public static function pedidoM($code, $id, $precio, $cantidad, $total, $fechaP, $nombre, $lapPaymentMethod, $direccion)
    {

        $sql = "INSERT INTO pedido(id_usuario,fecha_pedido,direccion_destino,nombre_usuario2) VALUES (:id_usuario,:fecha_pedido,:direccion_destino,:nombre_usuario2)";
        self::getConexion();
        $resultado = self::$cnx->prepare($sql);
        $resultado->bindParam(":id_usuario", $id);
        $resultado->bindParam(":fecha_pedido", $fechaP);
        $resultado->bindParam(":direccion_destino", $direccion);
        $resultado->bindParam(":nombre_usuario2", $nombre);

        $resultado->execute();
        $lastId = self::$cnx->lastInsertId();

        // insercion
        $sqll = "INSERT INTO detallepedido (id_pedido,id_producto,precio_unidad,cantidad,precio_total,descuento)
                                VALUES(:id_pedido,:id_producto,:precio_unidad,:cantidad,:precio_total,0)";
        self::getConexion();
        $resultados = self::$cnx->prepare($sqll);
        $resultados->bindParam(":id_pedido", $lastId);
        $resultados->bindParam(":id_producto", $code);
        $resultados->bindParam(":precio_unidad", $precio);
        $resultados->bindParam(":cantidad", $cantidad);
        $resultados->bindParam(":precio_total", $total);
        $resultados->execute();

    }

}
