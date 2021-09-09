<?php

require_once './models/CRUD.php';

class InicioController{

    public function __construct(){
      
    }

    public function index(){
        $res = CRUD::index("catalogos");
        $datos = json_decode($res);
        if($datos){
          $message = ($datos->message != 'ok') ? $datos->message : null;
          $data = $datos->data ? $datos->data : null;
        } else{
          $message = null;
          $data = null;          
        }
        return include './views/index.php';
    }

}