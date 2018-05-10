<?php
  class Usuario
  {
    private $id;
    private $perfil;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $ciudad;
    private $direccion;
    private $telefono;
    private $sexo;
    private $cedula;
    private $fechaNacimiento;
    private $barrio;
    private $estado;

      public function getId(){
		    return $this->id;
    	}

    	public function setId($id){
    		$this->id = $id;
    	}

    	public function getPerfil(){
    		return $this->perfil;
    	}

    	public function setPerfil($perfil){
    		$this->perfil = $perfil;
    	}

    	public function getNombre(){
    		return $this->nombre;
    	}

    	public function setNombre($nombre){
    		$this->nombre = $nombre;
    	}

    	public function getApellido(){
    		return $this->apellido;
    	}

    	public function setApellido($apellido){
    		$this->apellido = $apellido;
    	}

    	public function getCorreo(){
    		return $this->correo;
    	}

    	public function setCorreo($correo){
    		$this->correo = $correo;
    	}

    	public function getClave(){
    		return $this->clave;
    	}

    	public function setClave($clave){
    		$this->clave = $clave;
    	}

    	public function getCiudad(){
    		return $this->ciudad;
    	}

    	public function setCiudad($ciudad){
    		$this->ciudad = $ciudad;
    	}

    	public function getDireccion(){
    		return $this->direccion;
    	}

    	public function setDireccion($direccion){
    		$this->direccion = $direccion;
    	}

    	public function getTelefono(){
    		return $this->telefono;
    	}

    	public function setTelefono($telefono){
    		$this->telefono = $telefono;
    	}

    	public function getSexo(){
    		return $this->sexo;
    	}

    	public function setSexo($sexo){
    		$this->sexo = $sexo;
    	}

    	public function getCedula(){
    		return $this->cedula;
    	}

    	public function setCedula($cedula){
    		$this->cedula = $cedula;
    	}

    	public function getFechaNacimiento(){
    		return $this->fechaNacimiento;
    	}

    	public function setFechaNacimiento($fechaNacimiento){
    		$this->fechaNacimiento = $fechaNacimiento;
    	}

    	public function getBarrio(){
    		return $this->barrio;
    	}

    	public function setBarrio($barrio){
    		$this->barrio = $barrio;
    	}

    	public function getEstado(){
    		return $this->estado;
    	}

    	public function setEstado($estado){
    		$this->estado = $estado;
    	}
  }
  ?>
