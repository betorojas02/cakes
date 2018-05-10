<?php
include '../../Datos/PerfilDAO.php';

class PerfilControlador
{

    public static function getPerfil()
    {

        
          return PerfilDAO::getPerfil();
       
    
  }
}

 ?>