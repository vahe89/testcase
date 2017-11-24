<?php
//require PATH.'app/libs\Model.php';
class UserDelete_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function delete()
	{
	    $id = $_GET['id'];
	    try
        {
            //Session::init();
            //Session::set('loggedIn', false);
		$sth = $this->db->query(" DELETE FROM " .DB_TABLE1. " WHERE id = '$id' ");
        }catch (PDOException $e){
	        die($e->getMessage());
        }
        //header('Refresh:0;url= ' . URL . 'login');
        //var_dump($sth);
        if ($sth == true) {

             //Session::init();
            Session::set('loggedIn', false);
            //Session::set('firstname',$first_name);
            //Session::set('lastname',$last_name);
            header('Refresh:0;url= ' . URL . 'login');
        }else {
            Session::set('loggedIn', true);
            header('Refresh:0;url= ' . URL . 'dashboard');
        }

	}
}