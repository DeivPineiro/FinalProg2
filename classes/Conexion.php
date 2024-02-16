<?php

class Conexion{

    private const DB_SERVER = "localhost";
    private const DB_USER = "root";
    private const DB_PASS = "";
    private const DB_NAME = "fendardo_base";  
    private const DB_DSN = "mysql:host=".self::DB_SERVER.";dbname=".self::DB_NAME.";charset=utf8mb4";

    private static ?PDO $db = null;
    
    private static function conectar()
    {
        
        try {
           self::$db = new PDO(self::DB_DSN,self::DB_USER,self::DB_PASS, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die ("Error al conectar a la base de datos");
        }

    }

public static function getConexion(): PDO
{

    if(self::$db === null){

        self::conectar();

    }

    return self::$db;

}

}
