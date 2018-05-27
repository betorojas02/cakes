<?php
require_once 'Conexion.php';
include '../../Entidades/Usuario.php';

class UsuarioDAO extends Conexion
{
    public static $cnx;

    private static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar()
    {
        self::$cnx = null;
    }

    /**
     * Método para validar el login del Usuario
     * @param object Usuario
     * @return datos
     */
    public static function login($usuario)
    {
        $sql = "SELECT * FROM usuario
          WHERE correo  = :correo  AND clave = :clave  AND estado = 'A'  ";

        self::getConexion();

        $resultado = self::$cnx->prepare($sql);

        $correo = $usuario->getCorreo();
        $clave = $usuario->getClave();

        $resultado->bindParam(":correo", $correo);
        $resultado->bindParam(":clave", $clave);

        $resultado->execute();

        if ($resultado->rowCount() > 0) {

            $filas = $resultado->fetch();
            if ($filas["correo"] == $usuario->getCorreo() &&
                $filas["clave"] == $usuario->getClave()) {
                return $filas;
            }
        }
        return false;

    }

    /**
     * Método para validar obtener datos del usuario
     * @param object Usuario
     * @return object
     */
    public static function getUsuario($usuario)
    {
        $sql = "SELECT id_usuario,id_perfil,nombre,apellido,correo,ciudad,direccion,telefono,sexo,cedula,
           fecha_nacimiento,barrio,estado FROM usuario
          WHERE correo  = :correo  AND clave = :clave ";
        self::getConexion();

        $resultado = self::$cnx->prepare($sql);

        $correo = $usuario->getCorreo();
        $clave = $usuario->getClave();

        $resultado->bindParam(":correo", $correo);
        $resultado->bindParam(":clave", $clave);

        $resultado->execute();

        $filas = $resultado->fetch();

        $usuario = new Usuario();
        $usuario->setId($filas["id_usuario"]);
        $usuario->setPerfil($filas["id_perfil"]);
        $usuario->setNombre($filas["nombre"]);
        $usuario->setApellido($filas["apellido"]);
        $usuario->setCorreo($filas["correo"]);
        $usuario->setCiudad($filas["ciudad"]);
        $usuario->setDireccion($filas["direccion"]);
        $usuario->setTelefono($filas["telefono"]);
        $usuario->setSexo($filas["sexo"]);
        $usuario->setCedula($filas["cedula"]);
        $usuario->setFechaNacimiento($filas["fecha_nacimiento"]);
        $usuario->setBarrio($filas["barrio"]);
        $usuario->setEstado($filas["estado"]);

        return $usuario;

    }
    /**
     * metodo para agregar un usuario
     *
     * @param [type] $nombre
     * @param [type] $apellido
     * @param [type] $correo
     * @param [type] $clave
     * @param [type] $ciudad
     * @param [type] $telefono
     * @param [type] $sexo
     * @param [type] $cedula
     * @param [type] $tipoP
     * @param [type] $direccion
     * @param [type] $fecha
     * @param [type] $barrio
     * @param [type] $estado
     * @return resultado->execute();
     */
    public static function addUsuarioM($nombre, $apellido, $correo, $clave, $ciudad, $telefono, $sexo, $cedula, $tipoP, $direccion, $fecha, $barrio, $estado)
    {
        $sql = "INSERT INTO usuario (id_perfil,nombre,apellido,correo,clave,ciudad,direccion,telefono,sexo,cedula,fecha_nacimiento,barrio,estado)
                                VALUES(:id_perfil,:nombre,:apellido,:correo,:clave,:ciudad,:direccion,:telefono,:sexo,:cedula,:fecha_nacimiento,:barrio,:estado)";
        self::getConexion();
        $resultado = self::$cnx->prepare($sql);
        $resultado->bindParam(":id_perfil", $tipoP);
        $resultado->bindParam(":nombre", $nombre);
        $resultado->bindParam(":apellido", $apellido);
        $resultado->bindParam(":correo", $correo);
        $resultado->bindParam(":clave", $clave);
        $resultado->bindParam(":ciudad", $ciudad);
        $resultado->bindParam(":direccion", $direccion);
        $resultado->bindParam(":telefono", $telefono);
        $resultado->bindParam(":sexo", $sexo);
        $resultado->bindParam(":cedula", $cedula);
        $resultado->bindParam(":fecha_nacimiento", $fecha);
        $resultado->bindParam(":barrio", $barrio);
        $resultado->bindParam(":estado", $estado);
        $resultado->execute();

    }
    /**
     * metodo para editar un usuario
     *
     * @param [type] $id_usuario
     * @param [type] $ciudad
     * @param [type] $telefono
     * @param [type] $direccion
     * @param [type] $barrio
     * @return resultado->execute();
     */
    public static function editUsuarioM($id_usuario, $ciudad, $telefono, $direccion, $barrio)
    {
        $sql = "UPDATE usuario SET  ciudad=:ciudad , telefono=:telefono , direccion=:direccion  , barrio=:barrio WHERE id_usuario=:id_usuario";
        self::getConexion();
        $resultado = self::$cnx->prepare($sql);
        $resultado->bindParam(":id_usuario", $id_usuario);
        $resultado->bindParam(":ciudad", $ciudad);
        $resultado->bindParam(":direccion", $direccion);
        $resultado->bindParam(":telefono", $telefono);
        $resultado->bindParam(":barrio", $barrio);
        $resultado->execute();

    }
    /**
     * metodo para bloquear un usuario
     *
     * @param [type] $v_usuario
     * @return resultado->execute();
     */
    public function bloqueartUsuarioM($v_usuario)
    {
        $sql = "UPDATE usuario SET estado='I' WHERE correo=:correo";
        self::getConexion();
        $resultado = self::$cnx->prepare($sql);
        $resultado->bindParam(":correo", $v_usuario);
        $resultado->execute();

    }
    /**
     * metodo para traer los datos del usuario logiado
     *
     * @param [type] $id
     * @return resultado->fetchAll();
     */
    public static function usuLM($id)
    {
        $sql = "SELECT * FROM usuario WHERE id_usuario=:id_usuario";
        self::getConexion();
        $resultado = self::$cnx->prepare($sql);
        $resultado->bindParam(":id_usuario", $id);
        $resultado->execute();
        return $resultado->fetchAll();

    }
    /**
     * metodo para buscar si ya existe un correo
     *
     * @param [type] $correo
     * @return resultado->rowCount()
     */
    public function usuarioRepetidoM($correo)
    {
        $sql = "SELECT correo FROM usuario WHERE correo=:correo";
        self::getConexion();
        $resultado = self::$cnx->prepare($sql);
        $resultado->bindParam(":correo", $correo);
        $resultado->execute();
        return $resultado->rowCount();

    }
    /**
     * metodo para buscar buscar el id de un usuario mediante el correo para recuperar la clave
     *
     * @param [type] $correo
     * @return resultado->fetchColumn()
     */
    public function recuperarM($correo)
    {
        $sql = "SELECT id_usuario FROM usuario WHERE correo=:correo";
        self::getConexion();
        $resultado = self::$cnx->prepare($sql);
        $resultado->bindParam(":correo", $correo);
        $resultado->execute();
        return $resultado->fetchColumn();

    }
    /**
     * metodo para cambiar la clave
     *
     * @param [type] $id_usuario
     * @param [type] $clave
     * @return  resultado->execute()
     */
    public function cambioClaveM($id_usuario, $clave)
    {

        $sql = "UPDATE usuario SET clave=:clave , estado='A' WHERE id_usuario=:id_usuario";
        self::getConexion();
        $resultado = self::$cnx->prepare($sql);
        $resultado->bindParam(":id_usuario", $id_usuario);
        $resultado->bindParam(":clave", $clave);

        $resultado->execute();

    }

}
