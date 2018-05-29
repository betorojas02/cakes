<?php
class medida
{
	private $id_medida;
	private $descripcion;

	public function getId_medida(){
		return $this->id_medida;
	}

	public function setId_medida($id_medida){
		$this->id_medida = $id_medida;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
}
?>
	