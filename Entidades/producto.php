<?php
class Producto
{
	private $id_producto;
	private $id_tipo;
	private $nombre;
	private $descripcion;
	private $precio;
	private $estado;
	private $imagen;
	private $calificacion;
	private $votos;

	public function getId_producto(){
		return $this->id_producto;
	}

	public function setId_producto($id_producto){
		$this->id_producto = $id_producto;
	}

	public function getId_tipo(){
		return $this->id_tipo;
	}

	public function setId_tipo($id_tipo){
		$this->id_tipo = $id_tipo;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getImagen(){
		return $this->imagen;
	}

	public function setImagen($imagen){
		$this->imagen = $imagen;
	}

	public function getCalificacion(){
		return $this->calificacion;
	}

	public function setCalificacion($calificacion){
		$this->calificacion = $calificacion;
	}
	public function getVotos(){
		return $this->votos;
	}

	public function setVotos($votos){
		$this->votos = $votos;
	}
}
?>
