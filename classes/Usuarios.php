<?php

class Usuarios
{

    private $id_usuario;
    private $nombre_usuario;
    private $password;
    private $email;
    private $rol;


    public function usuario_x_username(string $username): ?Usuarios
    {


        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM usuarios WHERE nombre_usuario = ?";

        $PDOConexion = $conexion->prepare($query);
        $PDOConexion->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOConexion->execute([$username]);

        $result = $PDOConexion->fetch();

        if (!$result) {

            return null;
        } else {

            return $result;
        }
    }


    /**
     * Get the value of id_usuario
     */
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Get the value of nombre_usuario
     */
    public function getNombre_usuario()
    {
        return $this->nombre_usuario;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of rol
     */
    public function getRol()
    {
        return $this->rol;
    }
}
