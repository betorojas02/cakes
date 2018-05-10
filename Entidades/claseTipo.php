<?php
class tipo
{
	private $id_tipo;
	private $nombre_tipo;
	
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


	

}

?>