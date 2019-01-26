<?php
/**
 * 
 */
require(APP_PATH . 'controllers/application_controller.php');
class DriversController extends ApplicationController
{
	public function index(){
		$driver = new Driver();
		$var['drivers'] = $driver->all();
		$this->set($var);
		$this->render('index');
	}

	public function show($code){
		$driver = new Driver();
		$var['driver'] = $driver->find($code);
		$var['tours'] = $driver->tours($code);
		$this->set($var);
		$this->render('show');
	}
}