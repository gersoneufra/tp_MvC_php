<?php
/**
* 
*/
require(APP_PATH . 'controllers/application_controller.php');

class HomeController extends ApplicationController
{
	public function index(){
		$this->render('index');
	}
}