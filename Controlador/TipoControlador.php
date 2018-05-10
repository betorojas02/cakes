<?php
include '../../Datos/TipoDAO.php';


    class TipoControlador {


        public function getTipo()
        {
          return TipoDAO::getTipos();
        }

    }

?>
