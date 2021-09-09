<?php

require_once './models/CRUD.php';

class ViewController{
    
    public function __construct(){}

    public function ver($id){
        $res = CRUD::index("catalogos");
        $datos = json_decode($res);

        $data_menu = CRUD::infoById($id,"catalogos");
        $menu_json = json_decode($data_menu);
        $menu = $menu_json->data;
        
        if($datos){
          $message = ($datos->message != 'ok') ? $datos->message : null;
          $data = $datos->data ? $datos->data : null;
        } else{
          $message = null;
          $data = null;          
        }
        return include './views/ver.php';
    }
}