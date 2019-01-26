<?php 
/**
 * 
 */
require(APP_PATH . 'controllers/application_controller.php');

class RoutesController extends ApplicationController
{
	public function index(){
		$routes = new Route();
		$var['routes'] = $routes->all();
		$this->set($var);
		$this->render("index");
	}
}