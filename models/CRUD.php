<?php

require_once "./models/Conexion.php";

class CRUD{   

    public static function testDB(){
        Conexion::conectar("evaluacion_data");
        return "Conexion establecida";
    }

    public static function index($tabla){
        $res = Conexion::conectar("evaluacion_data")->prepare("SELECT ca.id, ca.nombre_menu, ca.descripcion_menu,ca.dependencia_id, c.nombre_menu AS dependencia FROM $tabla ca
        LEFT JOIN $tabla c on c.id = ca.dependencia_id ORDER BY ca.id desc");        
        try {                        
            if($res->execute()){
                return json_encode(["data" => $res->fetchAll(), "message"=>"ok"]);
            }
        } catch (PDOException $e) {
            return json_encode(["data" => "", "message"=>"error", "error" => $e->getMessage()]);
        }
    }

    public static function salvar($data,$tabla){
        $res = Conexion::conectar("evaluacion_data")->prepare("INSERT INTO $tabla(nombre_menu, descripcion_menu, dependencia_id) VALUES(:nombre_menu, :descripcion_menu, :dependencia_id)");
        try {
            $res->bindParam(":nombre_menu", $data["nombre"]);
            $res->bindParam(":descripcion_menu", $data["descripcion"]);
            $res->bindParam(":dependencia_id", $data["dependencia"]);            
            if($res->execute()){
                return json_encode(["data" => "", "message"=>"ok"]);
            }
        } catch (PDOException $e) {
            return json_encode(["data" => $res->fetch(), "message"=>"error", "error" => $e->getMessage()]);
        }
    }

    public static function editar($id,$data,$tabla){
        $res = Conexion::conectar("evaluacion_data")->prepare("UPDATE $tabla SET nombre_menu = :nombre_menu, descripcion_menu = :descripcion_menu, dependencia_id = :dependencia_id WHERE id = :id");
        try {
            $res->bindParam(":nombre_menu", $data["nombre"]);
            $res->bindParam(":descripcion_menu", $data["descripcion"]);
            $res->bindParam(":dependencia_id", $data["dependencia"]);  
            $res->bindParam(":id", $id);          
            if($res->execute()){
                return json_encode(["data" => "", "message"=>"ok"]);
            }
        } catch (PDOException $e) {
            return json_encode(["data" => $res->fetch(), "message"=>"error", "error" => $e->getMessage()]);
        }
    }

    public static function eliminar($id,$tabla){
        $res = Conexion::conectar("evaluacion_data")->prepare("DELETE FROM $tabla WHERE id = :id");
        try {
            $res->bindParam(":id", $id);
            if($res->execute()){
                return json_encode(["data" => "", "message"=>"ok"]);
            }
        } catch (PDOException $e) {
            return json_encode(["data" => $res->fetch(), "message"=>"error", "error" => $e->getMessage()]);
        }
    }

    public static function infoById($id,$tabla){
        $res = Conexion::conectar("evaluacion_data")->prepare("SELECT * FROM $tabla WHERE id = :id");        
        try {                        
            $res->bindParam(":id", $id);
            if($res->execute()){
                return json_encode(["data" => $res->fetch(), "message"=>"ok"]);
            }
        } catch (PDOException $e) {
            return json_encode(["data" => "", "message"=>"error", "error" => $e->getMessage()]);
        }
    }

}