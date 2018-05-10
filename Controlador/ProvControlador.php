<?php
include '../../Datos/proveedorDAO.php';


    class ProvControlador
    {
        public static function getProveedores()
        {
          return ProveedorDAO::getProveedores();
        }
    }


?>
