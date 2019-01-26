<?php 
/**
 * 
 */
require(APP_PATH . 'controllers/application_controller.php');

class ToursController extends ApplicationController
{
	public function show($id){
		$tour = new Tour();
		$var['tours'] = $tour->find_by_tour($id);
		$route = new Route();
		$var['route'] = $route->find($id);
		$this->set($var);
		$this->render("show");
	}
}