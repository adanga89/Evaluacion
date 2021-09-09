<?php

require_once './models/CRUD.php';

class Controller {

    public $message = null;
    public $data = null;
    public $controller = null;    

    public function __construct(){
      $this->message = "";
      $this->data = "";
      $url = null;
      if(!isset($_GET['url'])){
        require_once './controllers/inicioController.php';
        $this->controller = new InicioController();
        $this->controller->index();
      } else{
          $url = rtrim($_GET['url'],'/');
          $url = explode('/', $url);
          $url[0] = $url[0]."Controller";
          require_once "./controllers/".$url[0].".php";
          $this->controller = new $url[0]();

          if(count($url) > 1){
            if(count($url) > 2){
              $this->controller->{$url[1]}($url[2]);
            }else{
              $this->controller->{$url[1]}();
            }            
          } else{
            $this->controller->index();
          }
          
      }
    }

}