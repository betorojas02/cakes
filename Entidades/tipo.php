<?php
class tipo
{
	private $id_tipo;
	private $nombre_tipo;
	private $lista_productos = array();

	public function getId_tipo(){
		return $this->id_tipo;
	}

	public function setId_tipo($id_tipo){
		$this->id_tipo = $id_tipo;
	}

	public function getNombre_tipo(){
		return $this->nombre_tipo;
	}

	public function setNombre_tipo($nombre_tipo){
		$this->nombre_tipo = $nombre_tipo;
	}

	public function getLista_productos(){
		return $this->lista_productos;
	}

	public function setLista_productos($lista_productos){
		$this->lista_productos = $lista_productos;
	}
}
?>