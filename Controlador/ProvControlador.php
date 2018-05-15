<?php
include '../../Datos/proveedorDAO.php';


    class ProvControlador
    {
        public static function getProveedores()
        {
          return ProveedorDAO::getProveedores();
        }


        public static function addProveedor($nombreE,$nombreC, $telefono,$direccion,$ciudad,$pais,$region,$sitio)
        {
          $obj_prov = new Proveedor();

          $obj_prov->setNombreEmpresa($nombreE);
          $obj_prov->setNombreContacto($nombreC);
          $obj_prov->setTelefono($telefono);
          $obj_prov->setDireccion($direccion);
          $obj_prov->setPais($pais);
          $obj_prov->setRegion($region);
          $obj_prov->setCiudad($ciudad);
          $obj_prov->setSitio($sitio);
          $obj_prov->setEstado("A");

          $respuesta = ProveedorDAO::addProveedor($obj_prov);

          return $respuesta;
        }

        // public static function  eliminarDatos ($id)
        // {
        //   $obj_ingre = new Ingrediente();
        //   $obj_ingre->setId_ingrediente($id);
        //   $obj_ingre->setEstado("I");
        //   return IngredienteDAO::eliminarIng($obj_ingre);
        // }
    }




?>
