<?php
//require PATH.'app/libs\Controller.php';
class UserEdit extends Controller {

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
		$this->vew->render('userEdit'.DS.'index');
	}

	
	public function edit()
	{

		// Do your error checking!
		
		$this->model->edit();
        /*Session::init();
        Session::set('loggedIn', true);
        Session::set('username',$username);
        Session::set('password',$password);
        Session::set('firstname',$first_name);
        Session::set('lastname',$last_name);
        //Session::set('firstname',$first_name);
        //Session::set('lastname',$last_name);
        header('Refresh:0;url= ' . URL . 'Dashboard');*/

	}

}