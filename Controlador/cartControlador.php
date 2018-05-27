<?php
require_once '../../Datos/ProductoDAO.php';
class cart extends ProductosModel
{

    public $cart = array();

    public function __construct()
    {

        if (isset($_SESSION['cart'])) {
            $this->cart = $_SESSION['cart'];
        }
    }

    /**
     * funcion para agregar los item al carrito de compras
     *
     * @param [type] $code
     * @param [type] $amount
     * @return void
     */
    public function add_item($code, $amount)
    {
        $search = $this->buscar_code($code);
        echo "<script>console.log( 'CODE cont: " . $code . "' );</script>";
        echo "<script>console.log( 'AMOUNT cont: " . $amount . "' );</script>";
        echo "<script>console.log( 'SEARCH cont: " . $search . "' );</script>";
        if ($search > 0) {

            $code = $this->code;
            $product = $this->product;
            $price = $this->price;
            $item = array(
                'code' => $code,
                'product' => $product,
                'price' => $price,
                'amount' => $amount,
            );
            if (!empty($this->cart)) {
                foreach ($this->cart as $key) {
                    if ($key['code'] == $code) {
                        $item['amount'] = $key['amount'] + $item['amount'];
                    }
                }
            }
            $item['subtotal'] = $item['price'] * $item['amount'];
            $_SESSION['cart'][$code] = $item;
            $this->update_cart();
        }
    }

    /**
     * funcion para remover el item del carrito de compras mediante el codigo
     *
     * @param [type] $code
     * @return void
     */
    public function remove_item($code)
    {

        unset($_SESSION['cart'][$code]);
        $this->update_cart();
        return true;
    }
    /**
     * funcion para listar los elementos del carrito de compras
     *
     * @return $html
     */
    public function get_items()
    {
        $html = '';
        if (!empty($this->cart)) {
            foreach ($this->cart as $key) {
                $code = "'" . $key['code'] . "'";
                $html .= '<tr>
								<td>' . $key['code'] . '</td>
								<td>' . $key['product'] . '</td>
								<td align="right">' . number_format($key['price'], 2) . '</td>
								<td align="right">' . $key['amount'] . '</td>
								<td align="right">' . number_format($key['subtotal'], 2) . '</td>
								<td>
									<button class="btn waves-effect waves-light  red darken-4" onClick="deleteProduct(' . $code . ');">
				                    	Eliminar
				                    </button>
								</td>




							  </tr>';
            }
        }
        return $html;
    }

    /**
     * funcion para retornar el total de item del carrito de compras
     *
     * @return $total
     */
    public function get_total_items()
    {
        $total = 0;
        if (!empty($this->cart)) {
            foreach ($this->cart as $key) {
                $total += $key['amount'];
            }
        }
        return $total;
    }
    /**
     * funcion para retornar el total de las ventas en el carrito de compras
     *
     * @return $total
     */
    public function get_total_payment()
    {
        $total = 0;
        if (!empty($this->cart)) {
            foreach ($this->cart as $key) {
                $total += $key['subtotal'];
            }
        }
        return $total;
    }

    public function update_cart()
    {
        self::__construct();
    }
}
