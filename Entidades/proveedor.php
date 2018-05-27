<?php

class Proveedor
{
      private $id_proveedor;
      private $nombreEmpresa;
      private $nombreContacto;
      private $telefono;
      private $direccion;
      private $pais;
      private $region;
      private $ciudad;
      private $sitio;
      private $estado;

      public function getId_proveedor(){
  return $this->id_proveedor;
}

public function setId_proveedor($id_proveedor){
  $this->id_proveedor = $id_proveedor;
}

public function getNombreEmpresa(){
  return $this->nombreEmpresa;
}

public function setNombreEmpresa($nombreEmpresa){
  $this->nombreEmpresa = $nombreEmpresa;
}

public function getNombreContacto(){
  return $this->nombreContacto;
}

public function setNombreContacto($nombreContacto){
  $this->nombreContacto = $nombreContacto;
}

public function getTelefono(){
  return $this->telefono;
}

public function setTelefono($telefono){
  $this->telefono = $telefono;
}

public function getDireccion(){
  return $this->direccion;
}

public function setDireccion($direccion){
  $this->direccion = $direccion;
}

public function getPais(){
  return $this->pais;
}

public function setPais($pais){
  $this->pais = $pais;
}

public function getRegion(){
  return $this->region;
}

public function setRegion($region){
  $this->region = $region;
}

public function getCiudad(){
  return $this->ciudad;
}

public function setCiudad($ciudad){
  $this->ciudad = $ciudad;
}

public function getSitio(){
  return $this->sitio;
}

public function setSitio($sitio){
  $this->sitio = $sitio;
}

public function getEstado(){
  return $this->estado;
}

public function setEstado($estado){
  $this->estado = $estado;
}
}



 ?>
