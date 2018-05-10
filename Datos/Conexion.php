<?php

      /**
      *Retorna la Conexión a la base de datos
      */
     class Conexion
    {
        public static function conectar()
        {
            try
            {
              $cn = new PDO('pgsql:host=localhost;port=5432;dbname=cakes;',"postgres", "1234");

              $cn->exec('SET CHARACTER SET utf8');
              $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              return $cn;
            }
            catch (PDOException $e)
            {
                     die($e->getMessage());
            }

        }
     }
 ?>
