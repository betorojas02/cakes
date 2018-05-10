<?php
class Auditoria
{
	private $id_auditoria;
	private $id_usuario;
	private $tabla;
	private $accion;
	private $valor_anterior;
	private $valor_nuevo;
	private $fecha;

	public function getId_auditoria(){
		return $this->id_auditoria;
	}

	public function setId_auditoria($id_auditoria){
		$this->id_auditoria = $id_auditoria;
	}

	public function getId_usuario(){
		return $this->id_usuario;
	}

	public function setId_usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	public function getTabla(){
		return $this->tabla;
	}

	public function setTabla($tabla){
		$this->tabla = $tabla;
	}

	public function getAccion(){
		return $this->accion;
	}

	public function setAccion($accion){
		$this->accion = $accion;
	}

	public function getValor_anterior(){
		return $this->valor_anterior;
	}

	public function setValor_anterior($valor_anterior){
		$this->valor_anterior = $valor_anterior;
	}

	public function getValor_nuevo(){
		return $this->valor_nuevo;
	}

	public function setValor_nuevo($valor_nuevo){
		$this->valor_nuevo = $valor_nuevo;
	}

	public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

}

?>
