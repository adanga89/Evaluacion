<?php

require_once './models/CRUD.php';

class MenuController{

    public function __construct(){

    }

    public function index(){
        $res = CRUD::index("catalogos");
        $datos = json_decode($res);
        
        if($datos){
          $message = ($datos->message == 'ok') ? $datos->message : null;
          $data = $datos->data ? $datos->data : null;
        } else{
          $message = null;
          $data = null;          
        }
        return include './views/menu.php';
    }

    public function guardar(){

        if($_POST['nombre'] == "" || $_POST['descripcion'] == "")
            return $message = "Campos requeridos vacios";

        $data = [
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion'],
            'dependencia' => $_POST['dependencia'] ? $_POST['dependencia'] : NULL,
        ];

        $res = CRUD::salvar($data,"catalogos");
        $datos = json_decode($res);
        if($datos){
            $message = ($datos->message == "ok") ? $datos->message : null;
            $data = $datos->data ? $datos->data : null;
          } else{
            $message = null;
            $data = null;          
          }

          if($message == 'ok'){
            header("Location: /", 301);
             exit();   
          } else {
            header("Location: /menu", 301);
            exit();   
          }
          
    }

    public function editar($id){
        $res = CRUD::index("catalogos");
        $data_menu = CRUD::infoById($id,"catalogos");
        $menu_json = json_decode($data_menu);
        $menu = $menu_json->data;
        $datos = json_decode($res);
        if($datos){
          $message = ($datos->message == 'ok') ? $datos->message : null;
          $data = $datos->data ? $datos->data : null;
        } else{
          $message = null;
          $data = null;          
        }
        return include './views/menu editar.php';
    }

    public function editar_save($id){
        if($_POST['nombre'] == "" || $_POST['descripcion'] == "")
            return $message = "Campos requeridos vacios";

        $data = [
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion'],
            'dependencia' => $_POST['dependencia'] ? $_POST['dependencia'] : NULL,
        ];

        $res = CRUD::editar($id,$data,"catalogos");
        $datos = json_decode($res);
        if($datos){
            $message = ($datos->message == "ok") ? $datos->message : null;
            $data = $datos->data ? $datos->data : null;
          } else{
            $message = null;
            $data = null;          
          }

          
          if($message == 'ok'){
            header("Location: /", 301);
             exit();   
          } else {
            header("Location: /menu/editar/$id", 301);
            exit();   
          }
          
    }

    public function eliminar($id){
        $res = CRUD::eliminar($id,"catalogos");
        $datos = json_decode($res);        
        header("Location: /", 301);
        exit();            
    }
}