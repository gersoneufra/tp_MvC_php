<?php 
/**
 * 
 */
require(APP_PATH . 'controllers/application_controller.php');

class PassingersController extends ApplicationController
{
	public function new($code_tour)
	{
		$m_tour = new Tour();
		$var['tour'] = $m_tour->find($code_tour);
		$var['seating'] = $m_tour->seating_active($code_tour);
		$this->set($var);
		$this->render('form');
	}

	public function by_tour($code_tour){
		$passinger = new Passinger();
		$var['passingers'] = $passinger->find_by_tours($code_tour);
		$var['code_tour'] = $code_tour;
		$this->set($var);
		$this->render('by_tour');
	}

	public function create($params){
		$passinger = new Passinger();
		if($passinger->register($_POST['passinger'])){
	  	$url = "tp_MvC_php/passingers/by_tour/" . $_POST['passinger']['VIANRO'];
			redirect($url);
		}else{
			$url = "tp_MvC_php/passingers/new/" + $_POST['passinger']['VIANRO'];
      redirect($url);
		}
	}

	public function delete($code){
		$passinger = new Passinger();
		$tour = $passinger->find($code); 
		if($passinger->delete($code)){
			$url = "tp_MvC_php/passingers/by_tour/" . $tour['VIANRO'];
			redirect($url);
		}
	}
}