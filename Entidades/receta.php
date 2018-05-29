<?php
class receta
{
	private $item;
	private $id_producto;
	private $id_ingrediente;
	private $cantidad;
	private $id_medida;

		public function getItem(){
		return $this->item;
	}

	public function setItem($item){
		$this->item = $item;
	}

	public function getId_producto(){
		return $this->id_producto;
	}

	public function setId_producto($id_producto){
		$this->id_producto = $id_producto;
	}

	public function getId_ingrediente(){
		return $this->id_ingrediente;
	}

	public function setId_ingrediente($id_ingrediente){
		$this->id_ingrediente = $id_ingrediente;
	}

	public function getCantidad(){
		return $this->cantidad;
	}

	public function setCantidad($cantidad){
		$this->cantidad = $cantidad;
	}

	public function getId_medida(){
		return $this->id_medida;
	}

	public function setId_medida($id_medida){
		$this->id_medida = $id_medida;
	}
}

?>