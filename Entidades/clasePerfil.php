<?php
class tipo
{
	private $id_perfil;
	private $nombre_perfil;
	

	public function getId_perfil(){
		return $this->id_perfil;
	}

	public function setId_perfil($id_perfil){
		$this->id_perfil = $id_perfil;
	}

	public function getNombre_perfil(){
		return $this->nombre_perfil;
	}

	public function setNombre_perfil($nombre_perfil){
		$this->nombre_perfil = $nombre_perfil;
	}

}

?>