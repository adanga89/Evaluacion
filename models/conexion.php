<?php

class Conexion {

    public static function conectar($name_db){
        $database = "mysql:dbname=$name_db;host=localhost";
        $user = "root";
        $pass = "";

        try {
            $conexion = new PDO($database,$user,$pass);
            $conexion->exec('set names utf8');
            return $conexion;
        } catch (PDOException $e) {
            return 'Falló la conexión: ' . $e->getMessage();
        }
    }
}