<?php
//require PATH.'app/libs\Controller.php';
class UserDelete extends Controller {

	public function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		
		if ($logged == false) {
			Session::destroy();
			header('location:' .URL.'Login');
			exit;
		}
			
	}
	
	public function index() 
	{
		//$this->vew->render('/userDelete/index');
	}

	
	public function delete()
	{

		$this->model->delete();


	}

}