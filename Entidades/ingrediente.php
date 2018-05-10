<?php

class Ingrediente
{
  private $id_ingrediente;
  private $nombre;
  private $precio;
  private $id_proveedor;
  private $cantidad;

  public function getId_ingrediente(){
		return $this->id_ingrediente;
	}

	public function setId_ingrediente($id_ingrediente){
		$this->id_ingrediente = $id_ingrediente;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
	}

	public function getId_proveedor(){
		return $this->id_proveedor;
	}

	public function setId_proveedor($id_proveedor){
		$this->id_proveedor = $id_proveedor;
	}

	public function getCantidad(){
		return $this->cantidad;
	}

	public function setCantidad($cantidad){
		$this->cantidad = $cantidad;
	}


}


 ?>
