<?php 
 /**
  * 
  */
class Dispatch
{
 	
  private $request;
  public  function run(){
    $this->request = new Request();
    print_r($this->request->params);
    Router::parse($this->request->url, $this->request);

    $controller = $this->loadController();
    // run controller HomeController => method($params)
    call_user_func_array([$controller, $this->request->action], $this->request->params);
  }

  public function loadController(){
    $name = $this->request->controller . "_controller";
    
    $file = CONTROLLER_PATH . "$name.php";

    require_once ($file);
    $class_name = ucwords($this->request->controller) . 'Controller';
    $controller = new $class_name();

    return $controller;
  }
}