<?php

class Conexion{

    private const DB_SERVER = "sql311.byetcluster.com";
    private const DB_USER = "if0_35994670";
    private const DB_PASS = "Cortazar123";
    private const DB_NAME = "if0_35994670_prog2";  
    private const DB_DSN = "mysql:host=".self::DB_SERVER.";dbname=".self::DB_NAME.";charset=utf8mb4";

    private static ?PDO $db = null;
    
    private static function conectar()
    {
        
        try {
           self::$db = new PDO(self::DB_DSN,self::DB_USER,self::DB_PASS, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die ("Error al conectar a la base de datos" . "Error=>" . $e );
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
